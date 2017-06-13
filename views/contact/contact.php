<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/contact.css" />
<?php 
	// Initialization title
	$title = CONTACT_TITLE; 
	
	// Template CSS
	ob_start(); 
?>

<form action="<?php echo URL_DIR . 'contact/mailerPHP'; ?>" method="post">
    <div class="contactFormular">

        <div class="formular-screen">

            <div class="title">
                <h1><?php echo CONTACTUS; ?></h1>
            </div>

            <div class="control-group">
            	<label for="register-firstname"><?php echo FIRSTNAME;?></label>
                <input type="text" name="fistname" id="register-firstname" onclick="this.value='';" />
             </div>

            <div class="control-group">
            	<label for="register-lastname"><?php echo LASTNAME;?></label>
                <input type="text" name="lastname" id="register-lastname" onclick="this.value='';" />
            </div>

            <div class="control-group">
            	<label class="register-field-icon fui-mail" for="register-mail"><?php echo EMAIL;?></label>
                <input type="email" name="mail" id="register-mail" onclick="this.value='';" />
            </div>

        <div class="textarea">
        	<label><?php echo MESSAGE;?></label>
        	<textarea name="message"></textarea>
        </div>

            <div class="control-group">
                <input type="submit" name="Submit" value="<?php echo SEND; ?>"/>
                <input type="submit" name="cancel" onclick="history.back();" value="<?php echo CANCEL; ?>"/>
            </div>


            <a href="<?php echo URL_DIR . 'contact/contact'; ?>"></a>
    	</div>
    </div>
</form>

<?php 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php';
?>