<?php

session_start();
include('conn_db.php');

if (!isset($_SESSION["cid"])) {
    header("locatiom: cust_login.php");
    exit(1);
}

$f_id = $_POST["f_id"];
$c_id = $_SESSION["cid"];
$amount = $_POST["amount"];
$request = $_POST["request"];



    $cartsearch = "SELECT ct_amount FROM cart WHERE c_id = {$c_id} AND f_id = {$f_id}";
    $cartsearch_result = $mysqli->query($cartsearch);
    $cartsearch_row = $cartsearch_result->num_rows;
    if ($cartsearch_row == 0) {
        //No this item in cart yet
        $insert_query = "INSERT INTO cart (c_id, f_id, ct_amount, ct_note) 
                VALUES ({$c_id},{$f_id},{$amount},'{$request}')";
        $atc_result = $mysqli->query($insert_query);
    } else {
        //Already have item in cart
        $cartsearch_arr = $cartsearch_result->fetch_array();
        $incart_amount = $cartsearch_arr["ct_amount"];
        $new_amount = $incart_amount + $amount;
        $update_query = "UPDATE cart SET ct_amount = {$new_amount} WHERE c_id = {$c_id} AND f_id = {$f_id}";
        $atc_result = $mysqli->query($update_query);
    }

if ($atc_result) {
    header("location: menu.php");
    exit(1);
} else {
    header("location: menu.php");
    exit(1);
}
?>