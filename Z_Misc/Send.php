<?php

$db_host = "localhost";
$db_username = "root";
$db_passwd = "2464";
$db_name = "Data";
$db= @mysqli_connect($db_host, $db_username, $db_passwd) or die ("Could not connect!\n");
echo "Connection established.\n";

//These values are from submitted inputs HTU21D
$ID=$_GET[ID];
$Time=$_GET[Timestamp];
$Celsius=$_GET[Celsius];
$Fahrenheit=$_GET[Fahrenheit];
$Humidity=$_GET[Humidity];

//Checks if Database is created or created already 
$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
$C_result=mysqli_query($db,$sql);
if ($C_result) {
    echo "Database created successfully\n";
} else {
    echo "Database is not created\n";
}


//Selecting the Database
$result=mysqli_select_db($db,"$db_name");
if($result){
	echo "Database $db_name selected. Well done!\n";
}
else
{
	echo "Database $db_name is not selected.\n";
}

//Creating the Table
	$sql = 
	"CREATE TABLE HTU21D 
		(". 
       "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,".
	   "N INT NOT NULL,". 
       "TimeStamp FLOAT NOT NULL,". 
       "Celsius FLOAT NOT NULL,".
       "Fahrenheit FLOAT NOT NULL,".
	   "Humidity FLOAT NOT NULL,".
	   "Average_Temperature FLOAT NULL".
		")";
$result=mysqli_query($db,$sql);

//Checks Data Table Creation
if($result){
echo("<p> DATA table successfully created! Good job!</p>");
}
else{
echo "<p>The Table is already Created. .</p>$varTemp";}

//Inserting the Data
$sql = "INSERT INTO HTU21D"
	."(N, TimeStamp,Celsius,Fahrenheit,Humidity)"
	."VALUES"
	."(
	'$ID',
	'$Time',
	'$Celsius',
	'$Fahrenheit',
	'$Humidity'
	)"
	;
$result=mysqli_query($db,$sql);

//Checks if it added
if(!$result){
echo("<p>:D</p>");
}
else
{
echo "<p>:(</p>";
}

mysqli_close($db);

?>

