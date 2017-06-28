<?php

/**
 * Class Town
 */
class Town {
    private $idTown;
    private $townName;
    private $password;
    private $electedPassword;
    private $adminPassword;
    
    /**
     * Constructor
     * @param int $idTown
     * @param string $townName
     * @param string $password
     * @param string $electedPassword
     * @param string $adminPassword
     */
    public function __construct($idTown = null, $townName, $password, $electedPassword, $adminPassword){
        $this->setId($idTown);
        $this->setTownName($townName);
        $this->setPassword($password);
        $this->setElectedPassword($electedPassword);
        $this->setAdminPassword($adminPassword);
    }	
	
    /**
     * @return idTown
     */
    public function getId(){
        return $this->idTown;
    }

    /**
     * @param int $idTown
     */
    public function setId($idTown){
        $this->idTown = $idTown;
    }
	
    /**
     * @return townName
     */
    public function getTownName(){
        return $this->townName;
    }

    /**
     * @param string $townName
     */
    public function setTownName($townName){
        $this->townName = $townName;
    }
	
    /**
     * @return password
     */
    public function getPassword(){
            return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }
    
    /**
     * @return electedPassword
     */
    public function getElectedPassword(){
        return $this->electedPassword;
    }

    /**
     * @param string $electedPassword
     */
    public function setElectedPassword($electedPassword){
        $this->electedPassword = $electedPassword;
    }
    
    /**
     * @return adminPassword
     */
    public function getAdminPassword(){
        return $this->adminPassword;
    }

    /**
     * @param string $adminPassword
     */
    public function setAdminPassword($adminPassword){
        $this->adminPassword = $adminPassword;
    }
	
    /**
     // @method getAllTown()
     // @desc Method that get all the town from the DB
     // @return Towns[]
     */
    public static function getAllTown() {
        $query = "SELECT * FROM town;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Towns = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $town = new Town($row['idTown'], $row['name'], $row['password'], $row['electedPassword'], $row['adminPassword']);
                
            $Towns[] = $town;
        }

        return $Towns;
    }
	
    /**
     // @method connect()
     // @desc Method that connect a normal user
     // @param string townName
     // @param string password
     // @return Town
     */
    public static function connect($townName, $password){
        $query = "SELECT * FROM town WHERE name='$townName' AND password='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new Town($row['idTown'], $row['name'], $row['password'], $row['electedPassword'], $row['adminPassword']);
    }
    
    /**
     // @method connect1()
     // @desc Method that connect an elected user
     // @param string townName
     // @param string password
     // @return Town
     */
    public static function connect1($townName, $password){
        $query = "SELECT * FROM town WHERE name='$townName' AND electedPassword='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new Town($row['idTown'], $row['name'], $row['password'], $row['electedPassword'], $row['adminPassword']);
    }
    
    /**
     // @method connect2()
     // @desc Method that connect an administrator
     // @param string townName
     // @param string password
     // @return Town
     */
    public static function connect2($townName, $password){
        $query = "SELECT * FROM town WHERE name='$townName' AND adminPassword='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        
        if(!$row) {
            return false;
        }

        return new Town($row['idTown'], $row['name'], $row['password'], $row['electedPassword'], $row['adminPassword']);
    }
}