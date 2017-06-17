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
    
    function phase0() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
    }	
    
    /**
     // @method newproject()
     // @desc Method for the registration of a user
     */
    function newproject() {

        // Get data posted by the form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $poLastname = $_POST['poLastname'];
        $poFirstname = $_POST['poFirstname'];
        
        // Get the town Id
        $login = $_SESSION ['login'];
        $townId = $login->getId();

        // Create the new project
        $project = new Project($name, $description, $poLastname, $poFirstname, $townId);
        
        // Check if the project already exists
        if ($project->existProject($name)) {
            $_SESSION['msg'] = MSG_PROJECT_EXIST;
            $_SESSION['persistence'] = array($name, $description, $poLastname, $poFirstname);
            $this->redirect('projects', 'phase0');
        }
        else {
            // Save new project into the db
            $project->insertProject();
            unset($_SESSION['persistence']);
            $this->redirect('projects', 'projects');
        }
    }
    
    /**
    // @method getProjectsByIdTown()
    // @desc Method that return all projects By townId
    // @return Projects
    */
    public static function getProjectsByIdTown($idTown) {
        return Project::getProjectsByIdTown($idTown);
    } 
}
