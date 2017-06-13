<?php

/**
 * 
 * Class Hike
 *
 */
class Hike {
	private $id;
	private $title;
	private $description;
	private $ImagePath;
	private $startDate;
	private $endDate;
	private $departureTime;
	private $arrivalTime;
	private $duration;
	private $difficultyLevel;
	private $heightDifference;
	private $distance;
	private $registrationMax;
	private $price;
	private $startPlace;
	private $endPlace;
	private $type;
	public function __construct($id = null, $title, $description, $distance, $startPlace, $endPlace, $type) {
		$this->setId ( $id );
		$this->setTitle ( $title );
		$this->setDescription ( $description );
		$this->setDistance ( $distance );
		$this->setStartPlace ( $startPlace );
		$this->setEndPlace( $endPlace );
		$this->setType ( $type );
	}
	/**
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 *
     * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 *
     * @param mixed $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 *
     * @param mixed $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getImagePath() {
		return $this->ImagePath;
	}
	
	/**
	 *
     * @param mixed $ImagePath
	 */
	public function setImagePath($ImagePath) {
		$this->ImagePath = $ImagePath;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getStartDate() {
		return $this->startDate;
	}
	
	/**
	 *
     * @param mixed $startDate
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getEndDate() {
		return $this->endDate;
	}
	
	/**
	 *
     * @param mixed $endDate
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getDepartureTime() {
		return $this->departureTime;
	}
	
	/**
	 *
     * @param mixed $departureTime
	 */
	public function setDepartureTime($departureTime) {
		$this->departureTime = $departureTime;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getArrivalTime() {
		return $this->arrivalTime;
	}
	
	/**
	 *
     * @param mixed $arrivalTime
	 */
	public function setArrivalTime($arrivalTime) {
		$this->arrivalTime = $arrivalTime;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getDuration() {
		return $this->duration;
	}
	
	/**
	 *
     * @param mixed $duration
	 */
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getDifficultyLevel() {
		return $this->difficultyLevel;
	}

	/**
	 *
     * @param mixed $difficultyLevel
	 */
	public function setDifficultyLevel($difficultyLevel) {
		$this->difficultyLevel = $difficultyLevel;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getHeightDifference() {
		return $this->heightDifference;
	}

	/**
	 *
     * @param mixed $heightDifference
	 */
	public function setHeightDifference($heightDifference) {
		$this->heightDifference = $heightDifference;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getDistance() {
		return $this->distance;
	}

	/**
	 *
     * @param mixed $distance
	 */
	public function setDistance($distance) {
		$this->distance = $distance;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getRegistrationMax() {
		return $this->registrationMax;
	}

	/**
	 *
     * @param mixed $registrationMax
	 */
	public function setRegistrationMax($registrationMax) {
		$this->registrationMax = $registrationMax;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}

    /**
	 *
     * @param mixed $price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getStartPlace() {
		return $this->startPlace;
	}
	
	/**
	 *
     * @param mixed $startPlace
	 */
	public function setStartPlace($startPlace) {
		$this->startPlace = $startPlace;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getEndPlace() {
		return $this->endPlace;
	}
	
	/**
	 *
	 * @param mixed $endPlace
	 */
	public function setEndPlace($endPlace) {
		$this->endPlace = $endPlace;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 *
     * @param mixed $type
	 */
	public function setType($type) {
		$this->type = $type;
	}
	/**
	 * @method getTypeName()
	 * @desc Method returning the name of the type
	 * @return string
	 */
    public function getTypeName()
    {
        switch ($this->type) {
            case 1 :
                return HIKE;
            case 2 :
                return REGIST;
            case 3 :
                return JOURNEY;
        }
    }
	/**
	 * 
	 * @method addHike()
	 * @desc Method adding the hike into the database
	 * 
	 */
	public function addHike() {
		$sql = SqlConnection::getInstance();
		
		$query = "INSERT INTO hike(title, description, ImagePath, duration, 
		difficultyLevel, heightDifference, distance, startPlace_idLocation, 
		endPlace_idLocation, hike_type_idType)
    	VALUES(";
    	$query .= $sql->getConn()->quote($this->title) . ',';
    	$query .= $sql->getConn()->quote($this->description). ',';
    	$query .= $sql->getConn()->quote($this->ImagePath). ',';
    	$query .= $sql->getConn()->quote($this->duration). ',';
    	$query .= $sql->getConn()->quote($this->difficultyLevel). ',';
    	$query .= $sql->getConn()->quote($this->heightDifference). ',';
    	$query .= $sql->getConn()->quote($this->distance). ',';
    	$query .= $sql->getConn()->quote($this->startPlace). ',';
    	$query .= $sql->getConn()->quote($this->endPlace). ',';
    	$query .= $sql->getConn()->quote($this->type);
    	$query .= ");";
    			
        return $sql->executeQuery ( $query );
	}
	/**
	 * @method addRegistration()
	 * @desc Method adding a Registration into the database
	 */
    public function addRegistration() {
    	$sql = SqlConnection::getInstance();
    	
		$query = "INSERT INTO hike(startDate, departureTime, 
		arrivalTime, title, description, ImagePath, difficultyLevel, 
		heightDifference, distance, registrationMax, price, 
		startPlace_idLocation, endPlace_idLocation, hike_type_idType) VALUES(";
		
		$query .= $sql->getConn()->quote($this->startDate) . ',';
		$query .= $sql->getConn()->quote($this->departureTime) . ',';
		$query .= $sql->getConn()->quote($this->arrivalTime) . ',';
		$query .= $sql->getConn()->quote($this->title) . ',';
		$query .= $sql->getConn()->quote($this->description) . ',';
		$query .= $sql->getConn()->quote($this->ImagePath) . ', ';
		$query .= $sql->getConn()->quote($this->difficultyLevel) . ',';
		$query .= $sql->getConn()->quote($this->heightDifference) . ',';
		$query .= $sql->getConn()->quote($this->distance) . ',';
		$query .= $sql->getConn()->quote($this->registrationMax) . ',';
		$query .= $sql->getConn()->quote($this->price) . ',';
		$query .= $sql->getConn()->quote($this->startPlace) . ',';
		$query .= $sql->getConn()->quote($this->endPlace) . ',';
		$query .= $sql->getConn()->quote($this->type) . ');';
		
        return $sql->executeQuery ( $query );
	}
	/**
	 * 
	 * @method addJourney()
	 * @desc Method adding a Journey into the database
	 * 
	 */
	public function addJourney() {
		$sql = SqlConnection::getInstance();
		
		$query = "INSERT INTO hike(startDate, endDate, 
		departureTime, arrivalTime, title, description, 
		ImagePath, difficultyLevel, heightDifference, 
		distance, registrationMax, price, startPlace_idLocation, 
		endPlace_idLocation, hike_type_idType) VALUES(";
		
		$query .= $sql->getConn()->quote($this->startDate) . ',';
		$query .= $sql->getConn()->quote($this->endDate) . ',';
		$query .= $sql->getConn()->quote($this->departureTime) . ',';
		$query .= $sql->getConn()->quote($this->arrivalTime) . ',';
		$query .= $sql->getConn()->quote($this->title) . ',';
		$query .= $sql->getConn()->quote($this->description) . ',';
		$query .= $sql->getConn()->quote($this->ImagePath) . ', ';
		$query .= $sql->getConn()->quote($this->difficultyLevel) . ',';
		$query .= $sql->getConn()->quote($this->heightDifference) . ',';
		$query .= $sql->getConn()->quote($this->distance) . ',';
		$query .= $sql->getConn()->quote($this->registrationMax) . ',';
		$query .= $sql->getConn()->quote($this->price) . ',';
		$query .= $sql->getConn()->quote($this->startPlace) . ',';
		$query .= $sql->getConn()->quote($this->endPlace) . ',';
		$query .= $sql->getConn()->quote($this->type) . ');';

        return $sql->executeQuery ( $query );
	}
	/**
	 * 
	 * @method editHike()
	 * @desc Method editing the hike into the database.
	 * 
	 */
    public function editHike() {
    	$sql = SqlConnection::getInstance();
    	
		$query = "UPDATE hike SET title=" . $sql->getConn()->quote($this->title) . ",";
		$query .= "description=" . $sql->getConn()->quote($this->description) . ",";

        if ($this->ImagePath != '') {
			$query .= "ImagePath=" . $sql->getConn()->quote($this->ImagePath) . ",";
		}

        if ($this->startDate != NULL)
			$query .= "startDate=" . $sql->getConn()->quote($this->startDate) . ",";
        else
			$query .="startDate=NULL,";

        if ($this->endDate != NULL)
			$query .= "endDate=" . $sql->getConn()->quote($this->endDate) . ",";
        else
			$query .= "endDate=NULL,";

        if ($this->departureTime != NULL)
			$query .= "departureTime=". $sql->getConn()->quote($this->departureTime) . ",";
        else
			$query .= "departureTime=NULL,";

        if ($this->arrivalTime != NULL)
			$query .= "arrivalTime=" . $sql->getConn()->quote($this->arrivalTime) . ",";
        else
			$query .= "arrivalTime=NULL,";

        if ($this->duration != NULL) 
			$query .= "duration=" . $this->duration . ",";
        else
			$query .= "duration=NULL,";

        if ($this->difficultyLevel != NULL)
			$query .= "difficultyLevel=" . $this->difficultyLevel . ",";

        if ($this->heightDifference != NULL)
			$query .= "heightDifference=" . $this->heightDifference . ",";

        if ($this->distance != NULL)
			$query .= "distance=" . $this->distance . ",";

        if ($this->registrationMax != NULL)
			$query .= "registrationMax=" . $this->registrationMax . ",";
        else
			$query .= "registrationMax=NULL,";

        if ($this->price != NULL)
			$query .= "price=" . $this->price. ",";
		else
			$query .= "price=NULL,";

        $query .= "startPlace_idLocation='$this->startPlace',";
        $query .= "endPlace_idLocation='$this->endPlace',";
		$query .= "hike_type_idType='$this->type'";
		$query .= "WHERE idHike='$this->id';";

        return $sql->editDB ( $query );
	}
	/**
	 * 
	 * @method get_hikes()
	 * @desc Method returning all Hikes from the database ordered by idType
	 * @return Hike[]
	 * 
	 */
	public static function get_hikes()
	{
		$query = "SELECT * FROM hike ORDER BY hike_type_idType ASC";
		$results = SqlConnection::getInstance()->selectDB($query);
		$hikes = array();
		$rows = $results->fetchAll();
	
		foreach ($rows as $row) {
			$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
			$h->setStartDate($row ['startDate']);
			$h->setEndDate($row ['endDate']);
			$h->setDepartureTime($row ['departureTime']);
			$h->setArrivalTime($row ['arrivalTime']);
			$h->setImagePath($row ['ImagePath']);
			$h->setDifficultyLevel($row ['difficultyLevel']);
			$h->setHeightDifference($row ['heightDifference']);
			$h->setPrice($row ['price']);
			$h->setRegistrationMax($row ['registrationMax']);
			$h->setDuration($row ['duration']);
	
			$hikes [] = $h;
		}
	
		return $hikes;
	}
	/**
	 * 
	 * @method get_hikesTypeHike($idType)
	 * @desc Method returning the Hikes by a type
	 * @param int $idType
	 * @return Hike[]
	 * 
	 */
	public static function get_hikesTypeHike($idType)
	{
		$query = "SELECT * FROM hike WHERE hike_type_idType = '$idType' ORDER BY hike_type_idType ASC";
		$results = SqlConnection::getInstance()->selectDB($query);
		$hikes = array();
		$rows = $results->fetchAll();
	
		foreach ($rows as $row) {
			$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
			$h->setStartDate($row ['startDate']);
			$h->setEndDate($row ['endDate']);
			$h->setDepartureTime($row ['departureTime']);
			$h->setArrivalTime($row ['arrivalTime']);
			$h->setImagePath($row ['ImagePath']);
			$h->setDifficultyLevel($row ['difficultyLevel']);
			$h->setHeightDifference($row ['heightDifference']);
			$h->setPrice($row ['price']);
			$h->setRegistrationMax($row ['registrationMax']);
			$h->setDuration($row ['duration']);
	
			$hikes [] = $h;
		}
	
		return $hikes;
	}
	/**
	 * 
	 * @method get_guidedHikes()
	 * @desc Method returning the Hikes with the type 2 and 3
	 * @return Hike[]
	 * 
	 */
	public static function get_guidedHikes()
	{
		$query = "SELECT * FROM hike WHERE hike_type_idType IN (2,3)";
		$results = SqlConnection::getInstance()->selectDB($query);
		$hikes = array();
		$rows = $results->fetchAll();
	
		foreach ($rows as $row) {
			$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
			$h->setStartDate($row ['startDate']);
			$h->setEndDate($row ['endDate']);
			$h->setDepartureTime($row ['departureTime']);
			$h->setArrivalTime($row ['arrivalTime']);
			$h->setImagePath($row ['ImagePath']);
			$h->setDifficultyLevel($row ['difficultyLevel']);
			$h->setHeightDifference($row ['heightDifference']);
			$h->setPrice($row ['price']);
			$h->setRegistrationMax($row ['registrationMax']);
			$h->setDuration($row ['duration']);
	
			$hikes [] = $h;
		}
	
		return $hikes;
	}
	/**
	 * 
	 * @method get_propositions()
	 * @desc Method returning the Hikes with the type 1.
	 * @return Hike[]
	 * 
	 */
	public static function get_propositions()
	{
		$query = "SELECT * FROM hike WHERE hike_type_idType = 1 ";
		$results = SqlConnection::getInstance()->selectDB($query);
		$hikes = array();
		$rows = $results->fetchAll();
	
		foreach ($rows as $row) {
			$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
			$h->setImagePath($row ['ImagePath']);
			$h->setDifficultyLevel($row ['difficultyLevel']);
			$h->setHeightDifference($row ['heightDifference']);
			$h->setPrice($row ['price']);
			$h->setRegistrationMax($row ['registrationMax']);
			$h->setDuration($row ['duration']);
	
			$hikes [] = $h;
		}
	
		return $hikes;
	}
	/**
	 * 
	 * @method get_hikeById
	 * @desc Method returning a hike by is id.
	 * @param int $id
	 * @return boolean|Hike
	 * 
	 */
	public static function get_hikeById($id)
	{
		$query = "SELECT * FROM hike WHERE idHike='$id'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if (!$row)
			return false;
	
			$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
			$h->setStartDate($row ['startDate']);
			$h->setEndDate($row ['endDate']);
			$h->setDepartureTime($row ['departureTime']);
			$h->setArrivalTime($row ['arrivalTime']);
			$h->setImagePath($row ['ImagePath']);
			$h->setDifficultyLevel($row ['difficultyLevel']);
			$h->setHeightDifference($row ['heightDifference']);
			$h->setPrice($row ['price']);
			$h->setRegistrationMax($row ['registrationMax']);
			$h->setDuration($row ['duration']);
	
			return $h;
	}
	/**
	 * 
	 * @method insertRateHike($idUser, $idHike, $grade)
	 * @desc Method to insert a rate
	 * @param int $idUser
	 * @param int $idHike
	 * @param int $grade
	 * 
	 */
	public static function insertRateHike($idUser, $idHike, $grade)
	{
		$query = "INSERT INTO rate(user_idUser, hike_idHike, grade) VALUES ('$idUser','$idHike','$grade');";
		return SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method get_hikeForRateByIdUser($idUser)
	 * @desc Method returning all Hikes rated by the User
	 * @param int $idUser
	 * @return boolean|Hike[]
	 * 
	 */
	public static function get_hikeForRateByIdUser($idUser)
	{
		$query = "SELECT DISTINCT h.idHike, h.title, h.description, h.ImagePath, h.startDate, h.endDate, h.departureTime, h.arrivalTime, h.duration,
		h.difficultyLevel, h.heightDifference, h.distance, h.registrationMax, h.price, h.startPlace_idLocation, h.endPlace_idLocation, h.hike_type_idType
		FROM rate AS r, hike AS h WHERE r.hike_idHike = h.idHike AND r.user_idUser='$idUser'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$rows = $result->fetchAll();
		if (!$rows)
			return false;
	
			foreach ($rows as $row) {
				$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
				$h->setStartDate($row ['startDate']);
				$h->setEndDate($row ['endDate']);
				$h->setDepartureTime($row ['departureTime']);
				$h->setArrivalTime($row ['arrivalTime']);
				$h->setImagePath($row ['ImagePath']);
				$h->setDifficultyLevel($row ['difficultyLevel']);
				$h->setHeightDifference($row ['heightDifference']);
				$h->setPrice($row ['price']);
				$h->setRegistrationMax($row ['registrationMax']);
				$h->setDuration($row ['duration']);
	
				$hikes [] = $h;
			}
	
			return $hikes;
	}
	/**
	 * 
	 * @method get_rateByUserAndHike($idUser, $idHike)
	 * @desc Method returning the rate from user to a specific hike.
	 * @param int $idUser
	 * @param int $idHike
	 * @return boolean|PDOStatement
	 * 
	 */
	public static function get_rateByUserAndHike($idUser, $idHike)
	{
		$query = "SELECT r.grade FROM rate AS r, hike AS h WHERE r.user_idUser='$idUser' AND r.hike_idHike='$idHike'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if (!$row)
			return false;
	
			return $row;
	}
	/**
	 * 
	 * @method deleteRateByHike($idHike)
	 * @desc Method deleting the specific rate
	 * @param int $idHike
	 * 
	 */
	public static function deleteRateByHike($idHike) {
		$query = "DELETE FROM rate WHERE hike_idHike = '$idHike'";
		 
		SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method get_myRegistrationByIdUser($idUser)
	 * @desc Method returning all registration by the specific user.
	 * @param int $idUser
	 * @return boolean|Hike[]
	 * 
	 */
	public static function get_myRegistrationByIdUser($idUser)
	{
		$query = "SELECT DISTINCT h.idHike, h.title, h.description, h.ImagePath, h.startDate, h.endDate, h.departureTime, h.arrivalTime, h.duration,
		h.difficultyLevel, h.heightDifference, h.distance, h.registrationMax, h.price, h.startPlace_idLocation, h.endPlace_idLocation , h.hike_type_idType
		FROM registration AS r, hike AS h WHERE r.hike_idHike = h.idHike AND r.user_idUser='$idUser'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$rows = $result->fetchAll();
		if (!$rows)
			return false;
	
			foreach ($rows as $row) {
				$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
				$h->setStartDate($row ['startDate']);
				$h->setEndDate($row ['endDate']);
				$h->setDepartureTime($row ['departureTime']);
				$h->setArrivalTime($row ['arrivalTime']);
				$h->setImagePath($row ['ImagePath']);
				$h->setDifficultyLevel($row ['difficultyLevel']);
				$h->setHeightDifference($row ['heightDifference']);
				$h->setPrice($row ['price']);
				$h->setRegistrationMax($row ['registrationMax']);
				$h->setDuration($row ['duration']);
	
				$hikes [] = $h;
			}
	
			return $hikes;
	}
	/**
	 * 
	 * @method get_noPeopleByUserAndHike($idUser, $idHike)
	 * @desc Method returning the number of people the user register into the hike.
	 * @param int $idUser
	 * @param int $idHike
	 * @return boolean|PDOStatement
	 * 
	 */
	public static function get_noPeopleByUserAndHike($idUser, $idHike)
	{
		$query = "SELECT r.numberPeople FROM registration AS r, hike AS h WHERE r.user_idUser='$idUser' AND r.hike_idHike='$idHike'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if (!$row)
			return false;
	
			return $row;
	}
	/**
	 * 
	 * @method insertFavoriteHike($idUser, $idHike)
	 * @desc Method inserting favorite into the database
	 * @param int $idUser
	 * @param int $idHike
	 * 
	 */
	public static function insertFavoriteHike($idUser, $idHike)
	{
		$query = "INSERT INTO favorite(user_idUser, hike_idHike) VALUES ('$idUser','$idHike');";
		return SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method get_ifFAvorite($idUser, $idHike)
	 * @desc Method Returning if the Hike is in the favorite by the user.
	 * @param int $idUser
	 * @param int $idHike
	 * @return boolean
	 * 
	 */
	public static function get_ifFavorite($idUser, $idHike)
	{
		$query = "SELECT DISTINCT f.user_idUser, f.hike_idHike FROM favorite AS f, hike AS h WHERE f.user_idUser='$idUser' AND f.hike_idHike='$idHike'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if (!$row)
			return false;
	
			return true;
	}
	/**
	 * 
	 * @method deleteFavoriteHike($idUser, $idHike)
	 * @desc Method deleting the Favorite by User Id
	 * @param int $idUser
	 * @param int $idHike
	 * 
	 */
	public static function deleteFavoriteHike($idUser, $idHike)
	{
		$query = "DELETE FROM favorite WHERE user_idUser = '$idUser' AND hike_idHike = '$idHike'";
		SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method deleteFavoriteHikeByHike($idHike)
	 * @desc Method deleteing all Favorites for the specific Hike
	 * @param int $idHike
	 * 
	 */
	public static function deleteFavoriteHikeByHike($idHike)
	{
		$query = "DELETE FROM favorite WHERE hike_idHike = '$idHike'";
		SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method get_myFavoriteHikesByIdUser($idUser)
	 * @desc Method returning all favorites for the specific user.
	 * @param int $idUser
	 * @return boolean|Hike[]
	 * 
	 */
	public static function get_myFavoriteHikesByIdUser($idUser)
	{
		$query = "SELECT DISTINCT h.idHike, h.title, h.description, h.ImagePath, h.startDate, h.endDate, h.departureTime, h.arrivalTime, h.duration,
		h.difficultyLevel, h.heightDifference, h.distance, h.registrationMax, h.price, h.startPlace_idLocation, h.endPlace_idLocation, h.hike_type_idType
		FROM favorite AS f, hike AS h WHERE f.hike_idHike = h.idHike AND f.user_idUser='$idUser'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$rows = $result->fetchAll();
		if (!$rows)
			return false;
	
			foreach ($rows as $row) {
				$h = new Hike ($row ['idHike'], $row ['title'], $row ['description'], $row ['distance'], $row ['startPlace_idLocation'], $row ['endPlace_idLocation'], $row ['hike_type_idType']);
	
				$h->setStartDate($row ['startDate']);
				$h->setEndDate($row ['endDate']);
				$h->setDepartureTime($row ['departureTime']);
				$h->setArrivalTime($row ['arrivalTime']);
				$h->setImagePath($row ['ImagePath']);
				$h->setDifficultyLevel($row ['difficultyLevel']);
				$h->setHeightDifference($row ['heightDifference']);
				$h->setPrice($row ['price']);
				$h->setRegistrationMax($row ['registrationMax']);
				$h->setDuration($row ['duration']);
	
				$hikes [] = $h;
			}
	
			return $hikes;
	}
	/**
	 * 
	 * @method deleteHike($id)
	 * @desc Method deleting the specific Hike and all his attachement (favorites, rates, books)
	 * @param int $id
	 * 
	 */
	public static function deleteHike($id)
	{
		$query = "DELETE FROM hike WHERE idHike='$id'";
	
		$path = Hike::get_ImageById($id);
	
		Hike::deleteImage($path);
		Hike::deleteFavoriteHikeByHike($id);
		Hike::deleteRateByHike($id);
		Hike::deleteBookingByHike($id);
	
		return SqlConnection::getInstance()->deleteDB($query);
	}
	/**
	 * 
	 * @method get_ImageById($id)
	 * @desc Method returning the path of the Image
	 * @param int $id
	 * @return string
	 * 
	 */
	private static function get_ImageById($id)
	{
		$query = "SELECT ImagePath FROM hike WHERE idHike='$id'";
	
		$result = SqlConnection::getInstance()->selectDB($query);
	
		$row = $result->fetch();
	
		return $row ['ImagePath'];
	}
	/**
	 * 
	 * @method deleteImage($path)
	 * @desc Method deleting the specific image
	 * @param string $path
	 * @return boolean
	 * 
	 */
	public static function deleteImage($path)
	{
		if ($path !== '' || file_exists($path))
			return unlink($path);
	}
	/**
	 * 
	 * @method ccheck_Image($image_name)
	 * @desc Method checking if the fileupload occures correctly and if it's correct move them to the right folder.
	 * @param string $image_name
	 * @return string
	 * 
	 */
	public static function check_Image($image_name)
	{
	
		// Valide extension for an image
		$extension_valide = array(
				'jpg',
				'jpeg',
				'gif',
				'png'
		);
		// Substract the extension of the image and put in lowercase
		$extension_upload = strtolower(substr(strrchr($_FILES [$image_name] ['name'], '.'), 1));
		// Size of the image
		$image_size = $_FILES [$image_name] ['size'];
	
		if ($_FILES [$image_name] ['error'] === UPLOAD_ERR_NO_FILE) {
			$error = PICTURE . ' : ' . NO_FILE;
		} else if ($_FILES [$image_name] ['error'] === UPLOAD_ERR_PARTIAL) {
			$error = PICTURE . ' : ' . UPLOAD_ERROR;
		} else if (!(in_array($extension_upload, $extension_valide))) {
			$error = PICTURE . ' : ' . UPLOAD_TYPEFILE;
		} else if ($_FILES [$image_name] ['error'] === UPLOAD_ERR_INI_SIZE) {
			$error = PICTURE . UPLOAD_HEAVY;
		} else {
			// move the image
			$path = 'Images/Hikes/' . md5(uniqid(rand(), true)) . '.' . $extension_upload;
			$result = move_uploaded_file($_FILES [$image_name] ['tmp_name'], $path);
	
			if ($result === true)
				return $path;
				else
					$error = UPLOAD_ERROR;
		}
	
		return $error;
	}
	/**
	 * 
	 * @method insertBooking($idHike, $nbpeople, $idUser)
	 * @desc Create a Book into the database
	 * @param int $idHike
	 * @param int $nbpeople
	 * @param int $idUser
	 * 
	 */
	public static function insertBooking($idHike, $nbpeople, $idUser)
	{
		$query = "INSERT INTO registration(hike_idHike, numberPeople, user_idUser)
		VALUES('$idHike', '$nbpeople', '$idUser');";
	
		return SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method deleteBookingByHike($idHike)
	 * @desc Delete all Book from the database by specific hike
	 * @param int $idHike
	 * 
	 */
	public static function deleteBookingByHike($idHike) {
		$query = "DELETE FROM registration WHERE hike_idHike = '$idHike'";
		 
		SqlConnection::getInstance()->executeQuery($query);
	}
	/**
	 * 
	 * @method deleteBookingByHikeAndUser($idHike, $idUser)
	 * @desc Delete specific Book by User and Hike
	 * @param int $idHike
	 * @param int $idUser
	 * 
	 */
	public static function deleteBookingByHikeAndUser($idHike, $idUser) {
		$query = "DELETE FROM registration WHERE hike_idHike = '$idHike' AND user_idUser = '$idUser'";
		 
		SqlConnection::getInstance()->deleteDB($query);
	}
	/**
	 * 
	 * @method getMemberBookedByHike($idHike)
	 * @desc Method returning all Booking by Hike
	 * @param int $idHike
	 * 
	 */
	public static function getMemberBookedByHike($idHike) {
		$query = "SELECT u.firstname as Firstname, u.lastname as Lastname,
		u.email as Email, u.telephone as Telephone, r.numberPeople as NumberRegistred
		FROM registration r, user u
		WHERE r.user_idUser = u.idUser
		AND r.hike_idHike = '$idHike'";
		 
		$rows = SqlConnection::getInstance()->selectDB($query);
		return $rows->fetchAll();
	}
	/**
	 * 
	 * @method getMemberNumberBooked($idHike, $idUser)
	 * @desc Method returning the number of person registered by the user into the specific hike.
	 * @param int $idHike
	 * @param int $idUser
	 * @return int
	 * 
	 */
	public static function getMemberNumberBooked($idHike, $idUser) {
		$query = "SELECT numberPeople as NumberRegistred
		FROM registration
		WHERE user_idUser= '$idUser'
		AND hike_idHike='$idHike'";
			
		$result = SqlConnection::getInstance()->selectDB($query)->fetch(PDO::FETCH_ASSOC);
		return $result['NumberRegistred'];
	}
	/**
	 * 
	 * @method isRegistered($idHike, $idUser)
	 * @desc Check if the user is already booked.
	 * @param int $idHike
	 * @param int $idUser
	 * @return int
	 * 
	 */
	public static function isRegistered($idHike, $idUser) {
		$query = "SELECT COUNT(*) AS NbRow
				FROM registration
				WHERE user_idUser=" . $idUser .
					" AND hike_idHike=" . $idHike . ";";
	
		$result = SqlConnection::getInstance()->selectDB($query)->fetch(PDO::FETCH_ASSOC);
		 
		return $result['NbRow'];
	}
	/**
	 * 
	 * @method countRegistered($idHike)
	 * @desc Method counting all book in the hike
	 * @param int $idHike
	 * @return int
	 * 
	 */
	public static function countRegistered($idHike) {
		$query = "SELECT SUM(numberPeople) as NumberRegistred
		FROM registration
		WHERE hike_idHike = '$idHike'";
		 
		$result = SqlConnection::getInstance()->selectDB($query)->fetch(PDO::FETCH_ASSOC);
		 
		return $result['NumberRegistred'];
	}
	/**
	 * 
	 * @method countBooked($idHike)
	 * @desc Check if a Book exist
	 * @param int $idHike
	 * 
	 */
	public static function countBooked($idHike) {
		$query = "SELECT COUNT(*)
		FROM registration
		WHERE hike_idHike = '$idHike'";
		 
		$result = SqlConnection::getInstance()->selectDB($query);
		 
		return $result->fetchColumn();
	}
} ?>