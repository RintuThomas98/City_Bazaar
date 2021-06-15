<?php
include 'include/include.php';
?>
<div class="container-fluid">
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form name="form" method="POST" action="addcatpro.php" >
                       
                        <input type="text" name="catname" placeholder="Category Name"required>
                    
						<button type="submit">Add Now</button>
						
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
