<?php 
include_once '../model/connect.php';
include_once '../global.php';
session_start();
comment();
function comment(){
    global $pathimg;
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $message = $_POST['message'];
        $idsp = $_POST['idsp'];
        $iduser = $_SESSION['sid'];
        $conn = connect();
        $sql = "INSERT INTO binhluan (name, iduser, idsp,noidung)
        VALUES ('{$name}', '{$iduser}', '{$idsp}','{$message}')";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($sql);
    }
}
if(isset($_POST['idsp'])&&$_POST['idsp']){
$idsp = $_POST['idsp'];
getComment($idsp);
}

function getComment($idsp){
        $sql = "SELECT * FROM binhluan WHERE idsp={$idsp} order by id desc limit 4";
        $result = result1(0,$sql);
        $output = '';
        if($result){
                foreach ($result as $showcm) {
                $name = $showcm['name'];
                $noidung = $showcm['noidung'];
                $output .= '<div class="single-review" >
                                <div class="review-img">
                                    <img src="../view/../view/images/imgclient1.png" alt="">
                                </div>
                                <div class="review-content">
                                    <div class="review-top-wrap">
                                        <div class="review-left">
                                            <div class="review-name">
                                                <h4>'.$name.'</h4>
                                            </div>
                                            <div class="rating-product">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="review-left">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="review-bottom">
                                        <p>
                                            '.$noidung.'
                                        </p>
                                    </div>
                                </div>
                            </div>';
            }
        }
        echo  $output;
}
?>