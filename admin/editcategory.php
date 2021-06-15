<?php
include 'include/include.php';
include 'include/query.php';
include '../dbconn/dbconn.php';
$id=$_REQUEST['id'];
$check=$_REQUEST['cata'];
if($check =="subcata"){
	$item="sbcid='".$id."'";
	$result=selectitem('subcata',$item);
	
	
}
else if($check =="subsubcata"){
	$item="s_s_cata_id='".$id."'";
	$result=selectitem('tb_sub_subcategory',$item);
	
	
}else if($check =="product"){
	$item="id='".$id."'";
	$result=selectitem('tb_productname',$item);
	
	
}else{
	$item="cid='".$id."'";
$result=selectitem('tb_category',$item);

}

// $query = "SELECT * from tb_category where cid='".$id."'"; 
// $result = mysqli_query($conn, $query) or die ( mysqli_error());
if($result){
$row = mysqli_fetch_assoc($result);
}
?>
<body>
<?php
if(isset($_POST['new']) && $_POST['new']==1){

$id=$_REQUEST['id'];
$name1 =$_REQUEST['name'];


if($check=="subcata"){
	$update="update subcata set subcata='".$name1."' where sbcid='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
if($update){
    echo"<script>
	 window.onload=function()
	 {
		 alert('Category Updated');
		 window.location='subcategory.php';
	 }
	 </script>";
}
}
else if($check=="subsubcata"){
	$update="update tb_sub_subcategory set cata_name='".$name1."' where s_s_cata_id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
if($update){
    echo"<script>
	 window.onload=function()
	 {
		 alert('Category Updated');
		 window.location='subcategory.php';
	 }
	 </script>";
}
}else if($check=="product"){
	$mrp =$_REQUEST['mrp'];
	$update="update tb_productname set productname='".$name1."',MRP='".$mrp."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
if($update){
    echo"<script>
	 window.onload=function()
	 {
		 alert('Category Updated');
		 window.location='products.php';
	 }
	 </script>";
}
}

else{
$update="update tb_category set cname='".$name1."' where cid='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
if($update){
    echo"<script>
	 window.onload=function()
	 {
		 alert('Category Updated');
		 window.location='category.php';
	 }
	 </script>";
}
}

}else {
?>

<div class="container-fluid">
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Location</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form name="form" method="POST" action="">
                            <input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php if($check=="subcata") {echo $row['sbcid'];}else if($check=="subsubcata") {echo $row['s_s_cata_id'];} else if($check=="product") {echo $row['id'];}   else{echo $row['cid'];}?>" />
<input type="text" name="name" placeholder="Enter Category Name" 
required value="<?php if($check=="subcata") {echo $row['subcata'];}else if($check=="subsubcata") {echo $row['cata_name'];} else if($check=="product") {echo $row['productname'];}    else{echo $row['cname'];}?>" />
<?php if($check=="product") { ?>
<input type="text" name="mrp" placeholder="Enter Category Name" 
required value="<?php echo $row['MRP'];?>" />
<?php } ?>

						<button type="submit" value="Update">Update Now</button>

                        </form>
                            
                            </div>
                        </div>
                    </div>
    </div>


<?php } ?>

<?php

include 'include/footer.php';
?>
<style>
button{
	border-radius: 20px;
	border: 1px solid blue;
	background-color: blue;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}
input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}
</style>

