<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "valogical_db";
// Create connection 
$conn = new mysqli($hostname, $username, $password, $databasename);
// Check connection 
if ($conn->connect_error) {
    die("Unable to Connect database: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $target_dir = "upload/";
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $email = isset($_POST["email"]) ?  trim($_POST["email"]) : "";
    $image = $target_dir . basename($_FILES['image']['name'], 'JPEG');
    $image_tep_name = $_FILES['image']['tmp_name'];
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $err = [];
    if ($name == "") {
        $err["name"] = "Please enter name  ";
    }
    if ($email == "") {
        $err['email'] = "Email is Required";
    }
    if ($image == "") {
        $err["image"] = "Please enter image  ";
    }
    if ($email != "") {

        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $err['email'] = "Email is Already Exists";
        }
    }
    if ($password == "") {
        $err["password"] = "Please enter password  ";
    }

    if (empty($err)) {
        // die("here");
        $query = "INSERT INTO `users`(`name`, `email`,`image`, `password`) VALUES ('" . $name . "','" . $email . "','" . $image . "','" . md5($password) . "')";
        $result = mysqli_query($conn, $query);
        //print_r($row);
        if ($result) {
            move_uploaded_file($image_tep_name, $image);
            $err['messsage'] = 'New Registration successfully';
        } else {
            $err['messsage'] = 'Registration Not Worked please check Your code ';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <?php if (isset($err['messsage'])) { ?>
                                <div class="alert alert-success"><?= $err['messsage']; ?></div>
                            <?php } ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="First Name">
                                    <?php if (isset($err['name'])) { ?><div class="small alert-danger"><?= $err['name']; ?></div> <?php } ?>

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address">
                                    <?php if (isset($err['email'])) { ?><div class="small alert-danger"><?= $err['email']; ?></div> <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-user" name="image" id="image" placeholder="image">
                                    <?php if (isset($err['image'])) { ?><div class="small alert-danger"><?= $err['image']; ?></div> <?php } ?>
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?php if (isset($err['password'])) { ?><div class="small alert-danger"><?= $err['password']; ?></div> <?php } ?>

                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Register Account">
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>