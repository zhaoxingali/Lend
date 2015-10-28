<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学工105设备申请</title>
	<meta name="keywords" content="学生地带，学生资讯集团，比特工场，比特,设备申请，">
	<meta name='description' content="学生地带是中南民族大学学工部旗下比特工场自主开发的一个互联网平台">
	<meta name='author' content="比特工场，学生地带">
	<link rel="shortcut icon" href="http://www.stuzone.com/stuzone_page/images/favicon.ico">
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../asset/css/index.css">
	<?php 
	require_once "../controlls/select.php";
	 ?>
</head>
<body>
	<header>
		<div class='logo'>
			<img src="../asset/image/logo.png" alt="logo">
		</div>
		<nav>
			<ul id="tags">
				<li><a class="tabblock1">设备申请流程</a></li>
				<li><a class="tabblock2">设备借出情况</a></li>
				<li><a class="tabblock3">设备申请</a></li>
			</ul>
		</nav>
	</header>
	<div class='comtainer' id="container">
		<div class="tab" id="tabblock1">
			<div class="process">
				<div class='processhead'>
					<h1>设备申请流程</h1>
					<p>____________________________________________________________________________</p>
				</div>
				<div class="processbody">
					<div class="processblock">
						<p>确定要申请的设备是否借出(联系比特工场：赵兴来 ----电话:15926446035)</p>
					</div>
					<div class="arrow">
						<img src="../asset/image/Arrow.png" alt="Arrow">
					</div>
					<div class="processblock">
						<p>填写申请单（写明用途)</p>
					</div>
					<div class="arrow">
						<img src="../asset/image/Arrow.png" alt="Arrow">
					</div>
					<div class="processblock">
						<p>去大活三楼找金星老师签字,并盖章</p>
					</div>	
					<div class="arrow">
						<img src="../asset/image/Arrow.png" alt="Arrow">
					</div>
					<div class="processblock">
						<p>借取设备当天拿申请单到105提取申请设备</p>
					</div>
					<div class="arrow">
						<img src="../asset/image/Arrow.png" alt="Arrow">
					</div>
					<div class="processblock">
						<p>使用完及时归还,并在申请单上签字</p>
					</div>
				</div>
			</div>
			<div class="careabout">
				<div class='processhead '>
					<h1>设备申请注意事项</h1>
					<p>_______________________________________________</p>
				</div>
				<div>
					<p>1.设备使用之前要注意检查是否有损坏</p>
					<p>2.使用设备时应该要加以爱护,尤其是投影仪</p>
					<p>3.设备损坏照价赔偿</p>
					<p>4.未经同意不能随意将设备搬走</p>
				</div>
			</div>
		</div>
		<div class="tab" id="tabblock2">
			<div class="Situation">
				<h1>设备借出情况</h1>
			</div>
			<div id="showLend">
				<table class="table table-striped">
   					<thead>
   					   	<tr>
   					   	 	<th>团队</th>
   					   	 	<th >桌子数</th>
   					   	 	<th>椅子数</th>
   					   	 	<th>投影仪</th>
   					   	 	<th>展板</th>
   					   	 	<th>时间</th>
   					   	 	<th>用途</th>
   					   	 	<th>归还</th>
   					   	</tr>
   					</thead>
   					<tbody id="table_tbody">
   						<?php
   						if (!$acount) {
   							echo "<td style='margin:0 auto'>没有借出数据</td>";
   						}else{
   							for ($i=0; $i < count($acount); $i++) { 
   							 	echo "<tr>";
   							 	echo "<td>".$acount[$i]['Team']."</td>
   							 	<td class='tableNum'>".$acount[$i]['tableNum']."</td>
   							 	<td class='ChairNum'>".$acount[$i]['ChairNum']."</td>
   							 	<td calss='ProNum'>".$acount[$i]['ProNum']."</td>
   							 	<td class='BoardNum'>".$acount[$i]['BoardNum']."</td>
   							 	<td class='Time'>".$acount[$i]['Time']."</td>
   							 	<td class='content'>".$acount[$i]['content']."</td>
   							 	<td><button type='button' class='btn' value='".$acount[$i]['id']."'>"."归还</button></td>
   							 	";
   							 	echo "</tr>";
   							 } 
						}
   						?>
   					</tbody>
				</table>
			</div>
		</div>
		<div class="tab" id="tabblock3">
			<div class="Apply">
				<div class="Applytitle">
					<h1>设备申请</h1>
				</div>
				<div class="contain">
					<div id="apply_div">
						<form class="form-inline" role="form" id="addForm" method="POST" action="">
     						<p>团队名称 : 
     							&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="teamName" id="teamname" placeholder="请输入名称">
     						</p>
     						<p>桌子数量 ：
     							<input type="text" class="form-control" name="tableNum" id="tableNum" placeholder="桌子数量">
     							<p id="showtable"></p>
     						</p>
     						<p>椅子数量 ：
     							<input type="text" class="form-control" name="chairNum" id="chairNum" placeholder="桌子数量">
     							<p id="showchair"></p>
     						</p>
     						<p>投影仪 ：
     							<input name="proNum" class="Projector" type="checkbox" id="Projector" value="1">
     							<p id="showProNum"></p>
     						</p>
     						<p>展板 ：
								&nbsp;&nbsp;&nbsp;&nbsp;<input name="zhanban" class="Projector" type="checkbox" id="zhanban" value="1">
     							<p id="showzh"></p>
     						</p>
     						<p>时间  ：
     							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" id="lendTime" name="time" placeholder="申请时间">
     						</p>
     						<p>用途
     							<textarea class = "form-control" name="content" id="content" rows="3"></textarea>
     						</p>
     						<button type="button" id="subBtn" class="btn btn-default">提交</button>
   						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="../asset/js/index.js"></script>
	<script src ="../asset/js/tab.js"></script>
</body>
<footer>
	<div class='about'>
		<ul class="aboutul">
			<li><a href="">关于我们</a></li>
			<li><a href="">加入我们</a></li>
			<li><a href="">联系我们</a></li>
			<li><a href="">负责声明</a></li>
		</ul>
	</div>
	<div class='Copyright'>
		<p>©2011-2015 <a href='http://www.stuzone.com/'>stuzone.com</a> 版权所有 鄂ICP备05003346号 Powered By  <a href="http://www .stuzone.com/bitworkshop-beta/">比特工场</a></p>
	</div>
</footer>
</html>