<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://localhost/diplominis/public/js/jquery.js")" type="text/javascript"></script>
<style>

<title>Sign up | DDoser</title>

body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  background-color: #45a049;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

.wrapper {
  width: 350px;
  padding: 20 px;
}

.validation-error {
  font-size: 15px;
  color: red;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

/* The message box is shown when the user clicks on the password field */
#messagePassword {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 10px;
}

#messageName {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 10px;
}

#messageEmail {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 10px;
}

#confirm {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 10px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -8px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -8px;
  content: "✖";
}
</style>
</head>
<body>

<div class="container" style="margin: 80px 810px 0px 700px; background-color: #f2f2f2; border-radius: 15px;">
	<div class="wrapper">
		<h2 style="text-align: center">Register</h2>
		<form action="http://localhost/diplominis/registration/indexx" method="post" id="registerForm">
			<div class="form-group">
				<label for="name">Username</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo $name ?>" required pattern="[a-zA-Z0-9]+.{3,23}">
				<div id="messageName">
					<p style="font-size: 11px" id="nlength" class="invalid">Minimum <b>4 characters</b> and maximum <b>24 characters</b></p>
				</div>
			</div>    
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="form-control" value="<?php echo $email ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
				<div id="messageEmail">
					<p style="font-size: 11px" id="msg">Email field must be in the following order as given in example: characters@characters.domain</p>
				</div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control" value="<?php echo $pass ?>" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,24}">
				<div id="messagePassword">
					<p style="font-size: 11px" id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p style="font-size: 11px" id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p style="font-size: 11px" id="number" class="invalid">A <b>number</b></p>
					<p style="font-size: 11px" id="length" class="invalid">Minimum <b>8 characters</b>, maximum <b>24 characters</b></p>
				</div>
			</div>
			<div class="form-group">
				<label for="cpassword">Confirm Password</label>
				<input type="password" id="cpassword" name="cpassword" value="<?php echo $pass ?>" class="form-control" required>
				<div id="confirm">
					<p style="font-size: 11px" id="compare" class="invalid">Passwords do not match</p>
				</div>
			</div>
			<p><?php echo $errm ?></p>

			<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Register" >
			</div>
			<p>Already have an account? <a href="http://localhost/diplominis/login/index">Login</a>.</p>
		</form>
		<div style="text-align: center"> 
			<a href="http://localhost/diplominis/home/index" style="text-decoration: none; text-align: center"> Cancel </a>
		</div>
	</div> 
</div>


<script>
	
	var myInputPassword = document.getElementById("password");
	var myInputName = document.getElementById("name");
	var myInputEmail = document.getElementById("email");
	var myInputCPassword = document.getElementById("cpassword");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");
	var nlength = document.getElementById("nlength");
	var compareP = document.getElementById("compare");
	
	myInputCPassword.onfocus = function() {
	  document.getElementById("confirm").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInputCPassword.onblur = function() {
	  document.getElementById("confirm").style.display = "none";
	}
	
	myInputCPassword.onkeyup = function()  {
		var n = myInputCPassword.value.localeCompare(myInputPassword.value);
		if(n == 0){
			compareP.classList.remove("invalid");
			compareP.classList.add("valid");
		} else {
			compareP.classList.remove("valid");
			compareP.classList.add("invalid");
		}
	}

	// When the user clicks on the password field, show the message box
	myInputPassword.onfocus = function() {
	  document.getElementById("messagePassword").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInputPassword.onblur = function() {
	  document.getElementById("messagePassword").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInputPassword.onkeyup = function() {
	  // Validate lowercase letters
	  var lowerCaseLetters = /[a-z]/g;
	  if(myInputPassword.value.match(lowerCaseLetters)) {  
		letter.classList.remove("invalid");
		letter.classList.add("valid");
	  } else {
		letter.classList.remove("valid");
		letter.classList.add("invalid")
	  }
	  
	  // Validate capital letters
	  var upperCaseLetters = /[A-Z]/g;
	  if(myInputPassword.value.match(upperCaseLetters)) {  
		capital.classList.remove("invalid");
		capital.classList.add("valid");
	  } else {
		capital.classList.remove("valid");
		capital.classList.add("invalid");
	  }

	  // Validate numbers
	  var numbers = /[0-9]/g;
	  if(myInputPassword.value.match(numbers)) {  
		number.classList.remove("invalid");
		number.classList.add("valid");
	  } else {
		number.classList.remove("valid");
		number.classList.add("invalid");
	  }
	  
	  // Validate length
	  if(myInputPassword.value.length >= 8 && myInputPassword.value.length <= 24) {
		length.classList.remove("invalid");
		length.classList.add("valid");
	  } else {
		length.classList.remove("valid");
		length.classList.add("invalid");
	  }
	}
	
	// When the user clicks on the password field, show the message box
	myInputName.onfocus = function() {
	  document.getElementById("messageName").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInputName.onblur = function() {
	  document.getElementById("messageName").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInputName.onkeyup = function() {
	  // Validate length
	   let a = $('#name').val(); 
	   res = a.replaceAll(" ", "");
	   
	   let b = $('#name').val(); 
	   res2 = b.replaceAll(" ", "");
	   
	  if(res.length >= 4 && res2.length <= 24) {
		nlength.classList.remove("invalid");
		nlength.classList.add("valid");
	  } else {
		nlength.classList.remove("valid");
		nlength.classList.add("invalid");
	  }
	}
	
	// When the user clicks on the password field, show the message box
	myInputEmail.onfocus = function() {
	  document.getElementById("messageEmail").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInputEmail.onblur = function() {
	  document.getElementById("messageEmail").style.display = "none";
	}
	

	
	function validate (){
		$.ajax({
		type: 'POST',
		url: 'http://localhost/diplominis/registration/validate',
		data: {
			name : $('#name').val()
			,email : $('#email').val()
		},
		success: function(data){ 
			if (data == 'ok'){
				$("#registerForm").submit();
			} else{$("#errorMsg").text(data);
			}
		}
		});
	

	}
</script>


</body>
</html>
