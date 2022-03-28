 # <div align="center"><p> PHP-Training </p></div>
 ## Họ và tên: Mai Thị Hoàng Yến
 ## Ngày báo cáo: Ngày 18/3/2022
 ### MỤC LỤC
 1. [Các chức năng đã hoàn thành](#gioithieu)
 
      1.1 [Chức năng kết nối database](#kn)
      
      1.2 [Chức năng đăng nhập, đăng ký, đăng xuất](#dn)
      
      1.3 [Chức năng upload](#upl)
      
      1.4 [Chức năng download](#dow)
      
      1.5 [Chức năng search](#se)
      
      1.6 [Chức năng comments](#cmt)
      
 2. [Ý nghĩa và chức năng của các hàm trong trang Đăng nhập](#dangnhap)
 3. [Ý nghĩa và chức năng của các hàm trong trang Đăng ký](#dangki)
 4. [Ý nghĩa và chức năng của các hàm trong trang Đăng xuất](#dangxuat)
 5. [Ý nghĩa và chức năng của các hàm trong trang upload](#up)
 6. [Ý nghĩa và chức năng của các hàm trong trang download](#dw)
 7. [Ý nghĩa và chức năng của các hàm trong trang search](#timkiem)
 8. [Ý nghĩa và chức năng của các hàm trong trang comments](#binhluan)
### Nội dung báo cáo 
#### 1. Các chức năng đã hoàn thành <a name="gioithieu"></a>
<br> 1.1 Chức năng [kết nối database](/ketnoi.php)<a name="kn"></a></br>
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
   
<br>1.2 Chức năng [đăng nhập](/signin.php), [đăng kí](/register.php), [đăng xuất](/signout.php)<a name="dn"></a></br>
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

<br>1.3 Chức năng [upload file](/upload.php)<a name="upl"></a></br>
    <br>- `Về chức năng upload file:` Đầu tiên sẽ kết nối database. Sau khi kết nối thành công sẽ tạo các biến `$filename` để hiển thị tên file sau khi upload, biến `$destination` để lưu các file vào thư mục, biến ` $extension` để gọi biến này trong câu lệnh `if (!in_array($extension, ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif']))` để cho phép tải những tệp đã mặc định trong dấu `[]`,biến $size để kiểm tra kích thước của file. Nếu thỏa điều kiện sẽ dùng`INSERT INTO file`để chèn file vào database và lưu vào thư mục `upload`. Để xem toàn bộ code nhấn vào đây [upload file](/filesLogic.php) </br>
   
<br>1.4 Chức năng [download file](/download.php)<a name="dow"></a></br>
   <br>- `Về chức năng download file:` Đầu tiên sẽ kết nối database. Sau đó sẽ tạo biến `$id` để lấy được id của file trong database. Tiếp theo đó sẽ sử dụng `$sql = "SELECT * FROM file WHERE id=$id"` để truy vấn dữ liệu, biến `$filepath` để tạo đường dẫn đến thư mục. Dùng lệnh `if (file_exists($filepath))` để kiểm tra xem là file có tồn tại không nếu có thì nó sẽ đọc file từ trong thư mục `upload`. Tạo biến `$newCount = $file['downloads'] + 1` để đếm số lần download thư mục đó. Sau khi đếm xong nó sẽ cập nhật lại trong database bằng lệnh `UPDATE`. Để xem toàn bộ code nhấn vào đây [download file](/filesLogic.php) </br>
<br>1.5 Chức năng [tìm kiếm](/search.php)<a name="se"></a></br>
   <br>- `Về chức năng tìm kiếm:` Đầ tiên kiểm tra bằng câu lệnh `if (isset($_REQUEST['ok'])) ` nếu người dùng nhấn vào button `search` thì bắt đầu thực hiện tìm kiếm. Sau đó tạo một biến `$search` để kiểm tra `if (empty($search))` nếu như người dùng không nhập gì trên khung text sẽ thông báo là yêu cầu nhập dữ liệu vào ô trống. Ngược lại thì sẽ sử dụng câu lệnh `Like` để tìm kiếm. Sau khi có kết quả tìm kiếm sẽ tạo một `table` để hiện thị kết quả tìm kiếm. Để xem toàn bộ code nhấn vào đây [tìm kiếm](/search.php)</br>
<br>1.6 chức năng [bình luận](/comment.php)<a name="cmt"></a></br>
   <br>- `Về chức năng bình luận:` Đầu tiên sẽ kết nối database. Tiếp theo sẽ khởi tạo một hàm `function time_elapsed_string($datetime, $full = false)` hàm này sẽ sẽ chuyển đổi ngày giờ thành chuỗi thời gian trôi qua, khởi tạo hàm `function show_comments($comments, $parent_id = -1)` hàm này sẽ điền các nhận xét và câu trả lời nhận xét bằng cách sử dụng một vòng lặp, khởi tạo hàm `function show_write_comment_form($parent_id = -1)` hàm này là mẫu cho biểu mẫu viết bình luận, `if (isset($_GET['page_id']))` để kiểm tra xem ID có tồn tại không. Dùng `SELECT COUNT(*) AS total_comments FROM comments` để lấy tổng số bình luận. Để xem toàn bộ code nhấn vào đây [bình luận](/comments.php)</br>
#### 2. Ý nghĩa và chức năng của các hàm trong trang Đăng nhập <a name="dangnhap"></a>
   - `$result` là kết quả của truy vấn.
   - `fetch_assoc()` sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
   - `$_SESSION` dùng để lưu trữ dữ liệu trên Server và đồng thời nó sẽ có một đoạn code dữ liệu được lưu trữ ở client (cookie).      
#### 3. Ý nghĩa và chức năng của các hàm trong trang Đăng kí <a name="dangki"></a>
   - `mysqli_connect` sẽ kết nối tới MySQL server.
   - `isset` được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
   - `$_POST` có tính bảo mật cao vì dữ liệu gửi phải thông qua một form HTML nên nó bị ẩn, nghĩa là chúng ta không thể thấy các giá trị đó được.
   - `trim` sẽ loại bỏ khoẳng trắng dư thừa ở đầu và cuối chuỗi.
   - `empty` dùng để kiểm tra một biến nào đó có giá trị rỗng hoặc chưa được khởi tạo hay không. 
   - `array_push` dùng để thêm một phần tử mới vào cuối mảng.
   -  `mysqli_query` sẽ thực hiện truy vấn đối với cơ sở dữ liệu.
   -  `mysqli_num_rows` sẽ trả về số hàng trong tập hợp kết quả truyền vào. 
#### 4. Ý nghĩa và chức năng của các hàm trong trang Đăng xuất <a name="dangxuat"></a>
   - `unset`  sẽ loại bỏ một hoặc nhiều biến được truyền vào hoặc cũng có thể được sử dụng để loại bỏ một phần tử xác định trong mảng.
   - `isset` được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
#### 5. Ý nghĩa và chức năng của các hàm trong trang upload file <a name="up"></a>
   - `mysqli_fetch_all` sẽ tìm và trả về tất cả các kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
   - `mysqli_query` sẽ thực hiện truy vấn đối với cơ sở dữ liệu.
   - `isset` được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
   - `mysqli_connect` sẽ kết nối tới MySQL server.
   -  `$destination` là thư mục mà file sẽ được chuyển đến.
   -  `pathinfo` sẽ lấy thông tin về đường dẫn truyền vào.
   -  `in_array`dùng để kiểm tra giá trị nào đó có tồn tại trong mảng hay không. Nếu như tồn tại thì nó sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
   -  `move_uploaded_file` sẽ kiểm tra để đảm bảo rằng file truyền vào là một file upload hợp lệ. Nếu file hợp lệ nó sẽ được di chuyển đến thư mục đã truyền vào.
#### 6. Ý nghĩa và chức năng của các hàm trong trang download file <a name="dw"></a>
   -  `$_GET` là phương thức gửi dữ liệu thông qua đường dẫn URL nằm trên thanh địa chỉ của Browser.
   -  `mysqli_fetch_assoc` sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
   -  `file_exists` sẽ kiểm tra xem file hoặc thư mục có tồn tại hay không.
   - `mysqli_query` sẽ thực hiện truy vấn đối với cơ sở dữ liệu.
#### 7. Ý nghĩa và chức năng của các hàm trong trang tìm kiếm <a name="timkiem"></a>
   - `isset` được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
   - `$_REQUEST` là thông tin gửi từ client lên server. 
   - `addslashes` hàm này sẽ thêm dấu gách chéo trước những ký tự (‘, “, \) trong chuỗi tương ứng.
   - `empty` dùng để kiểm tra một biến nào đó có giá trị rỗng hoặc chưa được khởi tạo hay không. 
   - `$_GET` là phương thức gửi dữ liệu thông qua đường dẫn URL nằm trên thanh địa chỉ của Browser.
   - `mysqli_connect` sẽ kết nối tới MySQL server.
   - `mysqli_query` sẽ thực hiện truy vấn đối với cơ sở dữ liệu.
   - `mysqli_num_rows` sẽ trả về số hàng trong tập hợp kết quả truyền vào. 
   - `mysqli_fetch_assoc` sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
#### 8. Ý nghĩa và chức năng của các hàm trong trang bình luận <a name="binhluan"></a>
   - `function time_elapsed_string` hàm này sẽ sẽ chuyển đổi ngày giờ thành chuỗi thời gian trôi qua.
   - `function show_comments` hàm này sẽ điền các nhận xét và câu trả lời nhận xét bằng cách sử dụng một vòng lặp.
   - `foreach ($comments as $comment)` lặp lại các nhận xét bằng vòng lặp foreach.
   - `function show_write_comment_form` hàm này là mẫu cho biểu mẫu viết bình luận.
   - `isset` được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
   -  `$_GET` là phương thức gửi dữ liệu thông qua đường dẫn URL nằm trên thanh địa chỉ của Browser.
   -  `$_POST` có tính bảo mật cao vì dữ liệu gửi phải thông qua một form HTML nên nó bị ẩn, nghĩa là chúng ta không thể thấy các giá trị đó được.
   -  `prepare` Chúng ta chỉ thực hiện trong trường hợp sử dụng MySQLi Object-oriented.
   -  `htmlspecialchars` hàm này chuyển các thể html trong chuỗi tương ứng sang  dạng thực thể của chúng.
   -  `time_elapsed_string` đọc khoảng cách thời gian so với hiện tại.
   -  `nl2br` sẽ thêm các thẻ xuống dòng `(<br />)` vào trước khi bắt đầu dòng mới trong chuỗi ( \r, \n, \n, \r, \n and \r).
   -  `fetchAll` sẽ tìm và trả về tất cả các kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp.
