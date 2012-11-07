<?php

class Index extends library\Controller {
	
	private $jobList=array();

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		//echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
		//echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
	//	$this->getJobList();
		
		$this->getFirstPage();
		$this->view->numberOfPages =ceil($this->getJobCount()/5);

		$this->view->render('index/index',$this->jobList);
	}
	
	public function getJobList($page)
	{	
	
		$data= $this->model->getJobList($page);

		echo json_encode($data);
	}
	
	public function getFirstPage()
	{
		$this->jobList = $this->model->getJobList(1);		
	
	}
	
	
	public function getJobCount()
	{
		$number = $this->model->getJobCount();
		return $number;
	
	}
	
	public function addJob()
	{
		$feedback = $this->model->addJob();
		
		echo json_encode($feedback);
	}
	
	public function deleteJob()
	{
		$result = $this->model->deleteJob();
		echo json_encode($result);
	}
	
	public function getSingleJob($jid)
	{
		$result = $this->model->getSingleJob($jid);
		
		$this->view->render('index/edit',$result);
	}
	
	public function jobEditSave($jid)
	{
		if($_POST['submit']=="buttonOne")
		{
			$result = $this->model->jobEditSave($jid);
			header('location:../../index');
		}
		else if($_POST['submit']=="buttonTwo")
		{
			header('location:../../index');
		}
		
	}
	
	
	
}