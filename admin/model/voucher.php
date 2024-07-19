<?php
function list_voucher()
{
    $sql = "select * from voucher";
    $result = pdo_query($sql);
    return $result;
}

function add_voucher($name_voucher, $discount, $quantity)
{
    $sql = "INSERT INTO voucher(ten_ma_voucher, giam_gia, so_luong) VALUES('$name_voucher',$discount , $quantity)";
    pdo_execute($sql);
}

function get_one_voucher($id_voucher)
{
    $sql = "select * from voucher where ma_voucher=$id_voucher";
    $result = pdo_query_one($sql);
    return $result;
}

function update_voucher($id_voucher, $name_voucher, $discount, $quantity, $status)
{
    $sql = "update voucher set ten_ma_voucher='$name_voucher', giam_gia=$discount, so_luong=$quantity, status=$status  where ma_voucher=$id_voucher";
    pdo_execute($sql);
}

function delete_voucher($id_voucher) {
    $sql = "delete from voucher where ma_voucher=$id_voucher";
    pdo_execute($sql);
}

?>
