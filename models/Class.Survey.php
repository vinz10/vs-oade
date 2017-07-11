<?php

/**
 * Class Survey
 */
class Survey {

    private $idSurvey;
    private $questionId;
    private $answer;
    private $grade1;
    private $grade2;
    private $openQuestion;
    private $comment;
    private $project_idProject;

    /**
     * Constructor
     * @param int $idSurvey
     * @param string $questionId
     * @param string $answer
     * @param int $grade1
     * @param int $grade2
     * @param string $openQuestion
     * @param string $comment
     * @param int $project_idProject
     */
    public function __construct($idSurvey = null, $questionId, $answer, $grade1, $grade2, $openQuestion, $comment, $project_idProject) {
        $this->setId($idSurvey);
        $this->setQuestionId($questionId);
        $this->setAnswer($answer);
        $this->setGrade1($grade1);
        $this->setGrade2($grade2);
        $this->setOpenQuestion($openQuestion);
        $this->setComment($comment);
        $this->setProjectId($project_idProject);
    }

    /**
     * @return idSurvey
     */
    public function getId() {
        return $this->idSurvey;
    }

    /**
     * @param int $idSurvey
     */
    public function setId($idSurvey) {
        $this->idSurvey = $idSurvey;
    }

    /**
     * @return questionId
     */
    public function getQuestionId() {
        return $this->questionId;
    }

    /**
     * @param string $questionId
     */
    public function setQuestionId($questionId) {
        $this->questionId = $questionId;
    }

    /**
     * @return answer
     */
    public function getAnswer() {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    /**
     * @return grade1
     */
    public function getGrade1() {
        return $this->grade1;
    }

    /**
     * @param int $grade1
     */
    public function setGrade1($grade1) {
        $this->grade1 = $grade1;
    }

    /**
     * @return grade2
     */
    public function getGrade2() {
        return $this->grade2;
    }

    /**
     * @param int $grade2
     */
    public function setGrade2($grade2) {
        $this->grade2 = $grade2;
    }

    /**
     * @return openQuestion
     */
    public function getOpenQuestion() {
        return $this->openQuestion;
    }

    /**
     * @param string $openQuestion
     */
    public function setOpenQuestion($openQuestion) {
        $this->openQuestion = $openQuestion;
    }

    /**
     * @return comment
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment) {
        $this->comment = $comment;
    }

    /**
     * @return project_idProject
     */
    public function getProjectId() {
        return $this->project_idProject;
    }

    /**
     * @param int $project_idProject
     */
    public function setProjectId($project_idProject) {
        $this->project_idProject = $project_idProject;
    }

    /**
      // @method insertSurvey()
      // @desc Method that insert a new Survey into the DB
      // @return PDOStatement
     */
    public function insertSurvey() {

        $sql = SqlConnection::getInstance();

        $query = "INSERT into survey(questionId, answer, grade1, grade2, openQuestion, comment, project_idProject) VALUES(";
        $query .= $sql->getConn()->quote($this->questionId) . ', ';
        $query .= $sql->getConn()->quote($this->answer) . ', ';
        $query .= $sql->getConn()->quote($this->grade1) . ', ';
        $query .= $sql->getConn()->quote($this->grade2) . ', ';
        $query .= $sql->getConn()->quote($this->openQuestion) . ', ';
        $query .= $sql->getConn()->quote($this->comment) . ', ';
        $query .= $sql->getConn()->quote($this->project_idProject) . ');';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateSurvey()
      // @desc Method that update a Survey into the DB by the idProject
      // @param int $idProject
      // @return PDOStatement
     */
    public function updateSurvey($idProject) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET questionId = ' . $sql->getConn()->quote($this->questionId);
        $query .= ', answer = ' . $sql->getConn()->quote($this->answer);
        $query .= ', grade1 = ' . $sql->getConn()->quote($this->grade1);
        $query .= ', grade2 = ' . $sql->getConn()->quote($this->grade2);
        $query .= ', openQuestion = ' . $sql->getConn()->quote($this->openQuestion);
        $query .= ', comment = ' . $sql->getConn()->quote($this->comment);
        $query .= ', project_idProject = ' . $sql->getConn()->quote($this->project_idProject) . ' WHERE project_idProject = ' . $idProject . ' AND questionId = ' . $this->questionId . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateAnswer()
      // @desc Method that update a the answer of the Survey into the DB by the idProject and idQuestion
      // @param int $idProject
      // @param int $idQuestion
      // @return PDOStatement
     */
    public function updateAnswer($idProject, $idQuestion) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET answer = ' . $sql->getConn()->quote($this->answer);
        $query .= ' WHERE project_idProject = ' . $idProject;
        $query .= ' AND questionId = ' . $idQuestion . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateGrade1()
      // @desc Method that update the grade1 of the Survey into the DB by the idProject and idQuestion
      // @param int $idProject
      // @param int $idQuestion
      // @return PDOStatement
     */
    public function updateGrade1($idProject, $idQuestion) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET grade1 = ' . $sql->getConn()->quote($this->grade1);
        $query .= ' WHERE project_idProject = ' . $idProject;
        $query .= ' AND questionId = ' . $idQuestion . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateGrade2()
      // @desc Method that update the grade2 of the Survey into the DB by the idProject and idQuestion
      // @param int $idProject
      // @param int $idQuestion
      // @return PDOStatement
     */
    public function updateGrade2($idProject, $idQuestion) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET grade2 = ' . $sql->getConn()->quote($this->grade2);
        $query .= ' WHERE project_idProject = ' . $idProject;
        $query .= ' AND questionId = ' . $idQuestion . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method updateComment()
      // @desc Method that update the comment of the Survey into the DB by the idProject and idQuestion
      // @param int $idProject
      // @param int $idQuestion
      // @return PDOStatement
     */
    public function updateComment($idProject, $idQuestion) {

        $sql = SqlConnection::getInstance();

        $query = 'UPDATE survey SET comment = ' . $sql->getConn()->quote($this->comment);
        $query .= ' WHERE project_idProject = ' . $idProject;
        $query .= ' AND questionId = ' . $idQuestion . ';';

        return $sql->executeQuery($query);
    }

    /**
      // @method getGrade1ByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (Check Grade1)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getGrade1ByQuestionId($idQuestion, $idProject) {

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND grade1 <> -1;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

        return $survey;
    }
    
    /**
      // @method getGrade2ByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (Check Grade2)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getGrade2ByQuestionId($idQuestion, $idProject) {

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND grade2 <> -1;";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

        return $survey;
    }

    /**
      // @method getAnswerByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (Check Answer)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getAnswerByQuestionId($idQuestion, $idProject) {

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND answer <> '';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

        return $survey;
    }

    /**
      // @method getCommentByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (Check Comment)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getCommentByQuestionId($idQuestion, $idProject) {

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND comment <> '';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

        return $survey;
    }

    /**
      // @method getQuestionByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (Check Question)
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
      // @method getSurveysByProjectId()
      // @desc Method that get all the surveys by the idProject from the DB
      // @param int $idProject
      // @return Surveys[]
     */
    public static function getSurveysByProjectId($idProject) {
        $query = "SELECT * FROM survey WHERE project_idProject='$idProject';";
        $result = SqlConnection::getInstance()->selectDB($query);
        $Surveys = array();
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            $survey = new Survey($row['idSurvey'], $row['questionId'], $row['answer'], $row['grade1'], $row['grade2'], $row['openQuestion'], $row['comment'], $row['project_idProject']);

            $Surveys[] = $survey;
        }

        return $Surveys;
    }

    /**
      // @method existSurvey()
      // @desc Method that check if a survey already exists by the idQuestion and idProject
      // @param int $idQuestion
      // @param int $idProject
      // @return boolean
     */
    public static function existSurvey($idQuestion, $idProject) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject';";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method existGrade1()
      // @desc Method that check if a grade1 already exists by the idQuestion and idProject
      // @param int $idQuestion
      // @param int $idProject
      // @return boolean
     */
    public static function existGrade1($idQuestion, $idProject) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND grade1 <> -1;";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method existGrade2()
      // @desc Method that check if a grade2 already exists by the idQuestion and idProject
      // @param int $idQuestion
      // @param int $idProject
      // @return boolean
     */
    public static function existGrade2($idQuestion, $idProject) {

        $sql = SqlConnection::getInstance();

        $query = "SELECT * FROM survey WHERE questionId='$idQuestion' AND project_idProject='$idProject' AND grade2 <> -1;";

        $result = $sql->selectDB($query);
        $row = $result->fetch();
        if (!$row) {
            return false;
        }

        return true;
    }

    /**
      // @method deleteSurvey()
      // @desc Method that delete a survey by the idProject
      // @param int $idProject
     */
    public static function deleteSurvey($idProject) {
        $query = "DELETE FROM survey WHERE project_idProject='$idProject'";

        return SqlConnection::getInstance()->deleteDB($query);
    }

}