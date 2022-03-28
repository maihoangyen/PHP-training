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
<br> 1.1 Chức năng [kết nối database](/ketnoi.php)</br>
       <br> - Trong chức năng kết nối database em sẽ tạo các biến `$servername`, `$username`, `$passwword`, `$database` và `$conn` để có thể kết nối được với database </br>  
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
   
<br>1.2 Chức năng [đăng nhập](/signin.php), [đăng kí](/register.php), [đăng xuất](/signout.php)</br>
       <br>- `Về chức năng đăng nhập:` Đầu tiên sẽ kết nối với database `SELECT` tới bảng `member`. Sau khi người dùng nhập username và password(được mã hóa md5 bằng câu lệnh `$password = md5($password)`thì bắt đầu kiểm tra bằng lệnh if nếu đăng nhập thành công sẽ liên kết đến trang chủ ngược lại sẽ thông báo là sai thông tin đăng nhập. Để xem toàn bộ code nhấn vào đây [đăng nhập](/signin.php)
       <br>- `Về chức năng đăng kí:` Đầu tiên sẽ tạo biến `$conn` để kết nối database. Sau đó sẽ dùng `empty` kiểm tra nếu như người dùng chưa nhập thông tin thì bắt buộc phải điền đầy đủ thông tin. Tiếp theo là sẽ sử dụng câu lệnh `if (mysqli_num_rows($result) > 0)` để kiểm tra username và email có bị trùng hay không nếu không trùng thì sẽ sử dụng câu lệnh`INSERT INTO member` để chèn thông tin vào bảng member. Để xem toàn bộ code nhấn vào đây [đăng kí](/register.php)</br>
       <br>- `Về chức năng đăng xuất:` Kiểm tra bằng lệnh`if (isset($_SESSION['username']))` nó sẽ trả về `TRUE` nếu username tồn tại và ngược lại sẽ trả về `FALSE` và ở đây em sử dụng lệnh `unset` để hủy giá trị và isset sẽ trả về `FALSE` khi đăng xuất thành công nó sẽ trả về trang chủ  </br>
       
       `<?php session_start(); 
           if (isset($_SESSION['username'])){
               unset($_SESSION['username']); // xóa session login
               header('location: homepage.php');
               die();
           }
        ?>`

<br>1.3 Chức năng [upload file](/upload.php)</br>
    <br>- `Về chức năng upload file:` Đầu tiên sẽ kết nối database. Sau khi kết nối thành công sẽ tạo các biến `$filename` để hiển thị tên file sau khi upload, biến `$destination` để lưu các file vào thư mục, biến ` $extension` để gọi biến này trong câu lệnh `if (!in_array($extension, ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif']))` để cho phép tải những tệp đã mặc định trong dấu `[]`,biến $size để kiểm tra kích thước của file. Nếu thỏa điều kiện sẽ dùng`INSERT INTO file`để chèn file vào database và lưu vào thư mục `upload`.  </br>
   
<br>1.4 Chức năng [download file](/download.php)</br>
   
<br>1.5 Chức năng [tìm kiếm](/search.php)</br>
   
<br>1.6 chức năng [bình luận](/comment.php)</br>
 
