<?php
include 'include/include.php';
// include '../dbconn/dbconn.php';
$cata="SELECT *  from tb_place ";
$listcate = $conn->query($cata);
?>
  <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Place</h1>
                        <a href="phpfunction/addplace.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class=" text-white-50"></i>create Place</a>
                    </div>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Places</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>category id</th>
                                            <th>category name</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Place id</th>
                                            <th>Place name</th>
                                            <th></th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                
                                    <?php 
                                    

                                    if($listcate->num_rows > 0) {
                                        $count=1;
                                        

                                while($liscatas = $listcate->fetch_assoc()) { 
                                    $cids=$liscatas['pid'];
                                    $cname=$liscatas['place']

                                ?>
                    
                                        <tr>
                                            <td><?php echo $cids; ?></td>
                                            <td><?php echo $cname; ?></td>
                                            <td><a href="phpfunction/editplace.php?cid=<?php  echo $cids;?>" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="phpfunction/deleteplace.php?cid=<?php  echo $cids;?>" class='btn btn-warning'><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
                                          
                                        </tr>
                                        <?php
                                }
                            }else{
                                echo " <tr> <td colspan='2'> No item in places </td> </tr> ";
                            }
                                        ?>
                                

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>

<?php

include 'include/footer.php';
?>