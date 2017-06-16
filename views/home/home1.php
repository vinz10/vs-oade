<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/home.css" />

<?php 
    // Initialization title
    $title = HOME_TITLE;

    // Template CSS
    ob_start(); 
?>

<div id="manual">
    <h1><?php echo MENU_MANUAL; ?></h1>

    <a href="<?php echo URL_DIR.'hikes/hikes';?>">
        <img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/manual.jpg" width="346px" height="346px" alt="Hikes Ideas" />
    </a>
</div>

<div id="projects">
    <a href="<?php echo URL_DIR . 'projects/projects'; ?>">
        <img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/projects.jpg" width="346px" height="346px" alt="Projects"/>
    </a>

    <h1><?php echo MENU_PROJECT; ?></h1>
</div>

<?php
    // Template CSS
    $content = ob_get_clean(); 
    require 'views/template.php';
