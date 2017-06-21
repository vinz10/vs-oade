<!-- Custom-X-JavaScript -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        
<!-- Custom-Stylesheet-Links --> 
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all"> 
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">  
<link rel="stylesheet" href="../css/animate.css" type="text/css" media="all">

<!-- Fonts -->	 
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" type="text/css">	 
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700" type="text/css">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">

<?php
// Initialization of variables
$msg = $this->vars['msg'];
$msgSuccess = $this->vars['msgSuccess'];
$project = new Project($this->data ['idProject'], $this->data ['name'], $this->data ['description'], $this->data ['poLastname'], $this->data ['poFirstname'], $this->data ['town_idTown']);	
$title = $project->getName();
$login = $_SESSION ['login'];

// Template CSS
ob_start();
?>


<!-- Phase 6 - Optimization - Suggestion -->
<div class="reg agileits w3layouts">
    <div class="container">
        <div class="register agileits w3layouts">
         
            <!-- Menu -->
            <div class="submit wow agileits w3layouts">
                <input type="button" name="back" class="popup-with-zoom-anim agileits w3layouts" onclick="location.href='<?php echo URL_DIR . 'projects/project?id=' . $project->getId(); ?>'" value="<?php echo PROJECT_PROJECT; ?>">
            </div>   

            <div class="register agileits w3layouts">
                <div class="page">
                    <ul class="pagination agileits w3layouts">
                        <li class="agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase0?id=' . $project->getId(); ?>">0</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase1?id=' . $project->getId(); ?>">1</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase2?id=' . $project->getId(); ?>">2</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>">3</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase4?id=' . $project->getId(); ?>">4</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>">5</a></li>
                        <li class="active agileits w3layouts"><a href="#">6<span class="sr-only agileits w3layouts">(current)</span></a></li>                 
                        <li class="disabled agileits w3layouts"><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Optimization - Suggestion -->
            <h2><?php echo PHASE6_OPTIMIZATION_SUGGESTION; ?></h2>
            
            <form action="<?php echo URL_DIR . 'projects/validatePhase6?id=' . $project->getId(); ?>" method="post">
                
                <!-- Alert Message -->
                <?php if (!empty($msgSuccess)) : ?>
                    <div class="members wow agileits w3layouts slideInLeft">
                        <div class="alert agileits w3layouts alert-success" role="alert">
                            <strong><?php echo MSG_SUCCESS; ?></strong> <?php echo ' ' . $msgSuccess; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <h4 class="members wow agileits w3layouts slideInLeft"><?php echo PHASE6_SUGGESTION; ?></h4>
                <?php
                $app_questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=8');
                $app_questions = json_decode($app_questions, true);
                $i = 0;
                    
                foreach ($app_questions as $question): $i++; ?>
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' '. $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php echo $question["question"] ?>
                        </div>
                        <div class="dropdown-button agileits w3layouts">
                            <textarea name="<?php echo 'comment' . $i; ?>" <?php echo ' id="comment' . $i . '" '?> class="dropdown agileits w3layouts" placeholder="<?php echo PHASE6_COMMENT; ?>"><?php 
                                $survey = surveyController::getCommentByQuestionId($question["id"], $project->getId());
                                if($survey) {
                                    echo $survey->getComment();
                                }
                            ?></textarea>
                        </div>
                    </div>  
                </div>

                <?php endforeach; ?>
                
                <h4 class="members wow agileits w3layouts slideInLeft"><?php echo PHASE6_OPTIMIZATION; ?></h4>
                <?php
                $app_questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=9');
                $app_questions = json_decode($app_questions, true);
                $i = 50;
                    
                foreach ($app_questions as $question): $i++; ?>
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' '. $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php echo $question["question"] ?>
                        </div>
                        <div class="dropdown-button agileits w3layouts">
                            <textarea name="<?php echo 'comment' . $i; ?>" <?php echo ' id="comment' . $i . '" '?> class="dropdown agileits w3layouts" placeholder="<?php echo PHASE6_COMMENT; ?>"><?php 
                                $survey = surveyController::getCommentByQuestionId($question["id"], $project->getId());
                                if($survey) {
                                    echo $survey->getComment();
                                }
                            ?></textarea>
                        </div>
                    </div>  
                </div>

                <?php endforeach; ?>
                
                <h4 class="members wow agileits w3layouts slideInLeft"><?php echo PHASE6_OPENQUESTION; ?></h4>
                <?php
                $i = 100;
                    
                for($j = 0; $j < 4; $j++) : 
                    $i++; 
                    $idQuestion = '10.' . ($j+1);
                ?>
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' ' . $idQuestion; ?></h4>
                        <div class="dropdown-button agileits w3layouts">
                            <textarea name="<?php echo 'question' . $i; ?>" <?php echo ' id="question' . $i . '" '?> class="dropdown agileits w3layouts" placeholder="<?php echo PHASE6_QUESTION; ?>"><?php 
                                $survey = surveyController::getQuestionByQuestionId($idQuestion, $project->getId());
                                if($survey) {
                                    echo $survey->getOpenQuestion();
                                }
                            ?></textarea>
                        </div>
                        <div class="dropdown-button agileits w3layouts">
                            <textarea name="<?php echo 'comment' . $i; ?>" <?php echo ' id="comment' . $i . '" '?> class="dropdown agileits w3layouts" placeholder="<?php echo PHASE6_COMMENT; ?>"><?php 
                                $survey = surveyController::getCommentByQuestionId($idQuestion, $project->getId());
                                if($survey) {
                                    echo $survey->getComment();
                                }
                            ?></textarea>
                        </div>
                    </div>  
                </div>

                <?php endfor; ?>

                <div class="submit wow agileits w3layouts slideInLeft">
                    <input type="submit" name="Submit" class="popup-with-zoom-anim agileits w3layouts" value="<?php echo PHASE1_VALIDATE; ?>">
                    <input type="button" name="cancel" class="popup-with-zoom-anim agileits w3layouts" onclick="location.href='<?php echo URL_DIR . 'projects/project?id=' . $project->getId(); ?>'" value="<?php echo PHASE0_PROJECT_CANCEL; ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom-JavaScript-File-Links -->
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>

<!-- Slider-JavaScript -->
<script src="../js/responsiveslides.min.js"></script>
<script>
    $(function () {
        $("#slider1, #slider2, #slider3, #slider4").responsiveSlides({
            auto: true,
            nav: true,
            speed: 1500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>

<!-- Slide-To-Top JavaScript (No-Need-To-Change) -->
<script type="text/javascript">
    $(document).ready(function() {
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 100,
            easingType: 'linear'
        };
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" class="agileits w3layouts" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>

<!-- Smooth-Scrolling-JavaScript -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll, .navbar li a, .footer li a").click(function(event){
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>

<?php
// Unset variables
unset($_SESSION['msg']);
unset($_SESSION['msgSuccess']);

// Template CSS
$content = ob_get_clean();
require 'views/template.php';