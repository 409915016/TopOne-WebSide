<?php
function error_exit($str){
	$json = json_encode(
		array(
			"result"	=>	"error",
			"err"		=>	$str,
			)
		);
	die($json);
}
function success_exit($info){
	$json = json_encode(
		array(
			"result"	=>	"success",
			"info"		=>	$info,
			)
		);

	die($json);
}