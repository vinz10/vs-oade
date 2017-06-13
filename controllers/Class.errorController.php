<?php
/**
 * 
 * Class errorController
 * 
 */
class errorController extends Controller {	
    
	/**
	 * @method http404()
	 * @desc Method for the display of the 404 error
	 */
    function http404() {    
    	
    	// Get the path
        $path = parse_url(
	    	(isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' .	    	                          
	    	$_SERVER['HTTP_HOST'] .                                      
	    	$_SERVER['REQUEST_URI']
	    );
	   	   
        // Get the controller and method
	    $parts = explode("/", substr($path['path'], 1));	    
	    $controller = ucfirst(strtolower((@$parts[1]) ? $parts[1] : ""));		
		$method = strtolower((@$parts[2]) ? $parts[2] : "");		
				
		$this->vars['controller'] = $controller;
		$this->vars['method'] = $method;
		$this->vars['title'] = '404_error';				
    }   
}
?>