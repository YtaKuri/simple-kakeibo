<?php

// PHOからMySQLへ接続
include_once('./dbconnect.php');


// 新しいコードを追加するための処理
// 最初のゴールは新しい家計簿が追加されて、TOPに戻る

// 画面で入力された値の取得
$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];


// SQL文を作成して、画面で入力された値をrecordsテーブルに追加
$sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES(:title, :type, :amount, :date, now(), now())";

// 作成したSQLを実行できるように準備
$stmt = $pdo->prepare($sql);

// 値の設定
$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);

$stmt->execute();

// index.phpに移動
header('Location: ./index.php');
exit;