<?php
require_once "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $email = $phone = $gender = $age = $pass = $pass2 = "";
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
}
        if ($user == "" || $pass == "" || $pass2 =="" || $email ==""|| $phone ==""|| $date =="") {
            $error = 'Not all fields were entered<br><br>';
            die($error);
        }
        if($pass!==$pass2)
        {
            $error='wrong pass reepeat';
            die($error);
        }
    else{
        $q= "SELECT * FROM users WHERE email='$email'";
        if (isset($pdo)) {
            $result = $pdo->query($q);
            if ($result->rowCount()) {
                $error = 'That email already exists<br><br>';
                //echo $error;
                die($error);
            }
            else {

                $q = "INSERT INTO users (username,password,email,phone,date)
                VALUES(:user_name, :password, :email, :phone, :date)";
                //echo "<br>$q<br>";
                $ps = $pdo->prepare($q);
                $ps -> bindParam( 'user_name', $user);
                $ps -> bindParam('password', $pass);
                $ps -> bindParam('email', $email);
                $ps -> bindParam('phone', $phone);
                $ps -> bindParam('date', $date);
                $ps -> execute();
                //echo "ok";
                header("Location: home2.php");
            }
        }


}
    $pdo=null;
?>
