<?php

include '../dbconn/dbconn.php';

session_start();

 $oldpass=$_POST['oldpass'];
 $logid=$_SESSION['logid'];
 $newpassword=$_POST['newpass'];
$sql=mysqli_query($conn,"SELECT pass FROM tb_login where logid='$logid' && pass='$oldpass'");
$num=mysqli_fetch_array($sql);
if($num==1)
{
    echo"<script>
	 window.onload=function()
	 {
		 alert('password incorrect...');
		 window.location='index.php';
	 }
	 </script>";
}
else
{
$con=mysqli_query($conn,"update tb_login set pass=' $newpassword' where logid='$logid'");
echo"<script>
	 window.onload=function()
	 {
		 alert('password changed successfully...');
		 window.location='index.php';
	 }
	 </script>";
}

?>