<html>
<body>
<style>
body{
text-align:center;
height:1080px;
background-image:url('internet.jpg');
background-repeat:no-repeat;
background-cover:full;
background-size:cover;
}
</style>
<div style="text-align:center; background-color:white; margin:2%; height:200px; ">
<h2 >Create a Room</h2>
<form method="POST" action="">
<input type="text" name="roomid" placeholder="Enter a room id to create"><br><br>
<input type="password" name="roompass" placeholder="Enter room password"><br><br>
<input name="submit" type="submit" value="Submit"><br>
</div>
</form>
<?php
include 'conn.php';
if(!empty($_POST["roomid"]) && 
!empty($_POST["roompass"]) && isset($_POST["submit"]) )
{

$room=$_POST["roomid"];

$sql="Create table $room(id int(10) not null auto_increment primary key, roomusers varchar(100) not null)";
$result=$conn->query($sql);
mkdir("$room");
$pass=$_POST["roompass"];
$encrypted = crypt($pass, base64_encode($pass));
$roompass=$encrypted;


$htaccess="AuthName Dialog 
AuthType Basic 
AuthUserFile /htdocs/".$room."/.htpasswd
Require valid-user";
$file=fopen("$room/.htaccess","w");
fwrite($file,"$htaccess");


copy("private/conn.php","$room/conn.php");
$file=fopen("$room/room.txt","w");
fwrite($file,"$room");
$file=fopen("$room/.htpasswd","w");
$roomdetail=$room.":".$roompass;
fwrite($file,"$roomdetail");
copy("private/index.php","$room/index.php");
copy("private/jquery.js","$room/jquery.js");
copy("private/webrtc.js","$room/webrtc.js");
copy("private/video.php","$room/video.php");
copy("private/vid1.php","$room/vid1.php");
copy("private/vid2.php","$room/vid2.php");
echo "<script>window.location.href='index.html';</script>";
}
else
{
echo "All fields required";
}
?>
</body>
</html>
