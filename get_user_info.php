<?php
session_start();
header('Content-Type: application/json');

$response = array();

if (isset($_SESSION['username'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resort_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_SESSION['username'];
    $response['logged_in'] = true;
    $response['username'] = $user;

    $sql_bookings = "SELECT mountain, arrival_date, train_date FROM bookings WHERE username = ?";
    $stmt = $conn->prepare($sql_bookings);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result_bookings = $stmt->get_result();

    $bookings = array();
    while ($row_booking = $result_bookings->fetch_assoc()) {
        $bookings[] = $row_booking;
    }
    $response['bookings'] = $bookings;

    $stmt->close();
    $conn->close();
} else {
    $response['logged_in'] = false;
}

echo json_encode($response);
?>
