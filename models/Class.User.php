<?php
/**
 *
 * Class User
 *
 */
class User {
	private $idUser;
	private $firstname;
	private $lastname;
	private $email;
	private $password;
	private $telephone;
	private $gender;
	private $address;
	private $preferredLang;
	private $userType;
	private $userLocation;
	
	/**
	 * Constructor
	 * @param int $id
	 * @param string $firstname
	 * @param string $lastname
	 * @param string $email
	 * @param string $password
	 * @param string $telephone
	 * @param string $gender
	 * @param string $address
	 * @param int $userType
	 * @param int $userLocation
	 */
	public function __construct($id=null, $firstname, $lastname, $email, $password, $telephone, $gender, $address, $userType, $userLocation){
		$this->setId($id);
		$this->setFirstname($firstname);
		$this->setLastname($lastname);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setTelephone($telephone);
		$this->setGender($gender);
		$this->setAddress($address);
		$this->setUserType($userType);
		$this->setUserLocation($userLocation);
	}	
	
	/**
	 * @return idUser
	 */
	public function getId(){
		return $this->idUser;
	}
	
	/**
	 * 
	 * @param int $id
	 */
	public function setId($id){
		$this->idUser = $id;
	}
	
	/**
	 * @return firstname
	 */
	public function getFirstname(){
		return $this->firstname;
	}
	
	/**
	 * 
	 * @param string $firstname
	 */
	public function setFirstname($firstname){
		$this->firstname = $firstname;
	}
	
	/**
	 * @return lastname
	 */
	public function getLastname(){
		return $this->lastname;
	}
	
	/**
	 * 
	 * @param string $lastname
	 */
	public function setLastname($lastname){
		$this->lastname = $lastname;
	}
	
	/**
	 * @return email
	 */
	public function getEmail(){
		return $this->email;
	}
	
	/**
	 * 
	 * @param string $email
	 */
	public function setEmail($email){
		$this->email = $email;
	}
	
	/**
	 * @return password
	 */
	public function getPassword(){
		return $this->password;
	}
	
	/**
	 * 
	 * @param string $password
	 */
	public function setPassword($password){
		$this->password = $password;
	}
	
	/**
	 * @return telephone
	 */
	public function getTelephone(){
		return $this->telephone;
	}
	
	/**
	 * 
	 * @param string $telephone
	 */
	public function setTelephone($telephone){
		$this->telephone = $telephone;
	}
	
	/**
	 * @return gender
	 */
	public function getGender(){
		return $this->gender;
	}
	
	/**
	 * 
	 * @param string $gender
	 */
	public function setGender($gender){
		$this->gender = $gender;
	}
	
	/**
	 * @return address
	 */
	public function getAddress(){
		return $this->address;
	}
	
	/**
	 * 
	 * @param string $address
	 */
	public function setAddress($address){
		$this->address = $address;
	}
	
	/**
	 * @return userType
	 */
	public function getUserType(){
		return $this->userType;
	}
	
	/**
	 * 
	 * @param int $userType
	 */
	public function setUserType($userType){
		$this->userType = $userType;
	}
	
	/**
	 * @return userLocation
	 */
	public function getUserLocation(){
		return $this->userLocation;
	}
	
	/**
	 * 
	 * @param int $userLocation
	 */
	public function setUserLocation($userLocation){
		$this->userLocation = $userLocation;
	}
	
	/**
	 * @method getAllUser()
	 * @desc Method that get all the user from the DB
	 * @return User[]
	 */
	public static function getAllUser() {
		$query = "SELECT * FROM user;";
		$result = SqlConnection::getInstance()->selectDB($query);
		$users = array();
		$rows = $result->fetchAll();
		
		foreach($rows as $row) {
			$u = new User($row['idUser'], $row['firstname'], $row['lastname'], $row['email'], $row['password'], $row['telephone'], $row['gender'], $row['address'], $row['user_type_iduser_type'], $row['location_idLocation']);
		
			$users [] = $u;
		}
		
		return $users;
	}
	
	/**
	 * @method modifyPermissionById()
	 * @desc Method that modify the permission of a user
	 * @param int $id
	 * @param int $permission
	 * @return PDOStatement
	 */
	public static function modifyPermissionById($id, $permission) {
		$query = "UPDATE user SET user_type_iduser_type='" . $permission . "' WHERE idUser='" . $id . "';";
		
		return SqlConnection::getInstance()->editDB($query);
	}
	
	/**
	 * @method insertUser()
	 * @desc Method that insert a new User into the DB
	 * @return PDOStatement
	 */
	public function insertUser(){
		$pwd = sha1($this->password);
		
		$sql = SqlConnection::getInstance();
		
		$query = "INSERT into user(firstname, lastname, email, 
		password, telephone, gender, address, user_type_iduser_type, 
		location_idLocation) VALUES(";
		
		$query .= $sql->getConn()->quote($this->firstname) . ', ';
		$query .= $sql->getConn()->quote($this->lastname) . ', ';
		$query .= $sql->getConn()->quote($this->email) . ', ';
		$query .= $sql->getConn()->quote($pwd) . ', ';
		$query .= $sql->getConn()->quote($this->telephone) . ', ';
		$query .= $sql->getConn()->quote($this->gender) . ', ';
		$query .= $sql->getConn()->quote($this->address) . ', ';
		$query .= $sql->getConn()->quote($this->userType) . ', '; 
		$query .= $sql->getConn()->quote($this->userLocation) . ');';
			
		return  SqlConnection::getInstance()->editDB($query);
	}
	
	/**
	 * @method updateUser()
	 * @desc Method that modify a user in the DB
	 * @return PDOStatement
	 */
	public function updateUser(){
		$pwd = sha1($this->password);
		
		$sql = SqlConnection::getInstance();
		
		$query = "UPDATE user SET firstname = ";
		$query .= $sql->getConn()->quote($this->firstname);
		$query .= ', lastname = ' . $sql->getConn()->quote($this->lastname);
		$query .= ', email = ' . $sql->getConn()->quote($this->email);
		$query .= ', password = ' . $sql->getConn()->quote($pwd);
		$query .= ', telephone = ' . $sql->getConn()->quote($this->telephone);
		$query .= ', gender = ' . $sql->getConn()->quote($this->gender);
		$query .= ', address = ' . $sql->getConn()->quote($this->address);
		$query .= ', location_idLocation = ' . $sql->getConn()->quote($this->userLocation) . ' WHERE idUser=' . $this->idUser . ';';
			
		return  SqlConnection::getInstance()->executeQuery($query);
	}
	 
	/**
	 * @method connect()
	 * @desc Method for the connection of the user to the site
	 * @param string $email
	 * @param string $pwd
	 * @return boolean|User
	 */
	public static function connect($email, $pwd){
		$pwd = sha1($pwd);
		$query = "SELECT * FROM user WHERE email='$email' AND password='$pwd'";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
		
		return new User($row['idUser'], $row['firstname'], $row['lastname'], $row['email'], $row['password'], $row['telephone'], $row['gender'], $row['address'],
			 $row['user_type_iduser_type'], $row['location_idLocation']);
	}
	
	/**
	 * @method isAdmin()
	 * @desc Method that check if a user has the admin rights
	 * @param string $email
	 * @return boolean
	 */
	public static function isAdmin($email) {
		$query = "SELECT * FROM user WHERE email='$email' AND user_type_iduser_type=2";
		$result = SqlConnection::getInstance()->selectDB($query);
		$row = $result->fetch();
		if(!$row) return false;
		
		return true;
	}
}
?>