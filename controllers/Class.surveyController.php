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
}
