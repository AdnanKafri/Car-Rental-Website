<?php
$host = 'localhost';    // Change as necessary
$database = 'car';   // Change as necessary
$user = 'root';   // Change as necessary
$pass = '';     // Change as necessary
$attr = "mysql:host=$host;dbname=$database";
$opts =[
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try  {
    $pdo = new PDO($attr, $user, $pass, $opts);
//    echo "<br> connected to $database ....<br>";
}
catch (PDOException $e)  {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>
