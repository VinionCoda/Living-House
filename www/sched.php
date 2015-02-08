<!DOCTYPE html>
<html id="three">
<?php include 'db/all_users.php'; ?>

	<head>
		<title>Belabour Schedules</title>
		<link rel="stylesheet" type="text/css" href="main_css.css">
		<script type="text/javascript"src="main.js"></script>
	</head>
	
	<body>
		<div id="msWindow">
			<div id="whiteBox">
				<img id ="home" src="pic/home.png">	
				<p class="main_title"><em>Schedules</em></p>
				
				<table  id="title_table">
					<tr>
						<th class="h_tag">Username</th>
						<th class="h_tag">Active Time <br> Start</th>
						<th class="h_tag">Active Time <br> Stop</th>
						<th class="h_tag">Edit</th>
					</tr>
				</table>
				
				<table id="main_table_sched"><!-- Creates rows base on entries in the user database  -->			
				
					<?php
					$results=getAllUsers();

					foreach ($results as $row) {
   
					echo "<tr>
					<td class='main_td'>".$row['name']."
					</td>
					<td class='main_td'>".$row['active_time_start']."
					</td>
					<td class='main_td'>".$row['active_time_stop']."
					</td>
					<td class='b_tag'>Edit
					</td>
					</tr>";
					
					}
					?>

				</table>
			</div><!-- end whiteBox -->
		
		</div><!-- end myWindow  -->
	</body>
</html>
