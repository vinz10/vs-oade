<?php

/**
 * Class homeController
 */
class homeController extends Controller {

    /**
      // @method home()
      // @desc Method that controls the page 'home.php'
     */
    function home() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }

}