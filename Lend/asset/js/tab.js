window.onload = function(){
	var tag = document.getElementById('tags').getElementsByTagName('li');
	if (tag.length!='') {
		for(var i = 0;i<tag.length;i++){
			if (tag[i].addEventListener) {
				tag[i].addEventListener('click',function(e){
					var eClass = e.target.getAttribute('class');
					var tabsparent = document.getElementById('container');
					var tabs = tabsparent.getElementsByClassName('tab');
					for(var j =0;j<tabs.length;j++){
						tabs[j].style.display ='none';
					}
					document.getElementById(eClass).style.display = 'block';
					showresult();
				});
			}else if(tag[i].attachEvent){
				tag[i].attachEvent('onclick',function(event){
					var eClass = event.target.getAttribute['class'];
					var tabsparent = document.getElementById('container');
					var tabs = tabsparent.getElementsByClassName('tab');
					for(var j =0;j<tabs.length;j++){
						tabs[j].style.display ='none';
					}
					document.getElementById(eClass).style.display = 'block';
					showresult();
				})
			}else{
				alert('哥，换个chrome吧！');
			}
		}
	};
	function showresult(){
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
    	    	
    	    	showTable.innerHTML = "可借出数量："+(13-data.lendtable);
    	    	showchair.innerHTML = "可借出数量: "+ (10-data.lendchair);
    	    	showpro.innerHTML = "可借出数量："+(1-data.lendPro);
    	    	showzh.innerHTML = "可借出数量："+(1-data.lendBoard);
    	    },
    	    error:function(error){
    	        console.log(error['code']);
        }
    });
}
}