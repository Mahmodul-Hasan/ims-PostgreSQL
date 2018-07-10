<!DOCTYPE HTML>

<html>
	<script>
 function validate1(){
	flag=true;
	m = document.getElementById("msg");
	if(document.fm.username.value.length == 0){
		m.innerHTML="Username can not be null";
		m.style.color="red";
		flag=false;
		
	}
	else if(document.fm.password.value.length==0){
		m.innerHTML="Password can not be null";
		m.style.color="red";
		flag=false;

	/*var x = document.forms["fm"]["username"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }*/
		
	}
	return flag;
}
</script>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewpoint" content="width=device-width, initial-scale-1">
		
		<title>Inventory Management System</title>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
		integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
		crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
		crossorigin="anonymous"></script>
		
		<!-- Customized css file -->
		<link rel="stylesheet" type="text/css" href="styles/login_style.css">
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container vertical-center">
			<div class="col-md-6 col-md-offset-3">
				<div class="jumbotron">
					<div>
						<h2>Inventory Management System</h2>
					</div>
					
				
					<div class="form-group">
						<h2>Login</h2>
					</div>
					
					<hr>
					
					<form name="fm" action="login_validation.php" method="POST" onsubmit="return validate1()">
						<div class="form-group input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</span>
							
							<input type="text" class="form-control" name="username"  id = "idfield" 
							placeholder="Enter your id" required>
						</div>
						
						<div class="form-group input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>
							
							<input type="password" class="form-control" name="password" id="pass" 
							placeholder="Enter your password" required>
						</div>
						<br>
						<br>
					
						
						<div class="form-group">
							<button class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>