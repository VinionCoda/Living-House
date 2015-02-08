<?php 
//PHP Data Object (PDO) reference
$dbh;



//Instantiate PDO
function openDb()
{
//database login
$user= 'root'  ;
$pass = '' ;

try {

//enter database information here
$dbh = new PDO('mysql:host=localhost;dbname=new',$user, $pass);
return $dbh;
}


catch(PDOException $e)
{
echo  "connection failed";
die();
}
}


//Clear PDO;
function closeDb($dbh)
{
$dbh=null;
}

?>
