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
$title = LOGIN_TITLE;
$lang = $_SESSION['lang'];

// Template CSS
ob_start();
?>

<!-- INITLOGIN -->
<div class="team agileits w3layouts">
    <div class="container">

        <h3><?php echo LOGIN; ?></h3>

        <div class="team-grids agileits w3layouts grid">
            <a href="<?php echo URL_DIR . 'login/login'; ?>">
                <div class="col-md-4 col-sm-4 team-grid agileits w3layouts team-grid1 wow slideInUp">
                    <figure class="effect-zoe agileits w3layouts">
                        <img src="../images/user.jpg" alt="Agileits W3layouts"/>
                        <figcaption>
                            <h4><?php echo USER; ?></h4>
                            <p class="description agileits w3layouts"><?php echo USER_TEXT; ?></p>
                        </figcaption>
                    </figure>
                </div>
            </a>
            <a href="<?php echo URL_DIR . 'login/login1'; ?>">
                <div class="col-md-4 col-sm-4 team-grid agileits w3layouts team-grid2 wow slideInUp">
                    <figure class="effect-zoe agileits w3layouts">
                        <img src="../images/electeduser.jpg" alt="Agileits W3layouts"/>
                        <figcaption>
                            <h4><?php echo USER_ELECTED; ?></h4>
                            <p class="description agileits w3layouts"><?php echo USER_ELECTED_TEXT; ?></p>
                        </figcaption>
                    </figure>
                </div>
            </a>
            <a href="<?php echo URL_DIR . 'login/login2'; ?>">
                <div class="col-md-4 col-sm-4 team-grid agileits w3layouts team-grid3 wow slideInUp">
                    <figure class="effect-zoe agileits w3layouts">
                        <img src="../images/adminuser.jpg" alt="Agileits W3layouts"/>
                        <figcaption>
                            <h4><?php echo ADMIN; ?></h4>
                            <p class="description agileits w3layouts"><?php echo ADMIN_TEXT; ?></p>
                        </figcaption>
                    </figure>
                </div>
            </a>
            <div class="clearfix"></div>
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
