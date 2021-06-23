<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>アップロードフォーム</title>
</head>


<body>
    <!-- <form enctype="multipart/form-data" action="./file_upload.php" method="POST"> -->
    <form action="file_upload.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="record">
                <div class="formItem">
                    <label>画像を選択 <br>
                        <input type="file" name="image" accept="image/*">
                    </label>
                </div>         
                <button class="btn">登録</button>
            </div>
        </fieldset>




        <!-- <div class="file-up">
                <input type="hidden" name="MAX_FILE_SIZE" value="5" />
                <input name="img" type="file" accept="image/*" />
            </div>

            <div class="submit">
                <input type="submit" value="送信" class="btn" />
            </div> -->
    </form>
</body>

</html>