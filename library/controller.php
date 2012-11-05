<?php
namespace library;
class Controller {
	
	private $pathModel;
	
	public $view;
	public $model;
	
	
	function __construct() {
		
	}
	
	public function setPathModel($path)
	{
		$this->pathModel = $path;
	}
	
	
	
	function loadModel($model)
	{
		$model = $model.'_model';

		if(file_exists($this->pathModel.$model.'.php'))
		{
			
		require_once $this->pathModel.$model.'.php';		
		$this->model= new $model;
		}

	}
	
	function location($url)
	{
		header("location:$url");
		exit(0);
	}
	
	function __call($name, $arg) {
		die("<div>Controller Error: (Method) <b>$name</b> is not defined</div>");
	}
	
	
	
	
}