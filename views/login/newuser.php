<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/register.css" />

<?php
	// Initialization of variables
	$msg = $this->vars['msg'];
	$persistence = $this->vars['persistence'];
	$title = REGISTER_TITLE;
	
	// Template CSS
	ob_start();
?>

<div class="error-msg">
	<?php echo $msg;?>
</div>

<form method="post" action="<?php echo URL_DIR.'login/register';?>">
	<div class="register">
		<div class="register-screen">
			<div class="app-title">
				<h1><?php echo REGISTRATION; ?></h1>	
			</div>
			
			<div class="register-form">
				<div class="control-group">
					<label class="register-field-icon fui-firstname" for="register-firstname"><?php echo "*" . FIRSTNAME; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[0];?>" name="firstname" id="register-firstname"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-lastname" for="register-lastname"><?php echo "*" . LASTNAME; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[1];?>" name="lastname" id="register-lastname"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-email" for="register-email"><?php echo "*" . EMAIL; ?></label>
					<input type="email" class="register-field" value="<?php echo $persistence[2];?>" name="email" id="register-email"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-password" for="register-password"><?php echo "*" . PASSWORD; ?></label>
					<input type="password" class="register-field" name="password" id="register-password"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-npa" for="register-npa"><?php echo "*" . POSTCODE; ?></label>
					<input type="number" min="1000" class="register-field" value="<?php echo $persistence[4];?>" name="npa" id="register-npa"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-locality" for="register-locality"><?php echo "*" . LOCALITY; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[5];?>" name="locality" id="register-locality"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-region" for="register-region"><?php echo "*" . REGION; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[6];?>" name="region" id="register-region"/>
					
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-address" for="register-address"><?php echo ADDRESS; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[7];?>" name="address" id="register-address"/>
				</div>
				
				<div class="control-group">
					<label class="register-field-icon fui-telephone" for="register-telephone"><?php echo TELEPHONE; ?></label>
					<input type="text" class="register-field" value="<?php echo $persistence[8];?>" name="telephone" id="register-telephone"/>
				</div>
				
				<div class="control-group">
					<label><?php echo GENDER;?></label>
					<select class="register-field" name="gender">
						<option <?php if($persistence[9] == "man") echo 'selected'; ?> value="man" ><?php echo MAN; ?></option>
						<option <?php if($persistence[9] == "woman") echo 'selected'; ?> value="woman"><?php echo WOMAN; ?></option>
					</select>
				</div>
				
				<input class="btn btn-primary btn-large btn-block" type="submit" name="Submit" value="<?php echo REGISTER; ?>"/>
				<a class="register-link" href="<?php echo URL_DIR.'login/login';?>"><?php echo LOGIN; ?></a>
			</div>		
		</div>	
	</div>			
</form>

<?php 
	// Unset variables
	unset($_SESSION['msg']);
	 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php' 
?>