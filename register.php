<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="regis.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="signup-box">     
      <form method="post" action="register.php">
	<h1>Register</h1>
	<label>UserName</label>
       	<input type="text" name="username" value="" required>
	<label>Password</label>
	<input type="password" name="password" value="" required/>
	<label>Email</label>
	<input type="email" name="email" value="" required/>
	<label>Fullname</label><input type="text" name="fullname" value="" required/>
	<label>Birthday</label>
	<input type="text" name="birthday" value="" required/>
	<label>Male or Female</label>
	<input type="text" name="sex" value="" required/>
	<label></label>
	<input type="submit" name="dangky" value="Đăng Ký" style="background-color:#003399;color:white"/>
	<?php require 'xulydk.php';?>
      </form>
    </div>
  </body>
</html>

