<?php
session_start();
include("functions.php");
check_session_id();

if (
    !isset($_POST['todo']) || $_POST['todo'] == '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];


// ここからファイルアップロード&DB登録の処理を追加しよう！！！
// var_dump($_FILES);
// exit();


if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
    $temp_path = $_FILES['upfile']['tmp_name'];
    //tmpフォルダの場所 
    $directory_path = 'upload/';
}

// 拡張子の情報を取得
$extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);

$unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
$filename_to_save = $directory_path . $unique_name;


if (is_uploaded_file($temp_path)) {
    // ↓ここでtmpファイルを移動する
    if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644);
        // imgタグを設定
    } else {
        exit('Error:アップロードできませんでした');
        // 画像の保存に失敗
    }
} else {
    exit('Error:画像がありません');
    // tmpフォルダにデータがない
}



$pdo = connect_to_db();

$sql = 'INSERT INTO todo_table(id, todo, deadline, image, created_at, updated_at) VALUES(NULL, :todo, :deadline, :image, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:todo_input.php");
    exit();
}
