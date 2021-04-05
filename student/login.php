<?php 
   require_once('../dbcon.php');
   session_start();
   if(isset($_SESSION['std_login'])){  


    header('location:index.php');
}
   if(isset($_POST['login'])){  
      
       $user = $_POST['user'];
       $password = $_POST['password'];

       $user_check = mysqli_query($dbcon, "SELECT * FROM `std` WHERE username='$user' or email = '$user';");
       
       

      if(mysqli_num_rows($user_check)>0){  
        $row = mysqli_fetch_assoc($user_check);
        if($row['password'] == md5($password)){ 
            if($row['status']==1){ 
                $_SESSION['std_login'] = $user_check;
                $_SESSION['std_id'] = $row['id'];
                header('location:index.php');
            }else{ 
              echo "status not active";
            }
        }else{
            echo "password in not match";
        }

      }else{ 
          echo "username or email invalid";
      }



   }



?>




<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../asset/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../asset/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../asset/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../asset/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../asset/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="../asset/images/logo.png" />
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
            <?php 
                    if(isset($error)){ 

                    ?>

                        <div class="alert alert-primary" role="alert">
                        <h3><?php echo $error; ?></h3>
                        
                        </div>
                    <?php

                    }
                    
                    ?>
                <div class="panel-content bg-scale-0">

                    <form method="post" action="">

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="user">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>




                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary btn-block" name="login">
                        </div>
                        <div class="form-group text-center">
                            <a href="../asset/pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../asset/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../asset/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../asset/javascripts/template-script.min.js"></script>
<script src="../asset/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:37 GMT -->
</html>




 
  
  