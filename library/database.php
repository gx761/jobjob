<?php
 /* try {
 *    $db = new jream\Database($db);
 *    $db->select("SELECT * FROM user WHERE id = :id", array('id', 25));
 *    $db->insert("user", array('name' => 'jesse'));
 *    $db->update("user", array('name' => 'juicy), "id = '25'");
 *    $db->delete("user", "id = '25'");
 * } catch (Exception $e) {
 *    echo $e->getMessage();
 * }
 */

namespace library;
class Database extends \PDO
{

    public $activeTransaction;
    
    private $_sql;
    
    private $_fetchMode = \PDO::FETCH_ASSOC;
     
    public function __construct($db)
    {
        try {
                parent::__construct("{$db['type']}:host={$db['host']};dbname={$db['name']}", $db['user'], $db['pass']);
            
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    

    public function setFetchMode($fetchMode)
    {
        $this->_fetchMode = $fetchMode;
    }
    

    public function select($query, $bindParams = array(), $overrideFetchMode = null)
    {
        $this->_sql = $query;
        
        
        if (!is_array($bindParams))
        throw new \Exception("$bindParams must be an array");
        
        $sth = $this->prepare($this->_sql);
        foreach($bindParams as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
    
        $result = $sth->execute();
        
        $this->_handleError($result, __FUNCTION__);
        
        if ($overrideFetchMode != null)
        return $sth->fetchAll($overrideFetchMode);
        else
        return $sth->fetchAll($this->_fetchMode);
     
    }


    public function insert($table, $data)
    {    
        $insertString = $this->_prepareInsertString($data);

        $this->_sql = "INSERT INTO $table (`{$insertString['names']}`) VALUES({$insertString['values']})";
        
        $sth = $this->prepare($this->_sql);
        foreach ($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }

        $result = $sth->execute();
        
        $this->_handleError($result, __FUNCTION__);
        
        return $this->lastInsertId();
    }
    

    public function update($table, $data, $where, $bindWhereParams = array())
    {	
        $updateString = $this->_prepareUpdateString($data);

        $this->_sql = "UPDATE $table SET $updateString WHERE $where";
        
        $sth = $this->prepare($this->_sql);
        foreach ($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }

        foreach($bindWhereParams as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        $result = $sth->execute();
        
        $this->_handleError($result, __FUNCTION__);
        
        return $result;
    }
    

    public function delete($table, $where, $bindWhereParams = array())
    {
        $this->_sql = "DELETE FROM $table WHERE $where";
        
        $sth = $this->prepare($this->_sql);
        foreach ($bindWhereParams as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }
        
        $result = $sth->execute();

        $this->_handleError($result, __FUNCTION__);
        
        return $sth->rowCount();
    }
    

    public function insertUpdate($table, $data)
    {
        $insertString = $this->_prepareInsertString($data);
        $updateString = $this->_prepareUpdateString($data);

        $this->_sql = "INSERT INTO $table (`{$insertString['names']}`) VALUES({$insertString['values']}) ON DUPLICATE KEY UPDATE $updateString";
        
        $sth = $this->prepare($this->_sql);
        foreach ($data as $key => $value)
        {
            $sth->bindValue(":$key", $value);
        }

        $result = $sth->execute();
        
        $this->_handleError($result, __FUNCTION__);
        
        return $this->lastInsertId();    
    }
    

    public function showQuery()
    {
        return $this->_sql;
    }
        

    public function id()
    {
        return $this->lastInsertId();
    }
    

    public function beginTransaction()
    {
        parent::beginTransaction();
        $this->activeTransaction = true;
    }
    

    private function _prepareInsertString($data) 
    {

        return array(
            'names' => implode("`, `",array_keys($data)),
            'values' => ':'.implode(', :',array_keys($data))
        );
    }
    

    private function _prepareUpdateString($data) 
    {

        $fieldDetails = NULL;
        foreach($data as $key => $value)
        {
            $fieldDetails .= "`$key`=:$key, ";
        }
        $fieldDetails = rtrim($fieldDetails, ', ');
        return $fieldDetails;
    }
    

    private function _handleError($result, $method)
    {
        if ($this->errorCode() != '00000')
        throw new \Exception("Error: " . implode(',', $this->errorInfo()));
        
        if ($result == false) 
        {
            $error =  $method . " did not execute properly";
            throw new \Exception($error, $error);
        }
    }
    
}