<?php

require_once '../models/Class.Archive.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class ArchiveTest
 */
class ArchiveTest extends TestCase {

    /**
      // @testmethod testExistArchiveFalse()
      // @desc Test Method that check if check if an archive not already exists by idProject
     */
    public function testExistArchiveFalse() {
        $this->assertFalse(Archive::existArchive(-1));
    }

    /**
      // @testmethod testExistArchiveTrue()
      // @desc Test Method that check if an archive already exists by idProject
     */
    public function testExistArchiveTrue() {
        $this->assertTrue(Archive::existArchive(3));
    }

    /**
      // @testmethod testGetArchiveProjectsByIdTown()
      // @desc Method that check the get all the archive projects by the idTown from the DB
     */
    public function testGetArchiveProjectsByIdTown() {
        $Archives = Archive::getArchiveProjectsByIdTown(1);
        $this->assertEquals(Archive::getArchiveProjectsByIdTown(1), $Archives);
    }

    /**
      // @testmethod testGetArchiveProjectsByIdProject()
      // @desc Method that check the get all the archive projects by the idProject from the DB
     */
    public function testGetArchiveProjectsByIdProject() {
        $Archives = Archive::getArchiveProjectsByIdProject(3);
        $this->assertEquals(Archive::getArchiveProjectsByIdProject(3), $Archives);
    }

}