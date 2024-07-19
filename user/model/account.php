<?php


function add_account($full_name, $email, $username, $pass) {
       // Kiểm tra xem email đã tồn tại hay chưa
       $check_email_query = "SELECT COUNT(email) AS email_count FROM nguoidung WHERE email = '".$email."' ";
       $check_taikhoan_query = "SELECT COUNT(tai_khoan) AS acount_count FROM nguoidung WHERE tai_khoan = '".$username."'";
       $email_count = pdo_query_one($check_email_query);

       $check_taikhoan = pdo_query_one($check_taikhoan_query);

       if ($email_count['email_count'] > 0) {
        // Email đã tồn tại, thông báo và ngăn chặn đăng ký
        return "Email đã tồn tại. Vui lòng chọn email khác.";
       }else if($check_taikhoan['acount_count'] > 0){
        // Kiểm tra tài khoản đã tồn tại và ngăn chặn đăng ký
        return "Tài khoản đã tồn tại. Vui lòng chọn tài khoản khác.";
       }
        else {
           // Thêm mới người dùng vì email chưa tồn tại
           $insert_user_query = "INSERT INTO nguoidung (ho_ten, email, tai_khoan, mat_khau) VALUES (?, ?, ?, ?)";
           pdo_execute($insert_user_query, $full_name, $email, $username, $pass);

           return "Đăng ký tài khoản thành công!";
       }
    
}
// function add_account($full_name, $email, $username, $pass) {
//     // Kiểm tra xem email hoặc tài khoản đã tồn tại hay chưa
//     $check_duplicate_query = "SELECT COUNT(*) AS duplicate_count FROM nguoidung WHERE email = ? OR tai_khoan = ?";
//     $duplicate_count = pdo_query_one($check_duplicate_query, $email, $username);

//     if ($duplicate_count['duplicate_count'] > 0) {
//         // Email hoặc tài khoản đã tồn tại, thông báo và ngăn chặn đăng ký
//         if ($duplicate_count['duplicate_count'] > 0) {
//             return "Email đã tồn tại. Vui lòng chọn email khác.";
//         } else {
//             return "Tài khoản đã tồn tại. Vui lòng chọn tài khoản khác.";
//         }
//     } else {
//         // Thêm mới người dùng vì email và tài khoản chưa tồn tại
//         $insert_user_query = "INSERT INTO nguoidung (ho_ten, email, tai_khoan, mat_khau) VALUES (?, ?, ?, ?)";
//         pdo_execute($insert_user_query, $full_name, $email, $username, $pass);

//         return "Đăng ký tài khoản thành công!";
//     }
// }




function check_account($username="", $pass) {
    if (!empty($username)) {
        $sql = "SELECT * FROM nguoidung WHERE tai_khoan = '".$username."' AND mat_khau = '".$pass."'";
    } else {
        $sql = "SELECT * FROM nguoidung WHERE mat_khau = '".$pass."'";
    }
    $account = pdo_query_one($sql);
    return $account;
}

function check_email($email) {
    $sql = "SELECT * FROM nguoidung WHERE email = '".$email."'";
    $email = pdo_query_one($sql);
    if ($email!=false) {
        sendMail($email['email'],$email['ho_ten'],$email['mat_khau']);
        return "Gửi mail thành công.";
    }else {
        return "Email không tồn tại trong hệ thống.";
    }
}

function sendMail($email, $username, $pass){
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dangquoctrung88888888@gmail.com';                     //SMTP username
        $mail->Password   = 'qgbz ztrv lijq gili';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients ngưởi nhận
        $mail->setFrom('dangquoctrung88888888@gmail.com', 'LTH Furniture');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BAN YEU CAU LAY LAI MAT KHAU.';

        $mail->Body    = 'Mật khẩu của bạn là: ' . $pass ;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


function getOne_account($id) {
    $sql = "SELECT * FROM nguoidung WHERE ma_nd = ?";
    $account = pdo_query_one($sql, $id);
    return $account;
}

function update_account($id, $full_name, $gender, $email, $address, $telephone){
    $sql = "UPDATE nguoidung SET ho_ten = '".$full_name."', gioi_tinh = '".$gender."', email = '".$email."', dia_chi = '".$address."', sdt = '".$telephone."' WHERE ma_nd = ?";
    pdo_execute($sql, $id);
}

function update_password($id, $newpass){
    $sql = "UPDATE nguoidung SET mat_khau = '".$newpass."' WHERE ma_nd = ?";
    pdo_execute($sql, $id);
}
?>