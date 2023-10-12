<?php
    session_start();
    if($_SESSION["utype"]!="shopowner"){
        header("location: ../restricted.php");
        exit(1);
    }
    include('../conn_db.php');
    $a_id = $_GET["a_id"];

    $delete_query = "DELETE FROM admin WHERE a_id = '{$a_id}';";
    $delete_result = $mysqli -> query($delete_query);

    if($delete_result){
        header("location: admin_workers_list.php?del_cst=1");
    }else{
        header("location: admin_workers_list.php?del_cst=0");
    }

?>