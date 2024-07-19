<?php
function list_order()
{
    $sql = "SELECT * FROM donhang ORDER BY ma DESC";
    $order = pdo_query($sql);
    return $order;
}

function get_status($n)
{
    switch ($n) {
        case 1:
            $status_message = "<span class='text-success'>Chưa xử lý</span>";
            break;
        case 2:
            $status_message = "<span class='text-success'>Đã xác nhận</span>";
            break;
        case 3:
            $status_message = "<span class='text-success'>Đang giao hàng</span>";
            break;
        case 4:
            $status_message = "<span class='text-success'>Đã giao hàng</span>";
            break;
        case 5:
            $status_message = "<span class='text-success'>Đã nhận hàng</span>";
            break;
        case 0:
            $status_message = "<span class='text-danger'>Đã hủy đơn</span>";
            break;
        
        default:
            $status_message = "Chưa xử lý";
            break;
    }
    return $status_message;
}
function get_payment($n)
{
    switch ($n) {
        case '1':
            $pay = "Khi nhận hàng";
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
function get_one_order($id_order)
{
    $sql = "SELECT * FROM donhang WHERE ma = ?";
    $order = pdo_query_one($sql, $id_order);
    return $order;
}

function detail_order($id_order)
{
    $sql = "SELECT dh.*, gh.ten_sp, gh.hinh_anh, gh.mau_sac, gh.kich_co, gh.so_luong, gh.don_gia FROM donhang dh JOIN giohang gh ON dh.ma = gh.ma_dh WHERE gh.ma_dh = $id_order";
    $order = pdo_query($sql);
    return $order;
}

function delete_order($id)
{
    $sql = "DELETE FROM donhang WHERE ma = $id";
    pdo_execute($sql);
}
function update_order($id_order, $status)
{
    $sql = "UPDATE donhang SET trang_thai = '" . $status . "' WHERE ma = $id_order";
    pdo_execute($sql);
}


function list_order_search($keyword=""){
    $sql =  "SELECT * FROM donhang";
    if (!empty($keyword)) {
        $sql .= " WHERE ho_ten LIKE '%".$keyword."%'";
    }
    $account = pdo_query($sql);
    return $account;
}
?>