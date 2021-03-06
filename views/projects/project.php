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
$project = new Project($this->data ['idProject'], $this->data ['name'], $this->data ['description'], $this->data ['poLastname'], $this->data ['poFirstname'], $this->data ['town_idTown']);
$title = $project->getName();
$msg = isset($_SESSION['msgError']) ? $_SESSION['msgError'] : '';
$login = isset($_SESSION['login']) ? $_SESSION['login'] : null;

// Template CSS
ob_start();
?>

<!-- PROJECT -->
<div class="manual agileits w3layouts">
    <div class="container">

        <!-- Alert Message -->
        <?php if (!empty($msg)) : ?>
            <div class="members wow agileits w3layouts slideInLeft">
                <div class="alert agileits w3layouts alert-warning" role="alert">
                    <strong><?php echo MSG_WARNING; ?></strong> <?php echo $msg; ?>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="col-md-6 col-sm-6 manual-grids manual-grids2 agileits w3layouts wow slideInRight">
            <a href="<?php echo URL_DIR . 'projects/phase0?id=' . $project->getId(); ?>">
                <h3><?php echo $project->getName(); ?></h3>
            </a>        
            <div class="slider-4 agileits w3layouts">
                <ul class="rslides agileits w3layouts" id="slider4">
                    <li>
                        <p><?php echo $project->getDescription(); ?></p>
                        <?php 
                        $filename = 'uploads/' . $project->getId() . '_file.pdf';
                        if (file_exists($filename)) : ?>
                            <div class="submit wow agileits w3layouts">
                                <input type="button" name="back" class="popup-with-zoom-anim agileits w3layouts" onclick="location.href = '<?php echo URL_DIR . 'projects/download?id=' . $project->getId(); ?>'" value="<?php echo PROJECT_FILE_DOWNLOAD; ?>">
                            </div>
                        <?php endif; ?>
                        <h4><?php echo $project->getPoLastname() . ' ' . $project->getPoFirstname(); ?></h4>
                    </li>
                </ul>
            </div>
        </div>
        


        <div class="col-md-6 col-sm-6 manual-grids manual-grids1 agileits w3layouts wow slideInLeft">

            <h3><?php echo $project->getName(); ?></h3>

            <div class="abt-btm agileits w3layouts">
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-question-sign icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_SURVEY; ?></h4>
                        <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase1?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <?php if (!$login) : ?>
                    <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                        <div class="bott-img agileits w3layouts">
                            <div class="icon-holder agileits w3layouts">
                                <span class="glyphicon agileits w3layouts glyphicon-signal icon" aria-hidden="true"></span>
                            </div>
                            <h4 class="mission agileits w3layouts"><?php echo HOME_CAPITAL_GAIN; ?></h4>
                            <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase2?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                        <div class="bott-img agileits w3layouts">
                            <div class="icon-holder agileits w3layouts">
                                <span class="glyphicon agileits w3layouts glyphicon-exclamation-sign icon" aria-hidden="true"></span>
                            </div>
                            <h4 class="mission agileits w3layouts"><?php echo HOME_CONFLICT; ?></h4>
                            <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase3?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                        <div class="bott-img agileits w3layouts">
                            <div class="icon-holder agileits w3layouts">
                                <span class="glyphicon agileits w3layouts glyphicon-pencil icon" aria-hidden="true"></span>
                            </div>
                            <h4 class="mission agileits w3layouts"><?php echo HOME_WEIGHTING; ?></h4>
                            <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase4?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                        <div class="bott-img agileits w3layouts">
                            <div class="icon-holder agileits w3layouts">
                                <span class="glyphicon agileits w3layouts glyphicon-adjust icon" aria-hidden="true"></span>
                            </div>
                            <h4 class="mission agileits w3layouts"><?php echo HOME_CONSISTENCY; ?></h4>
                            <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase5?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                        <div class="bott-img agileits w3layouts">
                            <div class="icon-holder agileits w3layouts">
                                <span class="glyphicon agileits w3layouts glyphicon-plus-sign icon" aria-hidden="true"></span>
                            </div>
                            <h4 class="mission agileits w3layouts"><?php echo HOME_OPTIMIZATION; ?></h4>
                            <p class="description agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/phase6?id=' . $project->getId(); ?>"><?php echo PROJECT_ACCESS; ?></a></p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
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
unset($_SESSION['msgError']);

// Template CSS
$content = ob_get_clean();
require 'views/template.php';