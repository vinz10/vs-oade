<?php

/**
 * 
 * Class hikeController
 * 
 */
class hikeController extends Controller{

    /**
     * 
     * @method hike()
     * @desc Method to load the hike.php page with the right Hike (by the id).
     * 
     */
    function hike(){
    	if(isset($_SESSION['user'])) {
        	$this->vars['user'] = $_SESSION['user'];
    	}
    	
        if (isset($_GET['id'])) {
            $idHike = intval($_GET['id']);
            if ($idHike != 0) {
                $hike = Hike::get_hikeById($idHike);;
                if($hike){
                $this->data['id'] = $hike->getId();
                $this->data['title'] = $hike->getTitle();
                $this->data['description'] = $hike->getDescription();
                $this->data['distance'] = $hike->getDistance();
                $this->data['imagePath'] = $hike->getImagePath();
                $this->data['startDate'] = $hike->getStartDate();
                $this->data['endDate'] = $hike->getEndDate();
                $this->data['departureTime'] = $hike->getDepartureTime();
                $this->data['arrivalTime'] = $hike->getArrivalTime();
                $this->data['duration'] = $hike->getDuration();
                $this->data['difficultyLevel'] = $hike->getDifficultyLevel();
                $this->data['distance'] = $hike->getDistance();
                $this->data['registrationMax'] = $hike->getRegistrationMax();
                $this->data['price'] = $hike->getPrice();
                $this->data['startPlace'] = $hike->getStartPlace();
                $this->data['endPlace'] = $hike->getEndPlace();
                $this->data['type'] = $hike->getType();
                
                $this->vars ['registred'] = Hike::getMemberBookedByHike($idHike);
                $this->vars ['rowCount'] = Hike::countBooked($idHike);
                
                if(isset($this->vars['user'])) {
	                $user = $this->vars['user'];
	                $this->vars ['isRegistered'] = Hike::isRegistered($idHike, $user->getId());
	                $this->vars ['memberNumberRegistration'] = Hike::getMemberNumberBooked($idHike, $user->getId());
                }
                
                $this->vars ['nbRegistred'] = Hike::countRegistered($idHike);
                }
                else{
                    $this->redirect('error', 'http404');
                }
            }
        } 

        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
    }
    /**
     * 
     * @method addToFavorite()
     * @desc Method to add or remove the Hike from the favorites
     * 
     */
    function addToFavorite() {
    
    	if (isset($_GET['id'])) {
    		$idHike = intval($_GET['id']);
    	}
    
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    
    	if ($this->ifFavorite($idHike)) {
    		Hike::deleteFavoriteHike($idUser, $idHike);
    	} else {
    		Hike::insertFavoriteHike($idUser, $idHike);
    	} 
    
    	$this->redirect('hike', 'hike?id='.$idHike);
    }
    /**
     * 
     * @method addRate()
     * @desc Method to insert the Rating into the database
     * 
     */
    function addRate() {
    	
    	$grade = $_POST['star'];
    	if (isset($_GET['id'])) {
    		$idHike = intval($_GET['id']);
    	}
    	
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	
    	Hike::insertRateHike($idUser, $idHike, $grade);
    	
    	$this->redirect('hike', 'hike?id='.$idHike);
    }
    /**
     * 
     * @method book()
     * @desc Method to book to a Registration or Journey
     * 
     */
    function book() {
    	$idHike = $_GET['idHike'];
    	$idUser = $_GET['idUser'];
    	$nbRegister = $_POST['numberOfRegistration'];
    	
    	$result = Hike::insertBooking($idHike, $nbRegister, $idUser);
    	
    	if($result === 1) {
    		$_SESSION['msgSuccess'] = REG_SUCCESS;
    	} else {
    		$_SESSION ['msg'] = REG_FAILED;
    	}
    	
    	$this->redirect('hike', 'hike?id='.$idHike);
    }
    /**
     * 
     * @method deleteBook()
     * @desc Method for the administrator delete a book.
     * 
     */
    function deleteBook() {
    	$idHike = $_GET['idHike'];
    	$idUser = $_GET['idUser'];
    	
    	$result = Hike::deleteBookingByHikeAndUser($idHike, $idUser);
    	
    	if($result == true) {
    		$_SESSION ['msg'] = DELETE_FAIL;
    	} else {
    		$_SESSION['msgSuccess'] = DELETE_SUCCESS;
    	}
    	
    	$this->redirect('hike', 'hike?id='.$idHike);
    }
    /**
     *
     * @method alreadyRated($idHike)
     * @desc Method checking if the Hike is already rated by the user
     * @param int $idHike
     * @return boolean
     *
     */
    static function alreadyRated($idHike) {
    	 
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    	 
    	if(Hike::get_rateByUserAndHike($idUser, $idHike)) {
    		return true;
    	}
    	 
    	return false;
    }
    /**
     *
     * @method ifFavorite($idHike)
     * @desc Method checking if the Hike is already a favorite.
     * @param int $idHike
     * @return boolean
     *
     */
    static function ifFavorite($idHike) {
    	 
    	$userSession = $_SESSION ['user'];
    	$idUser = $userSession->getId();
    
    	if(Hike::get_ifFavorite($idUser, $idHike)) {
    		return true;
    	}
    
    	return false;
    }
    /**
     *
     * @method ifUserConnected()
     * @desc Method checking if the user is connected.
     * @return boolean
     *
     */
    static function ifUserConnected(){
    	if(isset($_SESSION['user']))
    		return true;
    		else
    			return false;
    }
    /**
     *
     * @method getStartPlaceByHike($idHike)
     * @desc Method to define the StartPlace for the GoogleMap
     * @param int $idHike
     * @return boolean|Location
     *
     */
    static function getStartPlaceByHike($idHike) {
    	 
    	$hike = Hike::get_hikeById($idHike);
    	return Location::getLocationById($hike->getStartPlace());
    }
    /**
     *
     * @method getEndPlaceByHike($idHike)
     * @desc Method to define the EndPlace for the GoogleMap
     * @param int $idHike
     * @return boolean|Location
     *
     */
    static function getEndPlaceByHike($idHike) {
    
    	$hike = Hike::get_hikeById($idHike);
    	return Location::getLocationById($hike->getEndPlace());
    }
} 
?>