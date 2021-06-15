<?php
include 'include/include.php';
include 'include/query.php';
$cateall=selectall('tb_category');


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	// function catalog(){
	// 	var cat=document.getElementById('cata').;

	// }
    var a="Hello";
	$(document).ready(function(){
  $("#cata").change(function(){
    console.log($(this).val());
     a=$(this).val();
	if($(this).val()==0){
		$('#submits').attr("disabled", true);
        $('#sub_cata').attr("disabled", true);


	}else{
		$('#submits').attr("disabled", false);
        $('#sub_cata').attr("disabled", false);
        

var country_id =  a;
$.ajax({
url: "ajax_subcata.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#sub_cata").html(result);
// $('#sub_cata').html('<option value="">Select State First</option>'); 
}
});

   
} 
});
   
});
	</script>
     
<div class="container-fluid">
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Sub_SubCategory</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form name="form" method="POST" action="addsub_subcata.php" >
                        <select name="cata" id="cata" class="form-control my-3 " >
							<option value="0">Select Category</option>
							<?php 
							 if($cateall){
							   while($rows = $cateall->fetch_assoc()) {
								   echo '<option value="'.$rows['cid'].'">'. $rows['cname'].'</option>';
								  

							   }
							}

							
							?>
                            
                        </select>
                        <select name="subcata" id="sub_cata" class="form-control my-3 " disabled >

                        </select>
                       
                        <input type="text" name="catname" placeholder="Category Name" required>
                    
						<button type="submit" id="submits" disabled >Add Now</button>
						
	</form>
                            
                            </div>
                        </div>
                    </div>
    </div>

<?php

include 'include/footer.php';
?>
<style>
button{
	border-radius: 20px;
	border: 1px solid blue;
	background-color: blue;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}
input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}
</style>
