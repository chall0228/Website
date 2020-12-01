<?php 
$personID = $_GET['stdIDInput'];
$personFName = addslashes($_GET['fnameInput']);
$personLName = addslashes($_GET['lnameInput']);
$personPMajor = $_GET['pMajorInput'];
$personPMinor = $_GET['pMinorInput'];
$personSMajor = $_GET['sMajorInput'];
$personResponse1 = addslashes($_GET['SA1']);
$personResponse2 = addslashes($_GET['SA2']);
$personResponse3 = addslashes($_GET['SA3']);
$personResume = $_GET['upload'];

$servername = "localhost";
$username = "root";
$password = "root";
$database_name = "bluexwebsite"; 

// Create connection
$connection = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql_statment = "INSERT INTO `basics` (`StudentID`, `FirstName`, `LastName`, `PrimaryMajor`, `SecondaryMajor`, `PrimaryMinor`) VALUES ('$personID', '$personFName', '$personLName', '$personPMajor', '$personPMinor', '$personSMajor')";

if (mysqli_query($connection, $sql_statment)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
}

$sql_statment = "INSERT INTO `questions` (`StudentID`, `Question1`, `Question2`, `Question3`) VALUES ('$personID', '$personResponse1', '$personResponse2', '$personResponse3')";

if (mysqli_query($connection, $sql_statment)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
}

$sql_statment = "INSERT INTO `resume_upload` (`StudentID`, `ResumeFileName`) VALUES ('$personID', '$personResume')";

if (mysqli_query($connection, $sql_statment)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);


?>