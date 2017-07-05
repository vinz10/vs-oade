<?php

require_once '../models/Class.Town.php';
require_once '../database/Class.SqlConnection.php';

use PHPUnit\Framework\TestCase;

/**
 * Class TownTest
 */
class TownTest extends TestCase {

    /**
      // @testmethod testGetAllTown()
      // @desc Test Method that check the get all the town from the DB
     */
    public function testGetAllTown() {
        $Towns = Town::getAllTown();
        $this->assertEquals(Town::getAllTown(), $Towns);
    }

    /**
      // @testmethod testGetTownById()
      // @desc Test Method that check the get a town by the idTown from the DB
     */
    public function testGetTownById() {
        $town = new Town(1, "Agarn", "Agarn", "Agarn", "Agarn");
        $this->assertEquals(Town::getTownById(1), $town);
    }

    /**
      // @testmethod testGetTownByIdFalse()
      // @desc Test Method that check the get a town by the wrong idTown from the DB
     */
    public function testGetTownByIdFalse() {
        $this->assertFalse(Town::getTownById(-1));
    }

    /**
      // @testmethod testConnect()
      // @desc Test Method that check the connect a normal user by the townName and password
     */
    public function testConnect() {
        $town = new Town(1, "Agarn", "Agarn", "Agarn", "Agarn");
        $this->assertEquals(Town::connect('Agarn', 'Agarn'), $town);
    }

    /**
      // @testmethod testConnectFalse()
      // @desc Test Method that check the connect a normal user by the townName and wrong password
     */
    public function testConnectFalse() {
        $this->assertFalse(Town::connect('Agarn', 'WrongPassword'));
    }

    /**
      // @testmethod testConnect1()
      // @desc Test Method that check the connect an elected user by the townName and password
     */
    public function testConnect1() {
        $town = new Town(1, "Agarn", "Agarn", "Agarn", "Agarn");
        $this->assertEquals(Town::connect1('Agarn', 'Agarn'), $town);
    }

    /**
      // @testmethod testConnect1False()
      // @desc Test Method that check the connect an elected user by the townName and wrong password
     */
    public function testConnect1False() {
        $this->assertFalse(Town::connect1('Agarn', 'WrongPassword'));
    }

    /**
      // @testmethod testConnect2()
      // @desc Test Method that check the connect an administrator by the townName and password
     */
    public function testConnect2() {
        $town = new Town(1, "Agarn", "Agarn", "Agarn", "Agarn");
        $this->assertEquals(Town::connect2('Agarn', 'Agarn'), $town);
    }

    /**
      // @testmethod testConnect2False()
      // @desc Test Method that check the connect an administrator by the townName and wrong password
     */
    public function testConnect2False() {
        $this->assertFalse(Town::connect2('Agarn', 'WrongPassword'));
    }

}