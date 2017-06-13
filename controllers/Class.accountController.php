<?php
/**
 *
 * Class accountController
 *
 */
class accountController extends Controller {
	
	/**
	 * @method account()
	 * @desc Method that controls the page 'account.php'
	 */
	function account() {
		 
		// Initialization of variables
		$this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
		$this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
	}
	
	/**
	 * @method booking()
	 * @desc Method that controls the page 'booking.php'
	 */
	function booking() {}
	
	/**
	 * @method favorites()
	 * @desc Method that controls the page 'favorites.php'
	 */
	function favorites() {}
	
	/**
	 * @method rating()
	 * @desc Method that controls the page 'rating.php'
	 */
	function rating() {}
    
    /**
	 * @method modifyUser()
	 * @desc Method for the modification of user information
	 */
    function modifyUser() {
    	
    	// Get data posted by the form
    	$fname = $_POST['firstname'];
    	$lname = $_POST['lastname'];
    	$npa = $_POST['npa'];
    	$locality = $_POST['locality'];
    	$region = $_POST['region'];
    	$email = $_POST['email'];
    	$pwd = $_POST['password'];
    	$confirmPw = $_POST['confirmPassword'];
    	$tel = $_POST['telephone'];
    	$gender = $_POST['gender'];
    	$address = $_POST['address'];
    
    	// Check if the data are valid
    	if(empty($fname) or empty($lname) or empty ($npa) or empty ($locality) or empty ($region) or empty($email) or empty($pwd) or empty($confirmPw)) {
    		$_SESSION['msg'] = REQUIRED_FIELD;
    	}
    	else if ($pwd != $confirmPw) {
    		$_SESSION['msg'] = PASSWORD_NOT_CORRESPOND;
    	}
    	else {
    		// Load location from DB if exists
    		$testLocation = Location::getLocation($npa, $locality, $region);
    
    		// Put location in session if exists or return error msg
    		if(!$testLocation) {
    			//Save new location into the db
    			$newLocation = new Location(null, $npa, $locality, $region);
    			$result = $newLocation->insertLocation();
    			$testLocation = Location::getLocation($npa, $locality, $region);
    		}
    
    		// Get the id of the location
    		$idLocation = $testLocation->getId();
    
    		// Save new user into the db
    		$userSession = $_SESSION ['user'];
    		$user = new User($userSession->getId(), $fname, $lname, $email, $pwd, $tel, $gender, $address, $userSession->getUserType(), $idLocation);
    		$result = $user->updateUser();
    		
    		// Check for the display of message
    		if(is_string($result)) {
    			$_SESSION['msg'] = $result;
    		}
    		else {
    			$_SESSION['msgSuccess'] = UPDATE_SUCCESS;
    			$_SESSION['user'] = $user;
    		}
    	}
    
    	$this->redirect('account', 'account');
    }
    
    /**
     * @method deletefavoritehike()
     * @desc Method that delete the favorite for the user
     */
    function deletefavoritehike() {
    	 
    	// Get data posted by the form
    	$userId = intval( $_POST['userId']);
    	$title = $_POST['hikeTitle'];
    
    	// Delete the favorite in DB
    	$result = Favorite::deleteFavoriteHike($userId,$title);
    	$this->redirect('account', 'favorites');
    }
    
    /**
     * @method getMyRates()
     * @desc Method that return the rates of the user
     * @return Rates
     */
    public static function getMyRates() {
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	return Hike::get_hikeForRateByIdUser($idUser);
    }
    
    /**
     * @method getRate()
     * @desc Method that return the rate of the user for a hike
     * @param idHike
     * @return Rates
     */
    public static function getRate($idHike) {
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	$rate = Hike::get_rateByUserAndHike($idUser, $idHike);
    
    	return $rate[0];
    }
    
    /**
     * @method getMyRegistration()
     * @desc Method that return the registration of the user
     * @return Registration
     */
    public static function getMyRegistration() {
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	return Hike::get_myRegistrationByIdUser($idUser);
    }
    
    /**
     * @method getNumberOfPeople()
     * @desc Method that return the number maximum of hikers for a hike
     * @param idHike
     * @return noMax
     */
    public static function getNumberOfPeople($idHike) {
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	$noPeople = Hike::get_noPeopleByUserAndHike($idUser, $idHike);
    
    	return $noPeople[0];
    }
    
    /**
     * @method getMyFavoriteHikes()
     * @desc Method that return the favorites of the user
     * @return favorites
     */
    public static function getMyFavoriteHikes() {
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	return Hike::get_myFavoriteHikesByIdUser($idUser);
    }
}
?>