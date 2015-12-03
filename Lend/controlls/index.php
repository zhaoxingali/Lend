<?php
header("Content-Type:text/html;charset=utf-8");
require_once 'connect.php';
require 'class.phpmailer.php';
date_default_timezone_set('Asia/Shanghai');//'Asia/Shanghai'   亚洲/上海
if (isset($_POST['team'])) {
	//获取数据
	$team = $_POST['team'];
	$tableNum =$_POST['tablenumber'];
	$ChairNum = $_POST['chairnumber'];
	$ProNum = $_POST['projector'];
	$zhanban = $_POST['zhanban'];
	$content = $_POST['apply'];
	$lendtime =$_POST['posttime'];

	//发送邮件
	try {
		$mail = new PHPMailer(true); //New instance, with exceptions enabled
		$mail->IsSMTP();                           // tell the class to use SMTP
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->Port       = 25;                    // set the SMTP server port
		$mail->Host       = "smtp.qq.com"; // SMTP server
		$mail->Username   = "2238982442@qq.com";     // SMTP server username
		$mail->Password   = "zxlyangfan521";            // SMTP server password
	
	
		$mail->AddReplyTo("2238982442@qq.com","zxl");
	
		$mail->From       = "2238982442@qq.com";
		$mail->FromName   = "Sunshine";
	
		$to = "2238982442@qq.com";
	
		$mail->AddAddress($to);
	
		$mail->Subject  = "设备申请";
	
		$mail->AltBody    = "html"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap
		$body = "团队：".$team.";<br/> 桌子数：".$tableNum.";<br/>"." 椅子数：".$ChairNum.";<br/>
		 投影仪：".$ProNum.";<br/> 展板 ：".$zhanban.";<br/> 申请理由：".$content.";<br/> 申请时间：
		 ".$lendtime."<br/><a>点击查看审核</a>";
		$mail->MsgHTML($body);
	
		$mail->IsHTML(true); // send as HTML
	
		$mail->Send();
		
	} catch (phpmailerException $e) {
		$calldata['senderror'] = $e->errorMessage();
	}

	$insertsql = "INSERT INTO lendtable(id,Team,tableNum,ChairNum,ProNum,BoardNum,content,Time,Agree,comeBack) VALUES(null,'$team','$tableNum','$ChairNum','$ProNum',$zhanban,'$content','$lendtime','0','0')";
	$conn->exec($insertsql);
	$calldata['code']='1';
	$calldata['message'] = 'success';
	echo json_encode($calldata);
}else{
	$calldata['code'] = '0';
	$calldata['message'] = 'false';
	echo json_encode($calldata);
}

 ?>

