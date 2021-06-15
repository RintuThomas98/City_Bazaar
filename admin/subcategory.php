<?php
include '../dbconn/dbconn.php';
include 'include/include.php';
include 'include/query.php';
?>
  <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">SubCategory</h1>
                      
                    </div>

                    <div class="row">
                        <div class="col-6">

                   
 <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="m-0 font-weight-bold text-primary">SubCategory</h6>
                                </div>
                                <div class="col-5">
                                    <a href="addsubcategory.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class=" text-white-50"></i>Add SubCategory</a>
                                </div>
                            </div>
                                
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th><center>Category Id</center></th>
                                            <th><center>Category Name</center></th>
                                            <th><center>Sub Category Name</center></th>
                                            <th><center>Edit</center></th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
$count=1;

$sel_query="Select * from subcata where status=1";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
    $cataid=$row['ctid'];
$get_cata="Select * from tb_category where cid=$cataid";
$results = mysqli_query($conn,$get_cata);
while($rows = mysqli_fetch_assoc($results)) {
    $cataname=$rows['cname'];


}

    
    ?>



<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $cataname; ?></td>
<td align="center"><?php echo $row["subcata"]; ?></td>
<td align="center">
<a href="editcategory.php?id=<?php echo $row["sbcid"]; ?>&cata=subcata" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                       
</td>
<td align="center">
<a href="delsubcata.php?cid=<?php  echo $row["sbcid"];?>" class='btn btn-warning '><i class="fa fa-trash" aria-hidden="true"></i></a>    
</td>
</tr>
<?php $count++; } ?>
</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">

                   
                    <div class="card shadow mb-4">
                   
                                           <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h6 class="m-0 font-weight-bold text-primary">Sub-SubCategory</h6>
                                                </div>
                                                <div class="col-5">
                                                    <a href="addsub_subcategory.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                        class=" text-white-50"></i>Add Sub-SubCategory</a>
                                                </div>
                                            </div>

                                           </div>
                                           <div class="card-body">
                                               <div class="table-responsive">
                                                   <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                                       <thead>
                                                           <tr>
                                                           <th><center>Category Id</center></th>
                                                               
                                                               <th><center>Sub Category Name</center></th>
                                                               <th><center>Sub-SubCategory Name</center></th>
                                                               <th><center>Edit</center></th>
                                                               <th><center>Delete</center></th>
                                                           </tr>
                                                       </thead>
                                                       
                                                       <tbody>
                   <?php
                   $count=1;
                   
                   $sel_query="Select * from tb_sub_subcategory where status=1";
                   $result = mysqli_query($conn,$sel_query);
                   while($rowitem = mysqli_fetch_assoc($result)) { 
                       $cataid=$rowitem['main_cataid'];
                       $subid=$rowitem['sub_cataid'];

                       
                //    $get_cata="Select * from tb_category where cid=$cataid";
                //    $results = mysqli_query($conn,$get_cata);
                //    while($rows = mysqli_fetch_assoc($results)) {
                //        $cataname=$rows['cname'];
                   
                   
                //    }
                   $getsub_cata="Select * from subcata where sbcid=$subid";
                   $items= mysqli_query($conn,$getsub_cata);
                   while($cm = mysqli_fetch_assoc($items)) {
                       $sub_catas=$cm['subcata'];
                   
                   
                   }
                   
                       
                       ?>
                   
                   
                   
                   <tr><td align="center"><?php echo $count; ?></td>
                   
                   <td align="center"><?php echo $sub_catas; ?></td>
                   <td align="center"><?php echo $rowitem["cata_name"]; ?></td>
                   <td align="center">
                   <a href="editcategory.php?id=<?php echo $rowitem["s_s_cata_id"]; ?>&cata=subsubcata" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                       
                   </td>
                   <td align="center">
<a href="delsubsubcata.php?cid=<?php  echo $rowitem["s_s_cata_id"];?>" class='btn btn-warning '><i class="fa fa-trash" aria-hidden="true"></i></a>    
</td>
                   </tr>
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