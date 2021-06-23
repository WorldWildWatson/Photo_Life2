<?php
session_start();
include("functions.php");
check_session_id();

// $id = $_GET["id"];

$pdo = connect_to_db();


$sql = "SELECT * FROM thema_table ";


$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output2 .= "<tr>";
        $output2 .= "<td>{$record["imgthema"]}</td>";
        $output2 .= "<td><a href='themaphoto_upform.php?thema_id={$record["thema_id"]}'><img src={$record["thema_icon"]} height ='150px' ></td>";
        // $output3 .= "<td>{$record["thema_icon"]}</td>";

        $output2 .= "</tr>";
    }
    unset($value);
}



$sql = "SELECT * FROM users_table WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
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
        $output .= "<td>{$record["username"]}</td>";
        $output .= "<td>{$record["level"]}</td>";
        $output .= "<td><a href='profile_edit.php?id={$record["id"]}'>edit</a></td>";
        $output .= "<td><a href='profile_delete.php?id={$record["id"]}'>delete</a></td>";
        $output .= "<td><img src={$record["usericon"]} height ='150px' ></td>";
        $output_2 .= "<td><img src={$record["usericon"]} height ='150px' ></td>";
        $output .= "</tr>";
    }
    unset($value);
}
// $output .= '<img src="img/' . $record["image"] . '" width="300">';
// $output .= '<img src="upload/' . $record["image"] . '" width="300">';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>（ホーム画面）</title>
</head>

<body>
    <fieldset>
    <legend>こんにちは<?= $_SESSION["username"] ?>さん</legend>
    <a href="logout.php">ログアウト</a>
    <table>
        <thead>
            <tr>
                <!-- <th>deadline</th>
          <th>todo</th> -->
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output2?>
        </tbody>
    </table>
    </fieldset>
    <div class="login_enter">
        <nav class="login_bunt">
            <ul>
                <p><a href="thema_request.php?id=<?= $_SESSION["id"] ?>">テーマを設定する</a></p>
            </ul>
        </nav>
        <div>
            <nav>
                <ul>
                    <p class="profile_edit"><a class="banner_font" href="profile_edit.php?id=<?= $_SESSION["id"] ?>">プロフィール編集</a></p>
                </ul>
            </nav>
            <div>
                <!-- login_act.phpに変数を入れて、ここで表示している -->
                <h1>ユーザー名：<?= $_SESSION["username"] ?></h1>
                <h1>ID:<?= $_SESSION["id"] ?></h1>
                <h1>メールアドレス：<?= $_SESSION["email"] ?></h1>
                <h1>プロフィール：<?= $_SESSION["profile"] ?></h1>
                <?= $output?>
            </div>
            <script>
                const hoge = <?= json_encode($output_2) ?>;
                console.log(hoge);
            </script>
</body>
<!-- profile -->


</html>