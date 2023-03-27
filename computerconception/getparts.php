<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'erolfsen', 'I494pswd');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("erolfsendb", $con);

$sql="SELECT * FROM part WHERE type='Motherboard'";


$result = mysql_query($sql);


echo "<table width='200' border='1'>
<tr>
<th>addfavorite</th>
<th>Name</th>
<th>pic</th>
</tr>";

while($row = mysql_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['add'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['pic'] . "</td>";
 echo "</tr>";
 }
echo "</table>";

mysql_close($con);
?>

</body>
</html>
