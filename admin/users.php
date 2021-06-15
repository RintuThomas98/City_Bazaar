<?php
include 'include/include.php';
// include '../dbconn/dbconn.php';
$cata="SELECT *
FROM tb_register
INNER JOIN tb_login
ON tb_register.logid=tb_login.logid Where tb_login.role='buyer' ";
 
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
                                            <th>Phone</th>
                                            
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
                                    $phone=$liscatas['phone'];
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
                                            <td><?php echo $phone; ?></td>
                                           
                                            <!-- <td><a href="phpfunction/editplace.php?cid=<?php  echo $cids;?>" class='btn btn-warning '><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="phpfunction/deleteplace.php?cid=<?php  echo $cids;?>" class='btn btn-warning'><i class="fa fa-trash" aria-hidden="true"></i></a> </td> -->
                                          
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