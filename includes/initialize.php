<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Path is C:\wamp\www\ceems
defined('SITE_ROOT') ? null :
	define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'ceems');

defined('INCLUDES_PATH') ? null : 
	define('INCLUDES_PATH', SITE_ROOT.DS.'includes');
	
defined('CLASS_PATH') ? null : 
	define('CLASS_PATH', SITE_ROOT.DS.'classes');
	
// load basic functions next so that everything after can use them
require_once(INCLUDES_PATH.DS."config.php");

// load basic functions next so that everything after can use them
require_once(INCLUDES_PATH.DS."functions.php");

// load core objects
require_once(CLASS_PATH.DS."session.php");
require_once(CLASS_PATH.DS."database.php");

// load database-related classes
require_once(CLASS_PATH.DS."user.php");

// load site related classes
require_once(CLASS_PATH.DS."page.php");
require_once(CLASS_PATH.DS."section.php");

?>
