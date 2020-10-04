<?php 
include 'conn.php';
$file=fopen("room.txt","r");
$roomid=fgets($file);
$ip=$_SERVER['REMOTE_ADDR'];
$userid="user".str_replace(".","",$ip);
$sql="Select * from $roomid where id=2";
$result=$conn->query($sql);
if($result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
$roomuser=$row["roomusers"];
if($roomuser!=$userid)
{
$file=fopen("$roomuser.txt","r");
echo fgets($file);
}
}
}
?>