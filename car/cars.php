
<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
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
        /* Update these styles to center and style the h1 element */
        .home table {
            font-size: 20px;
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

        <ul class="nav_items">
            <li>
                <a href="home2.php" >back to home  </a></li>
            <li>
                <a href="buy.php" >Buy</a>
            </li>
        </ul>

    </nav>
</header>
<section class="home">
    <br><br>
    <br><br>
    <br><br>
    <div align="center">
<table border="1" >
    <th>رقم السيارة</th><th>شركة السيارة</th><th>موديل السيارة</th><th>لون السيارة</th><th>تاريخ التصنيع</th><th>السعر</th><th>وصف عن السيارة</th>

<?php
require_once "conn.php";
$sql="select * from cars";
$res=$pdo->query($sql);

while ($row = $res->fetch())
{
    $id=$row['car_id'];
    $brand=$row['brand'];
    $model=$row['model'];
    $color=$row['color'];
    $year=$row['year'];
    $price=$row['price'];
    $desc=$row['description'];
    echo "<tr>
          <td>$id</td>
          <td>$brand</td>
          <td>$model</td>
          <td>$color</td>
          <td>$year</td>
          <td>$price</td>
          <td>$desc</td>
          </tr>";

}
$pdo=null;
?>

</table>

    </div>

<!-- Home -->


</section>

<script src="script.js"></script>
</body>
</html>
