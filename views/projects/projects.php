<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Custom-Stylesheet-Links -->
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/animate.css" type="text/css" media="all">

<!-- Custom-JavaScript-File-Link-Graph -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

<!-- Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" type="text/css">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700" type="text/css">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">

<?php
// Initialization of variables
$msg = $this->vars['msg'];
$title = PROJECTS_TITLE;
$lang = $_SESSION['lang'];

// Template CSS
ob_start();
?>

<!-- GRAPH -->
<div class="cuisines agileits w3layouts">
    <div class="container">

        <div class="agileits w3layouts cuisines-grids-1 wow slideInLeft">
            <a href="" data-toggle="modal" data-target="#myModal">
                <div class="members wow agileits w3layouts slideInUp" id='myChart'></div>
            </a>
            
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- MODAL GRAPH -->
<div class="tooltip-content agileits w3layouts">
    <div class="modal fade agileits w3layouts details-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog agileits w3layouts modal-lg">
            <div class="modal-content agileits w3layouts">
                <div class="modal-header agileits w3layouts">
                    <h4 class="modal-title agileits w3layouts"><?php echo PROJECTS_GRAPH; ?></h4>
                    <button type="button" class="close agileits w3layouts" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body agileits w3layouts">
                    <div id='myChartBig'></div>
                </div>
            </div>
        </div>
    </div>

    <script> $('#myModal').modal('');</script>
</div>

<!-- PROJECTS -->
<div class="services agileits w3layouts">
    <div class="container">

        <div class="services-grids agileits w3layouts">
            <div class="col-md-6 col-sm-6 services-grid agileits w3layouts services-grid1 wow slideInLeft">
                <h2><?php echo PROJECTS_PROJECT; ?></h2>
                <?php
                $connect = $this->getLogin();
                if (!$connect) :
                    ?>
                    <div class="alert agileits w3layouts alert-info" role="alert">
                        <strong><?php echo MSG_INFO; ?></strong> <?php echo MSG_CONNECT_TO_SHOW_PROJECTS; ?>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <div class="col-md-6 col-sm-6 services-grid agileits w3layouts services-grid2 wow slideInRight">
                <?php
                $connect = $this->getLogin();
                if ($connect) {
                    echo '<div class="newProject"><a class="wow slideInLeft" href="' . URL_DIR . 'projects/phase0' . '">' . PROJECTS_NEW_PROJECT . ' <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></div>';
                    $projects = projectsController::getProjectsByIdTown($connect->getId());
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="service-info-grids agileits w3layouts">
            <?php
            if (!empty($projects)):
                foreach ($projects as $project):
                    ?>
                    <div class="col-md-4 col-sm-4 service-info agileits w3layouts service-info wow fadeInUp">
                        <img src="../images/project.png" alt="Agileits W3layouts">
                        <h4><?php echo $project->getName(); ?></h4>
                        <div class="h4-underline wow agileits w3layouts slideInLeft"></div>
                        <p><?php echo $project->getDescription(); ?></p>
                        <a class="wow slideInLeft" href="<?php echo URL_DIR . 'projects/project?id=' . $project->getId(); ?>"><?php echo PROJECTS_READ_MORE; ?> <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                    </div>
                    <?php
                endforeach;
            else:
                $connect = $this->getLogin();
                if ($connect) :
                    ?>
                    <div class="services-grids agileits w3layouts">
                        <div class="col-md-6 col-sm-6 services-grid agileits w3layouts services-grid1 wow slideInLeft">
                            <div class="alert agileits w3layouts alert-info" role="alert">
                                <strong><?php echo MSG_INFO; ?></strong> <?php echo MSG_NO_PROJECT; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endif;
            endif;
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php
$labels = array();
$questions = file_get_contents('http://localhost/API_vs-oade/vs-oade_api.php?action=get_questions&id=2');
$app_questions = json_decode($questions, true);

$i = 0;
foreach ($app_questions as $question):
    $i++;
    if ($lang == 'fr') {
        $labels[] = $question["questionCommentFR"];
    } elseif ($lang == 'de') {
        $labels[] = $question["questionCommentDE"];
    }
endforeach;
?>

<!-- Custom-JavaScript-File-Links -->	  
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- Animate.CSS-JavaScript -->
<script src="../js/wow.min.js"></script>
<script>new WOW().init();</script>

<script>
    var labels = <?php echo json_encode($labels); ?>;
    var textState = <?php echo json_encode(PROJECTS_GRAPH); ?>;

    var myConfig = {
        "type": "radar",
        "legend": {
            "toggle-action": "remove",
            "vertical-align": "bottom"
        },
        "title": {
            "text": textState
        },
        "plot": {
            "aspect": "area"
        },
        "scaleK": {
            "labels": labels,
            "item": {
                "font-size": 11
            }
        },
        "series": [{
            "values": [3, 1, 2, 3, 1, 2, 1, 4, 2],
            "text": textState
        }]
    };

    zingchart.render({
        id: 'myChart',
        data: myConfig,
        height: '100%',
        width: '100%'
    });

    var myConfigBig = {
        "type": "radar",
        "legend": {
            "toggle-action": "remove",
            "align": "center",
            "vertical-align": "top"
        },
        "plot": {
            "aspect": "area"
        },
        "scaleK": {
            "labels": labels,
            "item": {
                "font-size": 16
            }
        },
        "series": [{
            "values": [3, 1, 2, 3, 1, 2, 1, 4, 2],
            "text": textState
        }]
    };

    zingchart.render({
        id: 'myChartBig',
        data: myConfigBig,
        height: '100%',
        width: '100%'
    });
</script>

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
