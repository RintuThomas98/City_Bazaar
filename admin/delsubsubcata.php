<?php
include "../dbconn/dbconn.php";
session_start();

$cids=$_GET['cid'];


$sql = "Update tb_sub_subcategory set status=0 WHERE s_s_cata_id='$cids' ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: index.php");
  die();
} else {
  echo "Error deleting record: " . $conn->error;
}



?>