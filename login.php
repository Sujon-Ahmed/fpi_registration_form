<?php
    session_start();
    if(isset($_SESSION['id'])) {
        header('location:show.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | FPI</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>   
    <?php
        if(isset($_GET['found']) && $_GET['found'] == 'error') {
            ?>
                <div class="alert alert-danger" role="alert">
                   Invalid Email Address and Password!
                </div>
            <?php
        }
    ?>
     <?php
        if(isset($_GET['pass']) && $_GET['pass'] == 'error') {
            ?>
                <div class="alert alert-danger" role="alert">
                Invalid Email Address and Password!
                </div>
            <?php
        }
    ?>
    <?php
        if(isset($_GET['insert']) && $_GET['insert'] == 'success') {
            ?>
                <div class="alert alert-success" role="alert">
                    Successfully Data Inserted!
                </div>
            <?php
        }
    ?>
    <div class="container mt-5 shadow-sm mb-5 py-5">
        <form action="auth.php" class="mt-2" method="POST">
            <h3 class="text-center text-capitalize text-secondary">faridpur polytechnic institute</h3>
            <hr class="w-30 text-center">
            <div class="form-row">
                <div class="col-md-8 col-sm-12">
                    <label for="email">Enter Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email..">
                </div>
                <div class="col-md-4 col-sm-12">
                    <label for="password">Enter Your Password</label>
                    <input type="password" id="password" name="password" placeholder="Your password..">
                </div>
            </div>

            <div class="form-row mt-2 ">
                <input type="submit" name="submit" value="Submit" class="mr-2 ml-auto">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>