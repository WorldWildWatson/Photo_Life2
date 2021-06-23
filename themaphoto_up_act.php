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
    !isset($_POST['posted_coment']) || $_POST['posted_coment'] == '' ||
    !isset($_POST['thema_id']) || $_POST['thema_id'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$posted_coment = $_POST["posted_coment"];
$thema_id = $_POST["thema_id"];


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

if (isset($_FILES['posted_at']) && $_FILES['posted_at']['error'] == 0) {
    $uploaded_file_name = $_FILES['posted_at']['name']; //ファイル名の取得 
    $temp_path = $_FILES['posted_at']['tmp_name'];
    //tmpフォルダの場所 
    $directory_path = 'photoup/';


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

$sql = 'INSERT INTO photo_table(photo_id, thema_id, contributor_id,posted_at,  posted_coment, 	come_updated_at) VALUES(NULL, :thema_id,:id, :posted_at, :posted_coment,  sysdate())';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thema_id', $thema_id, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':posted_coment', $posted_coment, PDO::PARAM_STR);
$stmt->bindValue(':posted_at', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:home.php");
    exit();
}
