<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); include("conn_db.php"); include('head.php');?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }
        .last-content {
    background: rgb(235, 227, 227);
    width: 100%;
}
.section-heading {
  text-align: center;

  margin-bottom: 80px;
}

.section-heading h2 {
  font-size: 28px;
  font-weight: 800;
  color: #232d39;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-top: 0px;
  margin-bottom: 0px;
}

.section-heading h2 em {
  font-style: normal;
  color: #ed563b;
}

.section-heading img {
  margin: 20px auto;
}


#trainers {
  padding-bottom: 50px;
}

#trainers .trainer-item {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
  padding: 15px;
  margin-bottom: 30px;
}

#trainers .trainer-item img {
  width: 100%;
  border-radius: 5px;
}

#trainers .trainer-item span {
  font-size: 13px;
  font-weight: 500;
  color: #ed563b;
  display: inline-block;
  margin-top: 25px;
  margin-bottom: 10px;
}

#trainers .trainer-item h4 {
  font-size: 19px;
  font-weight: 600;
  color: #232d39;
  letter-spacing: 0.5px;
  margin-bottom: 18px;
}

#trainers .trainer-item p {
  margin-bottom: 20px;
}
#trainers .btn{
    color:#fff;
}

ul {
  margin-bottom: 0px;
}


.section-bg {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.section-bg:before {
  content:'';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(35,45,57,0.8);
}

.section-bg > form,
.section-bg .container {
  position: relative;
  z-index: 2
}


    </style>
    <title> Express Food Meal Restaurant</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/menu.css">
</head>

<body class="d-flex flex-column h-100">

    <?php include('nav_header.php')?>

    <div class="position-relative d-flex text-center text-white promo-banner-bg py-3">
        <div class="p-lg-2 mx-auto my-5">
            <h1 class="display-5 fw-normal">Welcome to Express Food</h1>
            <p class="lead fw-normal">Online Food ordering system of Express Food</p>
        </div>
    </div>

    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Foods</em></h2>
                        <br>
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $query = "SELECT * FROM food ORDER BY f_id desc LIMIT 0,3 ";
            $result = $mysqli -> query($query);

            if($result ->num_rows > 0){
                while($food_row = $result->fetch_array()){
                ?>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img
                                <?php
                                if(is_null($food_row["f_pic"])){echo "src='img/default.png'";}
                                else{echo "src=\"img/{$food_row['f_pic']}\"";}
                                ?>
                                style="width:100%; height:125px; object-fit:cover;"
                                class="img-fluid" alt="<?php echo $food_row["f_name"]?>">
                        </div>
                        <div class="down-content">
                            <span>
                               Rs.<?php echo $food_row["f_price"]?>
                            </span>

                            <h4><?php echo $food_row["f_name"]?></h4>

                          

                        </div>
                    </div>
                </div>
            <?php }} ?>
            </div>

            <br>

            <center><a class="btn btn-primary me-1" href="menu.php">View More</a></center>
        </div>
    </section>



    <div class="container p-5" id="recommended-shop">
        
        <!-- END GRID SHOPS SELECTION -->

        <section class="last-content py-5">
        <div class="container py-md-3 text-center">
            <div class="last-lavi-inner-content px-lg-5 ">
                <h3 class="mb-4 tittle-wthree">Get started with <span>Online </span> Ordering !</h3>
                <p class="px-lg-5">You are only few steps away from getting close to us. <br>If you haven't registerd yet, what are you waiting for... Just simply register and order our products online <br></p>
                <div class="buttons mt-md-4 mt-3">


                    <?php if(!isset($_SESSION['cid'])){ ?>
                <a class="btn btn-primary me-2" href="cust_regist.php">Register</a>
                <a class="btn btn-success" href="cust_login.php">Log In</a>
                <?php }else{ ?>


                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item">
                        <a  class="nav-link px-2 text-dark">
                            Welcome <?=$_SESSION['firstname']; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            , You Have logged in.
                        </a>
                    <!-- </li>
                    <li class="nav-item"> -->
                        <a class="mx-2 mt-1 mt-md-0 btn btn-outline-danger" href="logout.php">Log Out</a>
                    </li>
                </ul>
                <?php } ?>


                </div>
            </div>
        </div>
        </section>
        <br>

    <div class="position-relative d-flex text-center text-white promo-banner-bg py-3">
        <div class="p-lg-2 mx-auto my-5">
        <h2>Send Us A Message</h2>
            <p class="lead fw-normal"><i>"7 Days "</i></p>
            <center><a class="btn btn-primary me-1" href="contact.php">Contact Us</a></center>
        </div>
    </div>

    </div>
    <footer class=" text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white absolute">
    <p class="text-white">Copyright © 2022 Express Food Meal Restaurant. All Rights Reserved.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>
