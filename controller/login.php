
<?php 
    ob_start();
    session_start();
    include "../model/connect.php";
    include "../model/user.php";
    if(isset($_POST['login'])&&($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $checkuser = checkUser($user,$pass);
        if(is_array($checkuser)){
            $_SESSION['sid'] = $checkuser['id'];
            $_SESSION['suser']= $checkuser['user'];
            $_SESSION['role'] = $checkuser['role'];
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
    <title>login</title>
    <link rel="stylesheet" href="../view/admin/css/login.admin.css">
</head>

<body>
    <div class="boxbanner">
        <div class="login-container">
            <h3>LOGIN</h3>
            <form action="login.php" method="post">
                <label for="user">Username</label>
                <input type="text" id="user" placeholder="Nhập Username..." name="user">
                <label for="pass">Password</label>
                <input type="password" id="pass" placeholder="Nhập Password..."name="pass">
                <input type="submit" value="Login" name="login">
                <div><a href="">Forget Password ?</a><span><a href=""> Click Here</a></span></div>
            </form>
            <?php if(isset($canhbao)&&($canhbao)) echo $canhbao ?>
        </div>

    </div>
</body>

</html>
