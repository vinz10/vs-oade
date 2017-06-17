<?php

/**
 * Class Project
 */
class Project {
    private $name;
    private $description;
    private $poLastname;
    private $poFirstname;
    private $town_idTown;
    private $idProject;
    
    /**
     * Constructor
     * @param string $name
     * @param string $description
     * @param string $poLastname
     * @param string $poFirstname
     * @param int $town_idTown
     * @param int $idProject
     */
    public function __construct($name, $description, $poLastname, $poFirstname, $town_idTown, $idProject = null){
        $this->setId($idProject);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPoLastname($poLastname);
        $this->setPoFirstname($poFirstname);
        $this->setTownId($town_idTown);
    }	
	
    /**
     * @return idProject
     */
    public function getId(){
        return $this->idProject;
    }

    /**
     * @param int $idProject
     */
    public function setId($idProject){
        $this->idProject = $idProject;
    }
	
    /**
     * @return name
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name){
        $this->name = $name;
    }
    
    /**
     * @return description
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description){
        $this->description = $description;
    }
	
    /**
     * @return poLastname
     */
    public function getPoLastname(){
            return $this->poLastname;
    }

    /**
     * @param string $poLastname
     */
    public function setPoLastname($poLastname){
        $this->poLastname = $poLastname;
    }
    
    /**
     * @return poFirstname
     */
    public function getPoFirstname(){
        return $this->poFirstname;
    }

    /**
     * @param string $poFirstname
     */
    public function setPoFirstname($poFirstname){
        $this->poFirstname = $poFirstname;
    }
    
    /**
     * @return town_idTown
     */
    public function getTownId(){
        return $this->town_idTown;
    }

    /**
     * @param int $town_idTown
     */
    public function setTownId($town_idTown){
        $this->town_idTown = $town_idTown;
    }
	
    /**
     // @method getProjectsByIdTown()
     // @desc Method that get all the projects by the idTown from the DB
     // @return Towns[]
     */
    public static function getProjectsByIdTown($idTown) {
        $query = "SELECT * FROM project WHERE town_idTown='$idTown';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Projects = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $project = new Project($row['name'], $row['description'], $row['poLastname'], $row['poFirstname'], $row['town_idTown'], $row['idProject']);
                
            $Projects[] = $project;
        }

        return $Projects;
    }
    
    /**
     // @method insertProject()
     // @desc Method that insert a new Project into the DB
     // @return PDOStatement
     */
    public function insertProject(){
        
        $sql = SqlConnection::getInstance();

        $query = "INSERT into project(name, description, poLastname, poFirstname, town_idTown) VALUES(";
        $query .= $sql->getConn()->quote($this->name) . ', ';
        $query .= $sql->getConn()->quote($this->description) . ', ';
        $query .= $sql->getConn()->quote($this->poLastname) . ', ';
        $query .= $sql->getConn()->quote($this->poFirstname) . ', ';
        $query .= $sql->getConn()->quote($this->town_idTown) . ');';

        return  $sql->executeQuery($query);
    }
    
    /**
     // @method existProject()
     // @desc Method that check if a project already exists
     // @param string $name
     // @return boolean
     */
    public static function existProject($name) {
        
        $sql = SqlConnection::getInstance();
        
        $query = "SELECT * FROM project WHERE name=";
        $query .= $sql->getConn()->quote($name) . ';';
        
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if(!$row) { 
            return false;
        }

        return true;
    }
}

