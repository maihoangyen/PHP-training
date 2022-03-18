<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang chủ</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
     <section class="h-100 h-custom" style="background-color: #ADD8E6;">
    	
	 <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center">
	    <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">	
		<img src="https://hanoispiritofplace.com/wp-content/uploads/2017/12/thien-nhien-dep-1.jpg" class="w" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">      
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Chào mừng</h3>
                    <?php 
                     if (isset($_SESSION['username']) && $_SESSION['username']){
                         echo 'Bạn đã đăng nhập với tên là '.$_SESSION['username']."<br/>";
                         echo 'Click here to <a href="signout.php">Logout</a><br/>';
                         echo 'Click here to <a href="search.php">Search</a><br/>';
                         echo 'Click here to <a href="upload.php">Upload file</a><br/>';
                         echo 'Click here to <a href="download.php">Download file</a><br/>';
                         echo 'Click here to <a href="comment.php">Comment</a><br/>';
                     }
                     else{
                         echo 'Bạn chưa đăng nhập<br>';
                         echo 'Click here to <a href="signin.php">Đăng nhập</a>';
                     }
                     ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>