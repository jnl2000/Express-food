<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        include("../conn_db.php");
        if($_SESSION["utype"]!="shopowner"){
            header("location: ../restricted.php");
            exit(1);
        }
        $s_id = $_SESSION["sid"];
        if(isset($_POST["upd_confirm"])){
            $s_name = $_POST["name"];
            $s_username = $_POST["username"];
            $s_email = $_POST["email"];
            $s_type = $_POST["type"];
            $update_query = "UPDATE admin SET username = '{$s_username}', name = '{$s_name}', email = '{$s_email}',type='{$s_type}' WHERE a_id = {$s_id};";
            $update_result = $mysqli -> query($update_query);
            
            if($update_result){ 
                $_SESSION["shopname"]=$s_name;
                $_SESSION["type"]=$s_type;
            
            header("location: shop_profile.php?up_prf=1");}
            else{header("location: shop_profile.php?up_prf=0");}
            exit(1);
        }
        include('../head.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <title>Update shop profile | Express Food Meal Restaurant</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header_shop.php')?>

    <div class="container form-signin mt-auto w-50">
        <a class="nav nav-item text-decoration-none text-muted" href="#" onclick="history.back();">
            <i class="bi bi-arrow-left-square me-2"></i>Go back
        </a>
        <?php
            //Select customer record from database
            $query = "SELECT username,name,email,type FROM admin WHERE a_id = {$s_id} LIMIT 0,1";
            $result = $mysqli ->query($query);
            $row = $result -> fetch_array();
        ?>
        <form method="POST" action="shop_profile_edit.php" class="form-floating" enctype="multipart/form-data">
            <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-pencil-square me-2"></i>Update Shop Information</h2>
            
            
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                value="<?php echo $row["username"];?>" required>
                <label for="shopname">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $row["name"];?>" name="name" required>
                <label for="shopname">Name</label>
            </div>
            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $row["email"];?>" required>
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <select class="form-select mb-2" id="type" name="type">
                    <option value="ADM" <?php if($row["type"]=="ADM"){echo "selected";}?>>Admin</option>
                    <option value="WRK" <?php if($row["type"]=="WRK"){echo "selected";}?>>Worker</option>
                    <option value="OTH" <?php if($row["type"]=="OTH"){echo "selected";}?>>Other</option>
                </select>
                <label for="gender">Your role</label>
            </div>
            
            <button class="w-100 btn btn-success mb-3" name="upd_confirm" type="submit">Update Shop Profile</button>
        </form>
    </div>

    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2022 Express Food Meal Restaurant. All Rights Reserved.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>