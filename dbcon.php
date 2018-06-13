<?php 
$servername = "localhost";
$username = "root";
$password = "";
$form_data = array();
$errors = array();
try {
    $conn = new PDO("mysql:host=$servername;dbname=cpumanagement", $username, $password);
    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$form_data['dbcon'] = "Connected successfully"; 
    }
catch(PDOException $e)
    {
		$errors['dberr'] = "Connection failed: " . $e->getMessage();
    }

?>