<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
    <form action="login_act.php" method="POST">
        <fieldset>
            <legend>ログイン画面</legend>
            <div>
                ユーザー名: <input type="text" name="username">
            </div>
            <div>
                パスワード: <input type="text" name="password">
            </div>
            <div>
                <button>ログイン</button>
            </div>
            <a href="register.php">新規登録の方はこちら</a>
        </fieldset>
    </form>

</body>

</html>