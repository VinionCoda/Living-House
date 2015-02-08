<?php
include 'connect.php';

function calc(){

$dbh = openDb(); 
try{
      
	$sql = ' SELECT * FROM `userlog`';
	   
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