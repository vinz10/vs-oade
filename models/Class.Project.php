<?php

/**
 * Class Project
 */
class Project {

    private $idProject;
    private $name;
    private $description;
    private $poLastname;
    private $poFirstname;
    private $town_idTown;

    /**
     * Constructor
     * @param int $idProject
     * @param string $name
     * @param string $description
     * @param string $poLastname
     * @param string $poFirstname
     * @param int $town_idTown
     */
    public function __construct($idProject = null, $name, $description, $poLastname, $poFirstname, $town_idTown) {
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
    public function getId() {
        return $this->idProject;
    }

    /**
     * @param int $idProject
     */
    public function setId($idProject) {
        $this->idProject = $idProject;
    }

    /**
     * @return name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return poLastname
     */
    public function getPoLastname() {
        return $this->poLastname;
    }

    /**
     * @param string $poLastname
     */
    public function setPoLastname($poLastname) {
        $this->poLastname = $poLastname;
    }

    /**
     * @return poFirstname
     */
    public function getPoFirstname() {
        return $this->poFirstname;
    }

    /**
     * @param string $poFirstname
     */
    public function setPoFirstname($poFirstname) {
        $this->poFirstname = $poFirstname;
    }

    /**
     * @return town_idTown
     */
    public function getTownId() {
        return $this->town_idTown;
    }

    /**
     * @param int $town_idTown
     */
    public function setTownId($town_idTown) {
        $this->town_idTown = $town_idTown;
    }

    /**
      // @method insertProject()
      // @desc Method that insert a new Project into the DB
      // @return PDOStatement
     */
    public function insertProject() {

        $sql = SqlConnection::getInstance();

        $query = "INSERT into project(name, description, poLastname, poFirstname, town_idTown) VALUES(";
        $query .= $sql->getConn()->quote($this->name) . ', ';
        $query .= $sql->getConn()->quote($this->description) . ', ';
        $query .= $sql->getConn()->quote($this->poLastname) . ', ';
        $query .= $sql->getConn()->quote($this->poFirstname) . ', ';
        $query .= $sql->getConn()->quote($this->town_idTown) . ');';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateProject()
      // @desc Method that update a project into the DB by idProject
      // @param int $idProject
      // @return PDOStatement
     */
    public function updateProject($idProject) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE project SET name = ' . $sql->getConn()->quote($this->name);
        $query .= ', description = ' . $sql->getConn()->quote($this->description);
        $query .= ', poLastname = ' . $sql->getConn()->quote($this->poLastname);
        $query .= ', poFirstname = ' . $sql->getConn()->quote($this->poFirstname);
        $query .= ', town_idTown = ' . $sql->getConn()->quote($this->town_idTown) . ' WHERE idProject = ' . $idProject . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method getProjectById()
      // @desc Method that get a project by the idProject from the DB
      // @param int $idProject
      // @return $project
     */
    public static function getProjectById($idProject) {

        $query = "SELECT * FROM project WHERE idProject='$idProject';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        $project = new Project($row['idProject'], $row['name'], $row['description'], $row['poLastname'], $row['poFirstname'], $row['town_idTown']);

        return $project;
    }

    /**
      // @method getProjectsByIdTown()
      // @desc Method that get all the projects by the idTown from the DB
      // @param int $idTown
      // @return Projects[]
     */
    public static function getProjectsByIdTown($idTown) {
        $query = "SELECT * FROM project WHERE town_idTown='$idTown' ORDER BY idProject DESC;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Projects = array();
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            $project = new Project($row['idProject'], $row['name'], $row['description'], $row['poLastname'], $row['poFirstname'], $row['town_idTown']);

            $Projects[] = $project;
        }

        return $Projects;
    }

    /**
      // @method existProject()
      // @desc Method that check if a project already exists by the idProject, the name and the idTown
      // @param int $idProject
      // @param string $name
      // @param int $idTown
      // @return boolean
     */
    public static function existProject($idProject, $name, $idTown) {

        $sql = SqlConnection::getInstance();

        if ($idProject != null) {
            $query = "SELECT * FROM project WHERE idProject='$idProject' AND town_idTown='$idTown';";
        } else {
            $query = "SELECT * FROM project WHERE name='$name' AND town_idTown='$idTown';";
        }

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method notDeleted()
      // @desc Method that check if a project is deleted or not by the idProject
      // @param int $idProject
      // @return boolean
     */
    public static function notDeleted($idProject) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM project WHERE idProject='$idProject';";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method deleteProject()
      // @desc Method that delete a project by the idProject
      // @param int $idProject
     */
    public static function deleteProject($idProject) {

        // Delete the survey for this project
        Survey::deleteSurvey($idProject);

        $query = "DELETE FROM project WHERE idProject='$idProject'";

        return SqlConnection::getInstance()->deleteDB($query);
    }

}