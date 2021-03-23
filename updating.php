<?php

include('dbcon.php');


if (isset($_GET['editId'])) {
    $id = $_GET['editId'];
    edit_data($conn, $id);
}


if (isset($_POST['updateId'])) {
    $id = $_POST['updateId'];
    update_data($conn, $id);
}

// edit data query

function edit_data($conn, $id)
{
    $query = "SELECT * from users WHERE id=$id";
    $exec = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($exec);
    echo json_encode($row);
}

// update data query
function update_data($conn, $id)
{
    // $fullName = legal_input($_POST['name']);
    // $emailAddress = ($_POST['email']);
    // $phone = ($_POST['phone']);
    // $country = legal_input($_POST['country_id']);
    // $state = legal_input($_POST['state_id']);
    // $city = legal_input($_POST['city_id']);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];


    $query ="UPDATE `users` SET `name`='" . $name . "',`email`='" . $email . "',`phone`=$phone,`country_id`=$country,`state_id`=$state,`city_id`=$city WHERE `id`= $id ;";


    $exec = mysqli_query($conn, $query);
    if ($exec) {
        echo "data  updated".$id;
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
        echo $msg;
    }
}


// convert illegal input to legal input
// function legal_input($value)
// {
//     $value = trim($value);
//     $value = stripslashes($value);
//     $value = htmlspecialchars($value);
//     return $value;
// }
