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
$lang = $_SESSION['lang'];

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
            
            <?php
            $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
            $app_questions = json_decode($questions, true);
            $i = 0;

            foreach ($app_questions as $question):
                $grade = surveyController::getGrade1ByQuestionId($question["id"], $project->getId());
                if($grade) : ?>
                    <a href="" data-toggle="modal" data-target="#myModal">
                        <div class="members wow agileits w3layouts slideInRight" style="margin-bottom: 20px;" id='myChartPhase2'></div>
                    </a>
                <?php endif;
            endforeach;?>

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
                    $i++; 
                    $grade = surveyController::getGrade1ByQuestionId($question["id"], $project->getId());
                ?>

                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' ' . $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php if ($lang == 'fr') {
                                echo $question["questionFR"] . '</br><br/>';
                            }
                            elseif ($lang == 'de') {
                                echo $question["questionDE"] . '</br><br/>';
                            }
                            ?>
                            <?php echo '<b>' . PHASE1_ANSWER . '</b><br/>'; ?>
                            <?php 
                            $survey = surveyController::getAnswerByQuestionId($question["id"], $project->getId());
                            if($survey) {
                                echo $survey->getAnswer();
                            }
                            echo '<br/><br/>';
                            ?>
                            <?php echo PHASE1_PROJECT . '<br/>'; ?>
                            <?php if ($lang == 'fr') {
                                echo '<b>' . $question["questionCommentFR"] . '</b>';
                            }
                            elseif ($lang == 'de') {
                                echo '<b>' . $question["questionCommentDE"] . '</b>';
                            }
                            ?>
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
                                if($grade->getGrade1()==0) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option selected="selected" value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade1()==1) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option selected="selected" value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade1()==2) :
                                    ?>
                                    <option value="-1"><?php echo PHASE2_GRADE; ?></option>
                                    <option value="0">0 <?php echo PHASE2_0; ?></option>
                                    <option value="1">1 <?php echo PHASE2_1; ?></option>
                                    <option selected="selected" value="2">2 <?php echo PHASE2_2; ?></option>
                                    <option value="3">3 <?php echo PHASE2_3; ?></option>
                                    <option value="4">4 <?php echo PHASE2_4; ?></option>
                                    <?php
                                elseif($grade->getGrade1()==3) :
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

<!-- Modal Graph -->
<div class="tooltip-content agileits w3layouts">
    <div class="modal fade agileits w3layouts details-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog agileits w3layouts modal-lg">
            <div class="modal-content agileits w3layouts">
                <div class="modal-header agileits w3layouts">
                    <h4 class="modal-title agileits w3layouts"><?php echo PHASE2_STATE; ?></h4>
                    <button type="button" class="close agileits w3layouts" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body agileits w3layouts">
                    <div id='myChartPhase2Big'></div>
                </div>
            </div>
        </div>
    </div>

    <script> $('#myModal').modal(''); </script>
</div>

<?php
$labels = array();
$valuesAxe1 = array();
$valuesAxe2 = array();
$valuesAxe3 = array();
$valuesAxe4 = array();
$valuesAxe5 = array();
$valuesAxe6 = array();
$allValues = array();

$axes = json_decode(file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_axes'), true);
$nbrAxes = count($axes);
$questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
$app_questions = json_decode($questions, true);
$i = 0;
$idAxe1 = 0; $idAxe2 = 0; $idAxe3 = 0; $idAxe4 = 0; $idAxe5 = 0; $idAxe6 = 0;
$text1 = ""; $text2 = ""; $text3= ""; $text4 = ""; $text5 = ""; $text6 = "";

foreach ($axes as $axe) {
    $i++;
    switch ($i) {
        case 1:
            $idAxe1 = $axe["id"];
            if ($lang == 'fr') {
                $text1 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text1 = $axe['nameDE'];
            }
            break;
        case 2:
            $idAxe2 = $axe["id"];
            if ($lang == 'fr') {
                $text2 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text2 = $axe['nameDE'];
            }
            break;
        case 3:
            $idAxe3 = $axe["id"];
            if ($lang == 'fr') {
                $text3 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text3 = $axe['nameDE'];
            }
            break;
        case 4:
            $idAxe4 = $axe["id"];
            if ($lang == 'fr') {
                $text4 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text4 = $axe['nameDE'];
            }
            break;
        case 5:
            $idAxe5 = $axe["id"];
            if ($lang == 'fr') {
                $text5 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text5 = $axe['nameDE'];
            }
            break;
        case 6:
            $idAxe6 = $axe["id"];
            if ($lang == 'fr') {
                $text6 = $axe['nameFR'];
            }
            elseif ($lang == 'de') {
                $text6 = $axe['nameDE'];
            }
            break;
        default:
            break;
    }
}

$i = 0;

foreach ($app_questions as $question):
    $i++;
    if ($lang == 'fr') {
        $labels[] = $question["questionCommentFR"];
    }
    elseif ($lang == 'de') {
        $labels[] = $question["questionCommentDE"];
    }
    $grade = surveyController::getGrade1ByQuestionId($question["id"], $project->getId());
    if($grade) {
        $idAxe = $question["axes_idAxe"];
        $allValues[] = $grade->getGrade1();
        switch ($idAxe) {
            case $idAxe1:
                $valuesAxe1[] = $grade->getGrade1();
                $valuesAxe2[] = null;
                $valuesAxe3[] = null;
                $valuesAxe4[] = null;
                $valuesAxe5[] = null;
                $valuesAxe6[] = null;
                break;
            case $idAxe2:
                $valuesAxe1[] = null;
                $valuesAxe2[] = $grade->getGrade1();
                $valuesAxe3[] = null;
                $valuesAxe4[] = null;
                $valuesAxe5[] = null;
                $valuesAxe6[] = null;
                break;
            case $idAxe3:
                $valuesAxe1[] = null;
                $valuesAxe2[] = null;
                $valuesAxe3[] = $grade->getGrade1();
                $valuesAxe4[] = null;
                $valuesAxe5[] = null;
                $valuesAxe6[] = null;
                break;
            case $idAxe4:
                $valuesAxe1[] = null;
                $valuesAxe2[] = null;
                $valuesAxe3[] = null;
                $valuesAxe4[] = $grade->getGrade1();
                $valuesAxe5[] = null;
                $valuesAxe6[] = null;
                break;
            case $idAxe5:
                $valuesAxe1[] = null;
                $valuesAxe2[] = null;
                $valuesAxe3[] = null;
                $valuesAxe4[] = null;
                $valuesAxe5[] = $grade->getGrade1();
                $valuesAxe6[] = null;
                break;
            case $idAxe6:
                $valuesAxe1[] = null;
                $valuesAxe2[] = null;
                $valuesAxe3[] = null;
                $valuesAxe4[] = null;
                $valuesAxe5[] = null;
                $valuesAxe6[] = $grade->getGrade1();
                break;
            default:
                break;
        }
    }
    else {
        $allValues[] = null;
        $valuesAxe1[] = null;
        $valuesAxe2[] = null;
        $valuesAxe3[] = null;
        $valuesAxe4[] = null;
        $valuesAxe5[] = null;
        $valuesAxe6[] = null;
    }
endforeach;
?>

<script>
    var axes = <?php echo json_encode($axes); ?>;
    var nbrAxes = <?php echo json_encode($nbrAxes); ?>;
    var nbrQuestions = <?php echo json_encode($i); ?>;
    var labels = <?php echo json_encode($labels); ?>;
    var valuesAxe1 = <?php echo json_encode($valuesAxe1); ?>;
    var valuesAxe2 = <?php echo json_encode($valuesAxe2); ?>;
    var valuesAxe3 = <?php echo json_encode($valuesAxe3); ?>;
    var valuesAxe4 = <?php echo json_encode($valuesAxe4); ?>;
    var valuesAxe5 = <?php echo json_encode($valuesAxe5); ?>;
    var valuesAxe6 = <?php echo json_encode($valuesAxe6); ?>;
    var allValues = <?php echo json_encode($allValues); ?>;
    var text1 = <?php echo json_encode($text1); ?>;
    var text2 = <?php echo json_encode($text2); ?>;
    var text3 = <?php echo json_encode($text3); ?>;
    var text4 = <?php echo json_encode($text4); ?>;
    var text5 = <?php echo json_encode($text5); ?>;
    var text6 = <?php echo json_encode($text6); ?>;
    var textState = <?php echo json_encode(PHASE2_STATE); ?>;
    
    for(var i = 0; i < nbrQuestions; i++) {
        valuesAxe1[i] = parseInt(valuesAxe1[i]);
        valuesAxe2[i] = parseInt(valuesAxe2[i]);
        valuesAxe3[i] = parseInt(valuesAxe3[i]);
        valuesAxe4[i] = parseInt(valuesAxe4[i]);
        valuesAxe5[i] = parseInt(valuesAxe5[i]);
        valuesAxe6[i] = parseInt(valuesAxe6[i]);
        allValues[i] = parseInt(allValues[i]);
    }
    
    var myConfigPhase2 = {
        "type": "radar",
        "legend":{
            "toggle-action":"remove",
            "vertical-align":"bottom"
        },
        "title": {
            "text": textState
        },
        "plot": {
            "aspect": "mixed"
        },
        "scaleK": {
            "labels": labels,
            "item": {
                "font-size": 8
            }
        },
        "series": [ 
            { "values": allValues, "aspect": "line", "text": textState },
            { "values": valuesAxe1, "aspect": "dots", "text": text1, "marker": { "type": "circle" } },
            { "values": valuesAxe2, "aspect": "dots", "text": text2, "marker": { "type": "rpoly4" } },
            { "values": valuesAxe3, "aspect": "dots", "text": text3, "marker": { "type": "star7" } },
            { "values": valuesAxe4, "aspect": "dots", "text": text4, "marker": { "type": "square" } },
            { "values": valuesAxe5, "aspect": "dots", "text": text5, "marker": { "type": "triangle" } },
            { "values": valuesAxe6, "aspect": "dots", "text": text6, "marker": { "type": "star4" } }  
        ]
    };

    zingchart.render({
        id: 'myChartPhase2',
        data: myConfigPhase2,
        height: '50%',
        width: '100%'
    });
    
    var myConfigPhase2Big = {
        "type": "radar",
        "legend":{
            "toggle-action":"remove",
            "align": "center",
            "vertical-align":"top"
        },
        "plot": {
            "aspect": "mixed"
        },
        "scaleK": {
            "labels": labels,
        },
        "series": [ 
            { "values": allValues, "aspect": "line", "text": textState },
            { "values": valuesAxe1, "aspect": "dots", "text": text1, "marker": { "type": "circle" } },
            { "values": valuesAxe2, "aspect": "dots", "text": text2, "marker": { "type": "rpoly4" } },
            { "values": valuesAxe3, "aspect": "dots", "text": text3, "marker": { "type": "star7" } },
            { "values": valuesAxe4, "aspect": "dots", "text": text4, "marker": { "type": "square" } },
            { "values": valuesAxe5, "aspect": "dots", "text": text5, "marker": { "type": "triangle" } },
            { "values": valuesAxe6, "aspect": "dots", "text": text6, "marker": { "type": "star4" } }  
        ]
    };
    
    zingchart.render({
        id: 'myChartPhase2Big',
        data: myConfigPhase2Big,
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



