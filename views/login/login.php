<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/login.css" />

<?php
	// Initialization of variables
	$msg = $this->vars['msg'];
	$msgSuccess = $this->vars['msgSuccess'];
	$title = LOGIN_TITLE;
	
	// Template CSS
	ob_start();
?>

<div class="success-msg">
	<?php echo $msgSuccess;?>
</div>

<div class="error-msg">
	<?php echo $msg;?>
</div>


<form action="<?php echo URL_DIR.'login/connection';?>" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1><?php echo LOGIN;?></h1>	
			</div>
			
			<div class="login-form">
				<div class="control-group">
					<label for="login-name"><?php echo EMAIL; ?></label>
					<input type="email" name="email" id="login-name"/>
				</div>
				
				<div class="control-group">
					<label for="login-pass"><?php echo PASSWORD; ?></label>
					<input type="password" name="password" id="login-pass"/>	
				</div>
				
				<input type="submit" name="Submit" value="<?php echo LOGIN; ?>"/>
				<a class="login-link" href="<?php echo URL_DIR.'login/newuser';?>"><?php echo REGISTER; ?></a>
			</div>		
		</div>	
		</div>	
</form>

<?php 
	// Unset variables
	unset($_SESSION['msg']);
	unset($_SESSION['msgSuccess']);
	
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php'; 
?>