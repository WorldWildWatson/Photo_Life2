<?php
session_start();
include('functions.php');
// var_dump($_FILES);
// exit();

if (
    !isset($_POST['username']) || $_POST['username'] == '' ||
    !isset($_POST['email']) || $_POST['email'] == '' ||
    !isset($_POST['password']) || $_POST['password'] ==  '' ||
    !isset($_POST['profile']) || $_POST['profile'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$profile = $_POST["profile"];


$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="login.php">login</a>';
    exit();
}

if (isset($_FILES['usericon']) && $_FILES['usericon']['error'] == 0) {
    $uploaded_file_name = $_FILES['usericon']['name']; //ファイル名の取得 
    $temp_path = $_FILES['usericon']['tmp_name'];
    //tmpフォルダの場所 
    $directory_path = 'upload/';


    // } else {
    //   // 送られていない，エラーが発生，などの場合
    //   exit('Error:画像が送信されていません');
}



// 拡張子の情報を取得
$extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);

$unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
$filename_to_save = $directory_path . $unique_name;


if (is_uploaded_file($temp_path)) {
    // ↓ここでtmpファイルを移動する
    if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644);
        // 権限の変更
    } else {
        exit('Error:アップロードできませんでした');
        // 画像の保存に失敗
    }
} else {
    exit('Error:画像がありません');
    // tmpフォルダにデータがない
}



$sql = 'INSERT INTO users_table(id, username, email, password, profile, usericon, level, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :email, :password, :profile, :usericon,  "1", "0", "0", sysdate(), sysdate())';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':profile', $profile, PDO::PARAM_STR);
$stmt->bindValue(':usericon', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:login.php");
    exit();
}
