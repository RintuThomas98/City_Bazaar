<?php
include 'include/include.php';
// include '../dbconn/dbconn.php';
$cata="SELECT *
FROM tb_register
INNER JOIN tb_login
ON tb_register.logid=tb_login.logid Where tb_login.role='seller' ";
 
$listcate = $conn->query($cata);
?>
  <div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        <!-- <a href="phpfunction/addplace.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class=" text-white-50"></i>create Place</a> -->
                    </div>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>user id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                          
                                            <th>Place</th>
                                            <th>Email</th>
                                            <th>Merchant ID</th>
                                            <th>Merchant ID Proof</th>
                                            <th>Phone Number</th>
                                            <th>account verify</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                
                                    <?php 
                                    

                                    if($listcate->num_rows > 0) {
                                        $count=1;
                                        

                                while($liscatas = $listcate->fetch_assoc()) { 
                                    $ids=$liscatas['uid'];
                                    $name=$liscatas['name'];
                                    $add=$liscatas['addr'];
                                    $place=$liscatas['pid'];
                                    $email=$liscatas['email'];
                                    $aadhaar_number=$liscatas['aadhaar_number'];
                                    $aadhaar_image=$liscatas['aadhaar_image'];
                                    $phone=$liscatas['phone'];
                                    $verified=$liscatas['verified'];
                                    $querys="SELECT * from tb_place WHERE pid='$place'";
                                    $results = $conn->query($querys);
                                    if($results->num_rows > 0) {
                                        $tt=$results->fetch_assoc();

                                        $places=$tt['place'];

                                    }


                                ?>
                    
                                        <tr>
                                            <td><?php echo $ids; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $add; ?></td>
                                    
                                            <td><?php echo $places; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $aadhaar_number; ?> </td>

                                            <td>
                                            <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal<?php echo $ids; ?>">
                                                <img src="../uploads/proof/<?php echo  $aadhaar_image; ?>" width="100px">
                                </a>

                                            <div class="modal fade" id="exampleModal<?php echo $ids; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aadhaar Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../uploads/proof/<?php echo  $aadhaar_image; ?>" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
                                            </td>
                                            <td><?php echo $phone; ?></td>
                                           
                                            <td><?php if($verified == 0){ ?> <a href="verify.php?blk=1&cid=<?php  echo $ids;?>" class='btn btn-warning ' style="font-size:15px;"><i class="fa fa-check mx-2 "  style="color:green;font-size:20px;"  aria-hidden="true"></i> verify  </a>
                                            <?php 
                                            }else{
                                            ?>
                                            <p class="text-success">verified</p>
                                            <a href="verify.php?blk=2&cid=<?php  echo $ids;?>" class='btn btn-warning ' style="font-size:15px;"><i class="fa fa-exclamation-triangle mx-2 "  style="color:red;font-size:20px;"  aria-hidden="true"></i> Block  </a>
                                             <?php 
                                            }
                                            ?>
                                            </td> 
                                          
                                        </tr>
                                        <?php
                                }
                            }else{
                                echo " <tr> <td colspan='7'> No item in places </td> </tr> ";
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