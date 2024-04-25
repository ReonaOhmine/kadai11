<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="/css_folder/style.css">
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
                    <p>会員登録</p>
                </div>
                <div class="entry_title_p">
                <p>
                    以下より会員登録をお願いいたします。<br />
                    登録完了後、メールのご案内が送られますので<br />
                    ログイン対応をお願いいたします。
                </p>
                </div>
            </div>

            <form class="form" action="write.php" method="post" name="form">
                <label for="email">
                    <div class="label_title">
                        <p>メールアドレス</p>
                        <p id="red">*</p>
                    </div>
                    <input type="email" id="email" size="30" name="email" placeholder="example@gmail.com" required />
                </label>

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
                <div>
                    <div class="doui">
                        <p><a href="">利用規約</a>と<a href="">プライバシーポリシー</a>をご確認の上、「同意して登録する」ボタンを押してください。</p>
                    </div>
                </div>
                <button>同意して登録する</button>
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