<http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
$con = mysql_connect( SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS );
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("app_topone", $con);

mysql_query("INSERT INTO list (name, tel, zhuanye,home, dpm) 
VALUES ('$_POST[name]', '$_POST[tel]', '$_POST[zhuanye]','$_POST[home]','$_POST[inlineRadioOptions]')");



mysql_close($con);
?>