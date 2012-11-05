<?php
namespace library;


class View {
	
	private $_viewQueue = array();
	private $_viewValues;
	private $_path;
	
	
	function __construct() {
		
	}
	
	function render($name,$viewValues=array())
	{
		$this->_viewQueue[]=$name;
		
		$this->_viewValues = $viewValues;
		
		
		foreach ($viewValues as $key=>$value)
		{
			$this->{$key} = $value;
		
		}
		
		
		
		
		foreach ($this->_viewQueue as $vc)
		{
			require $this->_path.'header.php';
			require $this->_path.$vc.'.php';
			require $this->_path.'footer.php';
		}
		
		
		
		
	}
	
	function setPath($path)
	{
		$this->_path=$path;
	}

	
	
	
	
	
}