<?php 
require_once('../dbcon.php');

if(isset($_POST['submitbtn'])){ 
  
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $roll=$_POST['roll'];
    $reg=$_POST['reg'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    //$password_hash = password_hash($password, PASSWORD_DEFAULT);
    $cpassword=  $_POST['cpassword'];
    
    $number =$_POST['number'];

    $input_errors =array();
    if(empty($fname)){ 
        $input_errors['fname']="First Name Field is Required";
        
    }
    if(empty($lname)){ 
        $input_errors['lname']="Last Name Field is Required";
    }
    if(empty($roll)){ 
        $input_errors['roll']="Roll NO Field is Required";
    }
    if(empty($reg)){ 
        $input_errors['reg']="Registation Number Field is Required";
    }
    if(empty($email)){ 
        $input_errors['email']="Email Number Field is Required";
    }
    if(empty($username)){ 
        $input_errors['username']="Username  Field is Required";
    }
    if(empty($password)){ 
        $input_errors['password']="password Field is Required";
    }
    if(empty($cpassword)){ 
        $input_errors['cpassword']="Confirm password Field is Required";
    }
    if(empty($number)){ 
        $input_errors['number']="Phone Number  Field is Required";
    }

    if(count($input_errors)==0){ 
        $email_check = mysqli_query($dbcon, "SELECT * FROM `libarian` WHERE email='$email';");
        
        if(mysqli_num_rows($email_check)==0){
            $username_check = mysqli_query($dbcon,"SELECT * FROM libarian WHERE username ='$username';");
            if(mysqli_num_rows($username_check)==0){
                if($password==$cpassword){  
                    $password = md5($password);
                    $query = "INSERT INTO `libarian`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,`status`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password','0','$number')";
                $datasubmit = mysqli_query($dbcon,$query);
                if(isset($datasubmit)){ 
                    $success = "Well done!";
                 }else{  
                     $error = "Some Error";
                 }
                }else{ 
                    $password_error = "Password no match";
                }



                
            }else{  
                $username_error = "The Username Allrady Exists";
            }
         
        }else{ 
            $email_error = "The email allrady exit";
        }
        
       
    }

    
    

    


   






}




?>

























<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
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
 
                <div class="panel-content bg-scale-0">
                
                    
                    <?php 
                    if(isset($success)){ 

                    ?>

                        <div class="alert alert-primary" role="alert">
                        <h3><?php echo $success; ?></h3>
                        <p>your registation success full</p>
                        </div>
                    <?php

                    }
                    
                    ?>

                    <?php 
                    if(isset($error)){ 

                    ?>

                        <div class="alert alert-primary" role="alert">
                        <h3><?php echo $error; ?></h3>
                        <p>your registation success full</p>
                        </div>
                    <?php

                    }
                    
                    ?>



                   



                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Frist Name" name="fname" value="<?php if (isset($_POST['fname'])){echo $_POST['fname'];}?>" >
                            </span>
                            <?php if(isset($input_errors['fname'])){echo $input_errors['fname'];} ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php if (isset($_POST['lname'])){echo $_POST['lname'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['lname'])){echo $input_errors['lname'];} ?>
                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control" placeholder="Roll NO" name="roll" pattern="[0-9]{6}" value="<?php if (isset($_POST['roll'])){echo $_POST['roll'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['roll'])){echo $input_errors['roll'];} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control"  placeholder="Registetion Number" name="reg" pattern="[0-9]{6}" value="<?php if (isset($_POST['reg'])){echo $_POST['reg'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['reg'])){echo $input_errors['reg'];} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?php if (isset($_POST['email'])){echo $_POST['email'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['email'])){echo $input_errors['email'];} ?>
                            <?php if(isset($email_error)){echo $email_error;} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="User Name" name="username" value="<?php if (isset($_POST['username'])){echo $_POST['username'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['username'])){echo $input_errors['username'];} ?>
                            <?php if(isset($username_error)){echo $username_error;} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset($_POST['password'])){echo $_POST['password'];}?>">
                               
                            </span>
                            <?php if(isset($input_errors['password'])){echo $input_errors['password'];} ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                                
                            </span>
                            <?php if(isset($input_errors['cpassword'])){echo $input_errors['cpassword'];} ?>
                            <?php if(isset($password_error)){echo $password_error;} ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="number" class="form-control"  placeholder="Number" name="number" pattern="01[1|5|6|7|8|9][0-9]{8}" value="<?php if (isset($_POST['number'])){echo $_POST['number'];}?>">
                                
                            </span>
                            <?php if(isset($input_errors['number'])){echo $input_errors['number'];} ?>
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-primary btn-block" name="submitbtn">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Loge In</a>
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


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
