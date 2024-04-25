<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$lid = $_POST["lid"]; //lid
$lpw = $_POST["lpw"]; //lpw

//1.  DB接続します
include("../funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！

$stmt = $pdo->prepare("SELECT * FROM kadai08_manager_table WHERE lid=:lid "); 
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()


//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
//  var_dump($val["lpw"] ,$lpw ); ←一緒になっているか確認してエラーチェック
// password_verifyを使うのが間違っている bool(false)とでるので↓
//  var_dump(password_verify($lpw, $val["lpw"])); これでチェックするとエラーでた

//ここを修正
// $pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if ($lpw === $val["lpw"]) { 
  // セッションIDを更新
  session_regenerate_id(true);
  // セッション変数にユーザー情報を保存
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["flag"] = $val['flag'];
  // Login成功時
  redirect("select.php");
} else {
  // Login失敗時(login.phpへ)
  redirect("manager_login.php");
}

exit();


