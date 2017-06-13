<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/contact.css"/>
<?php 
	// Initialization title
	$title = CONTACT_TITLE;
	
	// Template CSS
	ob_start(); 
?>

<div class="contactFormular">

    <div class="formular-screen">
        <div class="title">
            <h1><?php echo CONTACT_ERROR; ?></h1>
        </div>

        <div class="textarea">
        	<?php echo MESSAGE_ERROR; ?>
            <br>
       		<?php echo MESSAGE_ERROR2; ?>
        </div>

        <input type="submit" name="cancel" onclick="history.go(-1);" value="<?php echo RETRY; ?>"/>
    </div>

    <a href="<?php echo URL_DIR . 'contact/contact'; ?>"></a>
</div>

<?php 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php';
?>