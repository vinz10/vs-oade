<?php
/**
 * 
 * Class Controller : Parent class for every controllers classes
 * 	
 */
class Controller {	
	
	// Initialization of variables
    protected $vars = array();
    protected $controller;
    protected $method;
    protected $data = array();

    /**
     * Constructor
     * @param string $controller
     * @param string $method
     */
    function Controller($controller, $method) {    		
        $this->controller = $controller;
        $this->method = $method;
    }
    
    /**
	 * @method display()
	 * @desc Method for the display
	 */
    function display() {
    	$view = "{$this->controller}/{$this->method}.php";
    	if(file_exists('views/'.$view))
			include 'views/'.$view;
    }
    
    /**
     * @method redirect()
	 * @desc Method for the redirection of the views
     * @param string $controller
     * @param string $method    
     */
    function redirect($controller, $method) {    	
    	if($controller === '' || $method === '') {
    		$url = "Location: " . URL_DIR; 
    	} else {
    		$url = "Location: " . URL_DIR. $controller . '/' .$method;    
    	}
    	header($url);
    }
    
    /**
     * @method getActiveUser()
	 * @desc Method to get active (logged-in) user
     * @return User
     */
    function getActiveUser(){
    	if(isset($_SESSION['user']))
    		return $_SESSION['user'];
    	else
    		return false;
    }
}
?>