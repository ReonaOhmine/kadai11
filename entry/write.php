<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
//1. POSTデータ取得
$email  = $_POST['email'];
$lid    = $_POST['lid'];
$lpw    = $_POST['lpw'];
?>

<?php
// 2. DB接続します
include("../funcs.php");
$pdo = db_conn();

// ３．データ登録SQL作成
$sql = "INSERT INTO kadai08_an_table(id, email, indate, lid, lpw)VALUES(NULL, :email, NOW(), :lid, :lpw);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email',  $email, PDO::PARAM_STR);  
$stmt->bindValue(':lid',    $lid,   PDO::PARAM_STR);
$stmt->bindValue(':lpw',    $lpw,   PDO::PARAM_STR);
$status = $stmt->execute();

// 自動返信メール(お客様へ)
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$header = null;
$auto_reply_subject = null;
$auto_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

// ヘッダー情報を設定
$header = "MIME-Version: 1.0\n";
$header .= "From: G'sテスト大嶺 <reonaomine@freddy.sakura.ne.jp>\n";
$header .= "Reply-To:G'sテスト大嶺 <reonaomine@freddy.sakura.ne.jp>\n"; 

// 件名を設定
$auto_reply_subject = '【Gsテスト】ご登録ありがとうございます。';

// 本文を設定
$auto_reply_text = "*注意*Gs課題のテストメールです" . "\n";
$auto_reply_text .= "ログインID" . "$lid" . "様" . "\n\n";
$auto_reply_text .= "登録完了しました。" . "\n";
$auto_reply_text .= "より多くの案件を受け取るために" . 'https://freddy.sakura.ne.jp/kadai11/userpage/login.php' .  "よりログインし、情報を追加してください。" . "\n\n";
$auto_reply_text .= "hogehoge。";

// メール送信
mb_send_mail( $_POST['email'], $auto_reply_subject, $auto_reply_text, $header);


// *****************************
// 自動返信メール(自分へ）
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$header = null;
$auto_reply_subject = null;
$auto_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

// ヘッダー情報を設定
$header = "MIME-Version: 1.0\n";
$header .= "From: G'sテスト大嶺 <reonaomine@freddy.sakura.ne.jp>\n";
$header .= "Reply-To:G'sテスト大嶺 <reonaomine@freddy.sakura.ne.jp>\n"; 

// 件名を設定
$auto_reply_subject = '【Gsテスト】'.$name.'様から登録がありました。';

// 本文を設定
$auto_reply_text  = "*注意*Gs課題のテストメールです" . "\n";
$auto_reply_text .= "ご担当者様" . "\n\n";
$auto_reply_text .= "ログインID" . "$lid". "様から登録がありました。" . "\n";
$auto_reply_text .= "対応をお願いいたします。". 'https://freddy.sakura.ne.jp/kadai11/managerpage/manager_login.php'  . "\n\n";
$auto_reply_text .= "hogehoge。";

// メール送信
mb_send_mail('r.ohmine@freddy.co.jp', $auto_reply_subject, $auto_reply_text, $header);

//４．データ登録処理後
if ($status == false) {
     sql_error($stmt);
} else {
    redirect("finish.php");
}

?>

