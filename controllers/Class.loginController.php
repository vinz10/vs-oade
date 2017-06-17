<?php
/**
 * Class loginController
 */
class loginController extends Controller {
	
    /**
     // @method connection()
     // @desc Method for the connection of a user
     */
    function connection() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];
        
        // Load login from DB if exists
        $result = Town::connect($townName, $password);

        // Put the login in the session if exists or return error msg
        if(!$result){			
            $_SESSION['msg'] = MSG_INCORRECT_PWD;	
            $this->redirect('login', 'login');
        }
        else{
            $_SESSION['login'] = $result;
            $this->redirect('', '');
        }	
    }

    /**
     // @method login()
     // @desc Method for the login
     */
    function login() {

        // If a login is active, no re-login
        if($this->getLogin()){
            $this->redirect('', '');
            exit;
        } 

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
     //@method logout()
     // @desc Method for the logout of a user
     */
    function logout() {
        
        // Destroy the session
        session_destroy();
        $this->redirect('', '');
    }
    
    /**
    // @method getAllTowns()
    // @desc Method that return all Towns
    // @return Towns
    */
    public static function getAllTowns() {
        return Town::getAllTown();
    } 
}