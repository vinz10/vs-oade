<?php

/**
 * Class projectsController
 */
class surveyController extends Controller {

    /**
      // @method getSurveyByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (check Answer)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getAnswerByQuestionId($idQuestion, $idProject) {
        try {
            return Survey::getAnswerByQuestionId($idQuestion, $idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getGrade1ByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (check Grade1)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getGrade1ByQuestionId($idQuestion, $idProject) {
        try {
            return Survey::getGrade1ByQuestionId($idQuestion, $idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getGrade2ByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (check Grade2)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getGrade2ByQuestionId($idQuestion, $idProject) {
        try {
            return Survey::getGrade2ByQuestionId($idQuestion, $idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getCommentByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (check Comment)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getCommentByQuestionId($idQuestion, $idProject) {
        try {
            return Survey::getCommentByQuestionId($idQuestion, $idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getQuestionByQuestionId()
      // @desc Method that get a survey by the idQuestion and idProject from the DB (check Question)
      // @param int $idQuestion
      // @param int $idProject
      // @return survey
     */
    public static function getQuestionByQuestionId($idQuestion, $idProject) {
        try {
            return Survey::getQuestionByQuestionId($idQuestion, $idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}