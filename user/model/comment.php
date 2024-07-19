<?php
function load_comment($id_pro)
{
    $sql = "select nd.tai_khoan, bl.noi_dung, bl.ma_bl, bl.ngay_bl from nguoidung nd 
    JOIN binhluan bl ON nd.ma_nd=bl.ma_nd 
    JOIN sanpham sp ON sp.ma_sp=bl.ma_sp 
    where sp.ma_sp=$id_pro order by bl.ma_bl DESC";
    $result = pdo_query($sql);
    return $result;
}

function insert_comment($id_pro, $id_user, $noi_dung)
{
    $ngay_bl = date('Y-m-d');
    $sql = "INSERT INTO `binhluan`(`ma_sp`, `ma_nd`, `noi_dung`, `ngay_bl`) VALUES ($id_pro, $id_user, '$noi_dung', '$ngay_bl')";
    pdo_execute($sql);
}

function count_comment_by_idpro($id_pro)
{
    $sql = "SELECT ma_bl, COUNT(*) AS comment_count FROM binhluan 
    WHERE binhluan.ma_sp =$id_pro";
    $result = pdo_query_one($sql);
    return $result;
}
