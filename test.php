<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Database and json</title>
</head>

<body>
    <?php
    // $myfile = fopen("data.txt", "r") or die("Unable to open file!");
    // echo fread($myfile, filesize("data.txt"));
    // fclose($myfile);

    // $file = "data.txt";
    // $fopen = fopen($file, "r");
    // $fread = fread($fopen, filesize($file));
    // fclose($fopen);

    // $remove = "\n";
    // $split = explode($remove, $fread);
    // $array[] = NULL;
    // $tab = "\t";

    // foreach ($split as $string) {
    //     $row = explode($tab, $string);
    //     array_push($array, $row);
    // }

    $servername = "localhost";
    $username = "aasifali";
    $password = "aasif@12";
    $dbname='test';

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $array = explode("\n", file_get_contents('data.txt'));

    $myarr=array();

    foreach ($array as $ar){
        $arr = explode(",", $ar);
        array_push($myarr,$arr);

        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";
    }

    echo "<pre>";
        print_r($myarr);
        echo "</pre>";
   

    // echo "<pre>";
    // print_r($array);
    // echo "</pre>";

 

    // $data->name=$array[0];
    // $data->email=$array[1];
    // $data->phone=$array[2];
    // $data->address=$array[3];

    // $datas=json_encode($data);
    // echo($datas);

    if (is_array($myarr)) {
        foreach ($myarr as $row) {
                $fieldVal1 = $row[0];
                $fieldVal2 = $row[1];
                $fieldVal3 = $row[2];
                $fieldVal4 = $row[3];

                // echo($fieldVal1);
    
                $query = "INSERT INTO users(name, email, phone, address) VALUES ( '" . $fieldVal1 . "','" . $fieldVal2 . "','" . $fieldVal3 . "','" . $fieldVal4 . "' )";
                if (mysqli_query($conn, $query)) {
                    echo "New record created successfully\n";
                  } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                
        }
    }

    $sql = "SELECT * from users";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {

        $rows=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // $data->name=$row["id"];
        // $data->email=$row["name"];
        // $data->phone=$row["email"];
        // $data->address=$row["address"];
        $rows[]=$row;


    // $datas=json_encode($data);

    // echo($datas."\n");

    // echo($datas);
    }

    } else {
    echo "0 results";
    }
//     echo "<pre>";
//    print_r($rows);
// echo "</pre>";
    $data=json_encode($rows);
    echo($data);
    $conn->close();



    // echo($array[0]);
    // echo "<pre>";
    // print_r($array);
    // echo "</pre>";
    ?>

</body>

</html>
