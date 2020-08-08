<?php 
    ob_start();
    session_start();  //bắt đầu session
    include_once '../model/connect.php';
    include_once '../global.php';    
    include_once '../model/products.php';
    include_once '../view/admin/header.admin.php';
    include_once '../model/categories.php'; 
   

    // $showSpAd = showAllSpAdmin();
    $showdmsp= showAllDmAdmin();
    if(isset($_SESSION['sid'])&&($_SESSION['sid'])>0&&$_SESSION['role']==1){
            if(isset($_GET['act'])){
                $act = $_GET['act'];
                switch ($act) {
                    case 'addproduct':
                        if(isset($_POST['them'])&&($_POST['them'])){
                            $iddanhmuc = $_POST['iddanhmuc'];
                            $img = $_FILES['photo']['name'];
                            $name = $_POST['name'];
                            $gia = $_POST['price'];
                            $vote = $_POST['vote'];
                            $giamgia = $_POST['discount'];
                            $sapnhap = $_POST['commingsoon'];
                            $moi = $_POST['new'];
                            $target_file = $pathimg . basename($img);
                            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                                $uploadfile = 'Upload file thành công';
                            }
                            else{
                                $uploadfile = 'upload file không thành công';
                            }
                            addProduct($name,$iddanhmuc,$img,$vote,$gia,$giamgia,$sapnhap,$moi);
                            header('location: admin.php?act=dashboard');
                        }
                        include_once '../view/admin/addproduct.php';
                        break;
                    case 'delsanpham':
                        if(isset($_GET['iddel'])&&($_GET['iddel'])>0){
                            $id = $_GET['iddel'];
                            xoaSanPham($id);
                        }
                        $showSpAd = showAllSpAdmin();
                        include '../view/admin/dashboard.php';
                        break;
                    case 'editsanpham':
                        if(isset($_GET['idedit'])&&($_GET['idedit']>0)){
                            $id = $_GET['idedit'];
                            $spsua = showSingleProduct($id);
                            $showdmsp = showAllDmAdmin();
                        }
                        if(isset($_POST['sua'])&&($_POST['sua'])){
                            $id = $_GET['idedit'];
                            $iddanhmuc = $_POST['iddanhmuc'];
                            $img = $_FILES['photo']['name'];
                            if($img === ''){
                                $img = $spsua['img'];
                            }
                            $name = $_POST['name'];
                            $gia = $_POST['price'];
                            $vote = $_POST['vote'];
                            $giamgia = $_POST['discount'];
                            $sapnhap = $_POST['commingsoon'];
                            $moi = $_POST['new'];
                            $target_file = $pathimg . basename($img);
                            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                                $uploadfile = 'Upload file thành công';
                            }
                            else{
                                $uploadfile = 'upload file không thành công';
                            }
                            updatePro($id,$name,$iddanhmuc,$img,$vote,$gia,$giamgia,$sapnhap,$moi);
                            header('location: admin.php?act=dashboard');
                        }
                        include_once '../view/admin/editproduct.php';
                        break;
                    case 'addcategory':
                        if(isset($_POST['them'])&&($_POST['them'])){
                            $namedm = $_POST['namedm'];
                            addCategory($namedm);
                            header('location: admin.php?act=categories');
                        }
                        include_once '../view/admin/addcategory.php';
                        break;
                    case 'deldanhmuc':
                        if(isset($_GET['iddel'])&&($_GET['iddel'])>0){
                            $id = $_GET['iddel'];
                            xoaDanhMuc($id);
                        }
                        $showdmsp= showAllDmAdmin();
                            include_once '../view/admin/categories.php';
                        break;
                    case 'editdanhmuc':
                        if(isset($_GET['idedit'])&&($_GET['idedit'])>0){
                            $iddm = $_GET['idedit'];
                            $nameDm = showTenDm($iddm);
                            editDanhMuc($iddm, $nameDm['namedm']);
                            header('location: admin.php?act=categories');
                        }
                        include_once '../view/admin/editcategory.php';
                        break;
                    case 'categories':
                        include_once '../view/admin/categories.php';
                        break;
                    case 'login':
                            include_once '../view/admin/categories.php';
                            break;
                    default:
                        include '../view/admin/dashboard.php';
                        break;
                    }
                }
                else{
                    include '../view/admin/dashboard.php';
                }
                include_once '../view/admin/footer.admin.php';
}else{
       header("location: login.php");
    }
?>