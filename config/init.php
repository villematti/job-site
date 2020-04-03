<?php
// Start Session
session_start();

// Include Helpers
require_once 'helpers/system_helper.php';

// Config File
require_once 'config.php';

// Autoloader
function __autoload($class_name)
{
    require_once 'lib/' . $class_name . '.php';
}
