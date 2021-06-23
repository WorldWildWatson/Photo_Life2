<?php
session_start();

include("functions.php");
check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
</head>

<body>
    <form action="profile_edit_act.php" method="POST">
        <fieldset>
            <legend>プロフィール編集</legend>
            <a href="home.php">ホーム画面</a>
            <div>
                <h1><?= $record["username"] ?>さん</h1>
            </div>
            プロフィール
            <div>
                <td class="">
                    <textarea name="profile" id="" cols="30" rows="10" placeholder="プロフィール：400字以内"><?= $record["profile"] ?></textarea>
                </td>
            </div>
            <div>
                <button>submit</button>
            </div>
            <input type="hidden" name="id" value="<?= $record["id"] ?>">
        </fieldset>
    </form>

</body>

</html>