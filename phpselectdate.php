<?php
$system = $_REQUEST["system"];
$dataflag = $_REQUEST["dataflag"];
$dataset = $_REQUEST["dataset"];
$queryset = $_REQUEST["queryset"];
//$opt = $_REQUEST["opt"];

$servername = "localhost";
$username = "root";
$password = "apmsetup";
$dbname = "EDBTDemoDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($dataflag == "watdiv") {
	$stmt = $conn->prepare("SELECT DISTINCT SUBSTRING(reg_date, 1, 10) FROM watdiv WHERE system=? && dataset=? && queryset=? ORDER BY reg_date ASC");
	console.log($system + ", " + $dataset + ", " + $queryset);
	$stmt->bind_param("sss", $system, $dataset, $queryset);
} else {
	$stmt = $conn->prepare("SELECT DISTINCT SUBSTRING(reg_date, 1, 10) FROM lubm WHERE system=? && dataset=? && queryset=? ORDER BY reg_date ASC");
	$stmt->bind_param("sss", $system, $dataset, $queryset);
}

$stmt->execute();
$stmt->bind_result($reg_date);

$myArr = array();
while ($stmt->fetch()) {
   /*$myArr[] = $reg_date;
   $split = explode(' ', $reg_date);
   $myArr['arr'][] = array("reg_date"=>$split[0]);*/
   $myArr['arr'][] = array("reg_date"=>$reg_date);
}
$stmt->free_result();
$stmt->close();
$conn->close();

print(json_encode($myArr));
?> 