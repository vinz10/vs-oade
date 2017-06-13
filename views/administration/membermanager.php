<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/administration.css"/>
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/menu.css" />

<!-- The JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/menu.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.filtertable.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/bindWithDelay.js"></script>
<script>
$(document).ready(function() 
	    { 
	        $("#resumeTable").filterTable({
				inputName : 'filter',
				containerClass : 'containerFilter',
				label : '<?php echo FILTER;?>' + ' :',
				placeholder : '<?php echo SEARCH;?>',
				minRows : 1,
				ignoreColumns : [3]
			});
	    } 
	); 
</script>

<?php
	// Initialization of variables
	$title = ADMIN_TITLE;
	$users = $this->vars ['members'];
	$msg = $this->vars ['msg'];
	$msgSuccess = $this->vars ['msgSuccess'];
	
	// Template CSS
	ob_start();
?>

<!-- MENU -->
<ul id="sdt_menu" class="sdt_menu">
	<li>
		<a href="<?php echo URL_DIR.'administration/membermanager';?>"> 
			<img src="/<?php echo SITE_NAME; ?>/Images/permission.jpg" alt="" /> 
			<span class="sdt_active"></span> 
			<span class="sdt_wrap"> 
				<span class="sdt_link"><?php echo MANAGE_PERMISSION; ?></span>
				<span class="sdt_descr"><?php echo DESC_PERMISSION;?></span>
			</span>
		</a>
		<div class="sdt_box">
			<a href="<?php echo URL_DIR.'administration/hikesmanager';?>"><?php echo ADMIN_HIKE;?></a>
			<a href="<?php echo URL_DIR.'administration/membermanager';?>"><?php echo ADMIN_PERMISSION; ?></a>
		</div>
	</li>
</ul> 
 
<!-- Content of the Page -->
<div class="success-msg">
		<?php echo $msgSuccess;?>
	</div>
	
	<div class="error-msg">
		<?php echo $msg;?>
	</div>

<div>
	<table id="resumeTable" class="table_membermanag">
		<thead>
			<tr>
				<th>
					<?php echo FIRSTNAME;?>
				</th>
				<th>
					<?php echo LASTNAME;?>
				</th>
				<th>
					<?php echo EMAIL;?>
				</th>
				<th>
					<?php echo PERMISSION;?>
				</th>
			</tr>
		</thead>
		<?php
			foreach ( $users as $u ) {
				echo '<tr><td>';
				echo $u->getFirstname ();
				echo '</td><td>';
				echo $u->getLastname ();
				echo '</td><td>';
				echo $u->getEmail ();
				echo '</td><td>';
				echo '<a href="' . URL_DIR . 'administration/changePermission?idUser=' . $u->getId () . '&type=' . $u->getUserType () . '">';
				if ($u->getUserType () == 1)
					echo '<img class="crown_button" src="/' . SITE_NAME . '/Images/crownEmpty.png" alt="Member"/>';
				else if ($u->getUserType () == 2)
					echo '<img class="crown_button" src="/' . SITE_NAME . '/Images/crown.png" alt="Administrator"/>';
				echo '</a></td></tr>';
			}
		?> 
	</table>
</div>

<?php
	// Unset variables
	unset ( $_SESSION ['title'] );
	unset ( $_SESSION ['msg'] );
	unset ( $_SESSION ['msgSuccess']);
	unset ( $_SESSION ['users'] );

	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php'; 
?> 