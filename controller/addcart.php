<?php 
    include_once '../model/connect.php';
    include_once '../global.php';
    session_start();
    if(isset($_POST['id'])&&($_POST['id']>0)){
        $id=  $_POST['id'];
        function showSingleProduct($id){
            $sql = "select * from products where 1";
            if($id >0) $sql .= " AND id=".$id;  
            return result1(1,$sql);
        }
        $sp = showSingleProduct($id);
        if(!isset($_SESSION['cart'])){
            $cart = array();
            $cart[$id] = array(
                'sl' => 1,
                'name' => $sp['name'],
                'gia' => $sp['gia'],
                'img' => $sp['img']
            );
    
        }
        else{
            $cart = $_SESSION['cart'];
            if(array_key_exists($id,$cart)){
                $cart[$id] = array(
                    'sl' => (int)$cart[$id]['sl'] +1,
                    'name' => $sp['name'],
                    'gia' => $sp['gia'],
                    'img' => $sp['img']
                );
            }
            else{
                $cart[$id] = array(
                    'sl' => 1,
                    'name' => $sp['name'],
                    'gia' => $sp['gia'],
                    'img' => $sp['img']
                );
            }
        }
        $_SESSION['cart']= $cart;
        print_r($_SESSION['cart'][$id]['sl']);
        die;
    }
   

?>