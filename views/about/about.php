<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/about.css"/>

<?php 
	// Initialization title
	$title = ABOUT_TITLE; 

	// Template CSS
	ob_start(); 
?>

<div class="about">
	<div class="div_information">
		<h1>CAS Montana</h1>
		
		<p><?php echo PAR1; ?></p>
		<p><?php echo PAR2; ?></p>
		<p><?php echo PAR3; ?></p>
		<p><?php echo PAR4; ?></p>
		<p><?php echo PAR5; ?></p>
		<a href="<?php echo URL_DIR.'contact/contact';?>"><?php echo CONTACTUS; ?></a>
	</div>
	
	<!-- Google MAP -->
	<div class="div_maps">
		<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDbN5A59FglmgjpwWtWTOXvCeOdxu7ot34'></script>
		
		<div id='gmap_canvas'></div>
		
		<!-- The JavaScript -->
		<script type='text/javascript'>
	
			var marker;
	
			// Function initialization map
			function init_map() {
			
				var map = new google.maps.Map(document.getElementById('gmap_canvas'), {
			    	zoom: 11,
			    	center: {lat: 46.30762, lng: 7.473709999999983},
			    	mapTypeId: google.maps.MapTypeId.HYBRID
			  	});
	
				marker = new google.maps.Marker({
				    map: map,
				    draggable: true,
				    animation: google.maps.Animation.DROP,
				    position: {lat: 46.30762, lng: 7.473709999999983}
				});
		
				marker.addListener('click', toggleBounce);
		
				infowindow = new google.maps.InfoWindow({content: "<strong>CAS Montana</strong><br>Crans-Montana, Valais<br>"});
	
				google.maps.event.addListener(marker, 'click', function () {infowindow.open(map, marker);});
				infowindow.open(map, marker);
	
				// Call the function for the effect
				marker.setAnimation(google.maps.Animation.BOUNCE);
			}
	
			// Function for the effect
			function toggleBounce() {
				if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				} else {
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
			}
	
			// Initialization of the map
			google.maps.event.addDomListener(window, 'load', init_map);	
		</script>	
	</div>
</div>

<?php 
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php';
?>