<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #ddd;
}

li a.active {
    color: white;
    background-color: #4CAF50;
}
</style>
</head>
<body>
<ul>
  <li><a class="active" href="http://18.220.146.199/">Home</a></li>
  <li><a href="http://18.220.146.199/Data">Data</a></li>
  <li><a href="http://18.220.146.199/Stream">Stream</a></li>
  <li><a href="http://18.220.146.199/Cheat_Sheet">Cheat Sheet</a></li>
</ul>

<?php

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM `HTU21D` ORDER BY `TimeStamp`",$link);
?>

<html>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
   <h1>Temperature Sensor Readings</h1>

   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;Celsius&nbsp;</td>
			<td>&nbsp;Fahrenheit&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["TimeStamp"], $row["Celsius"], $row["Fahrenheit"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
</body>
</html>
