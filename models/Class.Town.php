<?php

/**
 * Class Login
 */
class Town {
    private $idTown;
    private $townName;
    private $password;
    private $electedPassword;

    /**
     * Constructor
     * @param int $idTown
     * @param string $townName
     * @param string $password
     * @param string $electedPassword;
     */
    public function __construct($idTown=null, $townName, $password, $electedPassword){
        $this->setId($idTown);
        $this->setTownName($townName);
        $this->setPassword($password);
        $this->setElectedPassword($electedPassword);
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
            $town = new Town($row['idTown'], $row['townName'], $row['password'], $row['electedPassword']);

            $Towns[] = $town;
        }

        return $Towns;
    }
	
    public static function connect($townName, $password){
        $query = "SELECT * FROM town WHERE townName='$townName' AND password='$password'";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if(!$row) return false;

        return new Town($row['idTown'], $row['townName'], $row['password'], $row['electedPassword']);
    }
}