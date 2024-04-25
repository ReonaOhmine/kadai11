<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


//1. POSTデータ取得
$lid    = $_POST['lid'];
$lpw    = $_POST['lpw'];
$flag   = $_POST['flag'];
?>

<?php
// 2. DB接続します
include("../funcs.php");
$pdo = db_conn();

// ３．データ登録SQL作成
$sql = "INSERT INTO kadai08_manager_table(id, lid, lpw, flag)VALUES(NULL, :lid, :lpw, :flag);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid',    $lid,   PDO::PARAM_STR);
$stmt->bindValue(':lpw',    $lpw,   PDO::PARAM_STR);
$stmt->bindValue(':flag',   $flag,  PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
     sql_error($stmt);
} else {
    redirect("../managerpage/manager_login.php");
}

?>

