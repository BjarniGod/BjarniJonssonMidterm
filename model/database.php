<?php

$servername = "tvcpw8tpu4jvgnnq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "yss0tyv6mcmb509y";
$password = "bgns283jrafawq4y";
$dbname = "irix1ca8uw2tw4es";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $error_message = "Database Error: ";
    $error_message .= $e->getMessage();
    include('view/error.php');
    exit();
}

?>