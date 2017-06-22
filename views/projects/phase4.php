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

$valuesSocial2 = array();
$valuesEconomy2 = array();
$valuesEnvironment2 = array();
$allValues2 = array();

$labels = array();
$valuesSocial4 = array();
$valuesEconomy4 = array();
$valuesEnvironment4 = array();
$allValues4 = array();

// Template CSS
ob_start();
?>

<!-- Phase 4 - Weighting -->
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
                        <li class="agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase0?id=' . $project->getId(); ?>">0</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase1?id=' . $project->getId(); ?>">1</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase2?id=' . $project->getId(); ?>">2</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>">3</a></li>
                        <li class="active agileits w3layouts"><a href="#">4<span class="sr-only agileits w3layouts">(current)</span></a></li>                 
                        <li><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>">5</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase6?id=' . $project->getId(); ?>">6</a></li>
                        <li><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Weighting -->
            <h2><?php echo PHASE4_WEIGHTING; ?></h2>
            
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
                $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
                if($grade) : ?>
                    <div style="margin-bottom: 20px;" id='myChartComparison'></div>
                    <div class="members wow agileits w3layouts slideInRight" style="margin-bottom: 20px;" id='myChartPhase2'></div>
                <?php endif;
            endforeach;?>
                    
            <?php
            $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=4');
            $app_questions = json_decode($questions, true);
            $i = 0;

            foreach ($app_questions as $question):
                $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
                if($grade) : ?>
                    <div class="members wow agileits w3layouts slideInRight" style="margin-bottom: 20px;" id='myChartPhase4'></div>
                <?php endif;
            endforeach;?>
            
            <form action="<?php echo URL_DIR . 'projects/validatePhase4?id=' . $project->getId(); ?>" method="post">
                
                <h4 class="members wow agileits w3layouts slideInLeft"><?php echo PHASE4_ASSETS; ?></h4>
                <?php
                $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=4');
                $app_questions = json_decode($questions, true);
                $i = 0;
                
                foreach ($app_questions as $question):
                    $labels[] = $question["question"];
                    $i++;
                    $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
                    if($grade) {
                        $allValues4[] = $grade->getGrade();
                        if($i <= 3) {
                            $valuesSocial4[] = $grade->getGrade();
                            $valuesEconomy4[] = null;
                            $valuesEnvironment4[] = null;
                        }
                        elseif($i <= 6) {
                            $valuesSocial4[] = null;
                            $valuesEconomy4[] = $grade->getGrade();
                            $valuesEnvironment4[] = null;
                        }
                        elseif($i <= 9) {
                            $valuesSocial4[] = null;
                            $valuesEconomy4[] = null;
                            $valuesEnvironment4[] = $grade->getGrade();
                        }
                    }
                    else {
                        $allValues4[] = null;
                        $valuesSocial4[] = null;
                        $valuesEconomy4[] = null;
                        $valuesEnvironment4[] = null;
                    }
                ?>

                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' ' . $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php echo '<b>' . $question["question"] . '</b>'; ?>
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
                
                <h4 class="members wow agileits w3layouts slideInLeft"><?php echo PHASE4_CONFLICTS; ?></h4>
                <?php
                $questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=5');
                $app_questions = json_decode($questions, true);
                $i = 50;
                
                foreach ($app_questions as $question):
                   
                    $i++;
                    $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
                ?>

                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE1_QUESTION . ' ' . $question["id"] ?></h4>
                        <div class="well agileits w3layouts">
                            <?php echo $question["question"]; ?>
                        </div>

                        <select name="<?php echo 'grade' . $i; ?>" <?php echo ' id="grade' . $i . '" '?> class="dropdown agileits w3layouts" tabindex="10" data-settings='{"wrapperClass":"flat"}'>
                            <?php 
                            if(!$grade) : ?>
                                <option selected="selected" value="-1"><?php echo PHASE4_IMPORTANCE; ?></option>
                                <option value="1">1 <?php echo PHASE4_1; ?></option>
                                <option value="2">2 <?php echo PHASE4_2; ?></option>
                                <option value="3">3 <?php echo PHASE4_3; ?></option>
                                <option value="4">4 <?php echo PHASE4_4; ?></option>
                            <?php 
                            else : 
                                if($grade->getGrade()==1) :
                                    ?>
                                    <option value="-1"><?php echo PHASE4_IMPORTANCE; ?></option>
                                    <option selected="selected" value="1">1 <?php echo PHASE4_1; ?></option>
                                    <option value="2">2 <?php echo PHASE4_2; ?></option>
                                    <option value="3">3 <?php echo PHASE4_3; ?></option>
                                    <option value="4">4 <?php echo PHASE4_4; ?></option>
                                    <?php
                                elseif($grade->getGrade()==2) :
                                    ?>
                                    <option value="-1"><?php echo PHASE4_IMPORTANCE; ?></option>
                                    <option value="1">1 <?php echo PHASE4_1; ?></option>
                                    <option selected="selected" value="2">2 <?php echo PHASE4_2; ?></option>
                                    <option value="3">3 <?php echo PHASE4_3; ?></option>
                                    <option value="4">4 <?php echo PHASE4_4; ?></option>
                                    <?php
                                elseif($grade->getGrade()==3) :
                                    ?>
                                    <option value="-1"><?php echo PHASE4_IMPORTANCE; ?></option>
                                    <option value="1">1 <?php echo PHASE4_1; ?></option>
                                    <option value="2">2 <?php echo PHASE4_2; ?></option>
                                    <option selected="selected" value="3">3 <?php echo PHASE4_3; ?></option>
                                    <option value="4">4 <?php echo PHASE4_4; ?></option>
                                    <?php
                                else :
                                    ?>
                                    <option value="-1"><?php echo PHASE4_IMPORTANCE; ?></option>
                                    <option value="1">1 <?php echo PHASE4_1; ?></option>
                                    <option value="2">2 <?php echo PHASE4_2; ?></option>
                                    <option value="3">3 <?php echo PHASE4_3; ?></option>
                                    <option selected="selected" value="4">4 <?php echo PHASE4_4; ?></option>
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

<?php
$questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
$app_questions = json_decode($questions, true);
$i = 0;

foreach ($app_questions as $question):
    $i++;
    $grade = surveyController::getGradeByQuestionId($question["id"], $project->getId());
    if($grade) {
        $allValues2[] = $grade->getGrade();
        if($i <= 3) {
            $valuesSocial2[] = $grade->getGrade();
            $valuesEconomy2[] = null;
            $valuesEnvironment2[] = null;
        }
        elseif($i <= 6) {
            $valuesSocial2[] = null;
            $valuesEconomy2[] = $grade->getGrade();
            $valuesEnvironment2[] = null;
        }
        elseif($i <= 9) {
            $valuesSocial2[] = null;
            $valuesEconomy2[] = null;
            $valuesEnvironment2[] = $grade->getGrade();
        }
    }
    else {
        $allValues2[] = null;
        $valuesSocial2[] = null;
        $valuesEconomy2[] = null;
        $valuesEnvironment2[] = null;
    }
endforeach;
?>

<script>
    var my_labels = <?php echo json_encode($labels); ?>;
    var my_valuesSocial2 = <?php echo json_encode($valuesSocial2); ?>;
    var my_valuesEconomy2 = <?php echo json_encode($valuesEconomy2); ?>;
    var my_valuesEnvironment2 = <?php echo json_encode($valuesEnvironment2); ?>;
    var my_allValues2 = <?php echo json_encode($allValues2); ?>;
    var my_valuesSocial4 = <?php echo json_encode($valuesSocial4); ?>;
    var my_valuesEconomy4 = <?php echo json_encode($valuesEconomy4); ?>;
    var my_valuesEnvironment4 = <?php echo json_encode($valuesEnvironment4); ?>;
    var my_allValues4 = <?php echo json_encode($allValues4); ?>;
    var text1 = <?php echo json_encode(PHASE2_SOCIAL); ?>;
    var text2 = <?php echo json_encode(PHASE2_ECONOMY); ?>;
    var text3 = <?php echo json_encode(PHASE2_ENVIRONMENT); ?>;
    var textState = <?php echo json_encode(PHASE2_STATE); ?>;
    var textStateDesired = <?php echo json_encode(PHASE4_STATE); ?>;
    
    var myConfigPhase2 = {
        "type": "radar",
        "legend":{
            "vertical-align":"bottom"
        },
        "title": {
            "text": textState
        },
        "plot": {
            "aspect": "mixed"
        },
        "scaleK": {
            "labels": my_labels,
            "item": {
                "font-size": 8
            }
        },
        "series": [
            {
                "values": [
                    parseInt(my_valuesSocial2[0]), parseInt(my_valuesSocial2[1]), parseInt(my_valuesSocial2[2]), 
                    parseInt(my_valuesSocial2[3]), parseInt(my_valuesSocial2[4]), parseInt(my_valuesSocial2[5]), 
                    parseInt(my_valuesSocial2[6]), parseInt(my_valuesSocial2[7]), parseInt(my_valuesSocial2[8])
                ],
                "aspect": "dots",
                "text": text1,
                "marker": {
                    "type": "circle",
                    "background-color": "#0000ff",
                    "border-color": "#0000ff"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEconomy2[0]), parseInt(my_valuesEconomy2[1]), parseInt(my_valuesEconomy2[2]), 
                    parseInt(my_valuesEconomy2[3]), parseInt(my_valuesEconomy2[4]), parseInt(my_valuesEconomy2[5]), 
                    parseInt(my_valuesEconomy2[6]), parseInt(my_valuesEconomy2[7]), parseInt(my_valuesEconomy2[8])
                ],
                "aspect": "dots",
                "text": text2,
                "marker": {
                    "type": "triangle",
                    "background-color": "#ff0000",
                    "border-color": "#ff0000"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEnvironment2[0]), parseInt(my_valuesEnvironment2[1]), parseInt(my_valuesEnvironment2[2]), 
                    parseInt(my_valuesEnvironment2[3]), parseInt(my_valuesEnvironment2[4]), parseInt(my_valuesEnvironment2[5]), 
                    parseInt(my_valuesEnvironment2[6]), parseInt(my_valuesEnvironment2[7]), parseInt(my_valuesEnvironment2[8])
                ],
                "aspect": "dots",
                "text": text3,
                "marker": {
                    "type": "square",
                    "background-color": "#00ff00",
                    "border-color": "#00ff00"
                }
            },
            {
                "values": [
                    parseInt(my_allValues2[0]), parseInt(my_allValues2[1]), parseInt(my_allValues2[2]), 
                    parseInt(my_allValues2[3]), parseInt(my_allValues2[4]), parseInt(my_allValues2[5]), 
                    parseInt(my_allValues2[6]), parseInt(my_allValues2[7]), parseInt(my_allValues2[8])
                ],
                "aspect": "line",
                "text": textState
            }
        ]
    };

    zingchart.render({
        id: 'myChartPhase2',
        data: myConfigPhase2,
        height: '50%',
        width: '100%'
    });
    
    var myConfigPhase4 = {
        "type": "radar",
        "legend":{
            "vertical-align":"bottom"
        },
        "title": {
            "text": textStateDesired
        },
        "plot": {
            "aspect": "mixed"
        },
        "scaleK": {
            "labels": my_labels,
            "item": {
                "font-size": 8
            }
        },
        "series": [
            {
                "values": [
                    parseInt(my_valuesSocial4[0]), parseInt(my_valuesSocial4[1]), parseInt(my_valuesSocial4[2]), 
                    parseInt(my_valuesSocial4[3]), parseInt(my_valuesSocial4[4]), parseInt(my_valuesSocial4[5]), 
                    parseInt(my_valuesSocial4[6]), parseInt(my_valuesSocial4[7]), parseInt(my_valuesSocial4[8])
                ],
                "aspect": "dots",
                "text": text1,
                "marker": {
                    "type": "circle",
                    "background-color": "#0000ff",
                    "border-color": "#0000ff"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEconomy4[0]), parseInt(my_valuesEconomy4[1]), parseInt(my_valuesEconomy4[2]), 
                    parseInt(my_valuesEconomy4[3]), parseInt(my_valuesEconomy4[4]), parseInt(my_valuesEconomy4[5]), 
                    parseInt(my_valuesEconomy4[6]), parseInt(my_valuesEconomy4[7]), parseInt(my_valuesEconomy4[8])
                ],
                "aspect": "dots",
                "text": text2,
                "marker": {
                    "type": "triangle",
                    "background-color": "#ff0000",
                    "border-color": "#ff0000"
                }
            },
            {
                "values": [
                    parseInt(my_valuesEnvironment4[0]), parseInt(my_valuesEnvironment4[1]), parseInt(my_valuesEnvironment4[2]), 
                    parseInt(my_valuesEnvironment4[3]), parseInt(my_valuesEnvironment4[4]), parseInt(my_valuesEnvironment4[5]), 
                    parseInt(my_valuesEnvironment4[6]), parseInt(my_valuesEnvironment4[7]), parseInt(my_valuesEnvironment4[8])
                ],
                "aspect": "dots",
                "text": text3,
                "marker": {
                    "type": "square",
                    "background-color": "#00ff00",
                    "border-color": "#00ff00"
                }
            },
            {
                "values": [
                    parseInt(my_allValues4[0]), parseInt(my_allValues4[1]), parseInt(my_allValues4[2]), 
                    parseInt(my_allValues4[3]), parseInt(my_allValues4[4]), parseInt(my_allValues4[5]), 
                    parseInt(my_allValues4[6]), parseInt(my_allValues4[7]), parseInt(my_allValues4[8])
                ],
                "aspect": "line",
                "text": textStateDesired
            }
        ]
    };

    zingchart.render({
        id: 'myChartPhase4',
        data: myConfigPhase4,
        height: '50%',
        width: '100%'
    });
    
    var myConfigComparison = {
      type : 'radar',
      "legend":{
            "align":"center",
            "vertical-align":"top"
        },
      plot : {
        aspect : 'area',
        animation: {
          effect:3,
          sequence:1,
          speed:4000
        }
      },
      scaleV : {
        visible : false
      },
      scaleK : {  
        values : '0:8:1',
        labels : my_labels,
        "item": {
            "font-size": 8
        },
        refLine : {
          lineColor : '#c10000'
        },
        tick : {
          lineColor : '#59869c',
          lineWidth : 2,
          lineStyle : 'dotted',
          size : 20
        },
        guide : {
          lineColor : "#607D8B",
          lineStyle : 'solid',
          alpha : 0.3,
          backgroundColor : "#c5c5c5 #718eb4"
        }
      },
      series : [
        {
          values : [
                    parseInt(my_allValues2[0]), parseInt(my_allValues2[1]), parseInt(my_allValues2[2]), 
                    parseInt(my_allValues2[3]), parseInt(my_allValues2[4]), parseInt(my_allValues2[5]), 
                    parseInt(my_allValues2[6]), parseInt(my_allValues2[7]), parseInt(my_allValues2[8])
                ],
          text: textState
        },
        {
          values : [
                    parseInt(my_allValues4[0]), parseInt(my_allValues4[1]), parseInt(my_allValues4[2]), 
                    parseInt(my_allValues4[3]), parseInt(my_allValues4[4]), parseInt(my_allValues4[5]), 
                    parseInt(my_allValues4[6]), parseInt(my_allValues4[7]), parseInt(my_allValues4[8])
                ],
          text: textStateDesired,
          lineColor : '#53a534',
          backgroundColor : '#689F38'
        }
      ]
    };

    zingchart.render({ 
            id : 'myChartComparison', 
            data : myConfigComparison, 
            height: '50%', 
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