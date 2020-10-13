<?php
$dataflag = $_REQUEST["dataflag"];
$dataset = $_REQUEST["dataset"];
$queryset = $_REQUEST["queryset"];
$reg_date = $_REQUEST["reg_date"];
$opt = "optrep";

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
	$stmt = $conn->prepare("SELECT exectime, system FROM watdiv WHERE dataset=? && queryset=? && opt=? && reg_date=?");
	console.log($dataset + ", " + $queryset + ", " + $opt + ", " + $reg_date);
	$stmt->bind_param("ssss", $dataset, $queryset, $opt, $reg_date);
} else {
	$stmt = $conn->prepare("SELECT exectime, system FROM lubm WHERE dataset=? && queryset=? && opt=? && reg_date=?");
	console.log($dataset + ", " + $queryset + ", " + $opt + ", " + $reg_date);
	$stmt->bind_param("ssss", $dataset, $queryset, $opt, $reg_date);
}

$stmt->execute();
$stmt->bind_result($exectime, $system);

$myArr = array();
while ($stmt->fetch()) {
   //$myArr[] = $exectime;
   $myArr['arr'][] = array("exectime"=>$exectime, "system"=>$system);
}
$stmt->free_result();
$stmt->close();
$conn->close();

print(json_encode($myArr));
?> 