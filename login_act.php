<?php
// var_dump($_POST);
// exit();
session_start();
include("functions.php");

$pdo = connect_to_db();

$username = $_POST["username"];
$password = $_POST["password"];

$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password  AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {

$val = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$val) {
    echo "<p>ログイン情報に誤りがあります．</p>";
    echo '<a href="login.php">ログイン画面へ</a>';
    exit();
} else {
    $_SESSION = array();// セッション変数を空にする
    $_SESSION["session_id"] = session_id();
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["username"] = $val["username"];
    $_SESSION["email"] = $val["email"];
    $_SESSION["profile"] = $val["profile"];
    $_SESSION["usericon"] = $val["usericon"];
    $_SESSION["id"] = $val["id"];
    $_SESSION["level"] = $val["level"];
    header("Location:home.php");// 一覧ページへ移動 
    exit();
}
}
