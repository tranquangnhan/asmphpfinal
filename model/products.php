<?php
include_once '../global.php';
include_once '../model/connect.php';

function showSanPham($orderid,$limit){ 
    $sql = "select * from products";
    if($orderid == 1){
        $sql .= " order by products.id desc";
    }
    if($limit == 5){
        $sql .=" limit 5";  
    }
    if($limit == 10){
        $sql .=" limit 10";  
    }
    return result1(0,$sql);
}

function showSapNhap($orderid){ 
    $sql = "select * from products where sapnhap = 1";
    if($orderid == 1){
        $sql .= " order by products.id desc";
    }
    return result1(0,$sql);
}

function showSpMoi(){ 
    $sql = "select * from products";
    $sql .= " where moi = 1";
    return result1(0,$sql);
}
function moiThem($orderid){
    $sql = "select * from products where 1";
    if($orderid == 1){
        $sql .= " order by products.id desc";
    }
    if($orderid == 0){
        $sql .= " order by products.id asc";
    }
    $sql .= " limit 5";
    return result1(0,$sql);
}
//show sản phẩm admin
function showAllSpAdmin(){
    $sql = "select * from products";
    return result1(0,$sql);
}
function showAllDmAdmin(){
    $sql = "select * from categories";
    return result1(0,$sql);
}

function showSingleProduct($id){
    $sql = "select * from products where 1";
    if($id >0) $sql .= " AND id=".$id;  
    return result1(1,$sql);
}
function sameDm($iddm){
    $sql = "select * from products where iddm=".$iddm;
    return result1(0,$sql);
}
//show sp theo danh mục
function showSpDm($iddm){ 
    $sql = "select * from products where iddm=".$iddm;
    $res = result1(0,$sql);
    return $res;
}
// admin add product
function addProduct($name,$iddanhmuc,$img,$vote,$gia,$giamgia,$sapnhap,$moi){
    $conn = connect();
    $sql = "INSERT INTO products (name,iddm, img,vote,gia,giamgia,sapnhap,moi) VALUES ('{$name}', '{$iddanhmuc}', '{$img}','{$vote}','{$gia}','{$giamgia}','{$sapnhap}','{$moi}')";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
}
// admin delete product
function xoaSanPham($id){
    $conn = connect();
    $sql = "DELETE FROM products WHERE id=".$id;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
}
//admin update sp
function updatePro($id,$name,$iddanhmuc,$img,$vote,$gia,$giamgia,$sapnhap,$moi){
    $sql = "UPDATE products SET name='{$name}', iddm = '{$iddanhmuc}', img = '{$img}', vote= '{$vote}', gia = '{$gia}', giamgia ='{$giamgia}', sapnhap= '{$sapnhap}', moi= '{$moi}'  WHERE id=".$id;
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

?>