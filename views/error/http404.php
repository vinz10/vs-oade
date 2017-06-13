<?php 
	// Initialization title
	$title = '404 not found'; 
	
	// Template CSS
	ob_start(); 
?>

<font size="+1"><strong><?php echo $this->vars['title']?></strong></font><hr/>

<?php 
	// Message INFO
	echo 'Page '.$this->vars['controller'].'/'. $this->vars['method']. ' '. 'not found'; 
	
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php'; 
?>
