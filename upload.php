<?php
    session_start();
    if (!(isset($_SESSION['username']) && $_SESSION['username'])) {
        echo ("<script LANGUAGE='JavaScript'>window.alert('Vui lòng đăng nhập');window.location.href='signin.php';</script>");
    }
?>
<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save" style="background-color:#003399;color:white">upload</button>
        </form>
      </div>
    </div>
    Click here to <a href="homepage.php">Home</a><br/>
  </body>
</html>