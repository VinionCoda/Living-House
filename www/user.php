<!DOCTYPE html>
<html id="three">
<?php include 'db/userClass.php'; 

if ($_POST!=null){
$user = new User;


$user->name =$_POST['username'];
$user->level=$_POST['permission'];


$user->insertUser();
}
 ?>



	<head>
		<title>Belabour Users</title>
		<link rel="stylesheet" type="text/css" href="main_css.css">
		<script type="text/javascript"src="main.js"></script>
	</head>
	
	<body>
		<div id="msWindow">
			<div id="whiteBox">
				<img id ="home" src="pic/home.png">	
				<p class="main_title"><em>Users</em></p>


					<table id="main_user_table">
						<td>
							
							<div id="div_border">
								<form  method="post">	
									<div class="label">Username:</div>
									<div class="formControl">
										<input class ="text" type='text' name='username'>
									</div>

									<div id="heading">Permissions</div> 
									
									<div class="newLines"> </div>
									<div class="label">Appliances Access:</div>  
									<div class="formControl">
										<select name='permission'>
											<option value='High'>  High </option>             
											<option value='Medium'>  Medium </option>  
										    <option value='Low'>  Low </option>  
										</select>
									</div>
									
									<div class="newLines"> </div>	 
									<div class="label">Internet Timed Access:</div> 
									<div class="formControl">  
										<input type="radio" name="internet" value="male">Yes
										<input type="radio" name="internet" value="female">No
									</div>
									

									<div class="newLines"> </div>									
									<div class="label">Television Timed Access:</div> 
									<div class="formControl"> 
										<input type="radio" name="television" value="male">Yes
										<input type="radio" name="television" value="female">No
									</div>
															 
									
									<div class="newLines"> </div>
									<div class="formControl2"> 
										<input class="click" id="link_pop" type="submit" value="Add"> 
										<button class="click" type="reset">Clear</button>
									</div>
								</form>
							</div>
							
						</td>
					</table>

				

					<div id="popup"> 
						<input class="click" type="submit" id="submit" value="Add">
					</div>

			</div><!-- end whiteBox -->
		
		</div><!-- end myWindow  -->
	</body>
</html>