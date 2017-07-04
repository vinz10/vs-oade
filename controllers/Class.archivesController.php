<?php
/**
 * Class archivesController
 */
class archivesController extends Controller {
    
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
    // @method archive()
    // @desc Method that archive a project
    */
    function archive() {
        // Get the project id
        $projectId = intval($_GET['id']);
        
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
            
            // Create the new archive
            $archive = new Archive(null, $townName, $projectName, $projectDescription, $projectPoLastname, $projectPoFirstname,
                    $questionId, $answer, $grade1, $grade2, $openQuestion, $comment, $projectId, $townId);
            
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