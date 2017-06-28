<?php
/**
 * Class projectsController
 */
class projectsController extends Controller {

    /**
     // @method manual()
     // @desc Method to load the page 'manual.php'
     */
    function manual() {}	
    
    /**
     // @method projects()
     // @desc Method to load the page 'projects.php'
     */
    function projects() {
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
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
    
    /**
     // @method project()
     // @desc Method to load the project.php page with the right Project (by the id).
     */
    function project() {
        
        // Get the project
        $this->getProject();
    }
    
    /**
     // @method phase0()
     // @desc Method to load the page 'phase0.php'
     */
    function phase0() {
        
        // Initialization 
        $this->init();
    }	
    
    /**
     // @method validatePhase0()
     // @desc Method for the validation of phase 0
     */
    function validatePhase0() {

        // Get data posted by the form
        $name = $_POST['name'];
        $description = $_POST['description'];
        $poLastname = $_POST['poLastname'];
        $poFirstname = $_POST['poFirstname'];
        
        // Get the town Id
        $login = $this->getLogin();
        $townId = $login->getId();
        
        // Get the id of the project
        if (isset($_GET['id'])) {
            $idProject = intval($_GET['id']);
        }
        else {
            $idProject = null;
        }

        // Create the new project
        $project = new Project($idProject, $name, $description, $poLastname, $poFirstname, $townId);
        
        // Check if the name of the project already exists
        if ($project->existProject($idProject, $name, $townId)) {
            if ($idProject == null) {
                $_SESSION['msg'] = MSG_PROJECT_EXIST;
                $this->redirect('projects', 'phase0');
                
            }
            else {
                // Update the project
                $project->updateProject($idProject);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase0?id=' . $idProject);
            }
        }
        else {
            // Save new project into the db
            $project->insertProject();
            $this->redirect('projects', 'projects');
        }
    }
    
    /**
     // @method phase1()
     // @desc Method to load the page 'phase1.php'
     */
    function phase1() {   
        
        // Initialization 
        $this->init();
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
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase1?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $login = isset($_SESSION['login']) ? $_SESSION['login'] : null;
                if ($login) {
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase1?id=' . $projectId); 
                } else {
                    $this->redirect('projects', 'phase2?id=' . $projectId);
                }
            }

        endforeach;
    }
    
    /**
     // @method phase2()
     // @desc Method to load the page 'phase2.php'
     */
    function phase2() {
        
        // Initialization 
        $this->init();
        
        // Check Rights
        $this->checkRights();
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
            
            // Check if the grade already exists
            if ($survey->existGrade($question["id"], $projectId)) {
                // Update the grade
                $survey->updateGrade($projectId, $question["id"]);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase2?id=' . $projectId);
            }
            else {
                // Update the grade
                $survey->updateGrade($projectId, $question["id"]);
                $this->redirect('projects', 'phase3?id=' . $projectId);
            }
            
        endforeach;
    }
    
    /**
     // @method phase3()
     // @desc Method to load the page 'phase3.php'
     */
    function phase3() { 
        
        // Initialization 
        $this->init();
        
        // Check Rights
        $this->checkRights();
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
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase3?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'phase4?id=' . $projectId);
            }

        endforeach;
    }
    
    /**
     // @method phase4()
     // @desc Method to load the page 'phase4.php'
     */
    function phase4() {
        
        // Initialization 
        $this->init();
        
        // Check Rights
        $this->checkRights();
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
                // Update the grade
                $survey->updateGrade($projectId, $question["id"]);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase4?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'phase5?id=' . $projectId);
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
                // Update the grade
                $survey->updateGrade($projectId, $question["id"]);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase4?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'phase5?id=' . $projectId);
            }

        endforeach;
    }
    
    /**
     // @method phase5()
     // @desc Method to load the page 'phase5.php'
     */
    function phase5() {  
        
        // Initialization 
        $this->init();
        
        // Check Rights
        $this->checkRights();
    }
    
    /**
     // @method validatePhase5()
     // @desc Method for the insertion of phase 5
     */
    function validatePhase5() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=6');
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
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase5?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'phase6?id=' . $projectId);
            }

        endforeach;
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=7');
        $app_questions = json_decode($questions, true);
        $i = 50;     
                    
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
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase5?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'phase6?id=' . $projectId);
            }

        endforeach;
    }
    
    /**
     // @method phase6()
     // @desc Method to load the page 'phase6.php'
     */
    function phase6() {  
        
        // Initialization
        $this->init();
        
        // Check Rights
        $this->checkRights();
    }
    
    /**
     // @method validatePhase6()
     // @desc Method for the insertion of phase 6
     */
    function validatePhase6() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=8');
        $app_questions = json_decode($questions, true);
        $i = 0;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $comment = $_POST['comment' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], null, -1, null, $comment, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the comment
                $survey->updateComment($projectId, $question["id"]);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase6?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'project?id=' . $projectId);
            }

        endforeach;
        
        // Initialization of variables
        $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=9');
        $app_questions = json_decode($questions, true);
        $i = 50;     
                    
        foreach ($app_questions as $question):
        
            // Get data posted by the form
            $i++;
            $comment = $_POST['comment' . $i];

            // Create the new survey
            $survey = new Survey(null, $question["id"], null, -1, null, $comment, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($question["id"], $projectId)) {
                // Update the comment
                $survey->updateComment($projectId, $question["id"]);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase6?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'project?id=' . $projectId);
            }

        endforeach;
        
        // Initialization of variables
        $i = 100;     
                    
        for ($j = 0; $j < 4; $j++) :
        
            // Get data posted by the form
            $i++;
            $question = $_POST['question' . $i];
            $comment = $_POST['comment' . $i];
            $idQuestion = '10.' . ($j+1);

            // Create the new survey
            $survey = new Survey(null, $idQuestion, null, -1, $question, $comment, $projectId);
            
            // Check if the survey already exists
            if ($survey->existSurvey($idQuestion, $projectId)) {
                // Update the survey
                $survey->updateSurvey($projectId, $idQuestion);
                $_SESSION['msgSuccess'] = MSG_MODIF;
                $this->redirect('projects', 'phase6?id=' . $projectId);
            }
            else {
                // Insert the new survey
                $survey->insertSurvey();
                $this->redirect('projects', 'project?id=' . $projectId);
            }

        endfor;
    }
    
    /**
    // @method init()
    // @desc Method that initializes the variables
    */
    private function init() {
        
        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['msgSuccess'] = isset($_SESSION['msgSuccess']) ? $_SESSION['msgSuccess'] : '';
        $this->getProject();
    }
    
    /**
    // @method checkRights()
    // @desc Method that check the user rights
    */
    private function checkRights() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : null;
        
        if ($login) {
            $_SESSION['msgError'] = MSG_NO_RIGHTS;
            $this->redirect('projects', 'project?id=' . $projectId);
        }
    }
    
    /**
    // @method getProject()
    // @desc Method that get the project if exist
    */
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
        else {
            $this->data['idProject'] = null;
            $this->data['name'] = null;
            $this->data['description'] = null;
            $this->data['poLastname'] = null;
            $this->data['poFirstname'] = null;
            $this->data['town_idTown'] = null;
        }
    }
    
    /**
    // @method delete()
    // @desc Method that delete a project
    */
    function delete() {
        
        
        
        // Get the project id
        $idProject = intval($_GET['id']);
        
        Project::deleteProject($idProject);
        
        $this->redirect('projects', 'projects');
    }
}