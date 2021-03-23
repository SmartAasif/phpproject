<?php    
    require_once "dbcon.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
   
    $sql = "INSERT INTO users (name,email,phone,country_id,state_id,city_id) VALUES ('" . $name . "' ,'" . $email ."', $phone, $country , $state ,$city )";
   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error."  ".$country;
    
  }
  $conn->close();
    
 ?>