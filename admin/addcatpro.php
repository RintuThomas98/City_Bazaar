<?php
include '../dbconn/dbconn.php';
extract($_POST);
session_start();
$cat=$_POST['catname'];
$sql=mysqli_query($conn,"SELECT * FROM tb_category where cname='$cat'");
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
    $sql1=mysqli_query($conn,"INSERT INTO tb_category (cname,status)VALUES('$cat',1)");
    echo"<script>
	window.onload=function()
	{
		alert('Category added');
		window.location='category.php';
	}
    </script>"; 
}
?>