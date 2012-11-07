<?php
use library\Model;

class Index_Model extends Model {
	function __construct() {
		parent::__construct();
	}
	
	function getJobList($page)
	{
		//$sql = 'SELECT `job_title`,  `job_type`,  `company`,  `description`,  `link`,  `status`,  `interest_rating`,  `jid` FROM `jobjob`.`job` ORDER BY `jid` ASC LIMIT 1000';
		$page=intval($page);
		$sql = 'select * from job where job.jid>'.
		" (select COALESCE(MAX(job.jid),'0000-00-00') from".
		' (select job.jid from job order by job.jid ASC limit '.
		 (($page-1)*5).
		') as job) order by job.jid ASC limit 5';
		
		
		$results= $this->db->select($sql);
		
		return $results;

		
	}
	
	function getJobCount()
	{
		$sql = 'SELECT COUNT(job.jid) FROM job';
	
		$result= $this->db->select($sql);
	
		return intval($result[0]['COUNT(job.jid)']);
	
	
	}
	
	function addJob()
	{
	
		$result = $this->db->insert('job',$_POST);
		return $result;
		
	}
	
	function deleteJob()
	{
		$result = $this->db->delete('job','job.jid=:jid',$_POST);
		return $result;
		
		
	}
	
	public function getSingleJob($jid)
	{
		$sql = 'select * from job where job.jid=:jid';
		$result = $this->db->select($sql,array('jid'=>$jid));
		return $result;
	}
	
	public function jobEditSave($jid)
	{
		$table = 'job';
		$data = array('job_title'=>$_POST['job_title'],
					  'company'=>$_POST['company'],
					  'interest_rating'=>$_POST['interest_rating'],
					  'description'=>$_POST['description'],
					  'link'=>$_POST['link'],
					  'job_type'=>empty($_POST['job_type'])?'full':'part',
					  'status'=>$_POST['status']
					);
		$where = 'jid = :jid';
		$bindWhereParams = array('jid'=>$jid);
		
		$result=$this->db->update($table, $data, $where, $bindWhereParams);
		return $result;
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}