<!-- The JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/menu.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/jquery.filtertable.js"></script>
<script type="text/javascript" src="/<?php echo SITE_NAME; ?>/js/bindWithDelay.js"></script>
<script type="text/javascript">	
	function switchPane(value)
	{
		var addHikePane = document.getElementById("paneAddHike");
		var addRegistrationPane = document.getElementById("paneAddRegistration");
		var addJourneyPane = document.getElementById("paneAddJourney");

		switch(value)   
		{
			case "addHike":
				addHikePane.style.display = 'block';
				addRegistrationPane.style.display = 'none';
				addJourneyPane.style.display = 'none';
				break;
			case "addRegistration":
				addHikePane.style.display = 'none';
				addRegistrationPane.style.display = 'block';
				addJourneyPane.style.display = 'none';
				break;
			case "addJourney":
				addHikePane.style.display = 'none';
				addRegistrationPane.style.display = 'none';
				addJourneyPane.style.display = 'block';
				break;
		}
	}

	function calculateMinDate(startDate) {
		var endDate = document.getElementById('endDate');

		endDate.min = startDate.value;
	} 
	
	$(document).ready(function() 
		    { 
				$("#resumeTable").tablesorter();
				$("#resumeTable").filterTable({
					quickList :['<?php echo HIKE;?>', '<?php echo REGIST;?>', '<?php echo JOURNEY;?>'],
					inputName : 'filter',
					containerClass : 'containerFilter',
					label : '<?php echo FILTER . ' :';?>',
					placeholder : '<?php echo SEARCH;?>',
					quickListClass : 'quickItem',
					quickListTag : 'button',
					minRows : 1,
					ignoreColumns : [6, 7]
				});
		    } 
		); 
</script>

<!-- The CSS -->
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/menu.css" />
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/template.css" />
<link rel="stylesheet" type="text/css" href="/<?php echo SITE_NAME; ?>/Style/hikesmanager.css"/>

<?php
	// Initialization of variables
	$title = ADMIN_TITLE;
	$persistence = $this->vars ['persistence'];
	$msg = $this->vars ['msg'];
	$msgSuccess = $this->vars ['msgSuccess'];
	$hikes = $this->vars ['hikes'];
	$hike = $this->vars ['hike'];
	$isModify = $this->vars ['isModify'];
	
	// Template CSS
	ob_start(); 
?>

<ul id="sdt_menu" class="sdt_menu">
	<li><a href="<?php echo URL_DIR.'administration/hikesmanager';?>"> <img
			src="/<?php echo SITE_NAME; ?>/Images/myHikes.jpg" alt="" /> <span
			class="sdt_active"></span> <span class="sdt_wrap"> <span
				class="sdt_link"><?php echo MANAGE_HIKES;?></span>
				<span class="sdt_descr"><?php echo MANAGE_HIKES;?></span>
		</span>
	</a>
		<div class="sdt_box">
			<a href="<?php echo URL_DIR.'administration/hikesmanager';?>"><?php echo ADMIN_HIKE;?></a>
			<a href="<?php echo URL_DIR.'administration/membermanager';?>"><?php echo ADMIN_PERMISSION?></a>
		</div></li>
</ul>

<!-- Content of the Page -->
<div class="div_principal">
	
	<!-- Form to create a new hike -->
	<div class="switchButtonPane">
		<input type="submit" id="Hike" class="btn" name="addHike" value="<?php echo HIKEBT; ?>" onclick="switchPane('addHike');"/> 
		<input type="submit" id="Registration" class="btn" name="addRegistration" value="<?php echo REGISTRATIONBT;?>" onclick="switchPane('addRegistration');"/> 
		<input type="submit" id="Journey" class="btn" name="addJourney" value="<?php echo JOURNEYBT;?>" onclick="switchPane('addJourney');" />
	</div>
	
	<div class="success-msg">
		<?php echo $msgSuccess;?>
	</div>
	
	<div class="error-msg">
		<?php echo $msg;?>
	</div>
	
	<?php 
		if ($hike != '') {	
			if ($hike->getTypeName() == HIKE)
				echo 
				'<script type="text/javascript">
					window.onload = function () { document.getElementById("Hike").click(); }
				</script>';
			else if ($hike->getTypeName() == REGIST)
				echo
				'<script type="text/javascript">
					window.onload = function () { document.getElementById("Registration").click(); }
				</script>';
			else if ($hike->getTypeName() == JOURNEY)
				echo
				'<script type="text/javascript">
					window.onload = function () { document.getElementById("Journey").click(); }
				</script>';
		}
	?>
	
	<br> <br>  
	
	<!-- Panel to add a Hike -->
	<div id="paneAddHike" class="div_paneAdd" style="display: block;">
		<form name="addHike" class="formHike" enctype="multipart/form-data" action="<?php if($isModify) 
			echo URL_DIR.'administration/edit?idHike='.$hike->getId(); else echo URL_DIR.'administration/createHike';?>" method="post">
			<label for="title"><?php echo '*' . HIKENAME; ?></label><br>
			<input type="text" name="title" class="input_text" value="<?php echo $persistence['title'];?>" /><br>
			
			<label for="decription"><?php echo '*' . DESCRIPTION; ?></label><br>
			<textarea name="description" class="input_text_multiline"><?php echo $persistence['description'];?></textarea><br>
			
			<label for="duration"><?php echo DURATION; ?></label><br>
			<input type="number" placeholder="<?php echo HOUR;?>" min="0" name="duration" class="input_number" value="<?php echo $persistence['duration'];?>" /> <br>
			
			<label><?php echo '*' . STARTLOCALITY;?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="startNPA" class="input_number" value="<?php echo $persistence['npaStart'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="startLocation" class="input_text" value="<?php echo $persistence['cityStart'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="startRegion" class="input_text" value="<?php echo $persistence['regionStart'];?>" placeholder="<?php echo REGION;?>" /><br>
				
			<label><?php echo '*' . ENDLOCALITY?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="endNPA" class="input_number" value="<?php echo $persistence['npaEnd'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="endLocation" class="input_text" value="<?php echo $persistence['cityEnd'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="endRegion" class="input_text" value="<?php echo $persistence['regionEnd'];?>" placeholder="<?php echo REGION;?>" /><br>
			
			<label for="image"><?php echo PICTURE;?></label><br>
			<input type="file" accept="image/jpg, image/jpeg, image/png, image/gif" name="image" class="input_text" /><br>
			
			<label for="distance"><?php echo '*' . DISTANCE;?></label><br> 
			<input type="number" min="0" name="distance" class="input_number" placeholder="km" value="<?php echo $persistence['distance'];?>" /><br>
			
			<label for="difficulty"><?php echo DIFFICULTY;?></label><br> 
			<select class="input_box" name="difficulty">
				<option
					<?php if($persistence['difficulty'] == 1) echo 'selected';?> value="1"><?php echo EASIER;?></option>
				<option
					<?php if($persistence['difficulty'] == 2) echo 'selected';?> value="2"><?php echo EASY;?></option>
				<option
					<?php if($persistence['difficulty'] == 3) echo 'selected';?> value="3"><?php echo NORMAL;?></option>
				<option
					<?php if($persistence['difficulty'] == 4) echo 'selected';?> value="4"><?php echo HARD;?></option>
				<option
					<?php if($persistence['difficulty'] == 5) echo 'selected';?> value="5"><?php echo HARDER;?></option>
			</select><br>
			
			<label for="heightDifference"><?php echo HEIGHTDIFFERENCE;?></label><br>
			<input type="number" min="0" name="heightDifference" class="input_number" placeholder="m" value="<?php echo $persistence['heightDifference'];?>" /><br>
			
			<button type="submit" class="btn_addHike" name="HikeButton" value="addHike">
				<?php if ($isModify) echo MODIFY . ' ' . HIKE; else echo CREATE . ' ' . HIKE; ?>
			</button><br>
			
			<a href="<?php echo URL_DIR . 'administration/reset';?>">
				<button type="button" class="btn_back" name="ResetButton" value="Reset"><?php echo RESET; ?></button>
			</a>
		</form>
	</div>
	
	<!-- Panel to add a Registration -->
	<div id="paneAddRegistration" class="div_paneAdd" style="display: none;">
		<form name="addRegistration" enctype="multipart/form-data" action="<?php if($isModify) 
			echo URL_DIR.'administration/edit?idHike='.$hike->getId(); else echo URL_DIR.'administration/createRegistration';?>?>" method="post">
			
			<label for="startDate"><?php echo DATE;?></label><br>
			<input type="date" name="startDate" class="input_calendar" value="<?php echo $persistence['startDate']?>" /><br>
		
			<label for="departTime"><?php echo DEPARTTIME;?></label><br>
			<input type="time" name="departTime" class="input_number" value="<?php echo $persistence['departureTime']; ?>" /><br>
			<label for="arrivalTime"><?php echo ARRIVETIME;?></label><br>
			<input type="time" name="arrivalTime" class="input_number" value="<?php echo $persistence['arrivalTime']; ?>" /><br>
			
			<label for="title"><?php echo '*' . HIKENAME;?></label><br>
			<input type="text" name="title" class="input_text" value="<?php echo $persistence['title']; ?>" /><br>
				
			<label for="description"><?php echo '*' . DESCRIPTION;?></label><br>
			<textarea name="description" class="input_text_multiline"><?php echo $persistence['description'];?></textarea><br>
				
			<label><?php echo '*' . STARTLOCALITY;?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="startNPA" class="input_number" value="<?php echo $persistence['npaStart'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="startLocation" class="input_text" value="<?php echo $persistence['cityStart'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="startRegion" class="input_text" value="<?php echo $persistence['regionStart'];?>" placeholder="<?php echo REGION;?>" /><br>
				
			<label><?php echo '*' . ENDLOCALITY?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="endNPA" class="input_number" value="<?php echo $persistence['npaEnd'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="endLocation" class="input_text" value="<?php echo $persistence['cityEnd'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="endRegion" class="input_text" value="<?php echo $persistence['regionEnd'];?>" placeholder="<?php echo REGION;?>" /><br>
				
			<label for="image"><?php echo PICTURE;?></label><br>
			<input type="file" accept="image/jpg, image/jpeg, image/png, image/gif" name="image" class="input_text" /><br>
				
			<label for="distance"><?php echo '*' . DISTANCE;?></label><br>
			<input type="number" min="0" name="distance" class="input_number" placeholder="km" value="<?php echo $persistence['distance'];?>" /><br>
				
			<label for="difficulty"><?php echo DIFFICULTY;?></label><br> 
			<select class="input_box" name="difficulty">
				<option
					<?php if($persistence['difficulty'] == 1) echo 'selected';?> value="1"><?php echo EASIER;?></option>
				<option
					<?php if($persistence['difficulty'] == 2) echo 'selected';?> value="2"><?php echo EASY;?></option>
				<option
					<?php if($persistence['difficulty'] == 3) echo 'selected';?> value="3"><?php echo NORMAL;?></option>
				<option
					<?php if($persistence['difficulty'] == 4) echo 'selected';?> value="4"><?php echo HARD;?></option>
				<option
					<?php if($persistence['difficulty'] == 5) echo 'selected';?> value="5"><?php echo HARDER;?></option>
			</select>
				
			<label for="heightDifference"><?php echo HEIGHTDIFFERENCE;?></label><br>
			<input type="number" min="0" name="heightDifference" class="input_number" placeholder="m" value="<?php echo $persistence['heightDifference'];?>" /><br>
				
			<label for="price"><?php echo PRICE;?></label><br> 
			<input type="number" min="0" name="price" class="input_number" placeholder="CHF" value="<?php echo $persistence['price'];?>" /><br>
				
			<label for="registrationMax"><?php echo REGISTRATIONMAX;?></label><br>
			<input type="number" min="0" name="registrationMax" class="input_number" placeholder="<?php echo PEOPLE;?>" value="<?php echo $persistence['registrationMax'];?>" />
		
			<button type="submit" name="RegistrationButton" value="addRegistration">
				<?php if($isModify) echo MODIFY . ' ' . REGIST; else echo CREATE . ' ' . REGIST;;?>
			</button><br>
			
			<a href="<?php echo URL_DIR . 'administration/reset';?>">
				<button type="button" name="ResetButton" value="Reset"><?php echo RESET;?></button>
			</a>
		</form>
	</div>
	
	<!-- Panel to add a Journey -->
	<div id="paneAddJourney" class="div_paneAdd" style="display: none;">
		<form name="createJourney" enctype="multipart/form-data" action="<?php if($isModify) 
			echo URL_DIR.'administration/edit?idHike='.$hike->getId(); else echo URL_DIR.'administration/createJourney';?>" method="post">
			
			<label for="startDate"><?php echo STARTDATE;?></label><br> 
			<input type="date" name="startDate" class="input_number" min="<?php echo date('Y-m-d');?>" value="<?php echo $persistence['startDate'];?>" onchange="calculateMinDate(this)" /><br>
								
			<label for="endDate"><?php echo ENDDATE;?></label><br> 
			<input id="endDate" type="date" name="endDate" class="input_number" value="<?php echo $persistence['endDate'];?>" /><br>
								
			<label for="departTime"><?php echo DEPARTTIME;?></label><br>
			<input type="time" name="departTime" class="input_number" value="<?php echo $persistence['departureTime'];?>" /><br>
								
			<label for="arrivalTime"><?php echo ARRIVETIME;?></label><br>
			<input type="time" name="arrivalTime" class="input_number" value="<?php echo $persistence['arrivalTime'];?>" /><br>
								
			<label for="title"><?php echo '*' . HIKENAME;?></label><br>
			<input type="text" name="title" class="input_text" value="<?php echo $persistence['title'];?>" /><br> 
			
			<label for="description"><?php echo '*' . DESCRIPTION;?></label><br>
			<textarea name="description" class="input_text_multiline"><?php echo $persistence['description'];?></textarea><br> 
			
			<label><?php echo '*' . STARTLOCALITY;?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="startNPA" class="input_number" value="<?php echo $persistence['npaStart'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="startLocation" class="input_text" value="<?php echo $persistence['cityStart'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="startRegion" class="input_text" value="<?php echo $persistence['regionStart'];?>" placeholder="<?php echo REGION;?>" /><br> 
					
			<label><?php echo '*' . ENDLOCALITY?></label><br> 
			<input type="number" min="1000" max="9999" maxlength="4" name="endNPA" class="input_number" value="<?php echo $persistence['npaEnd'];?>" placeholder="<?php echo POSTCODE;?>" /><br> 
			<input type="text" name="endLocation" class="input_text" value="<?php echo $persistence['cityEnd'];?>" placeholder="<?php echo LOCALADDRESS?>" /><br> 
			<input type="text" name="endRegion" class="input_text" value="<?php echo $persistence['regionEnd'];?>" placeholder="<?php echo REGION;?>" /><br> 
			
			<label for="image"><?php echo PICTURE;?></label><br>
			<input type="file" accept="image/jpg, image/jpeg, image/png, image/gif" name="image" class="input_text" /><br> 
			
			<label for="distance"><?php echo '*' . DISTANCE;?></label><br> 
			<input type="number" min="0" name="distance" class="input_number" placeholder="km" value="<?php echo $persistence['distance'];?>" /><br> 
			
			<label for="difficulty"><?php echo DIFFICULTY;?></label><br> 
			<select class="input_box" name="difficulty">
				<option
					<?php if($persistence['difficulty'] == 1) echo 'selected';?> value="1"><?php echo EASIER;?></option>
				<option
					<?php if($persistence['difficulty'] == 2) echo 'selected';?> value="2"><?php echo EASY;?></option>
				<option
					<?php if($persistence['difficulty'] == 3) echo 'selected';?> value="3"><?php echo NORMAL?></option>
				<option
					<?php if($persistence['difficulty'] == 4) echo 'selected';?> value="4"><?php echo HARD;?></option>
				<option
					<?php if($persistence['difficulty'] == 5) echo 'selected';?> value="5"><?php echo HARDER;?></option>
			</select><br> 
		
			<label for="heightDifference"><?php echo HEIGHTDIFFERENCE;?></label><br>
			<input type="number" min="0" name="heightDifference" class="input_number" placeholder="m" value="<?php echo $persistence['heightDifference'];?>" /><br> 
			
			
			<label for="price"><?php echo PRICE;?></label><br> 
			<input type="number" min="0" name="price" class="input_number" placeholder="CHF" value="<?php echo $persistence['price'];?>" /><br> 
			
			<label for="registrationMax"><?php echo REGISTRATIONMAX;?></label><br>
			<input type="number" min="0" name="registrationMax" class="input_number" placeholder="<?php echo PEOPLE;?>" value="<?php echo $persistence['registrationMax'];?>" /><br> 
			
			<button type="submit" name="JourneyButton" value="addJourey">
				<?php if($isModify) echo MODIFY.' '.JOURNEY; else echo CREATE . ' ' . JOURNEY;?>
			</button><br> 
			
			<a href="<?php echo URL_DIR . 'administration/reset';?>">
				<button type="button" name="ResetButton" value="Reset"><?php echo RESET;?></button>
			</a>
		</form>
	</div>
</div>

<br>
<br>

<!-- Table to manage existing Hikes -->
<div id="tableContent">
	<table id="resumeTable" class="tableInfo">
		<thead>
			<tr>
				<th>
					<span><?php echo TYPE;?></span>
				</th>
				<th>
					<span><?php echo STARTDATE;?></span>
				</th>
				<th>
					<span><?php echo ENDDATE;?></span>
				</th>
				<th>
					<span><?php echo HIKENAME;?></span>
				</th>
				<th>
					<span><?php echo STARTLOCALITY;?></span>
				</th>
				<th>
					<span><?php echo ENDLOCALITY;?></span>
				</th>
				<th>
					<span><?php echo EDIT;?></span>
				</th>
				<th>
					<span><?php echo DELETE;?></span>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ( $hikes as $h ) {
					$locationStart = Location::getLocationById ( $h->getStartPlace () );
					$locationEnd = Location::getLocationById($h->getEndPlace());
					
					echo "<tr><td>";
					echo $h->getTypeName();
					echo "</td><td>";
					if (! ($h->getStartDate () == NULL))
						echo date ( 'd.m.Y', strtotime ( $h->getStartDate () ) );
					echo "</td><td>";
					if (! ($h->getEndDate () == NULL))
						echo date ( 'd.m.Y', strtotime ( $h->getEndDate () ) );
					echo "</td><td><a href=" . URL_DIR . "hike/hike?id=" . $h->getId() . ">";
					echo $h->getTitle ();
					echo "</a></td><td>";
					echo $locationStart->getZipCode () . ' ' . $locationStart->getCity () . ' (' . $locationStart->getRegion () . ')';
					echo "</td><td>";
					echo $locationEnd->getZipCode () . ' ' . $locationEnd->getCity () . ' (' . $locationEnd->getRegion () . ')';
					echo '</td><td><a href="' . URL_DIR . 'administration/getEdit?idHike=' . $h->getId () . '"><button type="button" name="EditButton_' . $h->getId () . 'value="EditButton">' . EDIT . '</button></a></td>';
					echo '</td><td><a href="' . URL_DIR . 'administration/delete?idHike=' . $h->getId () . '"><button type="button" name="DeleteButton_' . $h->getId () . 'value="DeleteButton">' . DELETE . '</button></a></td></tr>';
				}
			?>
		</tbody>
		<tfoot></tfoot>
	</table>
</div>

<?php
	// Unset variables
	unset ( $_SESSION ['msg'] );
	unset ( $_SESSION ['msgSuccess'] );
	
	// Template CSS
	$content = ob_get_clean(); 
	require 'views/template.php'; 
?> 