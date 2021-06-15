<?php
include '../dbconn/dbconn.php';
include 'include/include.php';
include 'include/query.php';

if(isset($_POST['submit'])){
    extract($_POST);  


    $sql = "INSERT INTO tb_productname (category,sub_category,sub_sub_category,	productname,MRP,status)
VALUES ('$cata', '$subcata', '$subsubcata','$product','$mrp',1)";
if (mysqli_query($conn, $sql)) {
    echo "<script>
    alert('New record created successfully');
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }




}




?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
      $(document).ready(function(){
  $("#cata").change(function(){
    console.log($(this).val());
     a=$(this).val();
	if($(this).val()==0){
		$('#submits').attr("disabled", true);
        $('#subcata').attr("disabled", true);
        $('#subsubcata').attr("disabled", true);


	}else{
		$('#submits').attr("disabled", false);
        $('#subcata').attr("disabled", false);
        

var country_id =  a;
$.ajax({
url: "ajax_subcata.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#subcata").html(result);
// $('#sub_cata').html('<option value="">Select State First</option>'); 
} 
});

   
} 
  });
  $("#subcata").change(function(){
    console.log($(this).val());
     a=$(this).val();
     console.log(a)
	if($(this).val()==0){
		$('#submits').attr("disabled", true);
        $('#subsubcata').attr("disabled", true);


	}else{
		$('#submits').attr("disabled", false);
        $('#subsubcata').attr("disabled", false);
        

var country_id =  a;
$.ajax({
url: "ajax_subsubcata.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#subsubcata").html(result);
// $('#sub_cata').html('<option value="">Select State First</option>'); 
}
});

   
} 
  });
      });
</script>

  <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
                      
                    </div>
                    <form class="mb-5" name="form1" method="POST"  onSubmit="return formvalidate()" enctype="multipart/form-data">
                        Category
                    <div class="row ">
                     
                    <div class="col-4">
                        <select class="form-control mb-2" name=cata id='cata'>
                        <option value="0">Select Category</option>
    <?php 
    $q1="select * from tb_category";
    $result = $conn->query($q1);

                                    if($result->num_rows > 0) {
                                        $count=1;
                                        

                                while($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?></option>
                                    <?php
                                }
                            }
                                    ?>
                        
     </select>

                    </div>
                    <div class="col-4">
                        <select class="form-control mb-2" disabled name='subcata' id='subcata' ></select>
                     
                    </div>
                    <div class="col-4">
                        <select class="form-control mb-2" disabled name='subsubcata' id='subsubcata'></select>


                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                        Product Name <input class="form-control mb-2"  type="text" name="product"id="qty" onChange="validation3()" placeholder="Product Name" required>
                          MRP  <input class="form-control mb-2"  type="text" name="mrp" id="qty" onChange="validation3()"  placeholder="MRP"  required>
                        
                        MRP for Per <select class="form-control mb-2" name=type>
     <option value="">--Quantity Type--</option>option>
 	<option value="piece">Piece </option>
 	<option value="packet">Packet</option>
    <option value="kg">Kg</option>
     <option value="Gram">Gram</option>
     <option value="litre">Litre</option>
     <option value="ML">Ml</option>
     </select>
     
                        
                           <br> <input class="form-control mb-2 btn-success"  type="submit" name="submit">
                      
                        </div>
                    </div>
                  
                    </form>







                    <div class="row">
                        <div class="col-12">

                   
 <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                                </div>
                                <!-- <div class="col-5">
                                    <a href="addsubcategory.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class=" text-white-50"></i>Add SubCategory</a>
                                </div> -->
                            </div>
                                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th><center>Category Id</center></th>
                                            <th><center>Category Name</center></th>
                                            <th><center>SubCategory Name</center></th>
                                            <th><center>Sub_SubCategory Name</center></th>
                                            <th><center>Product Name</center></th>
                                            <th><center>Product MRP</center></th>
                                            <th><center>Edit</center></th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
$count=1;

$sel_query="Select * from tb_productname where status=1";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    $cataid=$row['category'];
    $subcataid=$row['sub_category'];
    $subsubcataid=$row['sub_sub_category'];
$get_cata="Select * from tb_category where cid=$cataid";
$results = mysqli_query($conn,$get_cata);
while($rows = mysqli_fetch_assoc($results)) {
    $cataname=$rows['cname'];


}
$get_subcata="Select * from subcata where sbcid =$subcataid";
$resultss = mysqli_query($conn,$get_subcata);
while($rowss = mysqli_fetch_assoc($resultss)) {
    $subcataname=$rowss['subcata'];


}

$get_sub_subcata="Select * from tb_sub_subcategory where s_s_cata_id =$subsubcataid";
$resultsss= mysqli_query($conn,$get_sub_subcata);
while($rowssss = mysqli_fetch_assoc($resultsss)) {
    $subsubcataname=$rowssss['cata_name'];


}
    
    ?>



<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $cataname; ?></td>
<td align="center"><?php echo $subcataname; ?></td>
<td align="center"><?php echo $subsubcataname; ?></td>
<td align="center"><?php echo $row["productname"]; ?></td>
<td align="center"><?php echo $row["MRP"]; ?></td>
<td align="center">
<a href="editcategory.php?id=<?php echo $row["id"]; ?>&cata=product" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                       
</td>
<td align="center">
<a href="phpfunction/deleteplace.php?cid=<?php  echo $row["id"];?>" class='btn btn-warning '><i class="fa fa-trash" aria-hidden="true"></i></a>    
</td>
<?php $count++; } ?>
</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

             
            </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<?php

include 'include/footer.php';
?>