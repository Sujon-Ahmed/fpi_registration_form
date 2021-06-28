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
        $id = $_POST['id'];
        $roll = input_test($_POST['roll']);
        $name = input_test($_POST['name']);
        $phone = input_test($_POST['phone']);
        $email = input_test($_POST['email']);
        $gender = input_test($_POST['gender']);
        $department = input_test($_POST['department']);
        $district = input_test($_POST['district']);

        if($roll != '' && $name != '' && $phone != '' && $email != '' && $gender != '' && $department != '' && $district != '') {
            $sql = "UPDATE `students_information` SET `roll`='$roll',`name`='$name',`phone`='$phone',`email`='$email',`gender`='$gender',`department`='$department',`district`='$district' WHERE id = '$id'";

            if($con->query($sql) == true) {
                header('location:edit.php?id='.$id.'&update=success');
            }
            else{
                echo 'Something Went Wrong!';
            }
        }
        else{
            header('location:edit.php?id='.$id.'&valid=error');
        }
    }
    else{
        header('location:edit.php');
    }



?>