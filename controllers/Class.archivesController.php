<?php

/**
 * Class archivesController
 */
class archivesController extends Controller {

    /**
      // @method project()
      // @desc Method to load the page 'project.php'
     */
    function project() {

        // Initialization of variables
        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';

        // Get the idProject
        $this->vars['idProject'] = intval($_GET['id']);
    }

    /**
      // @method getArchiveProjectsByIdTown()
      // @desc Method that return all archive projects By idTown
      // @param int $idTown
      // @return Projects
     */
    public static function getArchiveProjectsByIdTown($idTown) {
        try {
            return Archive::getArchiveProjectsByIdTown($idTown);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method getArchiveProjectsByIdProject()
      // @desc Method that return all archive projects By idProject
      // @param int $idProject
      // @return Projects
     */
    public static function getArchiveProjectsByIdProject($idProject) {
        try {
            return Archive::getArchiveProjectsByIdProject($idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
      // @method archive()
      // @desc Method that archive a project
     */
    function archive() {

        // Get the project id
        $projectId = intval($_GET['id']);

        // Get the langage of the session
        $lang = $_SESSION['lang'];

        // Get the data
        try {
            $project = Project::getProjectById($projectId);
            $surveys = Survey::getSurveysByProjectId($projectId);
            $townName = Town::getTownById($project->getTownId())->getTownName();
            $townId = Town::getTownById($project->getTownId())->getId();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $projectName = $project->getName();
        $projectDescription = $project->getDescription();
        $projectPoLastname = $project->getPoLastname();
        $projectPoFirstname = $project->getPoFirstname();

        if($surveys) {
            foreach ($surveys as $survey) {
                $questionId = $survey->getQuestionId();
                $answer = $survey->getAnswer();
                $grade1 = $survey->getGrade1();
                $grade2 = $survey->getGrade2();
                $openQuestion = $survey->getOpenQuestion();
                $comment = $survey->getComment();
                $questionAPI = json_decode(file_get_contents("http://localhost/API_vs-oade/vs-oade_api.php?action=get_question_by_id&id=$questionId"), true);

                if ($lang == 'fr') {
                    $question = $questionAPI['questionFR'];
                    $questionComment = $questionAPI['questionCommentFR'];
                } elseif ($lang == 'de') {
                    $question = $questionAPI['questionDE'];
                    $questionComment = $questionAPI['questionCommentDE'];
                }

                // Create the new archive
                $archive = new Archive(null, $townName, $projectName, $projectDescription, $projectPoLastname, $projectPoFirstname, 
                        $questionId, $answer, $grade1, $grade2, $openQuestion, $comment, $projectId, $townId, $question, $questionComment);

                try {
                    // Insert the new archive
                    $archive->insertArchive();
                    $_SESSION['msg'] = MSG_INSERT;
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                    exit;
                }
            }
        }
        else {
            $_SESSION['msgError'] = MSG_NO_SURVEYS;
        }
        $this->redirect('login', 'sprojects');
    }

    /**
      // @method delete()
      // @desc Method that delete an archive
     */
    function delete() {
        // Get the project id
        $idProject = intval($_GET['id']);

        try {
            Archive::deleteArchive($idProject);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $this->redirect('login', 'archives');
        $_SESSION['msg'] = MSG_DELETE;
    }

}