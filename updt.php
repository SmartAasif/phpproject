<?php    
    require_once "dbcon.php";
    $id=$_POST['editid'];
    $name = $_POST['editname'];
    $email = $_POST['editemail'];
    $phone = $_POST['editphone'];
    $country = $_POST['editcountry'];
    $state = $_POST['editstate'];
    $city = $_POST['editcity'];
   
    // $sql = "UPDATE users set name= '" . $name . "', email =" . $email . "', phone='" . $phone. "', country_id='" . $country . "', state_id='" . $state . "', city_id='" . $city. "',  WHERE id= '".$id."' ";
    $sql="UPDATE `users` SET `name`='" . $name . "',`email`='" . $email . "',`phone`=$phone,`country_id`=$country,`state_id`=$state,`city_id`=$city WHERE `id`=$id;";
  
    // $sql="UPDATE users 
    // SET name='$name',
    //     email='$email',
    //     phone=$phone,
    //     country_id=$country,
    //     state_id=$state
    //     city_id= $city,
    //    WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    
  }
  $conn->close();
    
 ?>