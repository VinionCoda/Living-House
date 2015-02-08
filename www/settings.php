<!DOCTYPE html>
<html id="five">
<?php

function drop(){   

	$names = array
					  (
					  array("nic"),
					   array("dave"),
						array("John"),
						 
					  );
					  $i=0;

					echo "<select name='names'>";
					for ($row = 0; $row <  3; $row++) {
						  echo   " <option value=''>".$names[$i][0]."</option> "  ;
					$i++;	  
						}      
					 echo "</select>";        
							   
					}

?>
	<head>
		<title>Belabour Settings</title>
		<link rel="stylesheet" type="text/css" href="main_css.css">
		<script type="text/javascript"src="main.js"></script>
	</head>
	
	<body>
		<div id="msWindow">
			<div id="whiteBox">
				<img id ="home" src="pic/home.png">	
				<p class="main_title"><em>Settings</em>
				
				<table  id="title_table">
					<tr class='acc_tr'>
					<th  class='h_tag'>User</th>
					<th  class='h_tag'>Device Name</th>
					<th class='h_tag'>Mac Address</th>
					<th class='h_tag'> Add</th>
					</tr>
				</table>


				<table id="main_table_set">

				<?php


					$time = array
					  (
					  array("kid_PC","00:53:94:12:D5:e7"),
					   array("Kitchen","00:50:04:53:D5:57"),
						array("Android","00:30:a6:53:c5:57"),
						 
					  );
					  $i=0;

					for ($row = 0; $row <  3; $row++) {
					echo "
					<tr>
					<td class='main_td'><br>".drop()."
					</td>
					<td class='main_td'>".$time[$i][0]."
					</td>
					<td class='main_td'>".$time[$i][1]."
					</td>
					<td class='b_tag'>Edit
					</td>
					</tr>";
					$i++;
					}
					?>

				</table>

			</div><!-- end whiteBox -->
		
		</div><!-- end myWindow  -->
	</body>
</html>

