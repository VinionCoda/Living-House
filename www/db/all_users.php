<?php
include 'connect.php';



//return a data object of the User table
function getAllUsers(){

$dbh = openDb(); 
try{
       
	$sql = ' SELECT * FROM `user`';
	   
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   
   return $results;
   
   
   closeDb($dbh);
   
   }
   catch (Exception $e){
   
   echo " Error contacting the database";
   }



}



function get_timer($accessType){

$dbh = openDb(); 
try{
      
	$sql = ' SELECT * FROM `permission`';
	   
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   foreach ($results as $row) {
   if ($row['AccessType']==$accessType){
   return $row;
   
closeDb($dbh);
   }
   
   
   }
   }
   catch (Exception $e){
   
   echo " Error contacting the database";
   }


}
?>