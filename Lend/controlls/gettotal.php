<?php
require_once('connect.php');
$stmt = $conn->prepare("SELECT * FROM lendtable WHERE Agree='1' AND comeBack='0'"); //sql语句,查询老师同意但是为归还的设备
$stmt->execute();//执行sql
// 设置结果集为关联数组
$allArray = array();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);//
if ($result) {
	$acount = $stmt->fetchAll();
	//获取剩下的可借设备数量，存到数组$allArray()
	if (!empty($acount)) {
		$allArray['lendtable'] = gettotal('桌子',$acount);//桌子数
		$allArray['lendchair'] = gettotal('椅子',$acount);//椅子数
		$allArray['lendPro'] = gettotal('投影仪',$acount);//投影仪是否可借
		$allArray['lendBoard'] = gettotal('展板',$acount);//展板数
		echo json_encode($allArray);
	}
	
};
//获取剩余可借总数
function gettotal($type,$totalArr){
	$all = 0;
	if (!$totalArr) {
		echo "数组中没有数据";
	}

	switch ($type) {//获得桌子已借数
		case '桌子':
			for ($i=0; $i <count($totalArr); $i++) { 
				$all = $all+$totalArr[$i]['tableNum'];
			}
			break;
		case '椅子'://获得椅子已借数
			for ($i=0; $i <count($totalArr); $i++) { 
				$all = $all+$totalArr[$i]['ChairNum'];
			}
			break;
		case '投影仪'://获得投影仪已借数
			for ($i=0; $i <count($totalArr); $i++) { 
				$all = $all+$totalArr[$i]['ProNum'];
			}
			break;
		case '展板'://获得展板已借数
			for ($i=0; $i <count($totalArr); $i++) { 
				$all = $all+$totalArr[$i]['BoardNum'];
			}
		default:			
			break;
	}
	return $all;
}

 ?>