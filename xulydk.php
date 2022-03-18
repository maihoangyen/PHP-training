<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'demo') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['dangky'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$bỉthday = trim($_POST['birthday']);
$sex = trim($_POST['sex']);


if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($password)) {
array_push($errors, "Password is required"); 
}
if (empty($fullname)) {
array_push($errors, "Fullname is required"); 
}
if (empty($birthday)) {
array_push($errors, "Birthday is required"); 
}
if (empty($sex)) {
array_push($errors, "Sex is required"); 
}


// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
die ();
}
else {
$password = md5($password);
$sql = "INSERT INTO member (username, password, email, fullname, birthday, sex) VALUES ('$username','$password','$email','$fullname','$birthday','$sex')";
echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="signin.php";</script>';

if (mysqli_query($conn, $sql)){
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Fullname: ".$_POST['fullname']."<br/>";
echo "Birthday: ".$_POST['birthday']."<br/>";
echo "Giới tính: ".$_POST['sex']."<br/>";
}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
}
}
}
?>