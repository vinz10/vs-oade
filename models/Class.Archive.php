<?php

/**
 * Class Archive
 */
class Archive {
    private $idArchive;
    private $townName;
    private $projectName;
    private $projectDescription;
    private $projectPoLastname;
    private $projectPoFirstname;
    private $questionId;
    private $answer;
    private $grade1;
    private $grade2;
    private $openQuestion;
    private $comment;
    private $projectId;
    private $townId;
    
    /**
     * Constructor
     * @param int $idArchive
     * @param string $townName
     * @param string $projectName
     * @param string $projectDescription
     * @param string $projectPoLastname
     * @param string $projectPoFirstname
     * @param string $questionId
     * @param string $answer
     * @param int $grade1
     * @param int $grade2
     * @param string $openQuestion
     * @param string $comment
     * @param int $projectId
     * @param int $townId
     */
    public function __construct($idArchive = null, $townName, $projectName, $projectDescription, $projectPoLastname, $projectPoFirstname, 
            $questionId, $answer, $grade1, $grade2, $openQuestion, $comment, $projectId, $townId){
        $this->setId($idArchive);
        $this->setTownName($townName);
        $this->setProjectName($projectName);
        $this->setProjectDescription($projectDescription);
        $this->setProjectPoLastname($projectPoLastname);
        $this->setProjectPoFirstname($projectPoFirstname);
        $this->setQuestionId($questionId);
        $this->setAnswer($answer);
        $this->setGrade1($grade1);
        $this->setGrade2($grade2);
        $this->setOpenQuestion($openQuestion);
        $this->setComment($comment);
        $this->setProjectId($projectId);
        $this->setTownId($townId);
    }	
	
    /**
     * @return idArchive
     */
    public function getId(){
        return $this->idArchive;
    }

    /**
     * @param int $idArchive
     */
    public function setId($idArchive){
        $this->idArchive = $idArchive;
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
     * @return projectName
     */
    public function getProjectName(){
        return $this->projectName;
    }

    /**
     * @param string $projectName
     */
    public function setProjectName($projectName){
        $this->projectName = $projectName;
    }
	
    /**
     * @return projectDescription
     */
    public function getProjectDescription(){
            return $this->projectDescription;
    }

    /**
     * @param int $projectDescription
     */
    public function setProjectDescription($projectDescription){
        $this->projectDescription = $projectDescription;
    }
    
    /**
     * @return projectPoLastname
     */
    public function getProjectPoLastname(){
            return $this->projectPoLastname;
    }

    /**
     * @param int $projectPoLastname
     */
    public function setProjectPoLastname($projectPoLastname){
        $this->projectPoLastname = $projectPoLastname;
    }
    
    /**
     * @return projectPoFirstname
     */
    public function getProjectPoFirstname(){
            return $this->projectPoFirstname;
    }

    /**
     * @param int $projectPoFirstname
     */
    public function setProjectPoFirstname($projectPoFirstname){
        $this->projectPoFirstname = $projectPoFirstname;
    }
	
    /**
     * @return questionId
     */
    public function getQuestionId(){
        return $this->questionId;
    }

    /**
     * @param string $questionId
     */
    public function setQuestionId($questionId){
        $this->questionId = $questionId;
    }
    
    /**
     * @return answer
     */
    public function getAnswer(){
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer($answer){
        $this->answer = $answer;
    }
	
    /**
     * @return grade1
     */
    public function getGrade1(){
            return $this->grade1;
    }

    /**
     * @param int $grade1
     */
    public function setGrade1($grade1){
        $this->grade1 = $grade1;
    }
    
    /**
     * @return grade2
     */
    public function getGrade2(){
            return $this->grade2;
    }

    /**
     * @param int $grade2
     */
    public function setGrade2($grade2){
        $this->grade2 = $grade2;
    }
    
    /**
     * @return openQuestion
     */
    public function getOpenQuestion(){
        return $this->openQuestion;
    }

    /**
     * @param string $openQuestion
     */
    public function setOpenQuestion($openQuestion){
        $this->openQuestion = $openQuestion;
    }
    
    /**
     * @return comment
     */
    public function getComment(){
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment){
        $this->comment = $comment;
    }
    
    /**
     * @return projectId
     */
    public function getProjectId(){
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId){
        $this->projectId = $projectId;
    }
    
    /**
     * @return townId
     */
    public function getTownId(){
        return $this->townId;
    }

    /**
     * @param int $townId
     */
    public function setTownId($townId){
        $this->townId = $townId;
    }
    
    /**
     // @method insertArchive()
     // @desc Method that insert a new Archive into the DB
     // @return PDOStatement
     */
    public function insertArchive(){
        
        $sql = SqlConnection::getInstance();

        $query = "INSERT into archive(townName, projectName, projectDescription, projectPoLastname, projectPoFirstname, "
                . "questionId, answer, grade1, grade2, openQuestion, comment, projectId, townId) VALUES(";
        $query .= $sql->getConn()->quote($this->townName) . ', ';
        $query .= $sql->getConn()->quote($this->projectName) . ', ';
        $query .= $sql->getConn()->quote($this->projectDescription) . ', ';
        $query .= $sql->getConn()->quote($this->projectPoLastname) . ', ';
        $query .= $sql->getConn()->quote($this->projectPoFirstname) . ', ';
        $query .= $sql->getConn()->quote($this->questionId) . ', ';
        $query .= $sql->getConn()->quote($this->answer) . ', ';
        $query .= $sql->getConn()->quote($this->grade1) . ', ';
        $query .= $sql->getConn()->quote($this->grade2) . ', ';
        $query .= $sql->getConn()->quote($this->openQuestion) . ', ';
        $query .= $sql->getConn()->quote($this->comment) . ', ';
        $query .= $sql->getConn()->quote($this->projectId) . ', ';
        $query .= $sql->getConn()->quote($this->townId) . ');';

        return  $sql->executeQuery($query);
    }
    
    /**
     // @method getQuestionByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (Check Question)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getQuestionByQuestionId($idQuestion, $idProject) {
        
        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND openQuestion <> '';";
	$result = SqlConnection::getInstance()->selectDB($query);
	$row = $result->fetch();
	if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

        return $survey;
    }
    
    /**
     // @method existArchive()
     // @desc Method that check if an archive already exists
     // @param int $idProject
     // @return boolean
     */
    public static function existArchive($idProject) {
        
        $sql = SqlConnection::getInstance();
        
        $query = "SELECT * FROM archive WHERE projectId='$idProject';";
        
        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if(!$row) { 
            return false;
        }

        return true;
    }
    
    /**
     // @method getArchiveProjectsByIdTown()
     // @desc Method that get all the archive projects by the idTown from the DB
     // @return Projects[]
     */
    public static function getArchiveProjectsByIdTown($idTown) {
        $query = "SELECT DISTINCT * FROM archive WHERE townId='$idTown' GROUP BY projectId ORDER BY projectId DESC;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Projects = array();
        $rows = $result->fetchAll();

        foreach($rows as $row) {
            $project = new Archive($row['idArchive'], $row['townName'], $row['projectName'], $row['projectDescription'], $row['projectPoLastname'], 
                    $row['projectPoFirstname'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], 
                    $row['projectId'], $row['townId']);
                
            $Projects[] = $project;
        }

        return $Projects;
    }
    
    /**
     // @method deleteArchive()
     // @desc Method that delete archive by the idProject
     // @param int $idProject
     */
    public static function deleteArchive($idProject) {
        $query = "DELETE FROM archive WHERE projectId='$idProject'";

        return SqlConnection::getInstance()->deleteDB($query);
    }
}



