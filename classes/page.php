<?php

class Page {

	private $page;

	private function get_page_by_pagenum($pagenum, $pageorder) {
		global $db;
		
		$query  = "SELECT pages.name, pages.content, pages.pageorder ";
		$query .= "FROM pages ";
		$query .= "INNER JOIN sections ";
		$query .= "ON pages.pagenum = sections.pagenum ";
		$query .= "WHERE sections.pagenum=". $pagenum;
		$query .= " AND sections.enabled=1 ";
		$query .= "AND pages.enabled=1";
		
		$result_set = $db->query($query);		
		if ($this->page = $db->fetch_array($result_set)) {
			return $this->page;
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
	}
	
}

?>