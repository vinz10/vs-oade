<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        
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
    $title = ADMIN_TITLE;
    
    // Template CSS
    ob_start();
?>


<!-- SETTINGS PROJECTS -->
<div class="typography agileits w3layouts">
    <div class="container">

        <div class="grid_3 agileits w3layouts grid_5">
            <ol class="breadcrumb agileits w3layouts">
                <li class="active agileits w3layouts"><?php echo PROJECTS_PROJECT; ?></li>
                <li><a href="<?php echo URL_DIR.'login/archives'; ?>"><?php echo ADMIN_ARCHIVES; ?></a></li>
                <li><a href="<?php echo URL_DIR.'login/access'; ?>"><?php echo ADMIN_ACCESS; ?></a></li>
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
            <h3 class="hdg agileits w3layouts"><?php echo PROJECTS_PROJECT; ?></h3>
            
            <?php 
            $connect = $this->getLogin();
            if ($connect) {
                $projects = projectsController::getProjectsByIdTown($connect->getId());
                $archiveProjects = archivesController::getArchiveProjectsByIdTown($connect->getId());
            }

            if (!empty($projects)): 
                foreach ($projects as $project): 
                ?>
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="well agileits w3layouts">
                        <h4><a href="<?php echo URL_DIR.'projects/project?id=' . $project->getId(); ?>"><?php echo $project->getName(); ?></a></h4>
                        <p><?php echo $project->getDescription(); ?></p>
                        <hr/>
                        <?php if (loginController::existArchive($project->getId())) : ?>
                        <a href="#" style="color: #9095AA; pointer-events: none; cursor: default;">
                            <?php echo PROJECTS_SAVE; ?> 
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span></a>
                        &nbsp;&nbsp;
                        <b><a href="<?php echo URL_DIR.'archives/project?id=' . $project->getId(); ?>" style="color: #ffc107;"><?php echo PROJECTS_SAVE_ACCESS; ?> 
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></b>
                        <?php else : ?>
                        <b><a href="<?php echo URL_DIR.'archives/archive?id=' . $project->getId(); ?>" style="color: #0bb46d;"><?php echo PROJECTS_SAVE; ?> 
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span></a></b>   
                        &nbsp;&nbsp;
                        <a href="#" style="color: #9095AA; pointer-events: none; cursor: default;"><?php echo PROJECTS_SAVE_ACCESS; ?> 
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                        <?php endif; ?>
                        &nbsp;&nbsp;
                        <b><a href="<?php echo URL_DIR.'projects/delete?id=' . $project->getId(); ?>" style="color: #d9534f;"><?php echo PROJECTS_DELETE; ?> 
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></b>
                    </div>
                </div>
                <?php 
                endforeach; 
            else : ?>
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="alert agileits w3layouts alert-info" role="alert">
                        <strong><?php echo MSG_INFO; ?></strong> <?php echo MSG_NO_PROJECT; ?>
                    </div>
                </div>
            <?php endif; 
            
            if (!empty($archiveProjects)): 
                foreach ($archiveProjects as $project): 
                if (!projectsController::notDeleted($project->getProjectId())) : ?>
                    <div class="members wow agileits w3layouts slideInLeft">
                        <div class="well agileits w3layouts">
                            <h4><?php echo $project->getProjectName(); ?></h4>
                            <p><?php echo $project->getProjectDescription(); ?></p>
                            <hr/>
                            <a href="#" style="color: #9095AA; pointer-events: none; cursor: default;">
                                <?php echo PROJECTS_SAVE; ?> 
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span></a>
                            &nbsp;&nbsp;
                            <b><a href="<?php echo URL_DIR.'archives/project?id=' . $project->getProjectId(); ?>" style="color: #ffc107;"><?php echo PROJECTS_SAVE_ACCESS; ?> 
                                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></b>
                            &nbsp;&nbsp;
                            <a href="#" style="color: #9095AA; pointer-events: none; cursor: default;">
                                <?php echo PROJECTS_DELETE; ?> 
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </div>
                    </div>
                <?php 
                endif;
                endforeach; 
            endif; ?>
        </div>
    </div>
</div>

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

    // Template CSS
    $content = ob_get_clean();
    require 'views/template.php';


