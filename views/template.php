<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/template.css" />
		<title><?php echo $title ?></title>
	</head>

	<body>
		<header id="container">
			<div id="logo">
				<a href="<?php echo URL_DIR;?>">
					<img src="/<?php echo SITE_NAME; ?>/Images/casmontana.png" />
				</a>
			</div>
			
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"></button>
				<div id="myDropdown" class="dropdown-content">
					<a href="<?php echo URL_DIR;?>"><?php echo MENU_HOME; ?></a>
					<a href="<?php echo URL_DIR . 'hikes/hikes'; ?>"><?php echo MENU_HIKESIDEAS; ?></a>
					<a href="<?php echo URL_DIR.'guidedhikes/guidedhikes';?>"><?php echo MENU_GUIDEDHIKES; ?></a> 
					<a href="<?php echo URL_DIR.'contact/contact';?>"><?php echo MENU_CONTACT; ?></a>
					<a href="<?php echo URL_DIR.'about/about';?>"><?php echo MENU_ABOUT; ?></a>
					<?php
						$connect = $this->getActiveUser ();
						if ($connect) {
							$user = $_SESSION ['user'];
							if ($user->isAdmin ( $user->getEmail () )) {
								echo '<a href="' . URL_DIR . 'administration/hikesManager' . '">' . MENU_ADMIN . '</a>';
							}
						}
					?>
				</div>
			</div>
			
			<!--  <div class="back">
				<input style="width: 30px;" type="image" src="/<?php echo SITE_NAME; ?>/Images/back.png" onclick="history.back();" />
			</div> -->
			
			<div id="languages">
				<?php
					if (isset ( $_GET ['id'] )) 
						echo '<a style="text-decoration: none;" href="' . '?id=' . $_GET ['id'] . '&lang=en">';
					else 
						echo '<a style="text-decoration: none;" href="?lang=en">';
				?>
				<img src="/<?php echo SITE_NAME; ?>/Images/icon_en_flat.png" />
				<?php 
					echo '</a>';
			
					if (isset ( $_GET ['id'] )) 
						echo '<a style="text-decoration: none;" href="' . '?id=' . $_GET ['id'] . '&lang=fr">';
					else
						echo '<a style="text-decoration: none;" href="?lang=fr">';
				?>
				<img src="/<?php echo SITE_NAME; ?>/Images/icon_fr_flat.png" />
				<?php echo '</a>'?>
			</div>
			
			<div id="login">
	    		<?php
					$connect = $this->getActiveUser ();
					if ($connect) {
						$user = $_SESSION ['user'];
						echo TEMP_WELCOME . ' ' . $user->getFirstname () . ' ' . $user->getLastname ();
						echo ' <a href="' . URL_DIR . 'account/account' . '">' . TEMP_ACCOUNT . '</a>';
						echo ' <a href="' . URL_DIR . 'login/logout' . '">' . TEMP_LOGOUT . '</a>';
					} else {
						echo '<a href="' . URL_DIR . 'login/login' . '">' . TEMP_LOGIN . '</a>';
						echo ' <a href="' . URL_DIR . 'login/newuser' . '">' . TEMP_REGISTER . '</a>';
					}
				?>
			</div>
		</header>

		<!-- diplay pages (content that changes) within here -->
		<div id="content">
			<?php echo $content ?>
		</div>

		<footer> 
			<?php echo 'Copyright HES-SO 2016. Designed by Daisy, Camille, Nam, Vincent & Daniel'; ?>
		</footer>

		<script>
			/* When the user clicks on the button, toggle between hiding and showing the menu content */
			function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
			}
		</script>
		
	</body>
</html>
