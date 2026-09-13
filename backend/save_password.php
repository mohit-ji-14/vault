<?php
session_start();
require_once "db.php";
if(!isset($_SESSION["user_id"]) ) {
    header("Location: ../index.php");
    exit;
}
$website = trim($_POST["website"]);
$username = trim($_POST["username"]);
$password = $_POST["password"];
$category = trim($_POST["category"]);


// Basic validation
if (empty($website) || empty($username) || empty($password)) {
    die("Please fill all required fields.");
}

$sql = "INSERT INTO passwords 
        (user_id, website, username, password, category)
        VALUES 
        (:user_id, :website, :username, :password, :category)";


$stmt = $pdo->prepare($sql);


$stmt->execute([
    ":user_id" => $_SESSION["user_id"],
    ":website" => $website,
    ":username" => $username,
    ":password" => $password,
    ":category" => $category
]);

// Back to dashboard
header("Location: ../dashboard.php");
exit;
?>