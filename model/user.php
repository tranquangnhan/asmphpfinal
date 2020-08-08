<?php 
    include_once '../model/products.php';
    function checkUser($user,$pass){
        $sql = "select * from user where user='{$user}' and pass='{$pass}'";
        $res = result1(1,$sql);
        return $res;
    }
    function addUser($user,$pass){
        $conn = connect();
        $sql = "INSERT INTO user (user,pass) VALUES ('{$user}', '{$pass}')";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);
    }
?>