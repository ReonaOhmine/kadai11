<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//POST値
$id         = $_POST["id"];
$name       = $_POST["name"];
$email      = $_POST["email"];
$birthday   = $_POST["birthday"];
$job        = $_POST["job"];
$experience = $_POST["experience"];
$indate     = $_POST["indate"];
$lid        = $_POST["lid"]; //lid
$lpw        = $_POST["lpw"]; //lpw

//1.  DB接続します
include("../funcs.php");
$pdo = db_conn();

//2. データ登録SQL読み込み
$stmt   = $pdo->prepare("SELECT * FROM kadai08_an_table WHERE id=:id"); 
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);  

// if($val !== false) {
//     echo $val;
//     echo $val['id'];
//     var_dump($val);
// } else {
//     echo "データが存在しません";
//     // あるいはエラー処理を行う
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css_folder/select.css">
    <title>登録情報修正完了</title>
    <link rel="stylesheet" href="./css_folder/select.css">
</head>
<body>
    <P>修正完了しました</P>
    <!-- <a href="11_userdetail.php?id=<?php $val['id'] ?>">戻る</a> -->
    <a href="/userpage/logout.php">ログアウト</a>

</body>
</html>