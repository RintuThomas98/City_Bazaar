<?php
include '../dbconn/dbconn.php';
extract($_POST);
session_start();
$cat=$_POST['catname'];
$catid=$_POST['cata'];
$sql=mysqli_query($conn,"SELECT * FROM subcata where subcata='$cat'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
    echo"<script>
	window.onload=function()
	{
		alert('Category already added');
		window.location='addcategory.php';
	}
    </script>"; 
}
else {
    $sql1=mysqli_query($conn,"INSERT INTO subcata (ctid,subcata,status)VALUES('$catid','$cat',1)");
    echo"<script>
	window.onload=function()
	{
		alert('Category added');
		window.location='subcategory.php';
	}
    </script>"; 
}
?>