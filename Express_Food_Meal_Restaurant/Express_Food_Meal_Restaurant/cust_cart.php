<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    if(!isset($_SESSION["cid"])){
        header("location: restricted.php");
        exit(1);
    }
    include("conn_db.php");
    include('head.php');
    $no_order = false;
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <title>My Cart | Express Food Meal Restaurant</title>
</head>

<body class="d-flex flex-column h-100">

    <?php include('nav_header.php')?>

    <div class="container px-5 py-4" id="cart-body">
        <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>

            <?php
            if(isset($_GET["up_crt"])){
                if($_GET["up_crt"]==1){
                    ?>
            <!-- START SUCCESSFULLY UPDATE CARTS -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-success text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                    <span class="ms-2 mt-2">Successfully updated your item!</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="cust_cart.php">X</a></span>
                </div>
            </div>
            <!-- END SUCCESSFULLY UPDATED CART -->
            <?php }else{ ?>
            <!-- START FAILED UPDATE CART -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg><span class="ms-2 mt-2">Failed to update your item.</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="cust_cart.php">X</a></span>
                </div>
            </div>
            <!-- END FAILED UPDATED CART -->
            <?php }
                }
            if(isset($_GET["rmv_crt"])){
                if($_GET["rmv_crt"]==1){
                    ?>
            <!-- START SUCCESSFULLY DELETE ITEM FROM CART -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-success text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-check-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                    <span class="ms-2 mt-2">Successfully remove your item!</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="cust_cart.php">X</a></span>
                </div>
            </div>
            <!-- END SUCCESSFULLY DELETE ITEM FROM CART -->
            <?php }else{ ?>
            <!-- START FAILED DELETE ITEM FROM CART -->
            <div class="row row-cols-1 notibar">
                <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg><span class="ms-2 mt-2">Failed to remove your item.</span>
                    <span class="me-2 float-end"><a class="text-decoration-none link-light" href="cust_cart.php">X</a></span>
                </div>
            </div>
            <!-- END FAILED DELETE ITEM FROM CART -->
            <?php }
                }  ?>

            <h2 class="py-3 display-6 border-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart"
                    viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg> My Cart
            </h2>
        </div>

        <?php
            $ct_query = "SELECT * FROM cart WHERE c_id = {$_SESSION['cid']}";
            $cart_numrow = $mysqli -> query($ct_query) -> num_rows;
            if($cart_numrow > 0){
        ?>
        <!-- CASE: HAVE ITEM(S) IN THE CART -->
        <div class="row row-cols-1 row-cols-md-2 mb-5">
            <div class="col">
                <div class="row row-cols-1">
                    <div class="col">
                        <h5 class="fw-light">My Order</h5>
                    </div>

                    

                    <div class="col">
                        <ul class="list-group">
                            <!-- START CART ITEM -->
                            <?php
                                $cartdetail_query = "SELECT ct.ct_amount,ct.f_id,f_pic,f.f_name,f.f_price,ct.ct_note,f_todayavail,f_preorderavail
                                FROM cart ct INNER JOIN food f ON ct.f_id = f.f_id WHERE ct.c_id = {$_SESSION['cid']}";
                                $cartdetail_result = $mysqli -> query($cartdetail_query);
                                while($row = $cartdetail_result -> fetch_array()){
                            ?>
                            <li
                                class="list-group-item d-flex border-0 pb-3 border-bottom w-100 justify-content-between align-items-center">
                                <div class="image-parent">
                                    <img <?php
                                        if(is_null($row["f_pic"])){echo "src='img/default.png'";}
                                        else{echo "src=\"img/{$row['f_pic']}\"";}
                                    ?> class="img-fluid rounded" style="width: 100px; height:100px; object-fit:cover;"
                                        alt="quixote">
                                </div>
                                <div class="ms-3 mt-3 me-auto">
                                    <div class="fw-normal"><span class="h5"><?php echo $row["ct_amount"]?>x</span>
                                        <?php echo $row["f_name"]?>
                                        <p><?php printf("Rs. %.2f  <small class='text-muted'>( Rs. %.2f  each)</small>",$row["f_price"]*$row["ct_amount"],$row["f_price"])?><br />
                                            <span class="text-muted small"> <?php echo $row["ct_note"]?></span>
                                            <ul class="list-unstyled list-inline">
                                                <li>
                                                <?php
                                                    $rmv = false;
                                                    $rmv_link = false;
                                                    
                                                        if($row["f_todayavail"]==0 && $row["f_preorderavail"]==0){
                                                            $rmv = true;
                                                        ?>
                                                        <span class="badge rounded-pill bg-danger">Out of stock</span>
                                                        <?php }
                                                        else if($row["f_todayavail"]==0){ ?>
                                                        <span class="badge rounded-pill bg-danger">Today Unavailable</span>
                                                        <?php
                                                            if($disable_preorder){$rmv = true;}
                                                        }
                                                        else if($row["f_preorderavail"]==0){?>
                                                        <span class="badge rounded-pill bg-danger">Pre-order Unavailable</span>
                                                        <?php
                                                
                                                        }
                                                    
                                                    if($rmv){
                                                        $no_order = true;
                                                        $rmv_link = true;
                                                    }
                                                ?>
                                                </li>
                                            </ul>
                                        </p>
                                        <?php if($rmv_link){?>
                                        <a href="remove_cart_item.php?rmv=1&f_id=<?php echo $row["f_id"];?>"
                                            class="text-decoration-none text-danger nav nav-item small">Remove item</a>
                                        <?php }else {?>
                                        <a href="cust_update_cart.php?f_id=<?php echo $row["f_id"];?>"
                                            class="text-decoration-none text-success nav nav-item small">Edit item</a>
                                        <?php } ?>
                                    </div>
                            </li>
                            <!-- END CART ITEM -->
                            <?php } ?>
                        </ul>
                        <div class="col my-3">
                            <ul class="list-inline justify-content-between">
                                <li class="list-item mb-2">
                                    <a href="remove_cart_all.php?rmv=1"
                                        class="nav nav-item text-danger text-decoration-none small" name="rmv_all" id="rmv_all">
                                        Remove all item in cart
                                    </a>
                                </li>
                                <li class="list-inline-item fw-light me-5">Grand Total</li>
                                <li class="list-inline-item fw-bold h4">
                                    <?php
                                        $gt_query = "SELECT SUM(ct.ct_amount*f.f_price) AS grandtotal FROM cart ct INNER JOIN food f
                                        ON ct.f_id = f.f_id WHERE ct.c_id = {$_SESSION['cid']} GROUP BY ct.c_id";
                                        $gt_arr = $mysqli -> query($gt_query) -> fetch_array();
                                        $order_cost = $gt_arr["grandtotal"];
                                        printf("Rs.  %.2f ",$order_cost);
                                        if($order_cost<20){
                                            $min_cost = false;  $no_order=true;
                                        }else{
                                            $min_cost = true;
                                        }
                                    ?>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-3 mt-md-0">
                <div class="row row-cols-1">
                    <div class="col mb-3">
                        <div class="card p-2 p-md-4 border-0 border-bottom">
                            <h5 class="card-title fw-light">My Information</h5>
                            <ul class="card-text list-unstyled m-0 p-0 small">
                                <?php
                                    $cust_query = "SELECT c_email FROM customer WHERE c_id = {$_SESSION['cid']} LIMIT 0,1";
                                    $cust_arr = $mysqli -> query($cust_query) -> fetch_array();
                                ?>
                                <li>Name: <?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"]; ?></li>
                                <li>Email: <?php echo $cust_arr["c_email"]?> </li>
                            </ul>
                        </div>
                    </div>
                    <form method="POST" action="add_order.php">
                        <div class="col mb-1">
                            <div class="card px-2 px-md-4 pb-1 pb-md-2 border-0">
                                <h5 class="card-title fw-light">Pick-Up Detail</h5>
                                <label for="pickuptime" class="form-label small">Pick-Up Date and Time</label>
                                <input type="datetime-local" class="form-control" name="pickuptime" id="pickuptime"
                                    min="<?php echo $min_datetime?>" max="<?php echo $max_datetime?>"
                                    value="<?php echo $min_datetime?>"
                                    <?php if($no_order){echo "disabled";}?>
                                    required>
                                <input type="hidden" name="payamount" value="<?php echo $order_cost;?>">
                                <div id="passwordHelpBlock" class="form-text smaller-font pt-2">
                                    <!-- SUBJECTED TO CHANGE LATER -->
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col">

                        
                    </div>
                           <h4 class="mb-2">Order Method:</h4>
                            <button type="submit" class="w-100 btn btn-primary" name="place_order" id="place_order">
                                <i class="fas fa-cart-arrow-down"></i> Cash On Delivery</a><br>
                            </button>
                          


 


</form>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END CASE: HAVE ITEM(S) IN THE CART -->
        <?php }else{ ?>
        <!-- CASE: NO ITEM IN THE CART -->
        <div class="row row-cols-1 notibar">
            <div class="col mt-2 ms-2 p-2 bg-danger text-white rounded text-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-x-circle ms-2" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg><span class="ms-2 mt-2">You have no item in the cart</span>
            </div>
        </div>
        <!-- END CASE: NO ITEM IN THE CARTS -->
        <?php } ?>

    </div>
    </body>
    <footer class="text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-2 p-2 mb-1 bg-dark text-white">
    <p class="text-white">Copyright © 2022 Express Food Meal Restaurant. All Rights Reserved.  </p>

  </div>
  <!-- Copyright -->
</footer>


<!-- Apply class to omise payment button -->
<script type="text/javascript">
    var pay_btn = document.getElementsByClassName("omise-checkout-button");
    pay_btn[0].classList.add("w-100","btn","btn-primary");
</script>
</html>
