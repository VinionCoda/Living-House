<!DOCTYPE html>
<html id="four">
<?php 	include 'db/all_users.php'; ?>
	<head>
		<title>Belabour Access Control</title>
		<link rel="stylesheet" type="text/css" href="main_css.css">
		<script type="text/javascript"src="main.js"></script>
	</head>
	
	<body>
		<div id="msWindow">
			<div id="whiteBox">
				<img id ="home" src="pic/home.png">	
				<p class="main_title"><em>Access Control</em></p>

					<!--change is js file back to access_control, also rename this doc access_control -->
					<table  id="title_table">
						<tr>
							<th class='access_h_tag1'>Username</th>
							<th class='access_h_tag'>Internet <br> Start</th>
							<th class='access_h_tag'>Internet <br> Stop</th>
							<th class='access_h_tag'>Television <br> Start</th>
							<th class='access_h_tag'>Television <br> Stop</th>
							<th class='access_h_tag2'>Edit</th>
						</tr>
					</table>
					
					<table id="acc_table">
					<?php
					$results=getAllUsers();

					foreach ($results as $row) {
					
					
					
					echo "<tr>
					<td  class='s_tag'>".$row['name']."					
					</td>
					<td  class='l_tag'>".get_timer($row['accessType'])['tv_time_start']."
					<td class='l_tag'>".get_timer($row['accessType'])['tv_time_stop']."
					</td>
					<td class='l_tag'>".get_timer($row['accessType'])['internet_time_start']."
					</td>
					<td class='l_tag'>".get_timer($row['accessType'])['internet_time_stop']."
					</td>
					<td class='l_tag2'>
					Edit
					</td>
					</tr>";
					}

					?>

					</table>



			</div><!-- end whiteBox -->
		
		</div><!-- end myWindow  -->
	</body>
</html>
