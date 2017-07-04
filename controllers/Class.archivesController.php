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
        
        $this->vars['idProject'] = intval($_GET['id']);
    }	
    
    /**
    // @method getArchiveProjectsByIdTown()
    // @desc Method that return all archive projects By townId
    // @param int $idTown
    // @return Projects
    */
    public static function getArchiveProjectsByIdTown($idTown) {
        return Archive::getArchiveProjectsByIdTown($idTown);
    } 
    
    /**
    // @method getArchiveProjectsByIdProject()
    // @desc Method that return all archive projects By projectId
    // @param int $idProject
    // @return Projects
    */
    public static function getArchiveProjectsByIdProject($idProject) {
        return Archive::getArchiveProjectsByIdProject($idProject);
    } 
    
    /**
    // @method archive()
    // @desc Method that archive a project
    */
    function archive() {
        
        // Get the project id
        $projectId = intval($_GET['id']);
        
        // Get the lang and login
        $lang = $_SESSION['lang'];
        
        // Get the data
        $project = Project::getProjectById($projectId);
        $surveys = Survey::getSurveysByProjectId($projectId);
        $townName = Town::getTownById($project->getTownId())->getTownName();
        $townId = Town::getTownById($project->getTownId())->getId();
        $projectName = $project->getName();
        $projectDescription = $project->getDescription();
        $projectPoLastname = $project->getPoLastname();
        $projectPoFirstname = $project->getPoFirstname();
        
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
            }
            elseif ($lang == 'de') {
                $question = $questionAPI['questionDE'];
                $questionComment = $questionAPI['questionCommentDE'];
            }

            // Create the new archive
            $archive = new Archive(null, $townName, $projectName, $projectDescription, $projectPoLastname, $projectPoFirstname,
                    $questionId, $answer, $grade1, $grade2, $openQuestion, $comment, $projectId, $townId, $question, $questionComment);
            
            // Insert the new archive
            $archive->insertArchive();
        }
        
        $this->redirect('login', 'sprojects');
        $_SESSION['msg'] = MSG_INSERT;
    }
    
    /**
    // @method delete()
    // @desc Method that delete a project
    */
    function delete() {
        // Get the project id
        $idProject = intval($_GET['id']);
        
        Archive::deleteArchive($idProject);
        
        $this->redirect('login', 'archives');
        $_SESSION['msg'] = MSG_DELETE;
    }
}