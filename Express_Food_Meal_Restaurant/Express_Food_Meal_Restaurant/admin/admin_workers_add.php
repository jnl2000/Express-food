<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include("../conn_db.php");
    include('../head.php');
    if($_SESSION["utype"]!="shopowner"){
        header("location: ../restricted.php");
        exit(1);
    }
    if(isset($_POST["btn_add"])){
        $pwd = $_POST["pwd"];
        $cfpwd = $_POST["cfpwd"];
        if($pwd != $cfpwd){
            ?>
        <script>
            alert('The password is not match.\nPlease enter it again.');
            history.back();
        </script>
        <?php
            exit(1);
        }else{
            $username = $_POST["username"];
            $firstname = $_POST["firstname"];
            $email = $_POST["email"];
            $type = $_POST["type"];
            if($type == "-"){
            ?>
                <script>
                    alert('You didn\'t select your  role yet.\nPlease select again');
                    history.back();
                </script>
            <?php
                exit(1);
            }
            //Check for duplicating username
            $query = "SELECT username FROM admin WHERE username = '$username';";
            $result = $mysqli -> query($query);
            if($result -> num_rows >= 1){
                ?>
                <script>
                    alert('The username is already taken!');
                    history.back();
                </script>
            <?php
            }
            $result -> free_result();
            //Check for duplicating email
            $query = "SELECT email FROM admin WHERE email = '$email';";
            $result = $mysqli -> query($query);
            if($result -> num_rows >= 1){
            ?>
                <script>
                    alert('The email is already in use!');
                    history.back();
                </script>
            <?php
            }
            $result -> free_result();
            $query = "INSERT INTO admin (username,password,name,email,type)
            VALUES ('$username','$pwd','$firstname','$email','$type');";
            $result = $mysqli -> query($query);
            if($result){
                header("location: admin_workers_list.php?add_cst=1");
            }else{
                header("location: admin_workers_list.php?add_cst=0");
            }
        }
        exit(1);
    }

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/login.css" rel="stylesheet">
    <title>Add New Worker </title>
</head>

<body class="d-flex flex-column">
    <?php include('nav_header_shop.php');?>
    <div class="container mt-4"></div>
    <div class="container form-signin mt-auto">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <form method="POST" action="admin_workers_add.php" class="form-floating">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-person-plus me-2"></i>Add New Worker</h2>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                    minlength="5" maxlength="45" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" minlength="8"
                    maxlength="45" required>
                <label for="pwd">Password</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="cfpwd" placeholder="Confirm Password" minlength="8"
                    maxlength="45" name="cfpwd" required>
                <label for="cfpwd">Confirm Password</label>
                <div id="passwordHelpBlock" class="form-text smaller-font">
                    Password must be at least 8 characters long.
                </div>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="firstname" placeholder="Name" name="firstname"
                    required>
                <label for="firstname">Name</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="type" name="type">
                    <option selected value="-">---</option>
                    <option value="ADM">Admin</option>
                    <option value="WRK">Worker</option>
                    <option value="OTH">Others</option>
                </select>
                <label for="gender">Your Role</label>
            </div>
            <button class="w-100 btn btn-success mb-3" type="submit" name="btn_add">Add new worker</button>
        </form>
    </div>
    <div class="container mt-4"></div>
    <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2022 Express Food Meal Restaurant. All Rights Reserved.  </p>

  </div>
</body>

</html>

