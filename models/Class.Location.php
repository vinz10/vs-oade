<?php
/**
 *
 * Class Location
 *
 */
class Location {
	private $idLocation;
	private $zipcode;
	private $city;
	private $region;
	
	/**
	 * Constructor
	 * @param int $id
	 * @param int $zipcode
	 * @param string $city
	 * @param string $region
	 */
	public function __construct($id=null, $zipcode, $city, $region){
		$this->setId($id);
		$this->setZipCode($zipcode);
		$this->setCity($city);
		$this->setRegion($region);
	}	
	
	/**
	 * @return idLocation
	 */
	public function getId(){
		return $this->idLocation;
	}
	
	/**
	 * 
	 * @param int $id
	 */
	public function setId($id){
		$this->idLocation = $id;
	}
	
	/**
	 * @return zipcode
	 */
	public function getZipCode(){
		return $this->zipcode;
	}
	
	/**
	 * 
	 * @param int $zipcode
	 */
	public function setZipCode($zipcode){
		$this->zipcode = $zipcode;
	}
	
	/**
	 * @return city
	 */
	public function getCity(){
		return $this->city;
	}
	
	/**
	 * 
	 * @param string $city
	 */
	public function setCity($city){
		$this->city = $city;
	}
	
	/**
	 * @return region
	 */
	public function getRegion(){
		return $this->region;
	}
	
	/**
	 * 
	 * @param string $region
	 */
	public function setRegion($region){
		$this->region = $region;
	}
	
	/**
	 * @method insertLocation()
	 * @desc Method insert a new location into the DB
	 * @return PDOStatement
	 */
	public function insertLocation() {
		$sql = SqlConnection::getInstance();
		
		$query = "INSERT into location(zipcode, city, region)
		VALUES(";
		$query .= $sql->getConn()->quote($this->zipcode) . ', ';
		$query .= $sql->getConn()->quote($this->city) . ', ';
		$query .= $sql->getConn()->quote($this->region) . ');';
			
		return  $sql->executeQuery($query);
	}
	
	/**
	 * @method getLocation()
	 * @desc Method that get a location
	 * @param int $npa
	 * @param string $city
	 * @param string $region
	 * @return boolean|Location
	 */
	public static function getLocation($npa, $city, $region){
		$sql = SqlConnection::getInstance();
		
		$query = "SELECT * 
		FROM location 
		WHERE zipcode='$npa' 
		AND city=";
		$query .= $sql->getConn()->quote($city) . ' ';
		$query .= 'AND region=';
		$query .= $sql->getConn()->quote($region) . ';';
		
		$result = $sql->selectDB($query);
		$row = $result->fetch();
		
		if(!$row) return false;
		
		return new Location($row['idLocation'], $row['zipcode'], $row['city'], $row['region']);
	}
	
	/**
	 * @method getLocationById()
	 * @desc Method that get a location by Id
	 * @param int $id
	 * @return boolean|Location
	 */
	public static function getLocationById($id){
		$query = "SELECT * FROM location WHERE idLocation='$id'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		
		if(!$row) return false;
	
		return new Location($row['idLocation'], $row['zipcode'], $row['city'], $row['region']);
	}
}
?>