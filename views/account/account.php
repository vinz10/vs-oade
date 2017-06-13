<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/account.css" />
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/menu.css" />

<!-- The JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.easing.1.3.js"></script>
<script src="/<?php echo SITE_NAME; ?>/js/menu.js" type="text/javascript"></script>

<?php
	// Initialization of variables
	$msg = $this->vars ['msg'];
	$msgSuccess = $this->vars ['msgSuccess'];
	$user = $_SESSION ['user'];
	$startPlace = Location::getLocationById ( $user->getUserLocation () );
	$title = ACCOUNT_TITLE;  
	
	// Template CSS
	ob_start(); 
?>

<!-- MENU -->
<ul id="sdt_menu" class="sdt_menu">
	<li>
		<a href="<?php echo URL_DIR.'account/account';?>"> 
			<img src="/<?php echo SITE_NAME; ?>/Images/myAccount.jpg" alt="" /> 
			<span class="sdt_active"></span> 
			<span class="sdt_wrap"> 
				<span class="sdt_link"><?php echo MENU_MYACCOUNT; ?></span> 
				<span class="sdt_descr"><?php echo INFORMATION; ?></span>
			</span>
		</a>
		<div class="sdt_box">
			<a href="<?php echo URL_DIR.'account/favorites';?>"><?php echo MENU_MYFAVORITES; ?></a>
			<a href="<?php echo URL_DIR.'account/booking';?>"><?php echo MENU_MYBOOKING; ?></a>
			<a href="<?php echo URL_DIR.'account/rating';?>"><?php echo MENU_MYRATING; ?></a>
		</div>
	</li>
</ul>

<div class="success-msg">
	<?php echo $msgSuccess;?>
</div>

<div class="error-msg">
	<?php echo $msg;?>
</div>

<form method="post" action="<?php echo URL_DIR.'account/modifyUser';?>">
	<div class="account">
		<div class="account-screen">
			<div class="app-title">
				<h1><?php echo INFORMATION; ?></h1>
			</div>

			<div class="account-form">
				<div class="control-group">
					<label class="account-field-icon fui-firstname" for="account-firstname"><?php echo "*" . FIRSTNAME; ?></label>
					<input type="text" value="<?php echo $user->getFirstname(); ?>" name="firstname" id="account-firstname" /> 
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-lastname" for="account-lastname"><?php echo "*" . LASTNAME; ?></label>
					<input type="text" value="<?php echo $user->getLastname(); ?>" name="lastname" id="account-lastname" /> 
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-email" for="account-email"><?php echo "*" . EMAIL; ?></label>
					<input type="email" value="<?php echo $user->getEmail(); ?>" name="email" id="account-email" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-password" for="account-password"><?php echo "*" . PASSWORD; ?></label>
					<input type="password" name="password" id="account-password" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-password" for="account-password"><?php echo "*" . CONFIRMPW; ?></label>
					<input type="password" name="confirmPassword" id="account-password" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-npa" for="account-npa"><?php echo "*" . POSTCODE; ?></label>
					<input type="number" value="<?php echo $startPlace->getZipCode(); ?>" name="npa" id="account-npa" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-locality" for="account-locality"><?php echo "*" . LOCALITY; ?></label>
					<input type="text" value="<?php echo $startPlace->getCity(); ?>" name="locality" id="account-locality" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-region" for="account-region"><?php echo "*" . REGION; ?></label>
					<input type="text" value="<?php echo $startPlace->getRegion(); ?>" name="region" id="account-region" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-address" for="account-address"><?php echo ADDRESS; ?></label>
					<input type="text" value="<?php echo $user->getAddress(); ?>" name="address" id="account-address" /> 
					
				</div>

				<div class="control-group">
					<label class="account-field-icon fui-telephone" for="account-telephone"><?php echo TELEPHONE; ?></label>
					<input type="text" value="<?php echo $user->getTelephone(); ?>" name="telephone" id="account-telephone" /> 
				</div>

				<div class="control-group">
					<label><?php echo GENDER;?></label>
					<select class="account-field" name="gender">
						<option <?php if($user->getGender() == "man") echo 'selected'; ?> value="man"><?php echo MAN; ?></option>
						<option <?php if($user->getGender() == "woman") echo 'selected'; ?> value="woman"><?php echo WOMAN; ?></option>
					</select>
				</div>

				<div class="control-group">
					<input class="btn btn-primary btn-large btn-block" type="submit" name="action" value="<?php echo MODIFY; ?>" />
				</div>

				<div class="control-group">
					<input class="btn-cancel" type="button" name="cancel" onClick="window.location.reload()" value="<?php echo CANCEL; ?>" />
				</div>
			</div>
		</div>
	</div>
</form>

<?php
	// Unset variables
	unset ( $_SESSION ['msg']);
	unset($_SESSION['msgSuccess']);

	// Template CSS
	$content = ob_get_clean();
	require 'views/template.php'; 
?>