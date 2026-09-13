<?php
session_start();

require_once "db.php";
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header("Location: ../index.php");
    exit;
}
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
if(empty($email) || empty($password)){
    $error = "Please fill in all fields.";
    header("Location: ../index.php");
    exit;
}
$sql="select id, username, email, password from users where email = :email limit 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([":email" => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user || !password_verify($password, $user["password"])){
    $error = "Invalid email or password.";
    header("Location: ../index.php");
    

session_regenerate_id(true);
$_SESSION["user_id"] = $user["id"];
$_SESSION["username"] = $user["username"];
$_SESSION["email"] = $user["email"];
header("Location: ../dashboard.php");
exit;}