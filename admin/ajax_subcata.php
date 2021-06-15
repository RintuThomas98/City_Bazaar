<?php
include "../dbconn/dbconn.php";
$state_id = $_POST["country_id"];
$result = mysqli_query($conn,"SELECT * FROM subcata  where ctid = $state_id");
?>
<option value="">Select Subcategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["sbcid"];?>"><?php echo $row["subcata"];?></option>
<?php
}
?>