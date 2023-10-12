<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        session_start();
        if($_SESSION["utype"]!="shopowner"){
            header("location: ../restricted.php");
            exit(1);
        }
        include("../conn_db.php");
        include('../head.php');
        $s_id = $_SESSION["sid"];
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <title>Shop Home | Express Food Meal Restaurant</title>
</head>

<body class="d-flex flex-column h-100">
    <?php include('nav_header_shop.php'); ?>

    <div class="d-flex text-center text-white promo-banner-bg py-3">
        <div class="p-lg-2 mx-auto my-3">
            <h1 class="display-5 fw-normal"><?php echo $_SESSION["shopname"]?></h1>
            <h1 class="display-5 fw-normal">Welcome to Express Food Meal Restaurant</h1>
            <p class="lead fw-normal">Online Food ordering system of Express Food Meal Restaurant</p>
        </div>
    </div>

    <div class="container p-5" id="shop-dashboard">
        <h2 class="border-bottom pb-2"><i class="bi bi-graph-up"></i> Shop Dashboard <span
                class="small fw-light"><?php echo date('F j, Y');?></span></h2>

        <!-- SHOP OWNER GRID DASHBOARD -->
        <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-3">
            <!-- TODAY ORDER GRID -->
            <div class="col">
                <div class="card rounded-5 border-secondary p-2">
                    <div class="card-body">
                        <p class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-card-list" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                            </svg>&nbsp;&nbsp;Today Completed Order</p>
                        <p class="card-text my-2">
                            <span class="display-5">
                                <?php
                                    $query = "SELECT COUNT(*) AS cnt_order FROM order_header WHERE DATE(orh_pickuptime) = CURDATE() AND orh_orderstatus = 'FNSH';";
                                    $result = $mysqli -> query($query) -> fetch_array();
                                    echo $result["cnt_order"];
                                    ?>
                                Orders
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END TODAY ORDER GRID -->
            <!-- TODAY REVENUE GRID -->
            
            <!-- END TODAY REVENUE GRID -->

            <!-- GRID OF ORDER NEEDED TO BE COMPLETE -->
            <div class="col">
                <a href="shop_order_list.php" class="text-decoration-none text-dark">
                    <div class="card rounded-5 border p-2">
                        <div class="card-body">
                            <h5 class="card-title fw-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                                Remaining Order</h5>
                            <p class="card-text my-2">
                                <span class="h6">
                                    <?php
                                    $query = "SELECT COUNT(*) AS cnt_remain FROM order_header WHERE orh_orderstatus NOT LIKE 'FNSH';";
                                    $result = $mysqli -> query($query) -> fetch_array();
                                    echo $result["cnt_remain"];
                                ?>
                                </span>
                                orders left to be finished
                            </p>
                            <div class="text-end">
                                <a href="shop_order_list.php" class="btn btn-sm btn-outline-dark">Go to Order List</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END GRID OF ORDER NEEDED TO BE COMPLETE -->

            <!-- GRID OF ORDER NEEDED TO BE COMPLETE -->
            <div class="col">
                <a href="shop_menu_list.php" class="text-decoration-none text-dark">
                    <div class="card rounded-5 border p-2">
                        <div class="card-body">
                            <h5 class="card-title fw-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-card-list" viewBox="0 0 16 16">
                                    <path
                                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                    <path
                                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                </svg>
                                Food Menu</h5>
                            <p class="card-text my-2">
                                <span class="h6">
                                    <?php
                                    $query = "SELECT COUNT(*) AS f_id FROM food";
                                    $result = $mysqli -> query($query) -> fetch_array();
                                    echo $result["f_id"];
                                ?>
                                </span>
                                Menus available to order
                            </p>
                            <div class="text-end">
                                <a href="shop_menu_list.php" class="btn btn-sm btn-outline-dark">Go to Menu List</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END GRID OF ORDER NEEDED TO BE COMPLETE -->
        </div>
        <!-- END ADMIN GRID DASHBOARD -->
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