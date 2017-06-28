<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <head>
        
        <title><?php echo $title ?></title>

        <!-- Meta-Tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="vs-oade">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        
        <!-- Custom-Stylesheet-Links -->
        <!-- Bootstrap-CSS -->  
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
        <!-- Index-Page-CSS --> 
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <!-- Animate.CSS -->    
        <link rel="stylesheet" href="css/animate.css" type="text/css" media="all">
        
        <!-- Fonts -->
        <!-- Body-Font -->	 
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" type="text/css">
        <!-- Logo-Font -->	 
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,900,700" type="text/css">
        <!-- Navbar-Font --> 
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">
        
    </head>
    
    <!-- Body -->
    <body>
        <!-- Header -->
        <div class="header agileits w3layouts" id="home">
            
            <!-- Navbar -->
            <nav class="navbar navbar-default w3l aits wow bounceInUp agileits w3layouts">
                <div class="container">
                    
                    <div class="navbar-header agileits w3layouts">
                        <button type="button" class="navbar-toggle agileits w3layouts collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                            <span class="sr-only agileits w3layouts">Toggle navigation</span>
                            <span class="icon-bar w3l"></span>
                            <span class="icon-bar aits"></span>
                            <span class="icon-bar w3laits"></span>
                        </button>
                        <a class="navbar-brand agileits w3layouts" href="<?php echo URL_DIR;?>">vs-oade</a>
                    </div>

                    <div id="navbar" class="navbar-collapse agileits w3layouts navbar-right collapse">
                        <ul class="nav agileits w3layouts navbar-nav">
                            <li><a href="<?php echo URL_DIR;?>"><?php echo MENU_HOME; ?></a></li>
                            <li><a href="<?php echo URL_DIR.'projects/manual';?>"><?php echo MENU_MANUAL; ?></a></li>
                            <li><a href="<?php echo URL_DIR . 'projects/projects'; ?>"><?php echo MENU_PROJECT; ?></a></li>
                            <li>
                            <?php
                                if (isset ( $_GET ['id'] )) { 
                                    echo '<a href="' . '?id=' . $_GET ['id'] . '&lang=de">';
                                }
                                else { 
                                    echo '<a href="?lang=de">';
                                }
                                echo MENU_DEUTSCH . '</a>';
                            ?>
                            </li>
                            <li>
                            <?php 
                                if (isset ( $_GET ['id'] )) { 
                                    echo '<a href="' . '?id=' . $_GET ['id'] . '&lang=fr">';
                                }
                                else {
                                    echo '<a href="?lang=fr">';
                                }
                                echo MENU_FRENCH . '</a>';
                            ?>
                            </li>
                            <li>
                            <?php
                                $connect = $this->getLogin();
                                if ($connect) {
                                    echo "<div style='font:11px Arial,tahoma,sans-serif;'>" . TEMP_CONNECT . ' ' . $connect->getTownName();
                                    echo ' <a href="' . URL_DIR . 'login/logout' . '">' . TEMP_LOGOUT . '</a></div>';
                                } else {
                                    echo '<a href="' . URL_DIR . 'login/initlogin' . '">' . TEMP_LOGIN . '</a>';
                                }
                            ?>    
                            </li>
                        </ul>
                    </div> 
                </div>
            </nav>
            <div class="clearfix"></div>
        </div>

        <!-- diplay pages (content that changes) within here -->
        <div id="content">
            <?php echo $content ?>
        </div>

        <!-- Footer -->
        <div class="footer agileits w3layouts">
            <div class="container">
                
                <div class="col-md-6 col-sm-6 agileits w3layouts footer-grids">
                    <div class="col-md-4 col-sm-4 footer-grid agileits w3layouts footer-grid-1 wow fadeInUp">
                        <ul class="agileits w3layouts">
                            <li class="agileits w3layouts"><a href="<?php echo URL_DIR;?>"><?php echo MENU_HOME; ?></a></li>
                            <li class="agileits w3layouts"><a href="<?php echo URL_DIR.'projects/manual';?>"><?php echo MENU_MANUAL; ?></a></li>
                            <li class="agileits w3layouts"><a href="<?php echo URL_DIR . 'projects/projects'; ?>"><?php echo MENU_PROJECT; ?></a></li>
                        </ul>
                    </div>
                    <!--<div class="col-md-4 col-sm-4 footer-grid agileits w3layouts footer-grid-2 wow fadeInUp">
                        <ul class="agileits w3layouts">
                            <li class="agileits w3layouts"><a href="gallery.html">Bahamas</a></li>
                            <li class="agileits w3layouts"><a href="gallery.html">Hawaii</a></li>
                            <li class="agileits w3layouts"><a href="gallery.html">Miami</a></li>
                            <li class="agileits w3layouts"><a href="gallery.html">Ibiza</a></li>
                        </ul>
                    </div>-->
                    <div class="col-md-4 col-sm-4 footer-grid agileits w3layouts footer-grid-3 wow fadeInUp">
                        <ul class="agileits w3layouts">
                            <li class="agileits w3layouts">
                            <?php
                                if (isset ( $_GET ['id'] )) { 
                                    echo '<a href="' . '?id=' . $_GET ['id'] . '&lang=de">';
                                }
                                else { 
                                    echo '<a href="?lang=de">';
                                }
                                echo MENU_DEUTSCH . '</a>';
                            ?>
                            </li>
                            <li class="agileits w3layouts">
                            <?php 
                                if (isset ( $_GET ['id'] )) { 
                                    echo '<a href="' . '?id=' . $_GET ['id'] . '&lang=fr">';
                                }
                                else {
                                    echo '<a href="?lang=fr">';
                                }
                                echo MENU_FRENCH . '</a>';
                            ?>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-6 col-sm-6 footer-grids agileits w3layouts social wow fadeInUp">
                    <ul class="social-icons">
                        <li class="agileits w3layouts"><a href="#" class="facebook agileits w3layouts" title="Go to Our Facebook Page"></a></li>
                        <li class="agileits w3layouts"><a href="#" class="twitter agileits w3layouts" title="Go to Our Twitter Account"></a></li>
                        <li class="agileits w3layouts"><a href="#" class="googleplus agileits w3layouts" title="Go to Our Google Plus Account"></a></li>
                        <li class="agileits w3layouts"><a href="#" class="instagram agileits w3layouts" title="Go to Our Instagram Account"></a></li>
                        <li class="agileits w3layouts"><a href="#" class="youtube agileits w3layouts" title="Go to Our Youtube Channel"></a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-sm-6 footer-grids agileits w3layouts copyright wow fadeInUp">
                    <p>&copy; 2017 Vincent Bearpark - Travail Bachelor. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank"> W3layouts </a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <!-- Custom-JavaScript-File-Links -->

        <!-- Default-JavaScript -->	  
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <!-- Bootstrap-JavaScript --> 
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!-- Animate.CSS-JavaScript -->
        <script src="js/wow.min.js"></script>
        <script>new WOW().init();</script>

        <!-- Slider-JavaScript -->
        <script src="js/responsiveslides.min.js"></script>
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
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll, .navbar li a, .footer li a").click(function(event){
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
    </body>
</html>