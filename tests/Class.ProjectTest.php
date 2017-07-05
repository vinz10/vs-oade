<?php

require_once '../models/Class.Project.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class ProjectTest
 */
class ProjectTest extends TestCase {

    /**
      // @testmethod testGetProjectById()
      // @desc Test Method that check the get a project by the idProject from the DB
     */
    public function testGetProjectById() {
        $project = new Project(3, "Projet Unit Tests", "Description", "Nom du po", "Prénom du po", 1);
        $this->assertEquals(Project::getProjectById(3), $project);
    }
    
    /**
      // @testmethod testGetProjectByIdFalse()
      // @desc Test Method that check the get a project by the wrong idProject from the DB
     */
    public function testGetProjectByIdFalse() {
        $this->assertFalse(Project::getProjectById(-1));
    }

    /**
      // @testmethod testGetProjectsByIdTown()
      // @desc Test Method that check the get all the projects by the idTown from the DB
     */
    public function testGetProjectsByIdTown() {
        $Projects = Project::getProjectsByIdTown(1);
        $this->assertEquals(Project::getProjectsByIdTown(1), $Projects);
    }

    /**
      // @testmethod testExistProjectFalse()
      // @desc Test Method that check if a project not already exists by the idProject, the name and the idTown
     */
    public function testExistProjectFalse() {
        $this->assertFalse(Project::existProject(-1, "WrongName", -1));
    }
    
    /**
      // @testmethod testExistProjectTrue()
      // @desc Test Method that check if a project already exists by the idProject, the name and the idTown
     */
    public function testExistProjectTrue() {
        $this->assertTrue(Project::existProject(3, "Projet Unit Tests", 1));
    }
    
    /**
      // @testmethod testExistProjectWithNullIdProject()
      // @desc Test Method that check if a project already exists by the idProject = null, the name and the idTown
     */
    public function testExistProjectWithNullIdProject() {
        $this->assertTrue(Project::existProject(null, "Projet Unit Tests", 1));
    }
    
    /**
      // @testmethod testNotDeletedFalse()
      // @desc Test Method that check if a project is deleted or not by the idProject
     */
    public function testNotDeletedFalse() {
        $this->assertFalse(Project::notDeleted(-1));
    }
    
    /**
      // @testmethod testNotDeletedTrue()
      // @desc Test Method that check if a project is deleted or not by the idProject
     */
    public function testNotDeletedTrue() {
        $this->assertTrue(Project::notDeleted(3));
    }
}

