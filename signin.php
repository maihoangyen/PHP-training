<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="sign.css"/>
	<link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/poper.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h3 class="text-uppercase text-center my-5">ĐĂNG NHẬP</h3>
		<form action="xulydn.php" method="POST">
              	<div class="form-outline form-white mb-4">
                	Username: <input type="text" name="username" class="form-control" required="">
              	</div>

              	<div class="form-outline form-white mb-4">
              		 Password: <input type="password" name="password" class="form-control" required="">
              	</div>

              		<input type="Submit" class="btn btn-block btn-info">
	     </form>
	</div>
</body>
</html>