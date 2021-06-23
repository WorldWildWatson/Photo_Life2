<?php
session_start();
include("functions.php");
check_session_id();

$thema_id = $_GET["thema_id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM thema_table WHERE thema_id=:thema_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thema_id', $thema_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output_thema .= "<td>{$record["imgthema"]}</td>";
        $output_about .= "<td>{$record["thema_about"]}</td>";
        $output_themaicon .= "<td><img src={$record["thema_icon"]} height ='150px' ></td>";
        $output .= "</tr>";
    }
    unset($value);
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
    <p><?= $output_themaicon ?></p>
    <h1><?= $output_thema ?></h1>
    <p><?= $output_about ?></p>
    <form action="themaphoto_up_act.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>テーマ投稿</legend>
            <div>
                写真を投稿する : <input type="file" name="posted_at">
            </div>
            <td>
                <textarea name="posted_coment" id="" cols="30" rows="10" placeholder="写真の説明１００字以内"></textarea>
            </td>
            <div>
                <div>
                </div>
                <button>登録</button>
            </div>
            <input type="hidden" name="thema_id" value="<?= $record["thema_id"] ?>">
            <a href="home.php">戻る</a>
        </fieldset>
    </form>
    <div>
        <nav>
            <ul>
                <p class=""><a class="banner_font" href="like_button.php?thema_id=<?= $record["thema_id"]  ?>">投票する</a></p>
            </ul>
        </nav>
        <div>
    <div>
        <nav>
            <ul>
                <p class=""><a class="banner_font" href="result.php?thema_id=<?= $record["thema_id"]  ?>">投票結果を見る</a></p>
            </ul>
        </nav>
        <div>

</body>

</html>