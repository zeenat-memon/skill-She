<?php

session_start();
include("config/db.php");

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'buyer'){
    header("Location: auth/login.php");
    exit();
}

$buyer_id = $_SESSION['user_id'];
$service_id = intval($_GET['service_id']);

// get service
$service = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM services WHERE id=$service_id")
);

$seller_id = $service['seller_id'];

// insert order
mysqli_query($conn, "INSERT INTO orders
(seller_id, service_id, buyer_id, status)
VALUES
($seller_id, $service_id, $buyer_id, 'pending')");

header("Location: buyer/dashboard.php");
exit();
?>