<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/home.css" />

<?php 
    // Initialization title
    $title = HOME_TITLE;

    // Template CSS
    ob_start(); 
?>

<div id="projects">
    <h1><?php echo MENU_PROJECT; ?></h1>
    
    <a href="<?php echo URL_DIR.'hikes/hikes';?>">
    	<img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/hikes.png" width="300px" height="700px" alt="Hikes Ideas" />
    </a>
</div>
        
<div id="manual">
    <a href="<?php echo URL_DIR . 'guidedhikes/guidedhikes'; ?>">
            <img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/stay.png" width="300px" height="700px" alt="Our Stays"/>
    </a>
    
    <h1><?php echo MENU_MANUAL; ?></h1>
</div>

<!-- 
  <?php
        $connect = $this->getActiveUser ();
        if ($connect) {
            $user = $_SESSION ['user'];
            if($user->isAdmin($user->getEmail())) {
                echo '<h1>' . MENU_ADMIN . '</h1><a href="'. URL_DIR.'administration/hikesManager' . '">
    				 <img class="hovered" src="/' . SITE_NAME. '/Images/admin.jpg" width="300px" height="194px" alt="admin" /></a> ';
	    		}
        	}
   	?>
-->
<?php
    // Template CSS
    $content = ob_get_clean(); 
    require 'views/template.php';
