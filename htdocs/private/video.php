<?php
$ip=$_SERVER['REMOTE_ADDR'];
$userid="user".str_replace(".","",$ip);
$vid=$_POST["video"];
$file=fopen("$userid.txt","w");
fwrite($file,"$vid");

?>