<!DOCTYPE html>
<html id="three">

	<head>
		<title>Belabour Room</title>
		<link rel="stylesheet" type="text/css" href="main_css.css">
		<script type="text/javascript"src="main.js"></script>
	</head>
	
	<body>
		<div id="msWindow">
			<div id="whiteBox">
				<img id ="home" src="pic/home.png">	
				<p class="main_title"><em>Rooms</em></p>

				<table  id="title_table">
					<tr>
						<th class="h_tag">Room</th>
						<th class="h_tag">Active Time <br> Start</th>
						<th class="h_tag">Active Time <br> Stop</th>
						
					</tr>
				</table>
			
			
			<table id="main_table_room">

				<?php
				$time = array
				  (
				  array("Kitchen","12:00pm", "2:00pm" ),
				   array("Living Room","1:00pm", "2:00pm"),
					
					 
				  );
				  $i=0;

				for ($row = 0; $row <  2; $row++) {
				echo "<tr>
				<td class='main_td'>".$time[$i][0]."
				</td>
				<td class='main_td'>".$time[$i][1]."
				</td>
				<td class='main_td'>".$time[$i][2]."
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

			

