<?php
// Initialization title
$title = HOME_TITLE;

$login = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$login1 = isset($_SESSION['login1']) ? $_SESSION['login1'] : null;
$login2 = isset($_SESSION['login2']) ? $_SESSION['login2'] : null;

// Template CSS
ob_start();
?>

<!-- PROCESS -->
<div class="manual agileits w3layouts">
    <div class="container">
        <div class="col-md-6 col-sm-6 manual-grids manual-grids2 agileits w3layouts wow slideInRight">

            <h3><?php echo HOME_MANUAL; ?></h3>

            <div class="slider-4 agileits w3layouts">
                <ul class="rslides agileits w3layouts" id="slider4">
                    <li>
                        <p><?php echo MANUAL_PHASE1; ?></p>
                        <h4>Phase 1</h4>
                    </li>
                    <li>
                        <p><?php echo MANUAL_PHASE2; ?></p></p>
                        <h4>Phase 2</h4>
                    </li>
                    <li>
                        <p><?php echo MANUAL_PHASE3; ?></p></p>
                        <h4>Phase 3</h4>
                    </li>
                    <li>
                        <p><?php echo MANUAL_PHASE4; ?></p></p>
                        <h4>Phase 4</h4>
                    </li>
                    <li>
                        <p><?php echo MANUAL_PHASE5; ?></p></p>
                        <h4>Phase 5</h4>
                    </li>
                    <li>
                        <p><?php echo MANUAL_PHASE6; ?></p></p>
                        <h4>Phase 6</h4>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 manual-grids manual-grids1 agileits w3layouts wow slideInLeft">

            <h3><?php echo HOME_MANUAL; ?></h3>

            <div class="abt-btm agileits w3layouts">
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-question-sign icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_SURVEY; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-signal icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_CAPITAL_GAIN; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-exclamation-sign icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_CONFLICT; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-pencil icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_WEIGHTING; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-adjust icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_CONSISTENCY; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 agileits w3layouts bottom-gds">
                    <div class="bott-img agileits w3layouts">
                        <div class="icon-holder agileits w3layouts">
                            <span class="glyphicon agileits w3layouts glyphicon-plus-sign icon" aria-hidden="true"></span>
                        </div>
                        <h4 class="mission agileits w3layouts"><?php echo HOME_OPTIMIZATION; ?></h4>
                        <p class="description agileits w3layouts"><a href="projects/manual"><?php echo PROJECT_ACCESS; ?></a></p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- PROJECTS -->
<div class="projects agileits w3layouts">
    <div class="container">
        <div class="col-md-8 col-sm-8 projects-grid agileits w3layouts projects-grid1 wow slideInLeft">
            <div class="slider-2 agileits w3layouts">
                <ul class="rslides agileits w3layouts" id="slider2">
                    <li>
                        <img src="images/project-1.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-2.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-3.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-4.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-5.jpg" alt="Agileits W3layouts">
                    </li>
                </ul>
            </div>

            <div class="slider-3 agileits w3layouts">
                <ul class="rslides agileits w3layouts" id="slider3">
                    <li>
                        <img src="images/project-5.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-6.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-7.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-1.jpg" alt="Agileits W3layouts">
                    </li>
                    <li>
                        <img src="images/project-2.jpg" alt="Agileits W3layouts">
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 projects-grid agileits w3layouts projects-grid2 wow slideInRight">
            <h1><?php echo HOME_PROJECTS; ?></h1>
            <h4><?php echo HOME_PROJECTS_LIST; ?></h4>
            <div class="h4-underline agileits w3layouts wow slideInLeft"></div>
            <p><?php echo HOME_PROJECTS_DESC; ?></p>
            <a class="agileits w3layoutswow slideInLeft" href="<?php echo URL_DIR . 'projects/projects'; ?>"><?php echo HOME_PROJECTS_ACCESS; ?><span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
        </div>
    </div>
</div>

<!-- LOGIN -->
<?php if (!$login && !$login1 && !$login2) : ?>
    <div class="team agileits w3layouts">
        <div class="container">

            <h3><?php echo LOGIN; ?></h3>

            <div class="team-grids agileits w3layouts grid">
                <a href="<?php echo URL_DIR . 'login/login'; ?>">
                    <div class="col-md-4 col-sm-4 team-grid agileits w3layouts team-grid1 wow slideInUp">
                        <figure class="effect-zoe agileits w3layouts">
                            <img src="images/user.jpg" alt="Agileits W3layouts"/>
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
                            <img src="images/electeduser.jpg" alt="Agileits W3layouts"/>
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
                            <img src="images/adminuser.jpg" alt="Agileits W3layouts"/>
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
<?php endif; ?>

<?php
// Template CSS
$content = ob_get_clean();
require 'views/template.php';