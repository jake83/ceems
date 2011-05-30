<?php

// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally
// in advisable to store DB-related objets in sessions

class Session {

	private $logged_in;
	public $user_id;

	function __construct() {
		session_start();
		if ($this->check_login()) {
			// actions to take right away if the user is logged in
		} else {
			// actions to take right away if the user is not logged in
		}
	}
	
	public function is_logged_in() {
		return $this->logged_in;
	}
	
	public function login($user) {
		// database should find user based on username/password
		if($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
		}
	}
	
	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}
	
	private function check_login() {
		if (isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		} else {
			unset($this->user_id);
			$this->logged_in = false;
		}
	}
	
}

$session = new Session();

?>