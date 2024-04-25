<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../css_folder/style.css">
</head>

<header>
    <?php
    include('../html_folder/indexhead.html');
    ?>

</header>

<body>
    <section class="entry2">
        <div>
            <div class="entry_title">
                <div class="membership">
                    <p>ログイン</p>
                </div>
                <div class="entry_title_p">
                <p>
                    以下よりログインし、登録内容の情報追加をお願いいたします。<br />
                    より多くのご記入をいただくと、<br />
                    案件が届きやすくなります。
                </p>
                </div>
            </div>

            <form class="form" action="loginact.php" method="post" name="form">
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
                <button>ログイン</button>
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