<?php 
    include_once '../model/products.php';
    function checkUser($user,$pass){
        $sql = "select * from user where user='{$user}' and pass='{$pass}'";
        $res = result1(1,$sql);
        return $res;
    }

?>