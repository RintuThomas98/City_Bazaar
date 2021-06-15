<?php
include 'include/include.php';
include '../db_connection.php';
$cids=$_REQUEST['cids'];
$cnames=$_POST['cname'];

if(isset($_POST["submit"])){ 
$quer=mysqli_query($conn,"select  * from tb_category where cname='$cnames'");
 $res=mysqli_fetch_array($quer);
 if($res > 0) {
    echo "<script>
    window.onload=function()
    {
        alert('Category existing...');
        window.location='editcategory.php?cid=$cids';
    }
    </script>";
 }else{
 $q1="update tb_category set cname='$cnames' where cid='$cids'";
 if(mysqli_query($conn, $q1)){

  echo "<script>
	 window.onload=function()
	 {
		 alert('Category Updated...');
		 window.location='category.php';
	 }
	 </script>";
    }
}
}
?>