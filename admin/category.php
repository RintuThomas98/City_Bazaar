<?php
include '../dbconn/dbconn.php';
include 'include/include.php';
?>
  <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Category</h1>
                        <a href="addcategory.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class=" text-white-50"></i>Add Category</a>
                    </div>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th><center>Category Id</center></th>
                                            <th><center>Category Name</center></th>
                                            <th><center>Edit</center></th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
<?php
$count=1;
$sel_query="Select * from tb_category where status=1";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["cname"]; ?></td>
<td align="center">
<a href="editcategory.php?id=<?php echo $row["cid"]; ?>&cata=" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                       
</td>
<td align="center">
<a href="delcategory.php?cid=<?php  echo $row["cid"];?>" class='btn btn-warning '><i class="fa fa-trash" aria-hidden="true"></i></a>    
</td>
</tr>
<?php $count++; } ?>
</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>

<?php

include 'include/footer.php';
?>