
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Sun Rtc</title>
</head>
<body>
<?php
include 'conn.php';
$file=fopen("room.txt","r");
$roomid=fgets($file);
$ip=$_SERVER['REMOTE_ADDR'];
$userid="user".str_replace(".","",$ip);
$sql="Select roomusers from $roomid where roomusers='$userid' ";
$result=$conn->query($sql);
$check=$result->num_rows;
if($check==0)
{
$sql="Insert into $roomid(roomusers) values('$userid')";
$result=$conn->query($sql);
}


?>

<div style="text-align:center">
<video  controls autoplay width=400 height=400></video>
</div>
<div >
<video id="vid1" autoplay width=640 height=480></video>
<video id="vid2" autoplay width=400 height=400></video>
</div>
<script src="webrtc.js"></script>
<script src="jquery.js"></script>
</body>
</html>