<?php

	//Info To Connect
    $dbusername = "root"; 
    $dbpassword = "2464"; 
    $server = "localhost"; 
	$db_name="Data";

	$db= @mysqli_connect($server, $dbusername, $dbpassword) or die ("Could not connect!\n");

	//Checking database
	$result=mysqli_select_db($db,$db_name);
if($result){
  echo "Database $db_name selected. Well done!\n";
}
else{
echo "Database $db_name is not selected.\n";
}

	//Create table
	$sql = 
	"CREATE TABLE HTU21D 
		(". 
       "ID INT NOT NULL PRIMARY KEY,".
	   "N INT NOT NULL,". 
       "TimeStamp FLOAT NOT NULL,". 
       "Celsius FLOAT NOT NULL,".
       "Fahrenheit FLOAT NOT NULL,".
	   "Humidity FLOAT NULL,".
	   "Average_Temperature FLOAT NULL".
		")";
		
	
$result=mysqli_query($db,$sql);
if(result){
echo("<p> $User Table Created.</p>");
}
else{
echo "<p>Table was not created .</p>$";}
    

mysqli_close($db);

?>

