<?php
require_once "conn.php";

    if(isset($_POST['login']))
    {
        $email1=$pass1 ="";
        $admine="admin@car.com";
        $passe="admin";
        if(isset($_POST['email1'])){
            $email1=$_POST['email1'];
        }
        if(isset($_POST['passs'])){
            $pass1=$_POST['passs'];
        }

        if ($email1 == "" || $pass1 == "" ){
            $error = 'Not all fields were entered<br><br>';
//            echo "<script>
//                      alert('".$error."');
//                      </script>";
            header("Location:home.php");
        }
        if($email1==$admine && $pass1==$passe)
        {
            header("Location: home1.php");
            die();
        }

        else {
            $q =  "SELECT * FROM users WHERE email='$email1' AND password='$pass1'";
            if (isset($pdo)) {
                $result = $pdo->query($q);
                if ($result->rowCount() == 0)
                {
                    $error = "Invalid login attempt";
                    echo "<script>
                      alert('".$error."');  
                      </script>";
//                    header("Location:home.php");
                } else {
                    header("Location: home2.php");
                    exit();
                }
            }
        }
        exit();
        $pdo=null;
    }
    # process a POST request




?>
<?php

    if (isset($_POST['sign'])) {
        $user = $email = $phone  = $date = $pass = $pass2 = "";
        if (isset($_POST['name'])) {
            $user = $_POST['name'];
        }
        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
        }
        if (isset($_POST['pass2'])) {
            $pass2 = $_POST['pass2'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        if (isset($_POST['date'])) {
            $date = $_POST['date'];
        }
    if ($pass !== $pass2) {
        $error = 'Please Check The Passwords';
        echo "<script>
                      alert('" . $error . "');  
                      </script>";
//        header("Location:home.php");
    } else {
        $q = "SELECT * FROM users WHERE email='$email'";
        if (isset($pdo)) {
            $result = $pdo->query($q);
            if ($result->rowCount()>0) {
                $error = 'That email already exists , please log in<br><br>';
                echo "<script>
                      alert('" . $error . "');  
                      </script>";
                header("Location:home.php");
            } else {

                $q = "INSERT INTO users (username,password,email,phone,date)
                VALUES(:user_name, :password, :email, :phone, :date)";
                //echo "<br>$q<br>";
                $ps = $pdo->prepare($q);
                $ps->bindParam('user_name', $user);
                $ps->bindParam('password', $pass);
                $ps->bindParam('email', $email);
                $ps->bindParam('phone', $phone);
                $ps->bindParam('date', $date);
                $ps->execute();
                //echo "ok";
                header("Location: home2.php");
            }
        }


    }
        $conn=null;
        exit();
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website with Login & Registration Form</title>
    <link rel="stylesheet" href="h1.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <style>


        .home h1 {
            font-size: 36px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 80%;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }


    </style>
</head>
<body>
<!-- Header -->
<header class="header" style="background-color: #707070">
    <nav class="nav">
        <a href="home.php" class="nav_logo">Girls Car</a>


        <button class="button" id="form-open">Login</button>
    </nav>
</header>

<!-- Home -->
<section class="home">
    <div align="center" >
        <h1>
            أهلا بكم في موقعنا <br> يمكنكم تصفح قائمة السيارات<br> او قم بالتسجيل او تسجيل الدخول للوصول الى كافة خدمات الموقع
        </h1>
    </div>
    <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
            <form action="home.php" method="post">
                <h2>Login</h2>

                <div class="input_box">
                    <input type="email" placeholder="Enter your email" required name="email1"/>
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Enter your password" required name="passs"/>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>

                <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
                    <a href="#" class="forgot_pw">Forgot password?</a>
                </div>

                <button class="button" name="login">Login Now</button>

                <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
            </form>
        </div>

        <!-- Signup From -->
        <div class="form signup_form">
            <form action="home.php" method="post">
                <h2>Signup</h2>
                <div class="input_box">
                    <input type="text" placeholder="Enter your Username" required name="name"/>
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="email" placeholder="Enter your email" required name="email" />
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="text" placeholder="Enter your phone" required name="phone"/>
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    enter your birth date:<br>
                    <input type="date" placeholder="Enter your Birthdate" required name="date"/>

                </div>
                <div class="input_box">
                    <input type="password" placeholder="Create password" required name="pass"/>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>
                <div class="input_box">
                    <input type="password" placeholder="Confirm password" required name="pass2"/>
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>

                <button class="button" name="sign">Signup Now</button>

                <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
            </form>
        </div>
    </div>
</section>

<script src="script.js"></script>
</body>
</html>
