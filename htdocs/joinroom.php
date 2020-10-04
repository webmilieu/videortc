<html>
<head>
</head>
<body>
<div style="width:50%; margin:auto; text-align:center;">
<form method="post" action="">
<input type="text" placeholder="Enter the room id " name="room">
<input type="submit" value="submit" name="submit">

<?php

if(isset ($_POST["submit"]) && !empty ($_POST["room"]))
{
$roomid=$_POST["room"];
echo "<script>window.location.href='".$roomid."';</script>";
}
?>
</div>
</body>
</html>