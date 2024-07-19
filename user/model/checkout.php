<?php
function updateCartFromDatabase($id_variant) {
    $sql = "SELECT * FROM bienthe WHERE ma_bien_the = $id_variant";
    $result = pdo_query($sql);
    return $result;
}

function create_order($id_order, $total_order, $id_user, $name, $address, $telephone, $email, $method_pay, $note, $date_create) {
    $sql = "INSERT INTO donhang (ma_dh, tong_dh, ma_nd, ho_ten, dia_chi, sdt, email, pttt, ghi_chu, ngay_dat)
    VALUES('".$id_order."', '".$total_order."', '".$id_user."', '".$name."', '".$address."', '".$telephone."', '".$email."', '".$method_pay."', '".$note."', '".$date_create."')";
    return pdo_execute_lastInsertId($sql);
}
// function add_order_detail($create_order_id, $id_pro, $name_pro, $image, $color, $size, $quantity, $price) {
//     $sql = "INSERT INTO giohang (ma_dh, ma_sp, ten_sp, hinh_anh, mau_sac, kich_co, so_luong, don_gia)
//     VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $create_order_id, $id_pro, $name_pro, $image, $color, $size, $quantity, $price);
// }
function add_order_detail($create_order_id, $id_pro, $name_pro, $image, $color, $size, $quantity, $price) {

        // Lấy số lượng tồn kho hiện tại của sản phẩm
        $check_stock_query = "SELECT bienthe.ma_bien_the, bienthe.so_luong
        FROM sanpham
        JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp
        WHERE bienthe.ma_sp = ?";
        $current_stock = pdo_query_one($check_stock_query, $id_pro);

        // Thêm chi tiết đơn hàng vào bảng giohang
        $insert_order_detail_query = "INSERT INTO giohang (ma_dh, ma_sp, ten_sp, hinh_anh, mau_sac, kich_co, so_luong, don_gia)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($insert_order_detail_query, $create_order_id, $id_pro, $name_pro, $image, $color, $size, $quantity, $price);

        // Cập nhật số lượng tồn kho trong cơ sở dữ liệu
        $update_stock_query = "UPDATE bienthe SET so_luong = so_luong - ? WHERE ma_bien_the = ?";
        pdo_execute($update_stock_query, $quantity, $current_stock['ma_bien_the']);
        
}



function reduce_quantity_pro($id_pro, $buy_quantity) {
    $sql = "UPDATE bienthe SET so_luong = so_luong - $buy_quantity WHERE ma_sp = $id_pro";
    pdo_execute($sql);
}

function get_show_bill_cart($create_order_id){
    $sql="SELECT * FROM giohang WHERE ma_dh = $create_order_id";
    $show = pdo_query($sql);
    return $show;
}
function get_show_bill_info($create_order_id){
    $sql="SELECT * FROM donhang WHERE ma = $create_order_id";
    $show = pdo_query_one($sql);
    return $show;
}

function get_payment($n) {
    switch ($n) {
        case '1':
            $pay = "Thanh toán khi nhận hàng";
            break;
        case '2':
            $pay = "Thanh toán VNPay";
            break;
        case '3':
            $pay = "Thanh toán Momo";
            break;
        
        default:
            $pay = "Khi nhận hàng";
            break;
    }
    return $pay;
}

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
?>