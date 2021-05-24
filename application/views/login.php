<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://localhost/diplominis/public/js/jquery.js")" type="text/javascript"></script>

<title>Login | DDoser</title>

<style>

body {
	font-family: Arial, Helvetica, sans-serif; 
	display: flex;
}

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

/* Set a style for all buttons */
.buttonn {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.buttonn:hover {
  opacity: 0.8;
}



.container {
  padding: 16px;
}

.wrapper {
  width: 350px;
  padding: 20 px;
}

form {
  margin:auto;
}
 

}
</style>
</head>
<body>
<div class="container" style="text-align: center; background-color: #f2f2f2; margin: 200px auto auto auto;">
	<div class="wrapper">
		<h2>Login</h2>
		<form action="http://localhost/diplominis/login/index" method="post" id="loginForm">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="name" id="login" class="form-control" placeholder="Enter Username" required>
			</div>    
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="password" required>
			</div>
			<span id="messageLogin">
				
			</span>
			<div class="form-group">
				<input type="button" onclick="validate();" class="buttonn btn btn-danger" value="Login" style="font-size: 20px">
			</div>
			<p>Don't have an account? <a href="http://localhost/diplominis/registration/index">Sign up now</a></p>
		</form>
		<div style="text-align: center">
			<a href="http://localhost/diplominis/home/index" style="text-decoration: none;"> Cancel </a>
		</div>
	</div>    
</div>

<script>
	function validate (){
		$.ajax({
		type: 'POST',
		url: 'http://localhost/diplominis/login/validate',
		data: {
			login : $('#login').val()
			,password : $('#password').val()
		},
		success: function(data){ 
			if (data == 'ok'){
				$("#loginForm").submit();
			} else{$("#messageLogin").text(data);
			}
		}
		});
	

	}
</script>

</body>
</html>
