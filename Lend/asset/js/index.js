
var dataarray;
window.onload = function(){
	var showTable = document.getElementById("showtable"),
		showchair = document.getElementById("showchair"),
		showpro = document.getElementById("showProNum"),
		showzh = document.getElementById("showzh");
	$.ajax({
        url:'../controlls/gettotal.php',
        type:"POST",                    
        cache:false,
        timeout:5000,
        dataType:"json",
        success:function(data){
        	dataarray = data;
        },
        error:function(error){
            console.log(error);
        }
    });
}

function is_number(intnum,allnum){
	var str = "";
	if (intnum!="") {
		if (intnum>allnum) {
			str = "超过了学工最大的数量";
			return str;
		}else{
			if(!(/(^[0-9]\d*$)/.test(intnum))){
				str = "你输入的数量是非正整数";
				return str;
			}else{
				str = "1";
				return str;
			}
		}
	}else{
		str ="1";
		return str;
	}
}

	
function handleData(){
	var teamNum = document.getElementById('teamname').value,
		tableNum = document.getElementById('tableNum').value,
		chairNum = document.getElementById('chairNum').value,
		projector1 = document.getElementById('Projector'),
		zhanban1 = document.getElementById('zhanban'),
		application = document.getElementById('content').value,
		lendTime = document.getElementById('lendTime').value;
	var zhanban,projector;
	if (zhanban1.checked) {
		zhanban = zhanban1.value;
	}else{
		zhanban=0;
	}
	if (projector1.checked) {
		projector = projector1.value;
	}else{
		projector = 0;
	}
	if (is_number(tableNum,13)=="1") {
		if (dataarray) {
			if (tableNum>(13-dataarray.lendtable)) {
				alert('桌子数超过最大可借量');
				return ;
			}
		};
	}else{
		alert("桌子数"+is_number(tableNum,13));
		return ;
	};
	if (is_number(chairNum,10)=='1') {
		if (dataarray) {
			if (chairNum>(10-dataarray.lendchair)) {
				alert('椅子数超过了最大的可借量');
				return ;
			};
		};
	}else{
		alert("椅子数"+is_number(chairNum,10));
	};
	if (is_number(projector,1)=='1') {
		if (dataarray) {
			if (projector>(1-dataarray.lendPro)) {
				alert('投影仪数超过最大的可借量');
				return ;
			};
		};
	}else{
		alert("投影仪"+is_number(projector,1));
	};
	if (is_number(zhanban,1)) {
		if (dataarray) {
			if (zhanban>(1-dataarray.lendBoard)) {
			alert('展板数大于超过了最大的可借量');
			return ;
		};
		};
	}else{
		alert("展板数"+is_number(zhanban,1));
		return ;
	};
	if (application.length==0) {
		alert("用途不能为空");
		return ;
	}else{
		if (application.length>200) {
			alert('最大长度不能超过200个字');
			return ;
		};
	};
	var PostData = {
		team:teamNum,
		tablenumber:tableNum,
		chairnumber:chairNum,
		projector:projector,
		zhanban:zhanban,
		apply:application,
		posttime:lendTime,

	};
	$.ajax({
		url:'../controlls/index.php',
		type:"POST",                    
        cache:false,
        timeout:5000,
        dataType:"json",
        data:PostData,
        success:function(getdata){
        	console.log(getdata['senderror']);
        	alert("已提交申请");
        	teamNum = document.getElementById('teamname').value='';
			tableNum = document.getElementById('tableNum').value = '';
			chairNum = document.getElementById('chairNum').value = '';
			projector = document.getElementById('Projector').value= '';
			zhanban = document.getElementById('zhanban').value='';
			application = document.getElementById('content').value='';
			lendTime = document.getElementById('lendTime').value='';
        },
        error:function(data){
        	console.log(data['code']);
        }
	})
};
var windowOpen = function(){
	var btn = document.getElementById('subBtn');
	if (btn.addEventListener) {
    	btn.addEventListener("click", handleData);
	} else if (btn.attachEvent) {
    	btn.attachEvent("onclick", handleData);
	}
};
windowOpen();
//归还
var comeback = function(){
	var tablebody =document.getElementById('table_tbody');
	var tr = tablebody.getElementsByTagName('tr');
	if (tr.length!=null) {
		for (var i = 0; i < tr.length; i++) {
			if (tr[i].addEventListener) {
				tr[i].addEventListener('click',function(e){
					var updateId = e.target.value;
					update(updateId,e.target);

				},false);
			}else if(tr[i].attachEvent){
				tr[i].attachEvent("onclick",function(event){
					var updateId = event.target.value;
					update(updateId,e.target);
				});
			}
		};
	};
}
function update(upId,targ){
	var updateData = {
		id:upId
	};
	$.ajax({
		url:'../controlls/select.php',
		type:"POST",                    
        cache:false,
        timeout:5000,
        dataType:"json",
        data:updateData,
        success:function(data){
        	if (data) {
        		targ.innerHTML = "已归还";
        	};
        },
        error:function(){
        	console.log('false');
        }
    });
}
comeback();