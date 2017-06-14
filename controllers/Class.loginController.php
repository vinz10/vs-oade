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
        $pwd = $_POST['password'];

        // Check if the data are valid
        if(empty($email) or empty($pwd)){
            $_SESSION['msg'] = REQUIRED_FIELD;
            $this->redirect('login', 'login');
        }
        else {		
            // Load user from DB if exists
            $result = User::connect($email, $pwd);

            // Put the user in the session if exists or return error msg
            if(!$result){			
                $_SESSION['msg'] = INCORRECT_UOP;	
                $this->redirect('login', 'login');
            }
            else{
                $_SESSION['user'] = $result;
                $this->redirect('', '');
            }
        }	
    }

    /**
     * //@method login()
     * @desc Method for the login of a user
     */
    function login() {

        // If a user is active he cannot re-login
        if($this->getActiveUser()){
            $this->redirect('', '');
            exit;
        }

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
    }

    /**
     * //@method logout()
     * @desc Method for the logout of a user
     */
    function logout() {
        
        // Destroy the session
        session_destroy();
        $this->redirect('', '');
    }
}