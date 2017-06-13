<?php
/**
 * 
 * Class administrationController
 * 
 */
class administrationController extends Controller {
	private $title;
	private $description;
	private $path;
	private $startDate;
	private $endDate;
	private $departureTime;
	private $arrivalTime;
	private $duration;
	private $difficulty;
	private $heightDifference;
	private $distance;
	private $registrationMax;
	private $price;
	private $npaStart;
	private $cityStart;
	private $regionStart;
	private $npaEnd;
	private $cityEnd;
	private $regionEnd;
	
	/**
	 * 
	 * @method hikesManager()
	 * @desc Method to load the page hikesManager.php if you are admin. In other open the home page.
	 * 
	 */
	function hikesManager() {
		$user = isset ( $_SESSION ['user'] ) ? $_SESSION ['user'] : '';
		if (is_a ( $user, 'User' )) {
			if ($user->getUserType () == 2) {
				$this->vars ['msg'] = isset ( $_SESSION ['msg'] ) ? $_SESSION ['msg'] : '';
				$this->vars ['msgSuccess'] = isset ( $_SESSION ['msgSuccess'] ) ? $_SESSION ['msgSuccess'] : '';
				$this->vars ['hike'] = isset ( $_SESSION ['hike'] ) ? $_SESSION ['hike'] : '';
				$this->vars ['isModify'] = isset ( $_SESSION ['isModify'] ) ? $_SESSION ['isModify'] : false;
				$this->vars ['persistence'] = isset ( $_SESSION ['persistence'] ) ? $_SESSION ['persistence'] : array (
						'idHike' => '',
						'title' => '',
						'description' => '',
						'path' => '',
						'startDate' => '',
						'endDate' => '',
						'departureTime' => '',
						'arrivalTime' => '',
						'duration' => '',
						'difficulty' => '',
						'heightDifference' => '',
						'distance' => '',
						'registrationMax' => '',
						'price' => '',
						'npaStart' => '',
						'cityStart' => '',
						'regionStart' => '',
						'idLocationStart' => '',
						'npaEnd' => '',
						'cityEnd' => '',
						'regionEnd' => '',
						'idLocationEnd' => '' 
				);
				
				$this->vars ['hikes'] = Hike::get_hikes ();
			} else {
				$this->redirect ( '', '' );
			}
		} else {
			$this->redirect ( '', '' ); 
		}
	}
	
	/**
	 * 
	 * @method createHike()
	 * @desc Method for create an hike and write into the database
	 * 
	 */
	function createHike() {
		// Get data from formular addHike
		$this->defineVariable ();
		
		// Check if the required filed wasn't empty
		if ($this->checkRequired ()) {
			$_SESSION ['msg'] = REQUIRED_FIELD;
			$this->definePersistent ();
		} else {
			// Add image and check if an error occurs
			$path = $this->insertImage ( 'image' );
			
			$pos = strpos ( $path, 'Images/Hikes/' );
			
			if ($pos === false && !empty($path)) {
				// Error with the image
				$_SESSION ['msg'] = $path;
				$this->definePersistent ();
			} else {
				// Image OK !
				unset ( $_FILES ['image'] );
				
				// Insert the location !
				$idLocationStart = $this->insertLocation ( $this->npaStart, $this->cityStart, $this->regionStart );
				$idLocationEnd = $this->insertLocation ( $this->npaEnd, $this->cityEnd, $this->regionEnd );
				
				// Add hike
				$hike = new Hike ( null, $this->title, $this->description, $this->distance, $idLocationStart, $idLocationEnd, 1 );
				
				if (! (empty ( $path )))
					$hike->setImagePath ( $path );
				
				if (! (empty ( $this->difficulty )))
					$hike->setDifficultyLevel ( $this->difficulty );
				
				if (! (empty ( $this->heightDifference )))
					$hike->setHeightDifference ( $this->heightDifference );
				
				if (! (empty ( $this->duration )))
					$hike->setDuration ( $this->duration );
				
				$result = $hike->addHike ();
				
				// Check if an error occurs with the insertion
				if (is_string ( $result )) {
					$_SESSION ['msg'] = $result;
					$this->definePersistent ();
				} else {
					// Success with the creation
					$_SESSION ['msgSuccess'] = CREATE_SUCCESS;
					unset ( $_SESSION ['persistence'] );
					unset ( $hike );
				}
			}
		}
		// Redirect the page
		$this->redirect ( 'administration', 'hikesManager' );
	}
	
	/**
	 * 
	 * @method defineVariable()
	 * @desc Method initializing variable when the Post exist
	 * 
	 */
	function defineVariable() {
		if (isset ( $_POST ['startDate'] ))
			$this->startDate = $_POST ['startDate'];
		
		if (isset ( $_POST ['endDate'] ))
			$this->endDate = $_POST ['endDate'];
		
		if (isset ( $_POST ['departureTime'] ))
			$this->departTime = $_POST ['departureTime'];
		
		if (isset ( $_POST ['arrivalTime'] ))
			$this->arrivalTime = $_POST ['arrivalTime'];
		
		if (isset ( $_POST ['title'] ))
			$this->title = $_POST ['title'];
		
		if (isset ( $_POST ['description'] ))
			$this->description = $_POST ['description'];
		
		if (isset ( $_POST ['duration'] ))
			$this->duration = $_POST ['duration'];
		
		if (isset ( $_POST ['startNPA'] ))
			$this->npaStart = $_POST ['startNPA'];
		
		if (isset ( $_POST ['startLocation'] ))
			$this->cityStart = $_POST ['startLocation'];
		
		if (isset ( $_POST ['startRegion'] ))
			$this->regionStart = $_POST ['startRegion'];
		
		if (isset ( $_POST ['endNPA'] ))
			$this->npaEnd = $_POST ['endNPA'];
		
		if (isset ( $_POST ['endLocation'] ))
			$this->cityEnd = $_POST ['endLocation'];
		
		if (isset ( $_POST ['endRegion'] ))
			$this->regionEnd = $_POST ['endRegion'];
		
		if (isset ( $_POST ['distance'] ))
			$this->distance = $_POST ['distance'];
		
		if (isset ( $_POST ['difficulty'] ))
			$this->difficulty = $_POST ['difficulty'];
		
		if (isset ( $_POST ['heightDifference'] ))
			$this->heightDifference = $_POST ['heightDifference'];
		
		if (isset ( $_POST ['price'] ))
			$this->price = $_POST ['price'];
		
		if (isset ( $_POST ['registrationMax'] ))
			$this->registrationMax = $_POST ['registrationMax'];
	}
	
	/**
	 * 
	 * @method checkRequired()
	 * @desc Check if all required field are complete
	 * @return boolean
	 * 
	 */
	function checkRequired() {
		if (empty ( $this->title ) or empty ( $this->description ) or empty ( $this->distance ) or empty ( $this->npaStart ) or empty ( $this->cityStart ) or empty ( $this->regionStart ) or empty ( $this->npaEnd ) or empty ( $this->cityEnd ) or empty ( $this->regionEnd )) {
			return true;
		}
		
		return false;
	}
	/**
	 * 
	 * @method definePersistent()
	 * @desc Define the persistent to keep information when the page is reloaded
	 * 
	 */
	function definePersistent() {
		$_SESSION ["persistence"] ['startDate'] = $this->startDate;
		$_SESSION ["persistence"] ['endDate'] = $this->endDate;
		$_SESSION ["persistence"] ['departureTime'] = $this->departureTime;
		$_SESSION ["persistence"] ['arrivalTime'] = $this->arrivalTime;
		$_SESSION ["persistence"] ['duration'] = $this->duration;
		$_SESSION ["persistence"] ['title'] = $this->title;
		$_SESSION ["persistence"] ['description'] = $this->description;
		$_SESSION ["persistence"] ['npaStart'] = $this->npaStart;
		$_SESSION ["persistence"] ['cityStart'] = $this->cityStart;
		$_SESSION ["persistence"] ['regionStart'] = $this->regionStart;
		$_SESSION ["persistence"] ['npaEnd'] = $this->npaEnd;
		$_SESSION ["persistence"] ['cityEnd'] = $this->cityEnd;
		$_SESSION ["persistence"] ['regionEnd'] = $this->regionEnd;
		$_SESSION ["persistence"] ['distance'] = $this->distance;
		$_SESSION ["persistence"] ['difficulty'] = $this->difficulty;
		$_SESSION ["persistence"] ['heightDifference'] = $this->heightDifference;
		$_SESSION ["persistence"] ['price'] = $this->price;
		$_SESSION ["persistence"] ['registrationMax'] = $this->registrationMax;
	}
	
	/**
	 * 
	 * @method insertImage($imageName)
	 * @desc Check if the fileupload has a file and in this case move the image into the server and return the path
	 * @param string $imageName
	 * @return string
	 * 
	 */
	function insertImage($imageName) {
		// Check image upload is empty or not
		if (! ($_FILES [$imageName] ['name'] == '')) {
			// Not empty
			return Hike::check_Image ( $imageName );
		}
	}
	/**
	 * 
	 * @method insertLocation($npa, $city, $region)
	 * @desc Method checking if the location already exist into the database. If not insert them and return the new id. In the other case return directly the id of existing Location.
	 * @param int $npa
	 * @param string $city
	 * @param string $region
	 * @return int
	 */
	function insertLocation($npa, $city, $region) {
		// Load location from DB if exists
		$testLocation = Location::getLocation ( $npa, $city, $region );
		
		// Put location in session if exists or return error msg
		if (! $testLocation) {
			// Save new location into the db
			$newLocation = new Location ( null, $npa, $city, $region );
			$result = $newLocation->insertLocation ();
			$testLocation = Location::getLocation ( $npa, $city, $region );
		}
		
		// Get the id of the location
		return $testLocation->getId ();
	}
	
	/**
	 * 
	 * @method createRegistration()
	 * @desc Method to create a Registration and insert into the database
	 * 
	 */
	function createRegistration() {
		// Get data from formular addHike
		$this->defineVariable ();
		
		// Check if the required filed wasn't empty
		if ($this->checkRequired ()) {
			$_SESSION ['msg'] = REQUIRED_FIELD;
			$this->definePersistent ();
		} else {
			// Add image and check if an error occurs
			$path = $this->insertImage ( 'image' );
			
			$pos = strpos ( $path, 'Images/Hikes/' );
			
			if ($pos === false && !empty($path)) {
				// Error with the image
				$_SESSION ['msg'] = '<span class="error">' . $path . '</span>';
			} else {
				// Image OK !
				unset ( $_FILES ['image'] );
				
				// Insert the location !
				$idLocationStart = $this->insertLocation ( $this->npaStart, $this->cityStart, $this->regionStart );
				$idLocationEnd = $this->insertLocation ( $this->npaEnd, $this->cityEnd, $this->regionEnd );
				
				// Add hike
				$hike = new Hike ( null, $this->title, $this->description, $this->distance, $idLocationStart, $idLocationEnd, 2 );
				$hike->setStartDate ( $this->startDate );
				$hike->setDepartureTime ( $this->departureTime );
				$hike->setArrivalTime ( $this->arrivalTime );
				$hike->setPrice ( $this->price );
				$hike->setRegistrationMax ( $this->registrationMax );
				
				if (! (empty ( $path )))
					$hike->setImagePath ( $path );
				
				if (! (empty ( $this->difficulty )))
					$hike->setDifficultyLevel ( $this->difficulty );
				
				if (! (empty ( $this->heightDifference )))
					$hike->setHeightDifference ( $this->heightDifference );
				
				$result = $hike->addRegistration ();
				
				// Check if an error occurs with the insertion
				if (is_string ( $result )) {
					$_SESSION ['msg'] = $result;
					$this->definePersistent ();
				} else {
					// Success with the creation
					$_SESSION ['msgSuccess'] = CREATE_SUCCESS;
					unset ( $_SESSION ['persistence'] );
					unset ( $hike );
				}
			}
		}
		// Redirect the page
		$this->redirect ( 'administration', 'hikesManager' );
	}
	
	/**
	 * 
	 * @method createJourney()
	 * @desc Method to create a Journey and insert into the database
	 * 
	 */
	function createJourney() {
		// Get data from formular addHike
		$this->defineVariable ();
		
		// Check if the required filed wasn't empty
		if ($this->checkRequired ()) {
			$_SESSION ['msg'] = REQUIRED_FIELD;
			$this->definePersistent ();
		} else {
			// Add image and check if an error occurs
			$path = $this->insertImage ( 'image' );
			
			$pos = strpos ( $path, 'Images/Hikes/' );
			
			if ($pos === false && !empty($path)) {
				// Error with the image
				$_SESSION ['msg'] = $path;
			} else {
				// Image OK ! 
				unset ( $_FILES ['image'] );
				
				// Insert the location !
				$idLocationStart = $this->insertLocation ( $this->npaStart, $this->cityStart, $this->regionStart );
				$idLocationEnd = $this->insertLocation ( $this->npaEnd, $this->cityEnd, $this->regionEnd );
				
				// Add hike
				$hike = new Hike ( null, $this->title, $this->description, $this->distance, $idLocationStart, $idLocationEnd, 3 );
				$hike->setStartDate ( $this->startDate );
				$hike->setEndDate ( $this->endDate );
				$hike->setDepartureTime ( $this->departureTime );
				$hike->setArrivalTime ( $this->arrivalTime );
				$hike->setPrice ( $this->price );
				$hike->setRegistrationMax ( $this->registrationMax );
				
				if (! (empty ( $path )))
					$hike->setImagePath ( $path );
				
				if (! (empty ( $this->difficulty )))
					$hike->setDifficultyLevel ( $this->difficulty );
				
				if (! (empty ( $this->heightDifference )))
					$hike->setHeightDifference ( $this->heightDifference );
				
				$result = $hike->addJourney ();
				
				// Check if an error occurs with the insertion
				if (is_string ( $result )) {
					$_SESSION ['msg'] = $result;
					$this->definePersistent ();
				} else {
					// Success with the creation
					$_SESSION ['msgSuccess'] = CREATE_SUCCESS;
					unset ( $_SESSION ['persistence'] );
					unset ( $hike );
				}
			}
		}
		// Redirect the page
		$this->redirect ( 'administration', 'hikesManager' );
	}
	
	/**
	 * 
	 * @method getEdit()
	 * @desc Method called by the form of the page hikesManager.php to receive the Hike/Registration/Journey to edit
	 * 
	 */
	function getEdit() {
		$idHike = $_GET ['idHike'];
		
		$hike = Hike::get_hikeById ( $idHike );
		$_SESSION ["persistence"] ['idHike'] = $hike->getId ();
		$_SESSION ["persistence"] ['startDate'] = $hike->getStartDate ();
		$_SESSION ["persistence"] ['endDate'] = $hike->getEndDate ();
		$_SESSION ["persistence"] ['departureTime'] = $hike->getDepartureTime ();
		$_SESSION ["persistence"] ['arrivalTime'] = $hike->getArrivalTime ();
		$_SESSION ["persistence"] ['title'] = $hike->getTitle ();
		$_SESSION ["persistence"] ['description'] = $hike->getDescription ();
		$_SESSION ["persistence"] ['duration'] = $hike->getDuration ();
		
		$location = Location::getLocationById ( $hike->getStartPlace () );
		$npaStart = $location->getZipCode ();
		$cityStart = $location->getCity ();
		$regionStart = $location->getRegion ();
		$_SESSION ["persistence"] ['npaStart'] = $npaStart;
		$_SESSION ["persistence"] ['cityStart'] = $cityStart;
		$_SESSION ["persistence"] ['regionStart'] = $regionStart;
		
		$location = Location::getLocationById ( $hike->getEndPlace () );
		$npaEnd = $location->getZipCode ();
		$cityEnd = $location->getCity ();
		$regionEnd = $location->getRegion ();
		$_SESSION ["persistence"] ['npaEnd'] = $npaEnd;
		$_SESSION ["persistence"] ['cityEnd'] = $cityEnd;
		$_SESSION ["persistence"] ['regionEnd'] = $regionEnd;
		
		$_SESSION ["persistence"] ['distance'] = $hike->getDistance ();
		$_SESSION ["persistence"] ['difficulty'] = $hike->getDifficultyLevel ();
		$_SESSION ["persistence"] ['heightDifference'] = $hike->getHeightDifference ();
		$_SESSION ["persistence"] ['price'] = $hike->getPrice ();
		$_SESSION ["persistence"] ['registrationMax'] = $hike->getRegistrationMax ();
		
		$_SESSION ['isModify'] = true;
		$_SESSION ['hike'] = $hike;
		
		$this->redirect ( 'administration', 'hikesManager' );
	}
	/**
	 * 
	 * @method edit()
	 * @desc Method checking the hike to modify and define the type (or new type) and launch modify method
	 * 
	 */
	function edit() {
		$idHike = $_GET ['idHike'];
		
		$hike = Hike::get_hikeById ( $idHike );
		
		if (isset ( $_POST ['HikeButton'] )) {
			if ($hike->getType () != 1) {
				$_SESSION ['msg'] = UPDATE_FAIL;
				$_SESSION ['msg'] .= '<br>';
				$_SESSION ['msg'] .= MODIFICATION_IMPOSSIBLE;
				
				$this->redirect ( 'administration', 'hikesManager' );
			} else {
				$this->modify ( $hike );
			}
		} else if (isset ( $_POST ['RegistrationButton'] )) {
			$hike->setType ( 2 );
			$this->modify ( $hike );
		} else if (isset ( $_POST ['JourneyButton'] )) {
			$hike->setType ( 3 );
			$this->modify ( $hike );
		}
	}
	/**
	 * 
	 * @method checkInfo($oldValue, $newValue)
	 * @desc Method to check if a change occurs in the variable when you edit.
	 * @param unknown $oldValue
	 * @param unknown $newValue
	 * @return unknown
	 * 
	 */
	function checkInfo($oldValue, $newValue) {
		if (! (empty ( $newValue ))) {
			if ($oldValue !== $newValue) {
				return $newValue;
			}
			
			return $oldValue;
		}
		return $oldValue;
	}
	/**
	 * 
	 * @method reset()
	 * @desc Method for clear all the input.
	 * 
	 */
	function reset() {
		unset ( $_SESSION ['isModify'] );
		unset ( $_SESSION ['persistence'] );
		unset ( $_SESSION ['hike'] );
		unset ( $_FILES ['image'] );
		
		$this->redirect ( 'administration', 'hikesManager' );
	}
	/**
	 * 
	 * @method delete()
	 * @desc Method to delete the Hike from the database
	 * 
	 */
	function delete() {
		$idHike = $_GET ['idHike'];
		
		$result = Hike::deleteHike ( $idHike );
		
		if ($result == true)
			$_SESSION ['msgSuccess'] = DELETE_SUCCESS;
		else
			$_SESSION ['msg'] = DELETE_FAIL;
		
		$this->reset ();
		$this->redirect ( 'administration', 'hikesManager' );
	}
	
	/**
	 * 
	 * @method memberManager()
	 * @desc Method to initialize the page memberManager.php
	 * 
	 */
	function memberManager() {
		$user = isset ( $_SESSION ['user'] ) ? $_SESSION ['user'] : '';
		if (is_a ( $user, 'User' )) {
			if ($user->getUserType () == 2) {
				$this->vars ['msg'] = isset ( $_SESSION ['msg'] ) ? $_SESSION ['msg'] : '';
				$this->vars ['msgSuccess'] = isset ( $_SESSION ['msgSuccess'] ) ? $_SESSION ['msgSuccess'] : '';
				$this->vars ['members'] = User::getAllUser ();
			} else {
				$this->redirect ( '', '' );
			}
		} else {
			$this->redirect ( '', '' );
		}
	}
	/**
	 * 
	 * @method changePermission()
	 * @desc Method to change the Permission of the member (administrator rights)
	 * 
	 */
	function changePermission() {
		$idUser = $_GET ['idUser'];
		$type = $_GET ['type'];
		
		if ($type == 1)
			$permission = 2;
		else if ($type == 2)
			$permission = 1;
		
		$result = User::modifyPermissionById ( $idUser, $permission );
		
		if ($result === true) {
			$_SESSION ['msgSuccess'] = UPDATE_SUCCESS;
		} else {
			$_SESSION ['msg'] = UPDATE_FAIL;
		}
		
		$this->redirect ( 'administration', 'memberManager' );
	}
	/**
	 * 
	 * @method modify($hike)
	 * @desc Method checking all the information and modifying the $hike in parameter
	 * @param Hike $hike
	 * 
	 */
	function modify($hike) {
		$hike->setTitle ( $this->checkInfo ( $hike->getTitle (), $_POST ['title'] ) );
		$hike->setDescription ( $this->checkInfo ( $hike->getDescription (), $_POST ['description'] ) );
		$hike->setDistance ( $this->checkInfo ( $hike->getDistance (), $_POST ['distance'] ) );
		
		$this->npaStart = $_POST ['startNPA'];
		$this->cityStart = $_POST ['startLocation'];
		$this->regionStart = $_POST ['startRegion'];
		$newStartLocation = $this->insertLocation ( $this->npaStart, $this->cityStart, $this->regionStart );
		
		$hike->setStartPlace ( $this->checkInfo ( $hike->getStartPlace (), $newStartLocation ) );
		
		$this->npaEnd = $_POST ['endNPA'];
		$this->cityEnd = $_POST ['endLocation'];
		$this->regionEnd = $_POST ['endRegion'];
		$newEndLocation = $this->insertLocation ( $this->npaEnd, $this->cityEnd, $this->regionEnd );
		
		$hike->setEndPlace ( $this->checkInfo ( $hike->getEndPlace (), $newEndLocation ) );
		
		if (isset ( $_POST ['startDate'] ) && $hike->getType () != 1)
			$hike->setStartDate ( $this->checkInfo ( $hike->getStartDate (), $_POST ['startDate'] ) );
		else
			$hike->setStartDate ( NULL );
		
		if (isset ( $_POST ['endDate'] ) && $hike->getType () == 3)
			$hike->setEndDate ( $this->checkInfo ( $hike->getEndDate (), $_POST ['endDate'] ) );
		else
			$hike->setEndDate ( NULL );
		
		if (isset ( $_POST ['departTime'] ) && $hike->getType () != 1)
			$hike->setDepartureTime ( $this->checkInfo ( $hike->getDepartureTime (), $_POST ['departTime'] ) );
		else
			$hike->setDepartureTime ( NULL );
		
		if (isset ( $_POST ['arrivalTime'] ) && $hike->getType () != 1)
			$hike->setArrivalTime ( $this->checkInfo ( $hike->getArrivalTime (), $_POST ['arrivalTime'] ) );
		else
			$hike->setArrivalTime ( NULL );
		
		if (isset ( $_POST ['duration'] ) && $hike->getType () == 1)
			$hike->setDuration ( $this->checkInfo ( $hike->getDuration (), $_POST ['duration'] ) );
		else
			$hike->setDuration ( NULL );
		
		if (! (empty ( $_FILES ['image'] ['name'] ))) {
			if (Hike::deleteImage ( $hike->getImagePath () ))
				;
			$path = $this->insertImage ( 'image' );
			
			if ($path != '')
				$hike->setImagePath ( $path );
		}
		
		if (isset ( $_POST ['difficulty'] ))
			$hike->setDifficultyLevel ( $this->checkInfo ( $hike->getDifficultyLevel (), $_POST ['difficulty'] ) );
		
		if (isset ( $_POST ['heightDifference'] ))
			$hike->setHeightDifference ( $this->checkInfo ( $hike->getHeightDifference (), $_POST ['heightDifference'] ) );
		
		if (isset ( $_POST ['price'] ) && $hike->getType () != 1)
			$hike->setPrice ( $this->checkInfo ( $hike->getPrice (), $_POST ['price'] ) );
		else
			$hike->setPrice ( NULL );
		
		if (isset ( $_POST ['registrationMax'] ) && $hike->getType () != 1)
			$hike->setRegistrationMax ( $this->checkInfo ( $hike->getRegistrationMax (), $_POST ['registrationMax'] ) );
		else
			$hike->setRegistrationMax ( NULL );
		
		$result = $hike->editHike ();
		
		if ($result == true) {
			$_SESSION ['msgSuccess'] = UPDATE_SUCCESS;
		} else {
			$_SESSION ['msg'] = UPDATE_FAIL;
		}
		
		$this->reset ();
		$this->redirect ( 'administration', 'hikesManager' );
	}
} 
?>