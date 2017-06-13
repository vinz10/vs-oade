<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/hike.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />

<!-- The JavaScript -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.filtertable.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/bindWithDelay.js"></script>
<script>
$(document).ready(function() 
	    { 
	        $("#resumeTable").tablesorter(); 
	        $("#resumeTable").filterTable({
				inputName : 'filter',
				containerClass : 'containerFilter',
				label : '<?php echo FILTER;?>' + ' :',
				placeholder : '<?php echo SEARCH;?>',
				minRows : 1,
				ignoreColumns : [5]
			});
	    } 
	); 
</script>

<?php
	// Initialization of variables
	$msg = $this->vars['msg'];
	$msgSuccess = $this->vars['msgSuccess'];
	$hike = new Hike ( $this->data ['id'], $this->data ['title'], $this->data ['description'], $this->data ['distance'], $this->data ['startPlace'], $this->data ['endPlace'], $this->data ['type'] );
	$hike->setImagePath ( $this->data ['imagePath'] );
	$hike->setStartDate ( $this->data ['startDate'] );
	$hike->setEndDate ( $this->data ['endDate'] );
	$hike->setDepartureTime ( $this->data ['departureTime'] );
	$hike->setArrivalTime ( $this->data ['arrivalTime'] );
	$hike->setDuration ( $this->data ['duration'] );
	$hike->setDifficultyLevel ( $this->data ['difficultyLevel'] );
	$hike->setRegistrationMax ( $this->data ['registrationMax'] );
	$hike->setPrice ( $this->data ['price'] );
	$startPlace = hikeController::getStartPlaceByHike ( $hike->getId () );
	$endPlace = hikeController::getEndPlaceByHike ( $hike->getId () );
	if (isset ( $this->vars ['registred'] )) $registred = $this->vars ['registred'];
	if (isset ( $this->vars ['rowCount'] )) $rowCount = $this->vars ['rowCount'];
	if (isset ( $this->vars ['user'] )) $user = $this->vars ['user'];
	if (isset ( $this->vars ['isRegistered'] )) $isRegistred = $this->vars ['isRegistered'];
	$nbRegistred = $this->vars ['nbRegistred'];
	if (isset ( $this->vars ['memberNumberRegistration'] )) $memberNbRegistration = $this->vars ['memberNumberRegistration'];
 	$title = 'CAS ' . $hike->getTitle(); 
 	
 	// Template CSS
 	ob_start(); 
?>

<div class="success-msg">
	<?php echo $msgSuccess;?>
</div>

<div class="error-msg">
	<?php echo $msg;?>
</div>

<div id="oneHikecontainer">

	<!-- setting up a default image if none gotten from db HEADER-->
	<div id="hikeImage">
		<?php
			if ($hike->getImagePath () == null)
				echo '<img class="imgHike" src="/' . SITE_NAME . '/Images/default_big_pic.jpg" alt="nopicture" />';
			else
				echo '<img class="imgHike" src="/' . SITE_NAME . '/' . $hike->getImagePath () . '" alt="Hike picture" />';
			?>
    </div>

	<h1 class="titleOneHike"><?php echo $hike->getTitle() ?></h1>
	<h3 class="titleOneHike"><?php echo $hike->getDescription() ?></h3>

	<table style="margin: 0 auto;" class="hikeInfos">
    	<?php 
       		if ($hike->getDistance () != null)
				echo '<tr><td><p class="label">'. DISTANCE .': </p></td>' . '<td><p class="attribute">' . $hike->getDistance () . 'km </p></td></tr>';
			if ($hike->getStartDate () != null)
				echo '<tr><td><p class="label">'. STARTDATE .': </p></td>' . '<td><p class="attribute">' . strtok ( $hike->getStartDate (), ' ' ) . '</p></td></tr>';
			if ($hike->getEndDate () != null)
				echo '<tr><td><p class="label">'. ENDDATE .': </p></td>' . '<td><p class="attribute">' . strtok ( $hike->getEndDate (), ' ' ) . '</p></td></tr>';
			if ($hike->getDepartureTime () != null)
				echo '<tr><td><p class="label">'. DEPARTTIME .': </p></td>' . '<td><p class="attribute">' . $hike->getDepartureTime () . '</p></td></tr>';
			if ($hike->getArrivalTime () != null)
				echo '<tr><td><p class="label">'. ARRIVETIME .': </p></td>' . '<td><p class="attribute">' . $hike->getArrivalTime () . '</p></td></tr>';
			if ($hike->getDuration () != null)
				echo '<tr><td><p class="label">'. DURATION .': </p></td>' . '<td><p class="attribute">' . $hike->getDuration () . 'h </p></td></tr>';
			if ($hike->getDifficultyLevel () != null)
				echo '<tr><td><p class="label">'. DIFFICULTY .': </p></td>' . '<td><p class="attribute">' . $hike->getDifficultyLevel () . '</p></td></tr>';
			if ($hike->getPrice () != null)
				echo '<tr><td><p class="label">'. PRICE .': </p></td>' . '<td><p class="attribute">' . $hike->getPrice () . 'CHF </p></td></tr>';
			
			if($hike->getType () == '2' or $hike->getType () == '3')
            	echo '<tr><td><p class="label">'. HIKE_PLACEAVAILABLE .':</p></td>' . '<td><p class="attribute">' . ($hike->getRegistrationMax() - $nbRegistred) . ' Place(s)</p></td></tr>';
        ?>
   	</table>
   	
   	<?php 
	if(isset($_SESSION['user'])) :
	if($hike->getType () == '2' or $hike->getType () == '3') :
?>
	<script>
		function calculateTotale(number) {
			var inputTotal = document.getElementById("totalBook");
			var price = <?php echo $hike->getPrice();?>;

			var total = price * number.value;
			inputTotal.value = total;
		}
	</script>
	
	<div id="BookingPane">
		<input type="checkbox"><span><?php echo REGISTRATION; ?></span>
		<div id="BookFormPane">
			<form name="book" enctype="multipart/form-data" action="<?php 
				echo URL_DIR . 'hike/book?idHike=' . $hike->getId () . '&idUser=' . $user->getId(); ?>" method="post">
				<label for="numberOfRegistration" class="label"><?php echo HIKE_NBREGIST . ':';?></label><br>
				<input id="numberToRegister" type="number" min="1" max="<?php echo ($hike->getRegistrationMax() - $nbRegistred);?>" 
				name="numberOfRegistration" onchange="calculateTotale(this)" 
				<?php if($isRegistred != 0) echo 'value="' . $memberNbRegistration . '" readonly'; else echo'value="1"';?>><br>
				<label for="price" class="label"><?php echo HIKE_TOTALPRICE . ':';?></label><br>
				<input id="totalBook" type="number" readonly value="<?php if($isRegistred != 0) 
				echo ($hike->getPrice()*$memberNbRegistration) ; else echo $hike->getPrice();?>">
				<br>
				<?php if($isRegistred == 0) :?>
					<button type="submit" name="BookButton" value="addBook"><?php echo REGISTER; ?></button>
				<?php endif;?>
			</form>
		</div>
	</div>
<?php 
	endif;
	endif;?>

		<div class="zoneFavoriteRate">
    	<?php
			if (hikeController::ifUserConnected ()) {
				echo '<a href="' . URL_DIR . 'hike/addToFavorite?id=' . $hike->getId () . '"> ';
				
				if (! hikeController::ifFavorite ( $hike->getId () ))
					echo '<img class="favorite_button" src="/' . SITE_NAME . '/Images/heart_icon_empty.png" />';
				else
					echo '<img class="favorite_button" src="/' . SITE_NAME . '/Images/heart_icon_base.png" alt="Member"/>';
				
				echo '</a>';
			}
			
			if (hikeController::ifUserConnected ()) {
				if (! hikeController::alreadyRated ( $hike->getId () )) {
					echo "<script type='text/javascript'>
					 $(document).ready(function() {
					   $('input[name=star]').change(function(){
					        $('#rate').submit();
					   });
					  });
					
					</script>";
						
					echo '<div class="cont">
					  <div class="stars">
					    <form method="post" id="rate" action="' . URL_DIR . 'hike/addRate?id=' . $hike->getId () . '">
					      <input class="star star-5" id="star-5-2" type="radio" value="5" name="star"/>
					      <label class="star star-5" for="star-5-2"></label>
					      <input class="star star-4" id="star-4-2" type="radio" value="4" name="star"/>
					      <label class="star star-4" for="star-4-2"></label>
					      <input class="star star-3" id="star-3-2" type="radio" value="3" name="star"/>
					      <label class="star star-3" for="star-3-2"></label>
					      <input class="star star-2" id="star-2-2" type="radio" value="2" name="star"/>
					      <label class="star star-2" for="star-2-2"></label>
					      <input class="star star-1" id="star-1-2" type="radio" value="1" name="star"/>
					      <label class="star star-1" for="star-1-2"></label>
					    </form>
					  </div>
					</div>';
				} else {
					
					$rate = accountController::getRate ( $hike->getId () );
					echo '<div class="cont">
					  <div class="stars">
					    <form method="post" id="rate" action="' . URL_DIR . 'hike/addRate?id=' . $hike->getId () . '">
					      <input class="star star-5" id="star-5-2" type="radio" value="5" name="star"';
						if ($rate == 5)
							echo 'checked/>';
						else
							echo 'disabled/>';
						echo '<label class="star star-5" for="star-5-2"></label>
	      					<input class="star star-4" id="star-4-2" type="radio" value="4" name="star"';
						if ($rate == 4)
							echo 'checked/>';
						else
							echo 'disabled/>';
						echo '<label class="star star-4" for="star-4-2"></label>
	      					<input class="star star-3" id="star-3-2" type="radio" value="3" name="star"';
						if ($rate == 3)
							echo 'checked/>';
						else
							echo 'disabled/>';
						echo '<label class="star star-3" for="star-3-2"></label>
	      					<input class="star star-2" id="star-2-2" type="radio" value="2" name="star"';
						if ($rate == 2)
							echo 'checked/>';
						else
							echo 'disabled/>';
						echo '<label class="star star-2" for="star-2-2"></label>
	      					<input class="star star-1" id="star-1-2" type="radio" value="1" name="star"';
						if ($rate == 1)
							echo 'checked/>';
						else
							echo 'disabled/>';
						echo '<label class="star star-1" for="star-1-2"></label>
						    </form>
						  </div>
						</div>';
				}
			}
		?>	
	</div>

	<div class="div_maps">
		<script
			src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDbN5A59FglmgjpwWtWTOXvCeOdxu7ot34'></script>

		<div id='gmap_canvas'></div>

		<script type='text/javascript'>

			function init_map() {
				
				var latitude, longitude;
				var geocoder =  new google.maps.Geocoder();
				var directionsDisplay = new google.maps.DirectionsRenderer;
				var directionsService = new google.maps.DirectionsService;
				var location = '<?php echo $startPlace->getCity();?>';
	
				geocoder.geocode( { 'address': location}, 
					function(results, status) {
			        	if (status == google.maps.GeocoderStatus.OK) {
			        		latitude = results[0].geometry.location.lat();
			        		longitude = results[0].geometry.location.lng(); 
			        	} else {
			        		latitude = 46.2885965;
			        		longitude = 7.475380500000028; 
			   			}
	
			        	var map = new google.maps.Map(document.getElementById('gmap_canvas'), 
							{
						    	zoom: 7,
						    	center: {lat: latitude, lng: longitude},
			        			mapTypeId: google.maps.MapTypeId.HYBRID
						  	});

			        	directionsDisplay.setMap(map);
			        	calculateAndDisplayRoute(directionsService, directionsDisplay);
			   		}
		   		);
			}

			function calculateAndDisplayRoute(directionsService, directionsDisplay) {
				directionsService.route({
					origin: '<?php echo $startPlace->getCity() . ', ' . $startPlace->getRegion(); ?>',
					destination: '<?php echo $endPlace->getCity() . ', ' . $endPlace->getRegion(); ?>',
					travelMode: google.maps.TravelMode.WALKING
				  }, function(response, status) {
				    if (status === google.maps.DirectionsStatus.OK) {
				      directionsDisplay.setDirections(response);
				    } else {
				      window.alert('Directions request failed due to ' + status);
				    }
				  });
				}
			
			google.maps.event.addDomListener(window, 'load', init_map);
	
		</script>
	</div>
</div>
<?php 

	if($hike->getType () == '2' or $hike->getType () == '3') :
		if(isset($this->vars['user']))
		if($user->getUserType() == 2) :
		if($rowCount > 0) :
	?>
	<table id="resumeTable" class="tableInfo">
		<caption class="tableInfoTitle"><?php echo HIKE_REGIST; ?></caption>
		<thead>
			<tr>
				<th>
					<span><?php echo FIRSTNAME; ?></span>
				</th>
				<th>
					<span><?php echo LASTNAME; ?></span>
					</th>
				<th>
					<span><?php echo EMAIL; ?></span>
					</th>
				<th>
					<span><?php echo TELEPHONE; ?></span>
					</th>
				<th><span><?php echo HIKE_NOREGIST; ?></span></th>
				<th><span><?php echo DELETE; ?></span></th>
			</tr>
		</thead>
		<tbody>
			<?php	
				foreach ( $registred as $row ) {
					echo '<tr>
								<td>';
					echo $row ['Firstname'];
					echo '</td>
								<td>';
					echo $row ['Lastname'];
					echo '</td><td>';
					echo $row ['Email'];
					echo '</td>
								<td>';
					echo $row ['Telephone'];
					echo '</td>
								<td>';
					echo $row ['NumberRegistred'];
					echo '</td><td>';
					echo '<a href="' . URL_DIR . 'hike/deleteBook?idHike=' . $hike->getId() . '&idUser=' . $user->getId() . '"><button type="button" name="DeleteButton_' . $hike->getId () . '_' . $user->getId() . '" value="DeleteButton">' . DELETE . '</button></a>';
					echo '</td></tr>';
				}
			?>
		</tbody>
	</table>
<?php else : ?>
<div class="tableInfoTitle"><?php echo NO_INSCRIPTION?></div>
<?php 
	endif;
	endif;	
	endif;
	
	// Unset variables
	unset( $_SESSION ['msg'] );
	unset( $_SESSION ['msgSuccess'] );
	
	// Template CSS
	$content = ob_get_clean();
	require 'views/template.php'; 
?>