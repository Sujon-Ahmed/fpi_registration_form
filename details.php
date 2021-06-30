<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header('location:login.php');
    }
    
    require 'connection.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        // echo $sl;

        $sql = "SELECT * FROM `students_information` WHERE id = '$id'";

        $result = $con->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_object()){
                $id = $row->id;
                $roll = $row->roll;
                $name = $row->name;
                $phone = $row->phone;
                $email = $row->email;
                $gender = $row->gender;
                $department = $row->department;
                $district = $row->district;
            }
        }

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
        if(isset($_GET['valid']) && $_GET['valid'] == 'error') {
            ?>
                <div class="alert alert-danger" role="alert">
                    All Field Are Required!
                </div>
            <?php
        }
    ?>
    <?php
        if(isset($_GET['update']) && $_GET['update'] == 'success') {
            ?>
                <div class="alert alert-success" role="alert">
                    Successfully Data Updated!
                </div>
            <?php
        }
    ?>
    <!-- <div class="container mt-5 shadow-sm mb-5">
        <form action="update.php" class="mt-3" method="POST">
            <h3 class="text-center text-capitalize text-secondary">faridpur polytechnic institute <a href="show.php" class="btn btn-primary btn-sm">Show</a></h3>
            <hr class="w-30 text-center">
            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <label for="roll">Enter Your Roll</label>
                    <input type="number" value="<?php echo $roll; ?>" id="roll" name="roll" placeholder="Your roll..">
                </div>
                <div class="col-md-8 col-sm-12">
                    <label for="name">Enter Your Name</label>
                    <input type="text" value="<?php echo $name; ?>" id="name" name="name" placeholder="Your name..">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <label for="phone">Enter Your Phone</label>
                    <input type="number" value="<?php echo $phone; ?>" id="phone" name="phone" placeholder="Your phone..">
                </div>
                <div class="col-md-8 col-sm-12">
                    <label for="email">Enter Your Email</label>
                    <input type="email" value="<?php echo $email; ?>" id="email" name="email" placeholder="Your email..">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="">
                        <label for="" class="mt-2">Gender</label><br>

                        <input type="radio" <?php if($gender == 'male'){echo 'checked';}?> value="male" id="male" name="gender">
                        <label for="male">Male</label>

                        <input type="radio" <?php if($gender == 'female'){echo 'checked';}?> value="female" id="female" name="gender">
                        <label for="female">Female</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="department">Department</label>
                    <select id="department" name="department">
                        <option selected value="#">Choose One...</option>
                        <option <?php if($department == 'electrical'){echo 'selected';}?> value="electrical">Electrical</option>
                        <option <?php if($department == 'mechanical'){echo 'selected';}?> value="mechanical">Mechanical</option>
                        <option <?php if($department == 'civil'){echo 'selected';}?> value="civil">Civil</option>
                        <option <?php if($department == 'computer'){echo 'selected';}?> value="computer">Computer</option>
                        <option <?php if($department == 'rac'){echo 'selected';}?> value="rac">RAC</option>
                        <option <?php if($department == 'power'){echo 'selected';}?> value="power">Power</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="district">District</label>
                    <select id="district" name="district">
                        <option selected value="#">Choose One...</option>
                        <option <?php if($district == 'dhaka'){echo 'selected';}?> value="dhaka">Dhaka</option>
                        <option <?php if($district == 'manikganj'){echo 'selected';}?> value="manikganj">Manikganj</option>
                        <option <?php if($district == 'faridpur'){echo 'selected';}?> value="faridpur">Faridpur</option>
                        <option <?php if($district == 'madaripur'){echo 'selected';}?> value="madaripur">Madaripur</option>
                        <option <?php if($district == 'gopalganj'){echo 'selected';}?> value="gopalganj">Gopalganj</option>
                        <option <?php if($district == 'rajbari'){echo 'selected';}?> value="rajbari">Rajbari</option>
                        <option <?php if($district == 'tangail'){echo 'selected';}?> value="tangail">Tangail</option>
                    </select>
                </div>
            </div>

            <div class="form-row mt-2">
                <input type="submit" name="submit" value="Submit" class="mr-2">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div> -->

    <div class="container mt-5">
        <div class="modal-body">
            <h3 class="text-center">Details Information <a href="show.php" class="btn btn-primary btn-sm">Show</a></h3>
            <hr>
            <div class="card shadow-sm" style="width: 100%;">
                <div class="card-header d-flex justify-content-between align-items-center"><strong>Roll : <span><?php echo $roll;?></span></strong>
                    <button type="button" class="btn btn-secondary btn-sm">ID <span class="badge badge-light"><?php echo $id;?></span>
                    </button>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name : <?php echo $name;?></strong></li>
                    <li class="list-group-item"><strong>Phone : <?php echo $phone;?></strong></li>
                    <li class="list-group-item"><strong>Email : <?php echo $email;?></strong></li>
                    <li class="list-group-item"><strong>Gender : <?php echo $gender;?></strong></li>
                    <li class="list-group-item"><strong>Department : <?php echo $department;?></strong></li>
                    <li class="list-group-item"><strong>District : <?php echo $district;?></strong></li>
                </ul>
        </div>
        </div>
    </div>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>