<?php
    include 'dbcon.php';
    $id=$_GET['delete_id'];
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Data was deleted successfully";
    } 
    else {
        $msg= "Error: " . $sql . "<br>" . mysqli_error($conn);
      echo $msg;
      echo($id);
    }
   
    mysqli_close($conn);
?>