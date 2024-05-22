<?php
session_start();
$response = ["logged_in" => false];

if (isset($_SESSION["username"])) {
    $response["logged_in"] = true;
    $response["username"] = $_SESSION["username"];
}

echo json_encode($response);
?>
