<?php

/**
 * Class loginController
 */
class loginController extends Controller {

    /**
      // @method connection()
      // @desc Method for the connection of a normal user
     */
    function connection() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];

        try {
            // Load login from DB if exists
            $result = Town::connect($townName, $password);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        // Put the login in the session if exists or return error msg
        if (!$result) {
            $_SESSION['msg'] = MSG_INCORRECT_PWD;
            $this->redirect('login', 'login');
        } else {
            $_SESSION['login'] = $result;
            $this->redirect('', '');
        }
    }

    /**
      // @method connection1()
      // @desc Method for the connection of an elected user
     */
    function connection1() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];

        try {
            // Load login from DB if exists
            $result = Town::connect1($townName, $password);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        // Put the login in the session if exists or return error msg
        if (!$result) {
            $_SESSION['msg'] = MSG_INCORRECT_PWD;
            $this->redirect('login', 'login1');
        } else {
            $_SESSION['login1'] = $result;
            $this->redirect('', '');
        }
    }

    /**
      // @method connection2()
      // @desc Method for the connection of an administrator
     */
    function connection2() {

        // Get data posted by the form
        $townName = $_POST['townName'];
        $password = $_POST['password'];

        try {
            // Load login from DB if exists
            $result = Town::connect2($townName, $password);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        // Put the login in the session if exists or return error msg
        if (!$result) {
            $_SESSION['msg'] = MSG_INCORRECT_PWD;
            $this->redirect('login', 'login2');
        } else {
            $_SESSION['login2'] = $result;
            $this->redirect('', '');
        }
    }

    /**
      // @method initlogin()
      // @desc Method for the initlogin
     */
    function initlogin() {

        // If a login is active, no re-login
        if ($this->getLogin()) {
            $this->redirect('', '');
            exit;
        }

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      // @method login()
      // @desc Method for the login
     */
    function login() {

        // If a login is active, no re-login
        if ($this->getLogin()) {
            $this->redirect('', '');
            exit;
        }

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      // @method login1()
      // @desc Method for the login1
     */
    function login1() {

        // If a login is active, no re-login
        if ($this->getLogin()) {
            $this->redirect('', '');
            exit;
        }

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      // @method login2()
      // @desc Method for the login2
     */
    function login2() {

        // If a login is active, no re-login
        if ($this->getLogin()) {
            $this->redirect('', '');
            exit;
        }

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      //@method logout()
      // @desc Method for the logout of a user
     */
    function logout() {

        // Destroy the session
        $_SESSION["login"] = null;
        $_SESSION["login1"] = null;
        $_SESSION["login2"] = null;
        
        $this->redirect('', '');
    }

    /**
      // @method sprojects()
      // @desc Method for the sprojects
     */
    function sprojects() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgError'] = isset($_SESSION['msgError']) ? $_SESSION['msgError'] : '';
    }

    /**
      // @method archives()
      // @desc Method for the archives
     */
    function archives() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      // @method access()
      // @desc Method for the access
     */
    function access() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

    /**
      // @method modifAccess()
      // @desc Method for modifying the password
     */
    function modifAccess() {

        // Get data posted by the form
        $password = $_POST['password'];
        $electedPassword = $_POST['electedPassword'];
        $adminPassword = $_POST['adminPassword'];

        // Get the town Id
        $login2 = isset($_SESSION['login2']) ? $_SESSION['login2'] : null;

        $idTown = $login2->getId();
        $townName = $login2->getTownName();

        // Create the new town
        $town = new Town($idTown, $townName, $password, $electedPassword, $adminPassword);

        // Update the town
        try {
            $town->updateTown($idTown);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $_SESSION['msg'] = MSG_MODIF;
        $_SESSION['login2'] = $town;
        $this->redirect('login', 'access');
    }

    /**
      // @method getAllTowns()
      // @desc Method that return all Towns
      // @return Towns
     */
    public static function getAllTowns() {
        try {
            return Town::getAllTown();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getTownById()
      // @desc Method that get a town by the idTown from the DB
      // @param string $idTown
      // @return $town
     */
    public static function getTownById($idTown) {
        try {
            return Town::getTownById($idTown);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method existArchive()
      // @desc Method that check if an archive already exists by the idProject
      // @param int $idProject
      // @return boolean
     */
    public static function existArchive($idProject) {
        try {
            return Archive::existArchive($idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}