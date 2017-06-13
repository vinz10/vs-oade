<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/account.css" />
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/menu.css" />

<!-- The JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.easing.1.3.js"></script>
<script src="/<?php echo SITE_NAME; ?>/js/menu.js" type="text/javascript"></script>

<?php
	// Initialization of variables
	$hikes = array ();
	$hikes = accountController::getMyFavoriteHikes ();
	$title = FAVORITE_TITLE;

	// Template CSS
	ob_start(); 
?>

<!-- MENU -->
<ul id="sdt_menu" class="sdt_menu">
	<li>
		<a href="<?php echo URL_DIR.'account/favorites';?>"> 
		<img src="/<?php echo SITE_NAME; ?>/Images/myFavorites.jpg" alt="" /> 
			<span class="sdt_active"></span> 
			<span class="sdt_wrap"> 
				<span class="sdt_link"><?php echo MENU_FAVORITES; ?></span> 
				<span class="sdt_descr"><?php echo MENU_MYFAVORITES; ?></span>
			</span>
		</a>
		<div class="sdt_box">
			<a href="<?php echo URL_DIR.'account/account';?>"><?php echo MENU_MYACCOUNT; ?></a>
			<a href="<?php echo URL_DIR.'account/rating';?>"><?php echo MENU_MYRATING; ?></a>
			<a href="<?php echo URL_DIR.'account/booking';?>"><?php echo MENU_MYBOOKING; ?></a>
		</div>
	</li>
</ul>

<div class="content">
	<!-- start displaying the hikes -->
	<div id="hikeHeader">
		<h1><?php echo MENU_MYFAVORITES; ?></h1>
	</div>

	<?php 
		if (!empty($hikes)): 
		foreach ($hikes as $hike): 
	?>
		<div class="hikecontainer"><!-- setting up a default image if none gotten from db -->
			<div class="hikeImage">
				<?php	
					if ($hike->getImagePath () == null)
						echo '<img class="hovered" src="/' . SITE_NAME . '/Images/default_hike.png" alt="nopicture" />';
					else
						echo '<img class="hovered" src="/' . SITE_NAME . '/' . $hike->getImagePath () . '" alt="Hike picture" />';
				?>
		    </div>
		
			<!--redirect on hike detail with correct id -->
			<div class="hikeTitlediv">
				<?php echo '<a href="' . URL_DIR . 'hike/hike?id=' . $hike->getId () . '"><h1 class="hikeTitle">' . $hike->getTitle () . '</h1></a>'; ?>
		  	</div>
		
			<div class="HikeDesc">
				<p><?php echo $hike->getDescription(); ?></p>
			</div>
		
			<div class="HikeValue">
				<p><?php echo '<img class="favorite_button" src="/'. SITE_NAME .'/Images/heart_icon_base.png" alt=""/>'; ?></p>
			</div>
		</div>
	<?php 
		endforeach; 
		else: 
			echo '<h1 class="h1Colored">' . NO_FAVORITE .'</h1>'; 
		endif; 
	?>
</div>

<?php 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php';
?>