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
$title = PROJECTS_TITLE;

// Template CSS
ob_start();
?>


<!-- Services -->
<div class="services agileits w3layouts">
    <div class="container">

        <div class="services-grids agileits w3layouts">
            <div class="col-md-6 col-sm-6 services-grid agileits w3layouts services-grid1 wow slideInLeft">
                <h2><?php echo PROJECTS_PROJECT; ?></h2>
                <?php 
                $connect = $this->getLogin();
                if (!$connect) {
                    echo '<p>' . MSG_CONNECT_TO_SHOW_PROJECTS . '</p>';
                }
                ?>
            </div>

            <div class="col-md-6 col-sm-6 services-grid agileits w3layouts services-grid2 wow slideInRight">
                <?php 
                $connect = $this->getLogin();
                if ($connect) {
                    echo '<a class="wow slideInLeft" href="'. URL_DIR . 'projects/phase0'. '">'. PROJECTS_NEW_PROJECT . ' <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>';
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="service-info-grids agileits w3layouts">
            <div class="col-md-4 col-sm-4 service-info agileits w3layouts service-info wow fadeInUp">
                <img src="../images/service-icon-1.png" alt="Agileits W3layouts">
                <h4>REPREHENDERIT</h4>
                <div class="h4-underline wow agileits w3layouts slideInLeft"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 agileits w3layouts service-info service-info wow fadeInUp">
                <img src="../images/service-icon-2.png" alt="Agileits W3layouts">
                <h4>CILLUM DOLORE</h4>
                <div class="h4-underline wow agileits w3layouts slideInLeft"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4 col-sm-4 service-info service-info agileits w3layouts wow fadeInUp">
                <img src="../images/service-icon-3.png" alt="Agileits W3layouts">
                <h4>MAGNA ALIQUA</h4>
                <div class="h4-underline wow slideInLeft agileits w3layouts"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <a class="wow slideInLeft" href="about.html">Read More <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!-- //Services -->

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
