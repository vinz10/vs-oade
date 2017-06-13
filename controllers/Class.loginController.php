<?php
/**
 * 
 * Class loginController
 * 
 */
class loginController extends Controller {
	
	/**
	 * @method connection()
	 * @desc Method for the connection of a user
	 */
	function connection() {
		
		// Get data posted by the form
		$email = $_POST['email'];
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
	 * @method login()
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
	 * @method logout()
	 * @desc Method for the logout of a user
	 */
	function logout() {
		
		// Destroy the session
		session_destroy();
    	$this->redirect('', '');
	}
	
	/**
	 * @method newuser()
	 * @desc Method that redirect the user for the registration
	 */
	function newuser() {
		
		// If a user is active he cannot re-register
		if($this->getActiveUser()){
			$this->redirect('', '');
			exit;
		}
		
		// Initialization of variables
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
		$this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','','','','','','','','','');		
	}
	
	/**
	 * @method register()
	 * @desc Method for the registration of a user
	 */
	function register() {
		
		// Get data posted by the form
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$npa = $_POST['npa'];
		$locality = $_POST['locality'];
		$region = $_POST['region'];
		$email = $_POST['email'];
		$pwd = $_POST['password'];	
		$tel = $_POST['telephone'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$userType = null;
		$userLocation = null;
		
		// Check if the data are valid
		if(empty($fname) or empty($lname) or empty ($npa) or empty ($locality) or empty ($region) or empty($email) or empty($pwd)) {
			$_SESSION['msg'] = REQUIRED_FIELD;
			$_SESSION['persistence'] = array($fname, $lname, $email, $pwd, $npa, $locality, $region, $address, $tel, $gender, $userType, $userLocation);
			$this->redirect('login', 'newuser');
		}
		else {
			 
			// Load location from DB if exists
			$testLocation = Location::getLocation($npa, $locality, $region);
				
			// Put location in session if exists or return error msg
			if(!$testLocation){
				// Save new location into the db
				$newLocation = new Location(null, $npa, $locality, $region);
				$result = $newLocation->insertLocation();
				$testLocation = Location::getLocation($npa, $locality, $region);
			}
			
			// Get the id of the location
			$idLocation = $testLocation->getId();
			
			// Save new user into the db
			$user = new User(null, $fname, $lname, $email, $pwd, $tel, $gender, $address, 1, $idLocation);
			$result = $user->insertUser();
			if(!$result){
				$_SESSION['msg'] = USER_EXIST;
				$_SESSION['persistence'] = array($fname, $lname, $email, $pwd, $npa, $locality, $region, $address, $tel, $gender, $userType, $userLocation);
				$this->redirect('login', 'newuser');
			}
			else{
				$_SESSION['msgSuccess'] = REGISTER_SUCCESS;	
				unset($_SESSION['persistence']);
				$this->redirect('login', 'login');
			}
		}
	}
}
?>