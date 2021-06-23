<?php
session_start();
include("functions.php");
check_session_id();

$id = $_SESSION["id"];
$thema_id = $_GET["thema_id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM photo_table  WHERE thema_id=:thema_id';

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
        $output .="<td>{$record["posted_coment"]}</td>";
        $output .= "<td><img src={$record["posted_at"]} height ='250px' ></td>";
        $output_coment .= "<td>{$record["posted_coment"]}</td>";

        $output_posted_at .= "<td><a href='like_create.php?id={$id}&thema_id={$thema_id}&contributor_id={$record["contributor_id"]}&photo_id={$record["photo_id"]}'><img src={$record["posted_at"]} height ='250px' ></a></td>";
        
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
    <div>
    <p><?= $output_posted_at ?></p>
    <p><?= $output_coment ?></p>
    </div>
    <form action="themaphoto_up_act.php" method="POST" enctype="multipart/form-data">
        <fieldset>  
            <legend>投票</legend>
            <h1><?= $output ?></h1>
            
            <a href="home.php">戻る</a>
        </fieldset>
    </form>
</body>

</html>