<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/hikes.css" />

<?php
	// Initialization of variables
	$hikes = array();
	$hikes = hikesController::getAllHikes();
	$title = HIKES_TITLE;
	
	// Template CSS
	ob_start();
?>

<!-- start displaying the hikes -->
<div class="content">
<div id="hikeHeader">
	<h1><?php echo MENU_HIKESIDEAS; ?></h1>
</div>
<?php 
	if (!empty($hikes)): 
	foreach ($hikes as $hike): 
?>
	<div class="hikecontainer">
		
		<!-- setting up a default image if none gotten from db -->
      	<div class="hikeImage">
      		<?php 
      			if($hike->getImagePath() == null)
        			echo '<img class="hovered" src="/' . SITE_NAME .'/Images/default_hike.png" alt="nopicture" />';
                else 
                	echo '<img class="hovered" src="/' . SITE_NAME . '/' . $hike->getImagePath() . '" alt="Hike picture" />';
            ?>
      	</div>

		<!--redirect on hike detail with correct id -->
      	<div class="hikeTitlediv">
        	<?php 
        		echo '<a href="' . URL_DIR.'hike/hike?id=' . $hike->getId() . '"><h1 class="hikeTitle">'. $hike->getTitle() . '</h1></a>'; 
        	?>
       	</div>

       	<div class="HikeDesc">
            <p>
            	<?php 
            		echo $hike->getDescription(); 
            	?>
            </p>
      	</div>
  	</div>
<?php 
	endforeach; 
	else:
		echo '<h1 class="h1Colored">' . NO_HIKE . '</h1>';
	endif; ?>
</div>
<?php 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php';
?>