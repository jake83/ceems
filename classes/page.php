<?php

class Page {

	public $pagenum;
	public $pageorder;
	public $pagename;
	public $content;
	public $enabled;
	public $footerpromo;
	private $page;
	private $pagecount = array();

	function __construct() {
		if(isset($_POST['pagenum'])) { $this->pagenum = $_POST['pagenum']; }
		if(isset($_POST['pageorder'])) { $this->pageorder = $_POST['pageorder']; }
		if(isset($_POST['name'])) { $this->pagename = $_POST['name']; }
		if(isset($_POST['content'])) { $this->content = $_POST['content']; }
		if(isset($_POST['page_enabled'])) { $this->enabled = $_POST['page_enabled']; }
		if(isset($_POST['footerpromo'])) { $this->footerpromo = $_POST['footerpromo']; }
	}
	
	public function insert_page() {
		global $db;
		$query  = "INSERT INTO pages ";
		$query .= "(pagenum, pageorder, name, content, enabled) ";
		$query .= "VALUES (";
		$query .= $this->pagenum .", ";
		$query .= $this->pageorder .", ";
		$query .= "'". $this->pagename ."', ";
		$query .= "'". $this->content ."', ";
		$query .= $this->enabled ."', ";
		$query .= "'". $this->footerpromo ."')";
		$db->query($query);
	}
	
	private function get_page_by_pagenum($pagenum, $pageorder) {
		global $db;
		
		$query  = "SELECT pages.name, pages.content, pages.pageorder, pages.footerpromo ";
		$query .= "FROM pages ";
		$query .= "INNER JOIN sections ";
		$query .= "ON pages.pagenum = sections.pagenum ";
		$query .= "WHERE sections.pagenum=". $pagenum;
		$query .= " AND pages.pageorder=". $pageorder;
		$query .= " AND sections.enabled=1 ";
		$query .= "AND pages.enabled=1";
		
		$result_set = $db->query($query);		
		if ($this->page = $db->fetch_array($result_set)) {
			return $this->page;
		} else {
			return NULL;
		}
	}
	
	public function get_number_pages($section) {
		global $db;
		
		$query  = "SELECT COUNT(*) ";
		$query .= "FROM pages ";
		$query .= "INNER JOIN sections ";
		$query .= "ON pages.pagenum = sections.pagenum ";
		$query .= "WHERE sections.pagenum=". $section;
		$query .= " AND sections.enabled=1 ";
		$query .= "AND pages.enabled=1";
		
		$result_set = $db->query($query);
		if ($this->pagecount = $db->fetch_array($result_set)) {
			return $this->pagecount[0];
		} else {
			return NULL;
		}
	}

	public function find_selected_page() {
		global $sel_page;
		if (isset($_GET['page']) && isset($_GET['pageorder'])) {
			$sel_page = $this->get_page_by_pagenum($_GET['page'], $_GET['pageorder']);
		} else {
			$sel_page = NULL;
		}
		return $sel_page;
	}
	
}

?>