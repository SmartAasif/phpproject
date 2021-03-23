<?php
    $servername='localhost';
    $username='aasifali';
    $password='aasif@12';
    $dbname = "crudphp";
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>