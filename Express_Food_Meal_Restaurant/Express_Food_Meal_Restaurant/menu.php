<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        include("conn_db.php");
        include('head.php');
        
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <title>Menu | Express Food Meal Restaurant</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header.php')?>

    

    <div class="container px-5 py-4" id="shop-body">
      

        

        <!-- GRID MENUS SELECTION -->
        <h3 class="border-top py-3 mt-2">Menu</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 align-items-stretch mb-1">

        <?php
           
            $query = "SELECT * FROM food";
            $result = $mysqli -> query($query);

            if($result ->num_rows > 0){
                while($food_row = $result->fetch_array()){
        ?>
            <!-- GRID EACH MENU -->
            <div class="col">
                <div class="card rounded-25 mb-4">
                    <a href="food_item.php?<?php echo "f_id=".$food_row["f_id"]?>" class="text-decoration-none text-dark">
                        <div class="card-img-top">
                            <img
                                <?php
                                if(is_null($food_row["f_pic"])){echo "src='img/default.png'";}
                                else{echo "src=\"img/{$food_row['f_pic']}\"";}
                                ?>
                                style="width:100%; height:125px; object-fit:cover;"
                                class="img-fluid" alt="<?php echo $food_row["f_name"]?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fs-5"><?php echo $food_row["f_name"]?></h5>
                            <p class="card-text">Rs.<?php echo $food_row["f_price"]?>  </p>
                            <a href="food_item.php?<?php echo "f_id=".$food_row["f_id"]?>" class="btn btn-sm mt-3 btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg> Add to cart
                            </a>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <!-- END GRID EACH SHOPS -->

        </div>
        <!-- END GRID SHOPS SELECTION -->

    </div>
    <footer class="text-center text-white" position="absolute">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2022 Express Food Meal Restaurant. All Rights Reserved.  </p>

  </div>
  <!-- Copyright -->
</footer>
</body>

</html>
