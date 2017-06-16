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
$title = PHASE0_TITLE;
$towns = loginController::getAllTowns();
$login = $_SESSION ['login'];

// Template CSS
ob_start();
?>


<!-- Booking -->
<div class="reg agileits w3layouts">
    <div class="container">

        <div class="register agileits w3layouts">

            <h2><?php echo PHASE0_PROJECT_INFO; ?></h2>
            
            <form action="<?php echo URL_DIR . 'projects/phase0'; ?>" method="post">
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE0_PROJECT_NAME; ?></h4>
                        <div class="dropdown-button agileits w3layouts">
                            <input type="text" name="name" id="name" class="dropdown agileits w3layouts" required="">
                        </div>
                    </div>  
                </div>
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE0_PROJECT_POLASTNAME; ?></h4>
                        <div class="dropdown-button agileits w3layouts">
                            <input type="text" name="poLastname" id="poLastname" class="dropdown agileits w3layouts" required="">
                        </div>
                    </div>  
                </div>
                
                <div class="members wow agileits w3layouts slideInLeft">
                    <div class="adult agileits w3layouts">
                        <h4><?php echo PHASE0_PROJECT_POFIRSTNAME; ?></h4>
                        <div class="dropdown-button agileits w3layouts">
                            <input type="password" name="poFirstname" id="poFirstname" class="dropdown agileits w3layouts" required="">
                        </div>
                    </div>  
                </div>
                
                <div class="place wow agileits w3layouts slideInLeft">
                    <div class="dropdown-button agileits w3layouts">
                        <h4><?php echo TOWNNAME; ?></h4>
                        <div class="dropdown-button agileits w3layouts">
                            <input type="text" name="townName" id="townName" class="dropdown agileits w3layouts" disabled="disabled" value="<?php echo $login->getTownName(); ?>" required="">
                        </div>
                    </div>
                </div>

                <div class="submit wow agileits w3layouts slideInLeft">
                    <input type="submit" name="Submit" class="popup-with-zoom-anim agileits w3layouts" value="<?php echo PHASE0_PROJECT_CREATE; ?>">
                    <input type="submit" name="cancel" class="popup-with-zoom-anim agileits w3layouts" onclick="history.back();" value="<?php echo PHASE0_PROJECT_CANCEL; ?>">
                </div>
            </form>

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

