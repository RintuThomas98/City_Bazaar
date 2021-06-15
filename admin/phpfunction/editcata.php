<?php
include '../dbconn/dbconn.php';
$cids=$_GET['cid'];
 $querys="select  * from tb_category where cid='$cids'";
 $results = $conn->query($querys);
 if($results->num_rows > 0) {
    $tt=$results->fetch_assoc();
    $cnames=$tt['cname'];

 }

if(isset($_POST["submit"])){ 
 extract($_POST);
 $quer="select  * from tb_category where cname='$cat'";
 $result = $conn->query($quer);
 if($result->num_rows > 0) {
    echo "<script>
    window.onload=function()
    {
        alert('Category existing...');
        window.location='../phpfunction/editcata.php?cid=$cid';
    }
    </script>";
 }else{
 $q1="update tb_category set cname='$cat' where cid='$cid'";
 if(mysqli_query($conn, $q1)){

  echo "<script>
	 window.onload=function()
	 {
		 alert('Category Updated...');
		 window.location='../category.php';
	 }
	 </script>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .main-page{
            width:50%;
            margin:auto;
        }
        .form{
            width:50%;
            padding:25px;
        }
        </style>
</head>
<body>
<div id="page-wrapper">
<div class="main-page">
   
<h2  class='my-3'>EDIT CATEGORY</h2>
<div class='form'>
<form name="form1" method="POST" action="editcata.php" onSubmit="return formvalidate()">
<label> Category </label> 
<input type="hidden" class="form-control" value="<?php echo  $cids; ?>" name="cid">
<input type="text" class="form-control" value="<?php echo  $cnames; ?>" name="cat">
<input type="submit" name="submit" class="btn btn-primary mt-2 " value="SUBMIT">
</form>
<div class='my-5'>
<a class='btn btn-secondary ' href="../category.php"><- back</a>
    </div>
</div>

<script type="text/javascript">
  function formvalidate()
  {
    if(document.form1.cat.value=="")
    {
     alert("Enter Category");
     document.form1.cat.focus();
     return false;
    }
  }
 </script>
</body>
</html>