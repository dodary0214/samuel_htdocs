<?php
// get the q parameter from URL
$system = $_REQUEST["system"];
$dataflag = $_REQUEST["dataflag"];
$dataset = $_REQUEST["dataset"];
$queryset = $_REQUEST["queryset"];
$opt = $_REQUEST["opt"];
$reg_date = $_REQUEST["reg_date"];
$exectime = $_REQUEST["exectime"];

$servername = "localhost";
$username = "root";
$password = "apmsetup";
$dbname = "EDBTDemoDB";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$stmt = $conn->prepare("insert into "+$dataflag+" (system, dataset, queryset, opt, reg_date, exectime) values (\""+$system+"\", \""+$dataset+"\", \""+$queryset+"\", \""+$opt+"\", \""+$reg_date+"\", "+$exectime+")");

if ($dataflag == "watdiv") {
	$stmt = $conn->prepare("insert into watdiv (system, dataset, queryset, opt, reg_date, exectime) values (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssi", $system, $dataset, $queryset, $opt, $reg_date, $exectime);
}
else {
	$stmt = $conn->prepare("insert into lubm (system, dataset, queryset, opt, reg_date, exectime) values (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssi", $system, $dataset, $queryset, $opt, $reg_date, $exectime);
}
$stmt->execute();

echo "New records created successfully";
/*
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

/*
while ($row = mysql_fetch_assoc($result)) {
    echo $row['foo'];
}*/

$stmt->close();
$conn->close();

?>
 