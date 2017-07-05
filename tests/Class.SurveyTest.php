<?php

require_once '../models/Class.Survey.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class SurveyTest
 */
class SurveyTest extends TestCase {

    /**
      // @testmethod testGetGrade1ByQuestionId()
      // @desc Test Method that check the get a survey by the idQuestion and idProject from the DB (Check Grade1)
     */
    public function testGetGrade1ByQuestionId() {
        $survey = new Survey(114, "2.1", "test", 0, 0, "", "", 3);
        $this->assertEquals(Survey::getGrade1ByQuestionId("2.1", 3), $survey);
    }

    /**
      // @testmethod testGetGrade1ByQuestionIdFalse()
      // @desc Test Method that check the get a survey by the wrong idQuestion and wrong idProject from the DB (Check Grade1)
     */
    public function testGetGrade1ByQuestionIdFalse() {
        $this->assertFalse(Survey::getGrade1ByQuestionId("0.0", -1));
    }

    /**
      // @testmethod testGetGrade2ByQuestionId()
      // @desc Test Method that check the get a survey by the idQuestion and idProject from the DB (Check Grade2)
     */
    public function testGetGrade2ByQuestionId() {
        $survey = new Survey(114, "2.1", "test", 0, 0, "", "", 3);
        $this->assertEquals(Survey::getGrade2ByQuestionId("2.1", 3), $survey);
    }

    /**
      // @testmethod testGetGrade2ByQuestionIdFalse()
      // @desc Test Method that check the get a survey by the wrong idQuestion and wrong idProject from the DB (Check Grade2)
     */
    public function testGetGrade2ByQuestionIdFalse() {
        $this->assertFalse(Survey::getGrade2ByQuestionId("0.0", -1));
    }

    /**
      // @testmethod testGetAnswerByQuestionId()
      // @desc Test Method that check the get a survey by the idQuestion and idProject from the DB (Check Answer)
     */
    public function testGetAnswerByQuestionId() {
        $survey = new Survey(107, "1.1", "test", -1, -1, "", "", 3);
        $this->assertEquals(Survey::getAnswerByQuestionId("1.1", 3), $survey);
    }

    /**
      // @testmethod testGetAnswerByQuestionIdFalse()
      // @desc Test Method that check the get a survey by the wrong idQuestion and wrong idProject from the DB (Check Answer)
     */
    public function testGetAnswerByQuestionIdFalse() {
        $this->assertFalse(Survey::getAnswerByQuestionId("0.0", -1));
    }

    /**
      // @testmethod testGetCommentByQuestionId()
      // @desc Test Method that check the get a survey by the idQuestion and idProject from the DB (Check Comment)
     */
    public function testGetCommentByQuestionId() {
        $survey = new Survey(145, "8.1", "", -1, -1, "", "test", 3);
        $this->assertEquals(Survey::getCommentByQuestionId("8.1", 3), $survey);
    }

    /**
      // @testmethod testGetCommentByQuestionIdFalse()
      // @desc Test Method that check the get a survey by the wrong idQuestion and wrong idProject from the DB (Check Comment)
     */
    public function testGetCommentByQuestionIdFalse() {
        $this->assertFalse(Survey::getCommentByQuestionId("0.0", -1));
    }

    /**
      // @testmethod testGetQuestionByQuestionId()
      // @desc Test Method that check the get a survey by the idQuestion and idProject from the DB (Check Question)
     */
    public function testGetQuestionByQuestionId() {
        $survey = new Survey(151, "10.1", "", -1, -1, "test", "test", 3);
        $this->assertEquals(Survey::getQuestionByQuestionId("10.1", 3), $survey);
    }

    /**
      // @testmethod testGetQuestionByQuestionIdFalse()
      // @desc Test Method that check the get a survey by the wrong idQuestion and wrong idProject from the DB (Check Question)
     */
    public function testGetQuestionByQuestionIdFalse() {
        $this->assertFalse(Survey::getQuestionByQuestionId("0.0", -1));
    }

    /**
      // @testmethod testGetSurveysByProjectId()
      // @desc Test Method that check the get all the surveys by the idProject from the DB
     */
    public function testGetSurveysByProjectId() {
        $Surveys = Survey::getSurveysByProjectId(3);
        $this->assertEquals(Survey::getSurveysByProjectId(3), $Surveys);
    }

    /**
      // @testmethod testExistSurveyFalse()
      // @desc Test Method that check if a survey already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistSurveyFalse() {
        $this->assertFalse(Survey::existSurvey("0.0", -1));
    }

    /**
      // @testmethod testExistSurveyTrue()
      // @desc Test Method that check if a survey already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistSurveyTrue() {
        $this->assertTrue(Survey::existSurvey("1.1", 3));
    }

    /**
      // @testmethod testExistGrade1False()
      // @desc Test Method that check if a grade1 already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistGrade1False() {
        $this->assertFalse(Survey::existGrade1("0.0", -1));
    }

    /**
      // @testmethod testExistGrade1True()
      // @desc Test Method that check if a grade1 already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistGrade1True() {
        $this->assertTrue(Survey::existGrade1("2.1", 3));
    }

    /**
      // @testmethod testExistGrade2False()
      // @desc Test Method that check if a grade2 already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistGrade2False() {
        $this->assertFalse(Survey::existGrade2("0.0", -1));
    }

    /**
      // @testmethod testExistGrade2True()
      // @desc Test Method that check if a grade2 already exists by the wrong idQuestion and wrong idProject
     */
    public function testExistGrade2True() {
        $this->assertTrue(Survey::existGrade2("2.1", 3));
    }

}