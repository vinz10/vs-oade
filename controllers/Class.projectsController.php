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
        $project = new Project(null, $name, $description, $poLastname, $poFirstname, $townId);
        
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
     // @method validatePhase1()
     // @desc Method for the insertion of phase 1
     */
    function validatePhase1() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=1');
        $app_questions = json_decode($questions, true);
        $i = 0;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $answer = $_POST['answer' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], $answer, -1, null, null, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the answer
                $survey->updateAnswer($projectId, $question["id"]);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
            }

        endforeach;
        
        // Redirection
        $this->redirect('projects', 'phase2?id=' . $projectId);
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
     // @method validatePhase2()
     // @desc Method for the insertion of phase 2
     */
    function validatePhase2() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
        $app_questions = json_decode($questions, true);
        $i = 0;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $grade = $_POST['grade' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], $answer, $grade, null, null, $projectId);
            
            // Update the grade
            $survey->updateGrade($projectId, $question["id"]);

        endforeach;
        
        // Redirection
        $this->redirect('projects', 'phase3?id=' . $projectId);
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
     // @method validatePhase3()
     // @desc Method for the insertion of phase 3
     */
    function validatePhase3() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=3');
        $app_questions = json_decode($questions, true);
        $i = 0;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $answer = $_POST['answer' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], $answer, -1, null, null, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the answer
                $survey->updateAnswer($projectId, $question["id"]);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
            }

        endforeach;
        
        // Redirection
        $this->redirect('projects', 'phase4?id=' . $projectId);
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
     // @method validatePhase4()
     // @desc Method for the insertion of phase 4
     */
    function validatePhase4() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=4');
        $app_questions = json_decode($questions, true);
        $i = 0;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $grade = $_POST['grade' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], null, $grade, null, null, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the answer
                $survey->updateGrade($projectId, $question["id"]);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
            }

        endforeach;
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=5');
        $app_questions = json_decode($questions, true);
        $i = 50;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $grade = $_POST['grade' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], null, $grade, null, null, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the answer
                $survey->updateGrade($projectId, $question["id"]);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
            }

        endforeach;
        
        // Redirection
        $this->redirect('projects', 'phase5?id=' . $projectId);
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
    // @param int $idTown
    // @return Projects
    */
    public static function getProjectsByIdTown($idTown) {
        return Project::getProjectsByIdTown($idTown);
    } 
}
