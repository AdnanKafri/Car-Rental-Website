<?php
require_once "conn.php";
if(isset($_POST['ok']))
{
    $id=$_POST['id'];
      $sql = "DELETE FROM cars WHERE `car_id` ='$id'";
    $ps = $pdo->prepare($sql);
    if($ps)
    {
        $ps->execute();
        header("Location: cars.php");
        exit();
    }



    else
    {
        echo "<script>
                      alert('" . "there is an error" . "');  
                      </script>";
    }

}
$pdo=null;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color: #4a4a4b;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #bfbfbf;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style form inputs */
        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style form button */
        form button {
            background-color: #f1e6ff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #6a2492;
        }

        /* Style form links */
        a {
            color: #7d2ae8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Add spacing to the form links */
        form a {
            margin-top: 10px;
            display: block;
            text-align: center;
        }

        /* Center the form on larger screens */
        @media (min-width: 768px) {
            form {
                margin: 50px auto;
            }
        }

    </style>
    <title>Document</title>
</head>
<body dir="rtl">
<form action="delete.php" method="post">
    رقم السيارة المراد حذفها:<br>
    <input type="text" name="id" required><br>

    <input type="submit" name="ok" value="تأكيد الحذف" required>
    <a href="home1.php">العودة</a>

</form>
</body>
</html>