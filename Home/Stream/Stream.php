<!DOCTYPE HTML>
<html>


<?php
$db_host = "localhost";
$db_username = "root";
$db_passwd = "2464";
$db_name = "Data";
$db= @mysqli_connect($db_host, $db_username, $db_passwd) or die ("Could not connect!\n");
$result=mysqli_select_db($db,"$db_name");

$sql = "SELECT 
	ID,
	Celsius,
	Fahrenheit,
	Humidity
FROM HTU21D_Stream
Where ID='1'
"
;

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$Celsius=$row["Celsius"];
		$Fahrenheit=$row["Fahrenheit"];
		$Humidity=$row["Humidity"];
    }
} 

if (empty($ID)) {
    $ID="UNDEFINED";
}
if (empty($Timestamp)) {
   $Timestamp="UNDEFINED";
}
if (empty($Celsius)) {
    $Celsius="UNDEFINED";
}
if (empty($Fahrenheit)) {
    $Fahrenheit="UNDEFINED";
}
if (empty($Humidity)) {
   $Humidity="UNDEFINED";
}


?>


<h3> Temperature in Celsius: 
 <?php echo $Celsius ?>*C
</h3>
<h3> Temperature in Fahrenheit: 
 <?php echo $Fahrenheit; ?>*F
</h3>
<h3> Humidity: 
 <?php echo $Humidity; ?>%
</h3>


<a href="http://192.168.1.228:8888/">LOCAL</a>
<a href="http://192.168.43.145:8888/">HOTSPOT</a>

<form action="http://192.168.1.247:8888/gpio5on">
    <input type="submit" value="Blue on" />
</form>
<form action="http://192.168.1.247:8888/gpio5off">
    <input type="submit" value="Blue Off" />
</form>
<form action="http://192.168.1.247:8888/gpio4on">
    <input type="submit" value="White On" />
</form>
<form action="http://192.168.1.247:8888/gpio4off">
    <input type="submit" value="White Off" />
</form>
</body>
</html>