<!-- Custom-X-JavaScript -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Custom-JavaScript-File-Link-Graph -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

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
$labels = array();
$valuesSocial = array();
$valuesEconomy = array();
$valuesEnvironment = array();
$allValues = array();

// Template CSS
ob_start();
?>

<!-- Phase 2 - Capital Gain -->
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
                        <li class="agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase1?id=' . $project->getId(); ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase0?id=' . $project->getId(); ?>">0</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase1?id=' . $project->getId(); ?>">1</a></li>
                        <li class="active agileits w3layouts"><a href="#">2<span class="sr-only agileits w3layouts">(current)</span></a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>">3</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase4?id=' . $project->getId(); ?>">4</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>">5</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase6?id=' . $project->getId(); ?>">6</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Capital Gain -->
            <h2><?php echo PHASE2_CAPITAL_GAIN; ?></h2>

            <form action="<?php echo URL_DIR . 'projects/validatePhase2?id=' . $project->getId(); ?>" method="post">

                <!-- Alert Message -->
                <?php if (!empty($msgSuccess)) : ?>
                    <div class="members wow agileits w3layouts slideInLeft">
                        <div class="alert agileits w3layouts alert-success" role="alert">
                            <strong><?php echo MSG_SUCCESS; ?></strong> <?php echo ' ' . $msgSuccess; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php
                $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
                $app_questions = json_decode($questions, true);
                $i = 0;
                
                foreach ($app_questions as $question):
                    $labels[] = $question["questionComment"];
                    $i++;
                    $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
                    if($grade) {
                        $allValues[] = $grade->getGrade();
                        if($i <= 3) {
                            $valuesSocial[] = $grade->getGrade();
                            $valuesEconomy[] = null;
                            $valuesEnvironment[] = null;
                        }
                        elseif($i <= 6) {
                            $valuesSocial[] = null;
                            $valuesEconomy[] = $grade->getGrade();
                            $valuesEnvironment[] = null;
                        }
                        elseif($i <= 9) {
                            $valuesSocial[] = null;
                            $valuesEconomy[] = null;
                            $valuesEnvironment[] = $grade->getGrade();
                        }
                    }
                    else {
                        $allValues[] = null;
                        $valuesSocial[] = null;
                        $valuesEconomy[] = null;
                        $valuesEnvironment[] = null;
                    }
                ?>

                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' ' . $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php echo $question["question"] . '</br><br/>'; ?>
                            <?php echo '<b>' . PHASE1_ANSWER . '</b><br/>'; ?>
                            <?php 
                            $survey = surveyController::getAnswerByQuestionId($question["id"], $project->getId());
                            if($survey) {
                                echo $survey->getAnswer();
                            }
                            echo '<br/><br/>';
                            ?>
                            <?php echo PHASE1_PROJECT . '<br/>'; ?>
                            <?php echo '<b>' . $question["questionComment"] . '</b>'; ?>
                        </div>

                        <select name="<?php echo 'grade' . $i; ?>" <?php echo ' id="grade' . $i . '" '?> class="dropdown agileits w3layouts" tabindex="10" data-settings='{"wrapperClass":"flat"}'>
                            <?php 
                            if(!$grade) : ?>
                                <option selected="selected" value="-1"><?php echo PHASE2_GRADE; ?></option>
                                <option value="0">0 <?php echo PHASE2_0; ?></option>
                                <option value="1">1 <?php echo PHASE2_1; ?></option>
                                <option value="2">2 <?php echo PHASE2_2; ?></option>
                                <option value="3">3 <?php echo PHASE2_3; ?></option>
                                <option value="4">4 <?php echo PHASE2_4; ?></option>
                            <?php 
                            else : 
                                if($grade->getGrade()==0) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option selected="selected" value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade()==1) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option selected="selected" value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade()==2) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option selected="selected" value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade()==3) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option selected="selected" value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                else :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option selected="selected" value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                endif;
                            endif;
                            ?>
                        </select>
                    </div>  
                </div>

                <?php endforeach; ?>

                <div class="submit wow agileits w3layouts slideInLeft">
                    <input type="submit" name="Submit" class="popup-with-zoom-anim agileits w3layouts" value="<?php echo PHASE1_VALIDATE; ?>">
                    <input type="button" name="cancel" class="popup-with-zoom-anim agileits w3layouts" onclick="location.href='<?php echo URL_DIR . 'projects/project?id=' . $project->getId(); ?>'" value="<?php echo PHASE0_PROJECT_CANCEL; ?>">
                </div>     
            </form>    
        </div>
    </div>
</div>

<div id='myChartPhase2a'></div>
<div id='myChartPhase2b'></div>

<script>
    var my_labels = <?php echo json_encode($labels); ?>;
    var my_valuesSocial = <?php echo json_encode($valuesSocial); ?>;
    var my_valuesEconomy = <?php echo json_encode($valuesEconomy); ?>;
    var my_valuesEnvironment = <?php echo json_encode($valuesEnvironment); ?>;
    var my_allValues = <?php echo json_encode($allValues); ?>;
    
    var myConfigPhase2a = {
        "type": "radar",
        "plot": {
            "aspect": "dots"
        },
        "scaleK": {
            labels: my_labels,
        },
        "series": [
            {
                "values": [
                    parseInt(my_valuesSocial[0]), parseInt(my_valuesSocial[1]), parseInt(my_valuesSocial[2]), 
                    parseInt(my_valuesSocial[3]), parseInt(my_valuesSocial[4]), parseInt(my_valuesSocial[5]), 
                    parseInt(my_valuesSocial[6]), parseInt(my_valuesSocial[7]), parseInt(my_valuesSocial[8])
                ],
                "marker": {
                    "type": "circle",
                    "background-color": "#ff0000",
                    "border-color": "#ff0000"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEconomy[0]), parseInt(my_valuesEconomy[1]), parseInt(my_valuesEconomy[2]), 
                    parseInt(my_valuesEconomy[3]), parseInt(my_valuesEconomy[4]), parseInt(my_valuesEconomy[5]), 
                    parseInt(my_valuesEconomy[6]), parseInt(my_valuesEconomy[7]), parseInt(my_valuesEconomy[8])
                ],
                "marker": {
                    "type": "triangle",
                    "background-color": "#0000ff",
                    "border-color": "#0000ff"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEnvironment[0]), parseInt(my_valuesEnvironment[1]), parseInt(my_valuesEnvironment[2]), 
                    parseInt(my_valuesEnvironment[3]), parseInt(my_valuesEnvironment[4]), parseInt(my_valuesEnvironment[5]), 
                    parseInt(my_valuesEnvironment[6]), parseInt(my_valuesEnvironment[7]), parseInt(my_valuesEnvironment[8])
                ],
                "marker": {
                    "type": "square",
                    "background-color": "#00ff00",
                    "border-color": "#00ff00"
                }
            }
        ]
    };

    zingchart.render({
        id: 'myChartPhase2a',
        data: myConfigPhase2a,
        height: '100%',
        width: '100%'
    });

    var myConfigPhase2b = {
        "type": "radar",
        "plot": {
            "aspect": "line",
            "tooltip": {
                "text": "%t: %v"
            }
        },
        "scaleK": {
            labels: my_labels,
        },
        "series": [
            {
                "values": [
                    parseInt(my_allValues[0]), parseInt(my_allValues[1]), parseInt(my_allValues[2]), 
                    parseInt(my_allValues[3]), parseInt(my_allValues[4]), parseInt(my_allValues[5]), 
                    parseInt(my_allValues[6]), parseInt(my_allValues[7]), parseInt(my_allValues[8])
                ],
                "text": "Première évaluation"
            }
        ]
    };

    zingchart.render({
        id: 'myChartPhase2b',
        data: myConfigPhase2b,
        height: '100%',
        width: '100%'
    });

</script>

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
    $(document).ready(function () {
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 100,
            easingType: 'linear'
        };
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#" id="toTop" class="agileits w3layouts" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>

<!-- Smooth-Scrolling-JavaScript -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll, .navbar li a, .footer li a").click(function (event) {
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
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



