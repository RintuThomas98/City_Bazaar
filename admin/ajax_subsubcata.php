<?php
include "../dbconn/dbconn.php";
$state_id = $_POST["country_id"];
$result = mysqli_query($conn,"SELECT * FROM  tb_sub_subcategory  where sub_cataid  = $state_id");
?>
<option value="0">Select Subcategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["s_s_cata_id"];?>"><?php echo $row["cata_name"];?></option>
<?php
}
?>