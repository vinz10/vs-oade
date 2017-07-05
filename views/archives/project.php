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
$idProject = $this->vars['idProject'];
$title = ADMIN_TITLE;

// Template CSS
ob_start();
?>

<!-- PROJECT -->
<div class="typography agileits w3layouts">
    <div class="container">

        <div class="grid_3 agileits w3layouts grid_5">
            <ol class="breadcrumb agileits w3layouts">
                <li><a href="<?php echo URL_DIR . 'login/sprojects'; ?>"><?php echo PROJECTS_PROJECT; ?></a></li>
                <li><a href="<?php echo URL_DIR . 'login/archives'; ?>"><?php echo ADMIN_ARCHIVES; ?></a></li>
                <li><a href="<?php echo URL_DIR . 'login/access'; ?>"><?php echo ADMIN_ACCESS; ?></a></li>
            </ol>
        </div>

        <!-- Alert Message -->
        <?php if (!empty($msg)) : ?>
            <div class="members wow agileits w3layouts slideInLeft">
                <div class="alert agileits w3layouts alert-success" role="alert">
                    <strong><?php echo MSG_SUCCESS; ?></strong> <?php echo ' ' . $msg; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid_3 agileits w3layouts grid_5">
            <h3 class="hdg agileits w3layouts"><?php echo ADMIN_ARCHIVE; ?></h3>

            <?php
            $archiveProjects = archivesController::getArchiveProjectsByIdProject($idProject);

            if (!empty($archiveProjects)):
                ?>
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="well agileits w3layouts">
                        <h4><?php echo $archiveProjects[0]->getProjectName(); ?></h4>
                        <p>
                            <?php echo '<b>' . PHASE0_PROJECT_DESCRIPTION . ':</b> ' . $archiveProjects[0]->getProjectDescription(); ?>
                            <br/>
                            <?php echo '<b>' . ADMIN_PO . ':</b> ' . $archiveProjects[0]->getProjectPoLastname() . ' ' . $archiveProjects[0]->getProjectPoFirstname(); ?>
                        </p>
                        <hr/>
                        <?php foreach ($archiveProjects as $project): ?>
                            <h5><?php echo PHASE1_QUESTION . ' ' . $project->getQuestionId(); ?></h5>
                            <p>
                                <?php echo '<b>' . PHASE1_QUESTION . ':</b> ' . $project->getQuestion(); ?>
                                <br/>
                                <?php echo '<b>' . ADMIN_QUESTIONCOMMENT . ':</b> ' . $project->getQuestionComment(); ?>
                            </p>
                            <p>
                                <?php echo '<b>' . PHASE1_ANSWER . ':</b> ' . $project->getAnswer(); ?>
                                <br/>
                                <?php echo '<b>' . PHASE2_GRADE . ' 1:</b> ' . $project->getGrade1(); ?>
                                <br/>
                                <?php echo '<b>' . PHASE2_GRADE . ' 2:</b> ' . $project->getGrade2(); ?>
                                <br/>
                                <?php echo '<b>' . PHASE6_OPENQUESTION . ':</b> ' . $project->getOpenQuestion(); ?>
                                <br/>
                                <?php echo '<b>' . PHASE6_COMMENT . ':</b> ' . $project->getComment(); ?>
                            </p>
                            <hr/>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Custom-JavaScript-File-Links -->	  
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
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