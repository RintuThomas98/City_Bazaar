<?php
include "../dbconn/dbconn.php";
session_start();

$cids=$_GET['cid'];
// $pname=$_GET['productname'];

$sql = "Update tb_productname set status=0 WHERE id='$cids' ";
// $sql2 = "Update tb_productname set status=0 WHERE pname='$pname' ";
if ($conn->query($sql) === TRUE) {
  
  echo "Record deleted successfully";
  header("Location: ../index.php");
  die();
} else {
  echo "Error deleting record: " . $conn->error;
}



?>