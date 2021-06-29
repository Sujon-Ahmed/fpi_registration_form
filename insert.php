<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header('location:login.php');
    }
    require 'connection.php';

    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        function input_test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $created_by = $_POST['created_by'];
        $roll = input_test($_POST['roll']);
        $name = input_test($_POST['name']);
        $phone = input_test($_POST['phone']);
        $email = input_test($_POST['email']);
        $gender = input_test($_POST['gender']);
        $department = input_test($_POST['department']);
        $district = input_test($_POST['district']);

        if($roll != '' && $name != '' && $phone != '' && $email != '' && $gender != '' && $department != '' && $district != '') {
            $sql = "INSERT INTO `students_information`(`created_by`,`roll`, `name`, `phone`, `email`, `gender`, `department`, `district`) VALUES ('$created_by','$roll','$name','$phone','$email','$gender','$department','$district')";

            if($con->query($sql) == true) {
                header('location:index.php?insert=success');
            }
            else{
                echo 'Something Went Wrong!';
            }
        }
        else{
            header('location:index.php?valid=error');
        }
    }
    else{
        header('location:index.php');
    }



?>