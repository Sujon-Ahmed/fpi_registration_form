<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page | FPI</title>
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
        if(isset($_GET['insert']) && $_GET['insert'] == 'success') {
            ?>
                <div class="alert alert-success" role="alert">
                    Successfully Data Inserted!
                </div>
            <?php
        }
    ?>
    <div class="container mt-5 shadow-sm mb-5">
        <form action="insert.php" class="mt-3" method="POST">
            <h3 class="text-center text-capitalize text-secondary">faridpur polytechnic institute <a href="show.php" class="btn btn-primary btn-sm">Show</a></h3>
            <hr class="w-30 text-center">
            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <label for="roll">Enter Your Roll</label>
                    <input type="number" id="roll" name="roll" placeholder="Your roll..">
                </div>
                <div class="col-md-8 col-sm-12">
                    <label for="name">Enter Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name..">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <label for="phone">Enter Your Phone</label>
                    <input type="number" id="phone" name="phone" placeholder="Your phone..">
                </div>
                <div class="col-md-8 col-sm-12">
                    <label for="email">Enter Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email..">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="">
                        <label for="" class="mt-2">Gender</label><br>

                        <input type="radio" value="male" id="male" name="gender">
                        <label for="male">Male</label>

                        <input type="radio" value="female" id="female" name="gender">
                        <label for="female">Female</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="department">Department</label>
                    <select id="department" name="department">
                        <option selected value="#">Choose One...</option>
                        <option value="electrical">Electrical</option>
                        <option value="mechanical">Mechanical</option>
                        <option value="civil">Civil</option>
                        <option value="computer">Computer</option>
                        <option value="rac">RAC</option>
                        <option value="power">Power</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="district">District</label>
                    <select id="district" name="district">
                        <option selected value="#">Choose One...</option>
                        <option value="dhaka">Dhaka</option>
                        <option value="manikganj">Manikganj</option>
                        <option value="faridpur">Faridpur</option>
                        <option value="madaripur">Madaripur</option>
                        <option value="gopalganj">Gopalganj</option>
                        <option value="rajbari">Rajbari</option>
                        <option value="tangail">Tangail</option>
                    </select>
                </div>
            </div>

            <div class="form-row mt-2">
                <input type="hidden" name="created_by" value="<?php echo $_SESSION['id'];?>">
                <input type="submit" name="submit" value="Submit" class="mr-2">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
</body>
</html>