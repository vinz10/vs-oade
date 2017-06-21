<?php
/**
 * Class projectsController
 */
class surveyController extends Controller {
    
    /**
     // @method getSurveyByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Answer)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getAnswerByQuestionId($idQuestion, $idProject) {
        return Survey::getAnswerByQuestionId($idQuestion, $idProject);
    }
    
    /**
     // @method getGradeByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Grade)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getGradeByQuestionId($idQuestion, $idProject) {
        return Survey::getGradeByQuestionId($idQuestion, $idProject);
    }
    
    /**
     // @method getCommentByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Comment)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getCommentByQuestionId($idQuestion, $idProject) {
        return Survey::getCommentByQuestionId($idQuestion, $idProject);
    }
    
    /**
     // @method getQuestionByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Question)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getQuestionByQuestionId($idQuestion, $idProject) {
        return Survey::getQuestionByQuestionId($idQuestion, $idProject);
    }
}
