<?php
header("Content-type:text/plain;charset=utf-8");

include "../include/common.php";
include "../include/db-action.class.php";

$Action = isset($_GET['action'])?$_GET['action']:'';

if($Action == '')die('Silence is golden.');

switch ($Action) {
	case 'signup':
		require 'Add.php';
		break;
	
	default:
		die('Silence is golden.');
		break;
}

