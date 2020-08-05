
<?php 
    ob_start();
    session_start();
    include_once '../view/template/header.php';
    include "../model/connect.php";
    include "../model/user.php";
    if(isset($_POST['login'])&&($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $checkuser = checkUser($user,$pass);
        
        if(is_array($checkuser)){
            $_SESSION['sid']= $checkuser['id'];
            $_SESSION['suser']= $checkuser['user'];
            if($checkuser['role'] == 1) {
                header('location: admin.php');
            }
            else header('location: index.php');
        }
        else{
            $canhbao = '<h2 style="color:red">Mày là ai mà xâm nhập vào đây</h2>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="../view/css/singleproduct.css">

</head>

<body>
    <main>
        <div class="boxbanner">
            <h1>Single Product Page</h1>
            <ul>
                <li><a href="">Home <i class="fa fa-angle-right"></i></a>
                </li>
                <li><a href=""> Single Product</a></li>
            </ul>
        </div>
        <div class="boxcenter2">
            <form action="login.php" method="post">
                <input type="text" placeholder="Username" name="user">
                <input type="password" placeholder="Password" name="pass">
                <input type="submit" value="Login" name="login">
            </form>
            <?php
                if(isset($canhbao)&&$canhbao != ''){
                    echo $canhbao;
                }
            
            
            ?>
        </div>
    </main>

</body>

</html>
<?php
        include_once '../view/template/footer.php';
?> 