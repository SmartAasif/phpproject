<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Crud</title>
</head>

<body>

    <!-- Create form and tables -->
    <div class="container  mt-3">
        <button type="button" id="btn-add" data-toggle="modal" data-target="#createModal" class="btn btn-success">
            Add New
        </button>

        <div class="alert alert-success mt-2" id="message" role="alert">
        </div>
        <div class="alert alert-danger mt-2" id="msgDel" role="alert">
        </div>

        <div class="mt-1">
            <table id="listTable" class="table table-striped">
            </table>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="table" id="mytbl"> -->
                    <form id="form1" method="POST" class="bg-muted">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 pt-3">
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Full Name</label>
                                        <div class="input-group"><input id="name" name="name" placeholder="Name" class="form-control" value="" type="text" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-12">
                                        <div class="input-group"><input id="email" name="email" placeholder="Email" class="form-control" value="" type="text" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-12">
                                        <div class="input-group"><input id="phone" name="phone" placeholder="Phone" class="form-control" value="" type="text" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="country" name="country" class="selectpicker form-control">
                                                <option value="">Select Country</option>
                                                <?php
                                                require_once "dbcon.php";
                                                $result = mysqli_query($conn, "SELECT * FROM countries");
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">State</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="state" name="state" class="selectpicker form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="city" name="city" class="selectpicker form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-8 control-label"></label>
                                    <button class="btn btn-success" id="btn-submit">Submit</button>
                                    <button type="button" class="btn btn-danger" id="btn-close" data-dismiss="modal">Close</button>
                                </div>
                               
                            </div>
                            <div class="col-2"></div>
                        </div>

                        <!-- </div> -->

                    </form>
                    <!-- </div> -->
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <p id="msg" class="text-success"></p> -->
                    <form id="updateForm" method="POST" class="bg-muted">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 pt-3">
                                <!-- <div class="form-group">
                                    <div class="alert alert-success mt-2" id="message" role="alert"></div>
                                </div> -->
                                <div class="form-group">
                                    <p class="col-md-5 control-label" id="message"></p>
                                </div>
                                <div class="form-group">
                                    <p class="col-md-8 control-label text-success" id="msg"></p>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group"><input id="editid" name="editid" placeholder="id" class="form-control" value="" type="hidden"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Full Name</label>
                                        <div class="input-group"><input id="editname" name="editname" placeholder="Name" class="form-control" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-12">
                                        <div class="input-group"><input id="editemail" name="editemail" placeholder="Email" class="form-control" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-12">
                                        <div class="input-group"><input id="editphone" name="editphone" placeholder="Phone" class="form-control" value="" type="text"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="editcountry" name="editcountry" class="selectpicker form-control">
                                                <option value="">Select Country</option>
                                                <?php
                                                require_once "dbcon.php";
                                                $result = mysqli_query($conn, "SELECT * FROM countries");
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">State</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="editstate" name="editstate" class="selectpicker form-control">
                                            <?php
                                                require_once "dbcon.php";
                                                $result = mysqli_query($conn, "SELECT * FROM states");
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">City</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="editcity" name="editcity" class="selectpicker form-control">
                                            <?php
                                                require_once "dbcon.php";
                                                $result = mysqli_query($conn, "SELECT * FROM cities");
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-8 control-label"></label>
                                    <button class="btn btn-success" id="btn-update">Update</button>
                                    <button type="button" class="btn btn-danger" id="btn-close2" data-dismiss="modal">Close</button>
                                </div>


                            </div>
                            <div class="col-2"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "list.php",
                dataType: "html",
                success: function(data) {
                    $("#listTable").html(data);
                }
            });

            $("#message").hide();
            $("#msgDel").hide();

            $("#btn-add").click(function() {
                $("#message").hide();
                $("#msgDel").hide();

            });



        });


        $(document).ready(function() {
            $('#country').on('change', function() {
                var country_id = this.value;
                $.ajax({
                    url: "states.php",
                    type: "POST",
                    data: {
                        country_id: country_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#state").html(result);
                        $('#city').html('<option value="">Select State First</option>');
                    }
                });

            });

            $('#state').on('change', function() {
                var state_id = this.value;
                $.ajax({
                    url: "cities.php",
                    type: "POST",
                    data: {
                        state_id: state_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#city").html(result);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#editcountry').on('change', function() {
                var country_id = this.value;
                $.ajax({
                    url: "states.php",
                    type: "POST",
                    data: {
                        country_id: country_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#editstate").html(result);
                        $('#editcity').html('<option value="">Select State First</option>');
                    }
                });

            });

            $('#editstate').on('change', function() {
                var state_id = this.value;
                $.ajax({
                    url: "cities.php",
                    type: "POST",
                    data: {
                        state_id: state_id
                    },
                    cache: false,
                    success: function(result) {
                        $("#editcity").html(result);
                    }
                });
            });
        });

        $(document).ready(function() {

            $('#form1').validate({ // initialize the plugin
                rules: {
                    name: {
                        required: true,
                        inlength: 3

                    },
                    email: {
                        required: true,
                        minlength: 12,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        minlength: 10,

                    },
                    country: {
                        required: true,

                    },
                    state: {
                        required: true,

                    },
                    city: {
                        required: true,

                    }
                },
                // messages:{
                //     fullName:{
                //         required:"Please enter name"
                //     }
                // },
            });

        });


        $(document).ready(function() {

            $('#updateForm').validate({ // initialize the plugin
                rules: {
                    editname: {
                        required: true,
                        inlength: 3

                    },
                    editemail: {
                        required: true,
                        minlength: 12,
                        email: true
                    },
                    editphone: {
                        required: true,
                        number: true,
                        minlength: 10,

                    },
                    editcountry: {
                        required: true,

                    },
                    editstate: {
                        required: true,

                    },
                    editcity: {
                        required: true,

                    }
                },
                // messages:{
                //     fullName:{
                //         required:"Please enter name"
                //     }
                // },
            });

        });

        $("#form1").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "data.php",
                method: "POST",
                data: $("form").serialize(),
                dataType: "text",
                success: function(strMessage) {
                    $("#message").text(strMessage);
                    $("#message").show();
                    $('#listTable').load('list.php');
                    $("#form1")[0].reset();
                    setTimeout(() => {
                        $('#createModal').modal('hide');
                    }, 2000);
                    setTimeout(() => {
                        $('#message').hide(1000);
                    }, 3000);
                }
            });
        });

        var deleteData = function(id) {
            if (confirm('Do you want to delete')) {
                $.ajax({
                    type: "GET",
                    url: "delete.php",
                    data: {
                        delete_id: id
                    },
                    dataType: "html",
                    success: function(data) {
                        $('#msgDel').html(data);
                        $("#msgDel").show();
                        $('#listTable').load('list.php');
                        setTimeout(() => {
                            $('#msgDel').hide(1000);
                        }, 3000);
                    }
                });
            }
        }


        $('#updateForm').on('submit', function(e) {
            e.preventDefault();

            // var id = $("input[name='editid']").val();
            // var name = $("input[name='editname']").val();
            // var email = $("input[name='editemail']").val();
            // var phone = $("input[name='editphone']").val();
            // var country = $("input[name='editcountry']").val();
            // var state = $("input[name='editstate']").val();
            // var city = $("input[name='editcity']").val();

            // $("select.editcountry").change(function() {
            //     var country = $(this).children("option:selected").val();
            // });

            // $("select.editstate").change(function() {
            //     var state = $(this).children("option:selected").val();
            // });

            // $("select.editcity").change(function() {
            //     var city = $(this).children("option:selected").val();
            // });



            // var id = 56
            // var name = "ali12";
            // var email = "ali@gmail.com";
            // var phone = 8394027393;
            // var country = country_id
            // var state = state_id;
            // var city = 1;

            // $.ajax({
            //     method: "POST",
            //     url: "updating.php",
            //     data: {
            //         updateId: id,
            //         name: name,
            //         email: email,
            //         phone: phone,
            //         country: country,
            //         state: state,
            //         city: city,
            //     },
            //     success: function(data) {
            //         $('#listTable').load('list.php');
            //         $('#msg').html(data);

            //     }
            // });

            $.ajax({
                url: "updt.php",
                method: "POST",
                data: $("form").serialize(),
                dataType: "text",
                success: function(strMessage) {
                    $("#message").text(strMessage);
                    $("#message").show();
                    $('#listTable').load('list.php');
                    setTimeout(() => {
                        $('#editModal').modal('hide');
                    }, 2000);
                    setTimeout(() => {
                        $('#message').hide(1000);
                    }, 3000);
                }
            });



        });
    </script>
</body>

</html>