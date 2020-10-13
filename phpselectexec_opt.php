<?php
$system = "samuel";
$dataflag = $_REQUEST["dataflag"];
$dataset = $_REQUEST["dataset"];
$queryset = $_REQUEST["queryset"];
$reg_date = $_REQUEST["reg_date"];

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
	$stmt = $conn->prepare("SELECT exectime, opt FROM watdiv WHERE system=? && dataset=? && queryset=? && DATE(reg_date)=? ORDER BY reg_date ASC");
	//$stmt = $conn->prepare("SELECT exectime, opt FROM watdiv WHERE DATE(reg_date) BETWEEN :begin AND :end");
	console.log($dataset + ", " + $queryset + ", " + $reg_date);
	//$stmt->bind_param(':begin', "2018-03-11");
	//$stmt->bind_param(':end', "2018-03-14");
	$stmt->bind_param("ssss", $system, $dataset, $queryset, $reg_date);
	
} else {
	$stmt = $conn->prepare("SELECT exectime, opt FROM lubm WHERE system=? && dataset=? && queryset=? && DATE(reg_date)=? ORDER BY reg_date LIMIT 1");
	console.log($dataset + ", " + $queryset + ", " + $reg_date);
	$stmt->bind_param("ssss", $system, $dataset, $queryset, $reg_date);
}

$stmt->execute();
$stmt->bind_result($exectime, $opt);

$myArr = array();
while ($stmt->fetch()) {
   //$myArr[] = $exectime;
   $myArr['arr'][] = array("exectime"=>$exectime, "opt"=>$opt);
}
$stmt->free_result();
$stmt->close();
$conn->close();

print(json_encode($myArr));
?> 