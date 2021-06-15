<?php 
include '../dbconn/dbconn.php';

function selectall($tablename){
    $prod="SELECT * FROM $tablename";
    $result = $GLOBALS['conn']->query($prod);
     
    if($result->num_rows > 0) {
        return $result;

    }else{
        return false;
    }
}

function selectitem($tablename,$query){
    $prod="SELECT * FROM $tablename WHERE $query";
    $result = $GLOBALS['conn']->query($prod);
     
    if($result->num_rows > 0) {
        return $result;

    }else{
        return false;
    }
}

function insertitem(){
    $update="update tb_category set cname='".$name1."' where cid='".$id."'";
}


?>