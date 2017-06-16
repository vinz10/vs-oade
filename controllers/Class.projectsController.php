<?php
/**
 * Class projectsController
 */
class projectsController extends Controller {

    /**
     // @method projects()
     // @desc Method that controls the page 'projects.php'
     */
    function projects() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
    }	
}
