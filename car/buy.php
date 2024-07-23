<?php
require_once "conn.php";
if(isset($_POST['ok'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $py = $_POST['pay'];
    $date = date('d-m-y h:i');

    $sq = "SELECT * FROM contract where car_id='$id'";
    if (isset($pdo)) {
        $result = $pdo->query($sq);
        if ($result->rowCount() > 0) {
            $error = 'تم بيع السيارة مسبقا,اختر سيارة اخرى';
            echo "<script>
                          alert('" . $error . "');  
                          </script>";
//            header("Location:home.php");
        } else {
            $q = "SELECT user_id FROM users where email='$email'";
            $res = $pdo->query($q);
            $res = $res->fetch();
            $uid = $res['user_id'];

            $sql = "INSERT INTO contract (user_id,car_id,p_type,date)
            VALUES (:user_id,:car_id,:p_type,:date)";
            $ps = $pdo->prepare($sql);
            if ($ps) {
                $ps->bindParam('user_id', $uid);
                $ps->bindParam('car_id', $id);
                $ps->bindParam('p_type', $py);
                $ps->bindParam('date', $date);
                $ps->execute();

                header("Location: contract.php");
                exit();

            } else {
                echo "<script>
                      alert('" . "there is an error" . "');  
                      </script>";
            }

        }


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
<form action="buy.php" method="post" >

    رقم السيارة المراد شراؤها:<br>
    <input type="number" name="id" min="1" required><br>
    قم بتأكيد الايميل (المسجل حاليا به في الموقع):<br>
    <input type="email" name="email" required><br>
    قم بإختيار طريقة الدفع:<br>
    <select name="pay">
        <option value="cahsh">نقدا</option>
        <option value="visa">فيزا</option>
        <option value="card">ماستر كارد</option>
        <option value="paypal">بايبال</option>
    </select>
    <input type="submit" name="ok" value="تأكيد الشراء" required>
    <a href="cars.php">العودة</a>

</form>
</body>
</html>