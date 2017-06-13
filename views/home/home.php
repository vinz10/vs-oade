<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/homeTemplate.css" />

<?php 
	// Initialization title
	$title = HOME_TITLE;
	
	// Template CSS
	ob_start(); 
?>

<div id="propositions">
	<h1><?php echo MENU_HIKESIDEAS; ?></h1>
    
    <a href="<?php echo URL_DIR.'hikes/hikes';?>">
    	<img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/hikes.png" width="300px" height="700px" alt="Hikes Ideas" />
    </a>
</div>
        
<div id="stays">
	<a href="<?php echo URL_DIR . 'guidedhikes/guidedhikes'; ?>">
		<img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/stay.png" width="300px" height="700px" alt="Our Stays"/>
	</a>
    
    <h1><?php echo MENU_GUIDEDHIKES; ?></h1>
</div>

<div id="infos">
	<h1><?php echo MENU_ABOUT; ?></h1>
    
	<a href="<?php echo URL_DIR.'about/about';?>">
		<img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/member.png" width="300px" height="194px" alt="member" />
	</a>
    
    <h1><?php echo MENU_CONTACT; ?></h1>
            
	<a href="<?php echo URL_DIR.'contact/contact';?>">
		<img class="hovered" src="/<?php echo SITE_NAME; ?>/Images/contact.png" width="300px" height="194px" alt="contact" />
	</a>

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
</div>

<?php
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php' 
?>