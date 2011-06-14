<?php

class Section {

	public $pagenum;
	public $name;
	public $enabled;
	
	private $sections = array();

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
	
	public function update_section() {
		global $db;
		$query  = "UPDATE sections ";
		$query .= "SET ";
		$query .= "pagenum =". $this->pagenum .", ";
		$query .= "name=". $this->name .", ";
		$query .= "";
		$query .= "WHERE pagenum=". $this->pagenum;
	}
	
	public function list_all() {
		global $db;
		$query  = "SELECT * FROM sections ";
		$query .= "ORDER BY pagenum ASC";
		$result_set = $db->query($query);
		$sections = array();
		while($row = $db->fetch_array($result_set)) {
			$sections[] = $row; 
		}
		
		if (!empty($sections)) {
			return $sections;
		} else {
			return NULL;
		}
	}
	
	public function count_all() {
		global $db;
		$query = "SELECT COUNT(*) FROM sections";
		$result_set = $db->query($query);
		$row = $db->fetch_array($result_set);
		return array_shift($row);
	}
	
	public function get_info($pagenum) {
		global $db;
		$query  = "SELECT * FROM sections WHERE ";
		$query .= "pagenum={$pagenum} ";
		$query .= "LIMIT 1";
		$result_set = $db->query($query);
		$section = $db->fetch_array($result_set);
		return $section;
	}

}

?>