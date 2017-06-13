<?php
    //Global Constants
    define('SITE_NAME', 'vs-oade');
    define('ROOT_DIR', dirname(getcwd()) . '/' . SITE_NAME . '/');
    define('URL_DIR', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT']. '/' . SITE_NAME.'/');

    //Load required classes automatically
    function __autoload($class) {		
        if(file_exists(ROOT_DIR."controllers/Class.$class.php")) {
            require(ROOT_DIR."controllers/Class.$class.php");
            return;
        }	

        if(file_exists(ROOT_DIR."models/Class.$class.php")) {
            require(ROOT_DIR."models/Class.$class.php");
            return;
        }	

        if(file_exists(ROOT_DIR."database/Class.$class.php")) {
            require(ROOT_DIR."database/Class.$class.php");
            return;
        }
    }

    include_once 'common.php';

    //Call controller method and view
    require_once 'Class.Routing.php';
    Routing::getInstance()->route();
