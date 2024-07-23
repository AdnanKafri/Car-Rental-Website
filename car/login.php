<?php
require_once "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # process a POST request
    $email=$pass ="";
    $admine="admin@car.com";
    $passe="admin";
    if(isset($_POST['email1'])){
        $email=$_POST['email1'];
    }
    if(isset($_POST['passs'])){
        $pass=$_POST['passs'];
    }

    if ($email == "" || $pass == "" ){
        $error = 'Not all fields were entered<br><br>';
        die($error);
    }
    if($email==$admine && $pass==$passe)
    {
        header("Location: home1.php");
        die();
    }

    else {
        $q =  "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        if (isset($pdo)) {
            $result = $pdo->query($q);
            if ($result->rowCount() == 0)
            {
                $error = "Invalid login attempt";
                echo $error;
            } else {
                header("Location: home2.php");
                exit();
            }
        }
    }


}
$pdo=null;

?>
