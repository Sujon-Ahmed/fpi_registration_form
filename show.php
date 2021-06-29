<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header('location:login.php');
    }
    require 'connection.php';

    $sql = "SELECT * FROM `students_information`";
    $result = $con->query($sql);

    $user_id = $_SESSION['id'];
    $user = "SELECT * FROM `login` WHERE id = '$user_id'";
    $user_data = $con->query($user);

    if($user_data->num_rows > 0){
        while($data = $user_data->fetch_object()) {
            $us_id = $data->id;
            $user_name = $data->name;
            $user_email = $data->email;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Page | FPI</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>   
    <?php
        if(isset($_GET['valid']) && $_GET['valid'] == 'error') {
            ?>
                <div class="alert alert-danger" role="alert">
                    All Field Are Required!
                </div>
            <?php
        }
    ?>
    <?php
        if(isset($_GET['del']) && $_GET['del'] == 'success') {
            ?>
                <div class="alert alert-danger" role="alert">
                    Successfully Data Deleted!
                </div>
            <?php
        }
    ?>
    <div class="container mt-5">
        <h3 class="text-center text-capitalize text-secondary"> <a onclick="javascript:return confirm('Are Your Sure? Leave this page!')" href="logout.php" class="btn btn-danger btn-sm">Logout</a> faridpur polytechnic institute <a href="index.php" class="btn btn-primary btn-sm">Insert</a></h3>
        <hr class="w-30 text-center">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Sl</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Author</th>
                    <!-- <th>Phone</th> -->
                    <!-- <th>Email</th> -->
                    <!-- <th>Gender</th> -->
                    <!-- <th>Department</th> -->
                    <!-- <th>District</th> -->
                    <th>Created_At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_object()) {
                            ?>
                                <tr>
                                    <td><?php echo $row->id;?></td>
                                    <td><?php echo $row->roll;?></td>
                                    <td><?php echo $row->name;?></td>
                                    <td><?php echo $row->created_by;?></td>
                                    <!-- <td><?php echo $row->phone;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->gender;?></td> -->
                                    <!-- <td><?php echo $row->department;?></td> -->
                                    <!-- <td><?php echo $row->district;?></td> -->
                                    <td><?php echo date('M-d-Y h:i A',strtotime($row->created_at));?></td>
                                    <td  class="text-center">
                                        <a href="edit.php?id=<?php echo $row->id;?>" class="btn btn-info btn-sm">Update</a>

                                        <a href="details.php?id=<?php echo $row->id;?>" class="btn btn-success btn-sm">View</a>

                                        <a onclick="javascript:return confirm('Are You Sure? Permanently Delete this Record!')" href="delete.php?id=<?php echo $row->id;?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>