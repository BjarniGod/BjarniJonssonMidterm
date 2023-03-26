<?php
// $dsn = "mysql:host=localhost; dbname=zippyusedautos";
// $username = 'root';
$dsn = "mysql:host=tvcpw8tpu4jvgnnq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "yss0tyv6mcmb509y";
$password = "bgns283jrafawq4y";
$dbname = "	irix1ca8uw2tw4es";

try{
$db = new PDO($dsn, $username, $password, $dbname);

} catch (PDOException $e) {
    $error_message = "Database Error: ";
    $error_message .= $e->getMessage();
    include('view/error.php');
    exit();

}
?>