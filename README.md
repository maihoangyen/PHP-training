 # <div align="center"><p> PHP-Training </p></div>
 ## Họ và tên: Mai Thị Hoàng Yến
 ## Ngày báo cáo: Ngày 18/3/2022
 ### MỤC LỤC
 1. [Các chức năng đã hoàn thành](#introduction)
 2. [Ý nghĩa và chức năng của các hàm trong trang Đăng nhập](/PHP-training/README.md/.)
 3. [Ý nghĩa và chức năng của các hàm trong trang Đăng ký](/PHP-training/README.md/.)
 4. [Ý nghĩa và chức năng của các hàm trong trang Đăng xuất](/PHP-training/README.md/.)
 5. [Ý nghĩa và chức năng của các hàm trong trang upload](/PHP-training/README.md/.)
 6. [Ý nghĩa và chức năng của các hàm trong trang download](/PHP-training/README.md/.)
 7. [Ý nghĩa và chức năng của các hàm trong trang search](/PHP-training/README.md/.)
 8. [Ý nghĩa và chức năng của các hàm trong trang comments](/PHP-training/README.md/.)
### Nội dung báo cáo 
#### 1. Các chức năng đã hoàn thành <a name="introduction"></a>

   1.1 Chức năng [kết nối database](/ketnoi.php)
   
       - Trong chức năng kết nối database em sẽ tạo các biến servername, username, passwword, database và conn để có thể kết nối được với database
       
       - Tiếp theo e sẽ dùng lệnh if để kiểm tra kết nối nếu như `!$conn` có nghĩa là kết nối thất bại ngược lại thì sẽ thông báo là thành công
       
       `<?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "demo";
          $conn = mysqli_connect($servername, $username, $password, $database);
          if (!$conn) {
            die("kết nối thất bại " . mysqli_connect_error());
          }
            echo "kết nối thành công";
          mysqli_close($conn);
          ?>`
   
   1.2 Chức năng [đăng nhập](/signin.php) [đăng kí](/register.php) [đăng xuất](/signout.php)
       -
       -
       -

   1.3 Chức năng [upload file](/upload.php)
   
   1.4 Chức năng [download file](/download.php)
   
   1.5 Chức năng [tìm kiếm](/search.php)
   
   1.6 chức năng [bình luận](/comment.php)
 
