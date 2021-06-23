<?php
session_start();
include("functions.php");
check_session_id();
// var_dump($_POST);
// exit();
// var_dump($_FILES);
// exit();

$id = $_SESSION["id"];

if (
    !isset($_POST['imgthema']) || $_POST['imgthema'] == '' ||
    !isset($_POST['thema_about']) || $_POST['thema_about'] == '' ||
    !isset($_POST['thema_up_str']) || $_POST['thema_up_str'] ==  '' ||
    !isset($_POST['thema_up_end']) || $_POST['thema_up_end'] ==  '' ||
    !isset($_POST['thema_val_str']) || $_POST['thema_val_str'] ==  '' ||
    !isset($_POST['thema_val_end']) || $_POST['thema_val_end'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$imgthema = $_POST["imgthema"];
$thema_about = $_POST["thema_about"];
$thema_up_str = $_POST["thema_up_str"];
$thema_up_end = $_POST["thema_up_end"];
$thema_val_str = $_POST["thema_val_str"];
$thema_val_end = $_POST["thema_val_end"];


$pdo = connect_to_db();


// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':username', $username, PDO::PARAM_STR);
// $status = $stmt->execute();
// var_dump($_FILES);
// exit();

// if ($status == false) {
//     $error = $stmt->errorInfo();
//     echo json_encode(["error_msg" => "{$error[2]}"]);
//     exit();
// }

// if ($stmt->fetchColumn() > 0) {
//     echo "<p>すでに登録されているユーザです．</p>";
//     echo '<a href="login.php">login</a>';
//     exit();
// }

if (isset($_FILES['thema_icon']) && $_FILES['thema_icon']['error'] == 0) {
    $uploaded_file_name = $_FILES['thema_icon']['name']; //ファイル名の取得 
    $temp_path = $_FILES['thema_icon']['tmp_name'];
    //tmpフォルダの場所 
    $directory_path = 'thema_icon_img/';


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

// var_dump($_POST);
// exit();

$sql = 'INSERT INTO thema_table(thema_id, thema_user_id, thema_icon, imgthema, 	thema_about, thema_up_str, thema_up_end, thema_val_str, thema_val_end, win_img, val_count, created_at) VALUES(NULL, :id, :thema_icon, :imgthema, :thema_about, :thema_up_str, :thema_up_end, :thema_val_str, :thema_val_end, NULL, NULL, sysdate())';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':imgthema', $imgthema, PDO::PARAM_STR);
$stmt->bindValue(':thema_about', $thema_about, PDO::PARAM_STR);
$stmt->bindValue(':thema_up_str', $thema_up_str, PDO::PARAM_STR);
$stmt->bindValue(':thema_up_end', $thema_up_end, PDO::PARAM_STR);
$stmt->bindValue(':thema_val_str', $thema_val_str, PDO::PARAM_STR);
$stmt->bindValue(':thema_val_end', $thema_val_end, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':thema_icon', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:home.php");
    exit();
}


?>







