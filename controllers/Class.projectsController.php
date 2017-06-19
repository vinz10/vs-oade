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
    
    /**
     // @method project()
     // @desc Method to load the project.php page with the right Project (by the id).
     */
    function project(){
        
        $this->getProject();
    }
    
    /**
     // @method phase0()
     // @desc Method for the phase 0
     */
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
        if ($project->existProject($name, $townId)) {
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
     // @method phase1()
     // @desc Method for the phase 1
     */
    function phase1(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    /**
     // @method phase2()
     // @desc Method for the phase 2
     */
    function phase2(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    /**
     // @method phase3()
     // @desc Method for the phase 3
     */
    function phase3(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    /**
     // @method phase4()
     // @desc Method for the phase 4
     */
    function phase4(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    /**
     // @method phase5()
     // @desc Method for the phase 5
     */
    function phase5(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    /**
     // @method phase6()
     // @desc Method for the phase 6
     */
    function phase6(){
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['persistence'] = isset($_SESSION['persistence']) ? $_SESSION['persistence'] : array('','','','');
        
        $this->getProject();
    }
    
    private function getProject() {
        
        // Get the id of the project
        if (isset($_GET['id'])) {
            $id_Project = intval($_GET['id']);
            if ($id_Project != 0) {
                $project = Project::getProjectById($id_Project);
                if($project){
                    $this->data['idProject'] = $project->getId();
                    $this->data['name'] = $project->getName();
                    $this->data['description'] = $project->getDescription();
                    $this->data['poLastname'] = $project->getPoLastname();
                    $this->data['poFirstname'] = $project->getPoFirstname();
                    $this->data['town_idTown'] = $project->getTownId();
                }
                else {
                    $this->redirect('error', 'http404');
                }
            }
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
