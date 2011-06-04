<?php

class Section {

	public $pagenum;
	public $name;
	public $enabled;

	function __construct() {
		if(isset($_POST['pagenum'])) { $this->pagenum = $_POST['pagenum']; }
		if(isset($_POST['name'])) { $this->name = $_POST['name']; }
		if(isset($_POST['section_enabled'])) { $this->enabled = $_POST['section_enabled']; }
	}
	
	public function insert_section() {
		global $db;
		$query  = "INSERT INTO sections ";
		$query .= "(pagenum, name, enabled) ";
		$query .= "VALUES (";
		$query .= $this->pagenum .", ";
		$query .= "'". $this->name ."', ";
		$query .= $this->enabled .")";
		$db->query($query);
	}

}

?>