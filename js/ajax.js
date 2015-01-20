function post () {
	var nameVal = document.getElementById('name').value;
	var telVal = document.getElementById('tel').value;
	var zhuanyeVal = document.getElementById('zhuanye').value;
	var homeVal = document.getElementById('home').value;
    
	// var dpmVal = document.getElementById('dpm').value;
    var dpmVal = getDepartment(document.getElementsByName('inlineRadioOptions'));

	$.post("AJAX/?action=signup",
		{
			name:nameVal,
			tel:telVal,
			zhuanye:zhuanyeVal,
			home:homeVal,
			dpm:dpmVal,
		},
		function(data,status){
			if (status != "success") {
				alert("网络错误");
			}else{
				var result = JSON.parse(data);
				if (result.result == 'success') {
					alert("提交成功！\n我们稍后将以短信的方式联系您！请您在今后面试中最好相应的准备！\n请核对以下信息：" + "\n姓名: " + result.info.name + "\n联系电话: " + result.info.tel + "\n专业: " + result.info.zhuanye + "\n宿舍号：" + result.info.home +"\n部门: " + result.info.dpm);
				}else{
					alert("提交失败！" + "\n请输入完整哦~" + result.err);
				};
			};
    	});
}
$(document).ready(function(){
    $("#signup").click(post);
});

/** Matching the department which has been checked. */
function getDepartment(objDpm) {
    var Ret = "资源技术宅部";
    
    for(var i = 0; i < objDpm.length; i++)
    {
        if( objDpm[i].checked )
        {
            Ret = objDpm[i].value;
            break;
        }
    }
    
    return Ret;
}

