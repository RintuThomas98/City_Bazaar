<?php
include "../dbconn/dbconn.php";
session_start();

$cids=$_GET['cid'];


$sql = "Update subcata set status=0 WHERE sbcid='$cids' ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: index.php");
  die();
} else {
  echo "Error deleting record: " . $conn->error;
}



?>