<?php

/**
 * Class projectsController
 */
class projectsController extends Controller {

    /**
      // @method manual()
      // @desc Method to load the page 'manual.php'
     */
    function manual() {
        
    }

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
      // @desc Method that return all projects By idTown
      // @param int $idTown
      // @return Projects
     */
    public static function getProjectsByIdTown($idTown) {
        try {
            return Project::getProjectsByIdTown($idTown);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method notDeleted()
      // @desc Method that check if a project is deleted or not by idProject
      // @param int $idProject
      // @return boolean
     */
    public static function notDeleted($idProject) {
        try {
            return Project::notDeleted($idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
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
        } else {
            $idProject = null;
        }

        // Get the data for the file
        $dir = "uploads/" . $idProject;
        $target_file = basename($_FILES["file"]["name"]);
        $file = $dir . '_file.' . pathinfo($target_file,PATHINFO_EXTENSION);
        
        // Create the new project
        $project = new Project($idProject, $name, $description, $poLastname, $poFirstname, $townId);

        try {
            // Check if the name of the project already exists
            if ($project->existProject($idProject, $name, $townId)) {
                if ($idProject == null) {
                    $_SESSION['msg'] = MSG_PROJECT_EXIST;
                    $this->redirect('projects', 'phase0');
                } else {
                    // Upload file
                    if (pathinfo($target_file,PATHINFO_EXTENSION) == "pdf") {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
                    }
                    
                    // Update the project
                    $project->updateProject($idProject);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase0?id=' . $idProject);
                }
            } else {
                // Upload file
                if (pathinfo($target_file,PATHINFO_EXTENSION) == "pdf") {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $file);
                }
              
                // Save new project into the db
                $project->insertProject();
                $this->redirect('projects', 'projects');
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    /**
      // @method download()
      // @desc Method to download the complementary file.
     */
    function download() {

        $projectId = intval($_GET['id']);
        $file = $projectId . '_file.pdf';

        ignore_user_abort(true);
        
        // disable the time limit for this script
        set_time_limit(0); 

        $path = "uploads/";

        // simple file name validation
        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $file); 
        // Remove (more) invalid characters
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); 

        $fullPath = $path . $dl_file;

        if ($fd = fopen($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
                    break;
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
                    break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private");
            while (!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose($fd);

        $this->redirect('projects', 'project?id=' . $projectId);
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
            $survey = new Survey(null, $question["id"], $answer, -1, -1, null, null, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the answer
                    $survey->updateAnswer($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase1?id=' . $projectId);
                } else {
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
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], $answer, $grade, -1, null, null, $projectId);

            try {
                // Check if the grade1 already exists
                if ($survey->existGrade1($question["id"], $projectId)) {
                    // Update the grade1
                    $survey->updateGrade1($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase2?id=' . $projectId);
                } else {
                    // Update the grade1
                    $survey->updateGrade1($projectId, $question["id"]);
                    $this->redirect('projects', 'phase3?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], $answer, -1, -1, null, null, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the answer
                    $survey->updateAnswer($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase3?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'phase4?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], null, -1, $grade, null, null, $projectId);

            try {
                // Check if the grade2 already exists
                if ($survey->existGrade2($question["id"], $projectId)) {
                    // Update the grade2
                    $survey->updateGrade2($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase4?id=' . $projectId);
                } else {
                    // Update the grade2
                    $survey->updateGrade2($projectId, $question["id"]);
                    $this->redirect('projects', 'phase5?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], null, $grade, -1, null, null, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the grade1
                    $survey->updateGrade1($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase4?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'phase5?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], $answer, -1, -1, null, null, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the answer
                    $survey->updateAnswer($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase5?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'phase6?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], $answer, -1, -1, null, null, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the answer
                    $survey->updateAnswer($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase5?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'phase6?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], null, -1, -1, null, $comment, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the comment
                    $survey->updateComment($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase6?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'project?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
            $survey = new Survey(null, $question["id"], null, -1, -1, null, $comment, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($question["id"], $projectId)) {
                    // Update the comment
                    $survey->updateComment($projectId, $question["id"]);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase6?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'project?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        endforeach;

        // Initialization of variables
        $i = 100;

        for ($j = 0; $j < 9; $j++) :

            // Get data posted by the form
            $i++;
            $question = $_POST['question' . $i];
            $comment = $_POST['comment' . $i];
            $idQuestion = '10.' . ($j + 1);

            // Create the new survey
            $survey = new Survey(null, $idQuestion, null, -1, -1, $question, $comment, $projectId);

            try {
                // Check if the survey already exists
                if ($survey->existSurvey($idQuestion, $projectId)) {
                    // Update the survey
                    $survey->updateSurvey($projectId, $idQuestion);
                    $_SESSION['msgSuccess'] = MSG_MODIF;
                    $this->redirect('projects', 'phase6?id=' . $projectId);
                } else {
                    // Insert the new survey
                    $survey->insertSurvey();
                    $this->redirect('projects', 'project?id=' . $projectId);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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
                try {
                    $project = Project::getProjectById($id_Project);
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
                if ($project) {
                    $this->data['idProject'] = $project->getId();
                    $this->data['name'] = $project->getName();
                    $this->data['description'] = $project->getDescription();
                    $this->data['poLastname'] = $project->getPoLastname();
                    $this->data['poFirstname'] = $project->getPoFirstname();
                    $this->data['town_idTown'] = $project->getTownId();
                } else {
                    $this->redirect('error', 'http404');
                }
            }
        } else {
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

        $file = "uploads/" . $idProject . '_file.pdf';
        
        unlink($file);
        
        try {
            Project::deleteProject($idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $this->redirect('login', 'sprojects');
    }

}