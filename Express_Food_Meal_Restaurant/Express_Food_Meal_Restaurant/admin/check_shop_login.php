<?php
    session_start();
    include('../conn_db.php');

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    $query = "SELECT a_id,username,name,type FROM admin WHERE
    username = '$username' AND password = '$pwd' LIMIT 0,1";

    $result = $mysqli -> query($query);
    if($result -> num_rows == 1){
        //customer login
        $row = $result -> fetch_array();
        $_SESSION["sid"] = $row["a_id"];
        $_SESSION["username"] = $username;
        $_SESSION["shopname"] = $row["name"];
        $_SESSION["utype"] = "shopowner";
        $_SESSION["type"] = $row["type"];
        header("location: shop_home.php");
    }else{
        ?>
        <script>
            alert("Wrong username and/or password!");
            history.back();
        </script>
        <?php
    }
?>