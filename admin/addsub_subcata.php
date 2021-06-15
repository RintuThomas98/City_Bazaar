<?php
include '../dbconn/dbconn.php';
extract($_POST);
session_start();
$cat=$_POST['catname'];
$catid=$_POST['cata'];
$subcataid=$_POST['subcata'];

$sql=mysqli_query($conn,"SELECT * FROM tb_sub_subcategory where cata_name='$cat'");
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
    $sql1=mysqli_query($conn,"INSERT INTO tb_sub_subcategory (main_cataid,sub_cataid ,cata_name,status)VALUES('$catid','$subcataid','$cat',1)");
    echo"<script>
	window.onload=function()
	{
		alert('Category added');
		window.location='subcategory.php';
	}
    </script>"; 
}
?>