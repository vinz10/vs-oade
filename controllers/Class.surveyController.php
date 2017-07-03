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
     // @method getGrade1ByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Grade1)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getGrade1ByQuestionId($idQuestion, $idProject) {
        return Survey::getGrade1ByQuestionId($idQuestion, $idProject);
    }
    
    /**
     // @method getGrade2ByQuestionId()
     // @desc Method that get a survey by the questionId from the DB (check Grade2)
     // @param int $idQuestion
     // @param int $idProject
     // @return survey
     */
    public static function getGrade2ByQuestionId($idQuestion, $idProject) {
        return Survey::getGrade2ByQuestionId($idQuestion, $idProject);
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
