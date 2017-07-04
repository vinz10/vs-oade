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
     // @method connection1()
     // @desc Method for the connection of a elected user
     */
    function connection1() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];
        
        // Load login from DB if exists
        $result = Town::connect1($townName, $password);

        // Put the login in the session if exists or return error msg
        if(!$result){			
            $_SESSION['msg'] = MSG_INCORRECT_PWD;	
            $this->redirect('login', 'login1');
        }
        else{
            $_SESSION['login1'] = $result;
            $this->redirect('', '');
        }	
    }
    
    /**
     // @method connection2()
     // @desc Method for the connection of an administrator
     */
    function connection2() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];
        
        // Load login from DB if exists
        $result = Town::connect2($townName, $password);

        // Put the login in the session if exists or return error msg
        if(!$result){			
            $_SESSION['msg'] = MSG_INCORRECT_PWD;	
            $this->redirect('login', 'login2');
        }
        else{
            $_SESSION['login2'] = $result;
            $this->redirect('', '');
        }	
    }
    
    /**
     // @method initlogin()
     // @desc Method for the initlogin
     */
    function initlogin() {

        // If a login is active, no re-login
        if($this->getLogin()){
            $this->redirect('', '');
            exit;
        } 

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
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
     // @method login1()
     // @desc Method for the login1
     */
    function login1() {

        // If a login is active, no re-login
        if($this->getLogin()){
            $this->redirect('', '');
            exit;
        } 

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }
    
    /**
     // @method login2()
     // @desc Method for the login2
     */
    function login2() {

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
     // @method sprojects()
     // @desc Method for the sprojects
     */
    function sprojects() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }
    
    /**
     // @method archives()
     // @desc Method for the archives
     */
    function archives() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }
    
    /**
    // @method getAllTowns()
    // @desc Method that return all Towns
    // @return Towns
    */
    public static function getAllTowns() {
        return Town::getAllTown();
    } 
    
    /**
    // @method existArchive()
    // @desc Method that check if an archive already exists
    // @return boolean
    */
    public static function existArchive($idProject) {
        return Archive::existArchive($idProject);
    } 
}