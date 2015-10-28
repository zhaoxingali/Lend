<?php
require_once "connect.php";
$select = $conn->prepare("SELECT * FROM lendtable WHERE Agree='1' AND comeBack='0'"); //sql语句,查询老师同意但是为归还的设备
$select->execute();//执行sql
$result = $select->setFetchMode(PDO::FETCH_ASSOC);
if ($result) {
	$acount = $select->fetchAll();
}
if (isset($_POST['id'])) {
	$update ="UPDATE lendtable SET comeBack='1' WHERE id=".$_POST['id'];
	$conn->exec($update);
	echo $_POST['id'];
}
 ?>
