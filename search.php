<?php
    session_start();
    if (!(isset($_SESSION['username']) && $_SESSION['username'])) {
        echo ("<script LANGUAGE='JavaScript'>window.alert('Vui lòng đăng nhập');window.location.href='signin.php';</script>");
    }
?>
<html>
    <head>
        <title>Chức năng tìm kiếm</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
	<script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    </head>
    <body>
	 <div align="center">
            <form action="search.php" method="get">
               Search: <input type="text" name="search" />
               <input type="submit" name="ok" value="search" />
            </form>
        </div>
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from member where username like '%$search%'";
 
                // Kết nối sql
                $con = mysqli_connect('localhost', 'root', '', 'demo');
 
                // Thực thi câu truy vấn
                $sql = mysqli_query($con, $query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
		    
                    echo '<table border="1" cellspacing="0" cellpadding="10" style="background-color:#996699;">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr style="background-color:#000099;color:#ffffff;">';
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['password']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['fullname']}</td>";
                            echo "<td>{$row['birthday']}</td>";
 			    echo "<td>{$row['sex']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
		
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
	     echo 'Click here to <a href="homepage.php">Home</a><br/>';
            }
	 
        }
        ?>   
    </body>
</html>