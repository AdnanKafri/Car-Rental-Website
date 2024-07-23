<?php
require_once "conn.php";
$yes=0;
if(isset($_POST['ok'])) {
    $email = $_POST['email'];
    $car_id = $_POST['id'];

    $q = "SELECT user_id FROM users where email='$email'";
    $res = $pdo->query($q);
    $res = $res->fetch();
    $uid = $res['user_id'];



    $sq = "SELECT * FROM contract,users,cars where contract.car_id=cars.car_id AND contract.user_id=users.user_id and cars.car_id='$car_id' and users.user_id='$uid'";
    if (isset($pdo)) {
        $result = $pdo->query($sq);
        $info=$result->fetch();
        $name=$info['username'];
        $cmodel=$info['model'];
        $cbrand=$info['brand'];
        $color=$info['color'];
        $cprice=$info['price'];
        $date=$info['date'];;
        $contract_id=$info['contract_id'];

        $yes=1;


    } else {
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
<form action="contract.php" method="post" >
    <?php
    if($yes)
    {
        echo "رقم العقد: $contract_id"."<br>";
        echo "أسم المستخدم المشتري: $name"."<br>";
        echo "شركة السيارة: $cbrand"."<br>";
        echo "موديل السيارة: $cmodel"."<br>";
        echo "لون السيارة: $color"."<br>";
        echo "سعر السيارة: $cprice"."<br>";
        echo "تاريخ شراء السيارة: $date"."<br>";

        echo "<a href='cars.php'>العودة الى صفحة السيارات</a>";
    }else{


    ?>
    ادخل ايميلك (الذي قمت بالشراء به في الموقع):<br>
    <input type="email" name="email" required><br>
 ادخل رقم السيارة التي قمت بشرائها:<br>
    <input type="number" min="1" name="id" required><br>

    <input type="submit" name="ok" value="عرض العقود" required>
    <a href="cars.php">العودة</a>

</form>
<?php
}
?>
</body>
</html>