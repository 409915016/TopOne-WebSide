<?php

$name		=	isset($_POST['name'])?$_POST['name']:'';
$tel		=	isset($_POST['tel'])?$_POST['tel']:'';
$zhuanye	=	isset($_POST['zhuanye'])?$_POST['zhuanye']:'';
$home		=	isset($_POST['home'])?$_POST['home']:'';
$dpm		=	isset($_POST['dpm'])?$_POST['dpm']:'';



if($name == '') error_exit("你总得写个名字吧~");
if( !validate("/^[0-9]{6,11}$/", $tel) ) error_exit("注意填写的是长短号哦~");
if( !validate("/^1[0-9]/", $zhuanye)) error_exit("你还没有填写专业！");
if( !validate("/^\d+(#|＃)\d+/", $home) ) error_exit("宿舍号要这样填写哦 1#101 ");
/*if($home == '') error_exit("请输入你的宿舍号");*/
if($dpm == '') error_exit("你还没告诉我要加入哪个部门呢！");


$db = new databaseConnect();
if(!$db->addOneRecord($name, $tel, $zhuanye, $home, $dpm)) error_exit("Unknow Error");
success_exit(
	array(
		"name"		=>	$name,
		"tel"		=>	$tel,
		"zhuanye"	=>	$zhuanye,
		"home"		=>	$home,
		"dpm"		=>	$dpm,
		)
	);

/** To validate the format data */
function validate($rule, $src)
{
    $Ret = false;
    
    if($src != '') {
        if(preg_match($rule, $src)) {
        	$Ret = true;
        }
    }
    
    return $Ret;
}
?>