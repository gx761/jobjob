<?php
namespace library;
class Model {
	function __construct() {
		
		$db = array('name'=>'jobjob','type'=>'mysql','host'=>'localhost','user'=>'root','pass'=>'');
		$this->db = new Database($db);
		
	}
	
	
	
	public function __call($name, $arg) {
		die("<div>Model Error: (Method) <b>$name</b> is not defined</div>");
	}
	

}