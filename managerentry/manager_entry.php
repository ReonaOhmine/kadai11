<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者登録</title>
    <link rel="stylesheet" href="../css_folder/style.css">
</head>

<header>
    <?php
    include('../html_folder/indexhead.html');
    ?>

</header>

<?php
var_dump($_POST);
?>

<body>
    <section class="entry2">
        <div>
            <div class="entry_title">
                <div class="membership">
                    <p>管理者登録</p>
                </div>
                <div class="entry_title_p">
                <p>
                    管理者アカウントの発行をします。<br />
                </p>
                </div>
            </div>

            <form class="form" action="manager_write.php" method="post" name="form">
                <label for="lid">
                    <div class="label_title">
                        <p>ID</p>
                        <p id="red">*</p>
                    </div>
                    <input type="text" id="id" size="30" name="lid" required />
                </label>

                <label for="lpw">
                    <div class="label_title">
                        <p>password</p>
                        <p id="red">*</p>
                    </div>
                    <input type="text" id="lpw" size="30" name="lpw" required />
                </label>

                <label for="flag">
                    <div class="label_title">
                        <p>管理者フラグ</p>
                        <p id="red">*</p>
                    </div>
                    <select name="flag" id="flag">
                        <option value="">--該当権限をお選びください--</option>
                        <option value="管理者">管理者</option>
                        <option value="一般">一般</option>
                    </select>
                </label>
                <button>登録</button>
            </form>
        </div>
    </section>
</body>
<footer>
    <?php
    include('../html_folder/indexfoot.html');

    ?>
</footer>

</html>