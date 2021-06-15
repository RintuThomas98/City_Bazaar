<?php
include "../dbconn/dbconn.php";
session_start();

function delete($tablename,$uids,$location){
  $sql = "DELETE FROM $tablename WHERE $uids  ";

if ($GLOBALS['conn']->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: ../".$location);
  die();
} else {
  echo "Error deleting record: " . $conn->error;
}

}




// $uids=$_SESSION['userid'];//$_SESSION['userid'];
$cid=$_GET['id'];
$cata=$_GET['cata'];
echo $cata;

if($cata == "subcata"){
  $condition="sbcid=$cid";
  delete('subcata',  $condition,'subcategory.php' );

}else if($cata == "category"){
  $condition="cid=$cid";
  delete('tb_category',  $condition,'category.php' );

}else if($cata == "subsubcata"){
  $condition="s_s_cata_id=$cid";
  delete('tb_sub_subcategory',  $condition,'subcategory.php' );

}
else if($cata == "product"){
  $condition="id=$cid";
  delete('tb_productname',  $condition,'products.php' );

}

/*
cata

// sql to delete a record
$sql = "DELETE FROM tb_category WHERE cid=$cid ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: ../category.php");
  die();
} else {
  echo "Error deleting record: " . $conn->error;
}

*/

?>