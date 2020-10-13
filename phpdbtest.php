<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>MySql-PHP 연결 테스트</title>
</head>
<body>
 
<?php
$servername = "localhost";
$username = "root";
$password = "apmsetup";
$dbname = "EDBTDemoDB";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// Create database
$sql = "CREATE DATABASE EDBTDemoDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$sql = "ALTER TABLE samuel ALTER COLUMN reg_date SET DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "ALTER TABLE h2rdf ALTER COLUMN reg_date SET DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "ALTER TABLE shape ALTER COLUMN reg_date SET DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "ALTER TABLE shard ALTER COLUMN reg_date SET DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "ALTER TABLE rdf3x ALTER COLUMN reg_date SET DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}*/

$sql = "CREATE TABLE watdiv (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
system VARCHAR(20) NOT NULL,
dataset VARCHAR(10) NOT NULL,
queryset VARCHAR(10) NOT NULL,
opt VARCHAR(20),
reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
exectime VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE lubm (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
system VARCHAR(20) NOT NULL,
dataset VARCHAR(10) NOT NULL,
queryset VARCHAR(10) NOT NULL,
opt VARCHAR(20),
reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
exectime VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
 
</body>
</html>