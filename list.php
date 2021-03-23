<?php

include("dbcon.php");
$db = $conn;
// fetch query
function fetch_data()
{
    global $db;
    // $query = "SELECT * from users ORDER BY id DESC";
    $query="SELECT users.*, countries.name as country_name, countries.id as cout_id, states.name as state_name, states.id as 
    stat_id, cities.name as city_name, cities.id as cit_id FROM users
    INNER JOIN countries ON users.country_id=countries.id
    INNER JOIN states ON users.state_id=states.id
    INNER JOIN cities ON users.city_id=cities.id order by id ASC";

    $exec = mysqli_query($db, $query);
    if (mysqli_num_rows($exec) > 0) {
        $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = [];
    }
}
$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData)
{
    echo '<table border="1" id="listTable" class="table table-striped">
        <tr class="thead-dark">
            <th >S.N</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>';

    if (count($fetchData) > 0) {
        $sn = 1;
        foreach ($fetchData as $data) {

            echo "<tr>
          <td>" . $data['id'] . "</td>
          <td>" . $data['name'] . "</td>
          <td>" . $data['email'] . "</td>
          <td>" . $data['phone'] . "</td>
          <td>" . $data['country_name'] . "</td>
          <td>" . $data['state_name'] . "</td>
          <td>" . $data['city_name'] . "</td>
          <td><button  class='btn btn-primary' data-toggle='modal' onclick='editData(" . $data['id'] . ")' data-target='#editModal' ><i class='fas fa-edit'></i></button></td>
          <td><button class='btn btn-danger' href='javascript:void(0)'  onclick='deleteData(" . $data['id'] . ")'><i class='fa fa-trash'></i></button></td>
   </tr>";

            $sn++;
        }
    } else {

        echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
    }
    echo "</table>";
}
?>

<script>
    var editData = function(id) {

        // $('#editcountry').on('change', function() {
              

        $.ajax({
            type: "GET",
            url: "updating.php",
            data: {
                editId: id
            },
            dataType: "html",
            success: function(data) {
                var userData = JSON.parse(data);
                $("input[name='editid']").val(userData.id);
                $("input[name='editname']").val(userData.name);
                $("input[name='editemail']").val(userData.email);
                $("input[name='editphone']").val(userData.phone);
                $("select[name='editcountry']").val(userData.country_id);
                $("select[name='editstate']").val(userData.state_id);
                $("select[name='editcity']").val(userData.city_id);
            }
        });
    };
    
    

</script>