<?php
session_start();
include("functions.php");


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <form action="register_act.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>新規登録画面</legend>
            <div>
                icon : <input type="file" name="usericon">
            </div>
            <div>
                ユーザー名: <input type="text" name="username">
            </div>
            <div>
                メールアドレス: <input type="email" name="email">
            </div>
            <div>
                パスワード: <input type="text" name="password">
            </div>
            <td class="details">
                <textarea name="profile" id="" cols="30" rows="10" placeholder="プロフィール：400字以内"></textarea>
            </td>
            <div>
                <button>登録</button>
            </div>
            <a href="login.php">登録がある方はこちら</a>
        </fieldset>
    </form>

</body>

</html>