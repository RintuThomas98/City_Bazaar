<?php
include 'include/include.php';
include '../dbconn/dbconn.php';
?>

<div class="container-fluid">
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form name="form" method="POST" action="changepasspro.php" onClick="return formvalidate()">
                       
                        <input type="text" name="oldpass" placeholder="Old Password">
                        <input type="text" name="newpass" placeholder="New Password" >
                        <input type="text" name="conpass" placeholder="Confirm Password" >
						<button type="submit">Change Password</button>
						<script type="text/javascript">
function formvalidate()
{
	if(document.form.oldpass.value=="")
    {
     alert("Enter old password");
     document.form.oldpass.focus();
     return false;
	}
	if(document.form.newpass.value=="")
    {
     alert("Enter new password");
     document.form.newpass.focus();
     return false;
	}
	var val = document.form.newpass.value;
	 // var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{7,}$/;
	  
	if (!regex.test(val)) 
	{
	   alert("Must contain at least one number and one uppercase and lowercase letter,1 special character and at least 7 or more characters");
	   document.form.newpass.focus();
		return false;
	}
	if(document.form.conpass.value=="")
    {
     alert("Enter confirm password");
     document.form.conpass.focus();
     return false;
	}
	if((document.form.newpass.value)!=(document.form.conpass.value))
	{
		alert("password mismatch")
		document.form.conpass.focus();
        return false;
	}
	
}
</script>
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
