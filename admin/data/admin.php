<?php 

function adminPasswordVerify($admin_pass, $conn, $admin_id){
   $sql = "SELECT * FROM admin WHERE admin_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$admin_id]);

   if ($stmt->rowCount() == 1) {
     // Lấy dữ liệu quản trị viên từ cơ sở dữ liệu
     $admin = $stmt->fetch();
     $pass = $admin['password'];

     // So sánh mật khẩu cung cấp với mật khẩu trong cơ sở dữ liệu
     if ($admin_pass == $pass) {
     	return 1; // Trả về 1 nếu mật khẩu trùng khớp
     } else {
     	return 0; // Trả về 0 nếu mật khẩu không khớp
     }
   } else {
    return 0; // Trả về 0 nếu không tìm thấy quản trị viên
   }
}
}