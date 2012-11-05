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

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}