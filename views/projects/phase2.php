<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

<!-- Custom-Stylesheet-Links -->
<!-- Bootstrap-CSS -->  
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
<!-- Index-Page-CSS --> 
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<!-- Animate.CSS -->    
<link rel="stylesheet" href="../css/animate.css" type="text/css" media="all">

<!-- Fonts -->
<!-- Body-Font -->	 
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" type="text/css">
<!-- Logo-Font -->	 
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700" type="text/css">
<!-- Navbar-Font --> 
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">

<?php
    // Initialization of variables
    $msg = $this->vars['msg'];
    $persistence = $this->vars['persistence'];
    $project = new Project($this->data ['idProject'], $this->data ['name'], $this->data ['description'], $this->data ['poLastname'], $this->data ['poFirstname'], $this->data ['town_idTown']);
    $title = $project->getName();
    $login = $_SESSION ['login'];
    $towns = loginController::getAllTowns();
    $labels = array();

    // Template CSS
    ob_start();
?>


<!-- Booking -->
<div class="reg agileits w3layouts">
    <div class="container">

        <div class="register agileits w3layouts">
            <div class="page">
                <ul class="pagination agileits w3layouts">
                    <li class="agileits w3layouts"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <li><a href="#">0</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active agileits w3layouts"><a href="#">2<span class="sr-only agileits w3layouts">(current)</span></a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
            </div>
        </div>

        <div class="register agileits w3layouts">

            <h2><?php echo PHASE2_CAPITAL_GAIN; ?></h2>

            <form action="<?php echo URL_DIR . '#'; ?>" method="post">

                <?php
                $app_questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
                $app_questions = json_decode($app_questions, true);

                foreach ($app_questions as $question):
                    $labels[] = $question["questionComment"];
                    ?>

                    <div class="members wow agileits w3layouts slideInLeft">
                        <div class="adult agileits w3layouts">
                            <h4><?php echo PHASE1_QUESTION . ' ' . $question["id"] ?></h4>
                            <div class="well agileits w3layouts">
                                <?php echo $question["question"] . '</br><br/>'; ?>
                                <?php echo '<b>' . PHASE1_ANSWER . '</b><br/>'; ?>
                                <?php echo 'réponse..........' . '<br/><br/>'; ?>
                                <?php echo PHASE1_PROJECT . '<br/>'; ?>
                                <?php echo '<b>' . $question["questionComment"] . '</b>'; ?>
                            </div>

                            <select class="dropdown agileits w3layouts" tabindex="10" data-settings='{"wrapperClass":"flat"}'>
                                <option value=""></option>
                                <option value="0">0 <?php echo PHASE2_0; ?></option>
                                <option value="1">1 <?php echo PHASE2_1; ?></option>
                                <option value="2">2 <?php echo PHASE2_2; ?></option>
                                <option value="3">3 <?php echo PHASE2_3; ?></option>
                                <option value="4">4 <?php echo PHASE2_4; ?></option>
                            </select>
                        </div>  
                    </div>

                <?php endforeach; ?>

                <div class="submit wow agileits w3layouts slideInLeft">
                    <input type="submit" name="Submit" class="popup-with-zoom-anim agileits w3layouts" value="<?php echo PHASE1_VALIDATE; ?>">
                    <input type="submit" name="cancel" class="popup-with-zoom-anim agileits w3layouts" onclick="history.back();" value="<?php echo PHASE0_PROJECT_CANCEL; ?>">
                </div>     
            </form>    
        </div>
    </div>
</div>

<div id='myChart'></div>
<!--<div id='myChart1'></div>-->

<script>
    var my_labels = <?php echo json_encode($labels); ?>;
    var myConfig = {
        "type": "radar",
        "plot": {
            "aspect": "dots"
        },
        "scaleK": {
            labels: my_labels,
        },
        "series": [
            {
                "values": [0, 3, 2, , , , , , ],
                "marker": {
                    "type": "circle",
                    "background-color": "#ff0000",
                    "border-color": "#ff0000"
                }
            },
            {
                "values": [, , , 1, 1, 4, , , ],
                "marker": {
                    "type": "triangle",
                    "background-color": "#0000ff",
                    "border-color": "#0000ff"
                }
            },
            {
                "values": [, , , , , , 3, 1, 1],
                "marker": {
                    "type": "square",
                    "background-color": "#00ff00",
                    "border-color": "#00ff00"
                }
            }
        ]
    };

    zingchart.render({
        id: 'myChart',
        data: myConfig,
        height: '100%',
        width: '100%'
    });

    var myConfig = {
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
                "values": [0, 1, 2, 3, 1, 2, 3, 2, 1],
                "text": "Première évaluation"
            }
        ]
    };

    zingchart.render({
        id: 'myChart1',
        data: myConfig,
        height: '50%',
        width: '100%'
    });

</script>

<!-- Custom-JavaScript-File-Links -->

<!-- Default-JavaScript -->	  
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap-JavaScript --> 
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- Animate.CSS-JavaScript -->
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

    // Template CSS
    $content = ob_get_clean();
    require 'views/template.php';


