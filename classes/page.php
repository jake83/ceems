<?php

class Page {

	private $page;

	private function get_page_by_pagenum($pagenum) {
		global $db;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE pagenum=" . $pagenum ." ";
		$query .= "LIMIT 1";
		$result_set = $db->query($query);
		
		if ($this->page = $db->fetch_array($result_set)) {
			return $this->page;
		} else {
			return NULL;
		}
	}

	public function find_selected_page() {
		global $sel_page;
		if (isset($_GET['page'])) {
			$sel_page = $this->get_page_by_pagenum($_GET['page']);
		} else {
			$sel_page = NULL;
		}
	}
	
}

?>