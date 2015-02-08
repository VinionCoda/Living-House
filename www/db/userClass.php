<?php
//this defines the object User
include 'connect.php';


class User

{

public $user_id;
public $name;
public $level;
public $start;
public $stop;	




function insertUser(){


try{
$dbh = openDb();

//insert User Information
$stmt = $dbh->prepare("INSERT INTO users (name) VALUES (:name, :level)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':level', $level);

$stmt->execute();


//sends command to python script
$data = array($name);

// Execute the python script with the JSON data
shell_exec('python newCard.py ' json_encode($data));

//prompts to scan card 
sleep(15);

$flag=False;

//validates if ID was added to user
$sql = ' SELECT * FROM `user` WHERE `name`= :name';

$stmt = $dbh->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   foreach ($results as $row) {
   if ($row['name']==$this->name){
   if($row['userID']==null||$row['userID']==""){
   $flag=True;
   }
      }
   }
   
   //check if card is added properly
   if ($flag){
   echo "User has been registered.";}
   else{
   $sql = "DELETE FROM users WHERE name =  :name";
   $stmt = $dbh->prepare($sql);
   $stmt->bindParam(':name', $this->name); 
   $stmt->execute();
   
   echo "Error Please try again";
   
   }
   closeDb($dbh);
   }



catch (Exception $e){
}




}

}

?>



