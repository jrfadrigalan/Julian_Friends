<?php
$db_host = "localhost";
$db_username = "root";
$db_passwd = "2464";
$db_name = "Data";
$db= @mysqli_connect($db_host, $db_username, $db_passwd) or die ("Could not connect!\n");
$result=mysqli_select_db($db,"$db_name");

$sql = "SELECT 
	Celsius,
	Fahrenheit,
	Humidity
FROM HTU21D_Stream Where ID='1'"
;
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo 
		"id: " . $row["Celsius"]. 
		"- Name: " . $row["Fahrenheit"]. " 
		" . $row["Humidity"]. "
		<br>"
		;
    }
}
?>