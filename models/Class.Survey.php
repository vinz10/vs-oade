<?php

/**
 * Class Survey
 */
class Survey {
    private $idSurvey;
    private $questionId;
    private $answer;
    private $grade;
    private $openQuestion;
    private $comment;
    private $project_idProject;
    
    /**
     * Constructor
     * @param int $idSurvey
     * @param string $questionId
     * @param string $answer
     * @param int $grade
     * @param string $openQuestion
     * @param string $comment
     * @param int $project_idProject
     */
    public function __construct($idSurvey = null, $questionId, $answer, $grade, $openQuestion, $comment, $project_idProject){
        $this->setId($idSurvey);
        $this->setQuestionId($questionId);
        $this->setAnswer($answer);
        $this->setGrade($grade);
        $this->setOpenQuestion($openQuestion);
        $this->setComment($comment);
        $this->setProjectId($project_idProject);
    }	
	
    /**
     * @return idSurvey
     */
    public function getId(){
        return $this->idSurvey;
    }

    /**
     * @param int $idSurvey
     */
    public function setId($idSurvey){
        $this->idSurvey = $idSurvey;
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
     * @return grade
     */
    public function getGrade(){
            return $this->grade;
    }

    /**
     * @param int $grade
     */
    public function setGrade($grade){
        $this->grade = $grade;
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
     * @return project_idProject
     */
    public function getProjectId(){
        return $this->project_idProject;
    }

    /**
     * @param int $project_idProject
     */
    public function setProjectId($project_idProject){
        $this->project_idProject = $project_idProject;
    }
    
    /**
     // @method insertSurvey()
     // @desc Method that insert a new Survey into the DB
     // @return PDOStatement
     */
    public function insertSurvey(){
        
        $sql = SqlConnection::getInstance();

        $query = "INSERT into survey(questionId, answer, grade, openQuestion, comment, project_idProject) VALUES(";
        $query .= $sql->getConn()->quote($this->questionId) . ', ';
        $query .= $sql->getConn()->quote($this->answer) . ', ';
        $query .= $sql->getConn()->quote($this->grade) . ', ';
        $query .= $sql->getConn()->quote($this->openQuestion) . ', ';
        $query .= $sql->getConn()->quote($this->comment) . ', ';
        $query .= $sql->getConn()->quote($this->project_idProject) . ');';

        return  $sql->executeQuery($query);
    }
    
    /**
     // @method updateSurvey()
     // @desc Method that update a Survey into the DB
     // @param int $idSurvey
     // @return PDOStatement
     */
    public function updateSurvey(){
        
        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET questionId = ' . $sql->getConn()->quote($this->questionId);
        $query .= ', answer = ' . $sql->getConn()->quote($this->answer);
        $query .= ', grade = ' . $sql->getConn()->quote($this->grade);
        $query .= ', openQuestion = ' . $sql->getConn()->quote($this->openQuestion);
        $query .= ', comment = ' . $sql->getConn()->quote($this->comment);
        $query .= ', project_idProject = ' . $sql->getConn()->quote($this->project_idProject) . ' WHERE questionId =' . $this->questionId . ';';
        
        return  $sql->executeQuery($query);
    }
	
    /**
     // @method getSurveyByQuestionId()
     // @desc Method that get a survey by the questionId from the DB
     // @return survey
     */
    public static function getSurveyByQuestionId($idQuestion) {
        
        $query = "SELECT * FROM survey WHERE questionId='$idQuestion';";
	$result = SqlConnection::getInstance()->selectDB($query);
	$row = $result->fetch();
	if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade'], $row['openQuestion'], $row['comment'], $row['project_idProject']);
        
        return $survey;
    }
    
    /**
     // @method existSurvey()
     // @desc Method that check if a survey already exists
     // @param string $questionId
     // @param string $projectId
     // @return boolean
     */
    public static function existSurvey($questionId, $projectId) {
        
        $sql = SqlConnection::getInstance();
        
        $query = "SELECT * FROM survey WHERE questionId='$questionId' AND project_idProject='$projectId';";
        
        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if(!$row) { 
            return false;
        }

        return true;
    }
}



