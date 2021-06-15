<?php 
include '../dbconn/dbconn.php';

 $sellerid=$_GET['cid'];
 $block=$_GET['blk'];
 if($block==1){
 $very="UPDATE tb_register set verified='1' where uid=$sellerid";

 if(mysqli_query($conn, $very)){
	header("Location:sellers.php");
	die();
  

}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
 }
 elseif($block == 2){
    $very="UPDATE tb_register set verified='0' where uid=$sellerid";

    if(mysqli_query($conn, $very)){
       header("Location:sellers.php");
       die();
     
   
   }else{
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
 }

?>