<?php 
include_once '../model/products.php';
function addCategory($namedm){
    $conn = connect();
    $sql = "INSERT INTO categories(namedm) VALUES ('{$namedm}')";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
}
function showTenDm($iddm){
    $sql = "select * from categories where id = ".$iddm;
    $res = result1(1,$sql);
    return $res;
}
function xoaDanhMuc($id){
    $conn = connect();
    $sql = "DELETE FROM categories WHERE id=".$id;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql);
}
function editDanhMuc($id,$name){
    $conn = connect();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `categories` SET `namedm` = '.$name.' WHERE `categories`.`id` = '.$id.'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>