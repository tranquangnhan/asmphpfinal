<?php 
    ob_start();
    session_start();
    include '../model/connect.php';
    include '../model/products.php';
    include_once '../view/template/header.php';
    include_once '../global.php'; 
    include_once '../model/categories.php';
    $products1 = showSanPham(0,5);// 0 là sắp xếp sản phẩm thường - 5 là limit 5
    $products2 = showSanPham(1,5); // 1 là sắp xếp sản phẩm orderby theo id - 5 là limit 5
    $sapnhap1 = showSapNhap(0); // 0 là sản phẩm sắp nhập sắp xếp thường
    $sapnhap2 = showSapNhap(1); // 1 là sản phẩm sắp nhập order by theo id
    $showSpMoi = showSpMoi();  
    $spmoi1 = moiThem(0);//0 là sắp xếp theo giảm dần
    $spmoi2 = moiThem(1); //1 là sắp xếp theo tăng dần
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'singleproduct':
                if(isset($_GET['id'])&&$_GET['id']>0){
                    $single = showSingleProduct($_GET['id']);
                }
                $products1 = showSanPham(0,10);// 0 là sắp xếp sản phẩm thường - 10 là limit 10
                include '../view/singleproduct.php';
                break;
            case 'pages':
                include '../view/pages.php';
                break;
            case 'shop':
                if(isset($_GET['iddm'])&&$_GET['iddm']>0){
                    $showSpDm = showSpDm($_GET['iddm']);
                }
                else {
                    $showSpDm = showSanPham(0,10);//limit 10
                }
                include '../view/shop.php';
                    break;
            case 'blogs':
                include '../view/blog.php';
                break;
            case 'user':
                //đăng ký 

                //đăng nhập

                //thoát
                if(isset($_GET['logout'])&&($_GET['logout'])){
                    unset($_SESSION['sid']);
                    unset($_SESSION['suser']);
                    header('location: index.php');
                }
                include '../view/blog.php';
                    break;
            case 'contact':
                include '../view/contact.php';
                break;
            default:
                include '../view/home.php';
                break;
        }
    }
    else{
        include_once '../view/home.php';
    }
    include_once '../view/template/footer.php';
?>