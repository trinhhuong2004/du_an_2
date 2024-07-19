<?php
function list_comment(){
    $sql = "SELECT sp.ma_sp, sp.ten_sp, COUNT(*) AS soluong
    FROM binhluan bl
    JOIN sanpham sp ON sp.ma_sp = bl.ma_sp
    GROUP BY sp.ma_sp, sp.ten_sp
    ORDER BY soluong DESC";
    $resut = pdo_query($sql);
    return $resut;

}
function loadAll_comment($id){
    $sql = "SELECT bl.*, tk.ma_nd, tk.ho_ten
    FROM binhluan bl
    JOIN nguoidung tk ON bl.ma_nd = tk.ma_nd
    WHERE bl.ma_sp = $id";
    $resut = pdo_query($sql);
    return $resut;

}
function delete_commet($id){
    $sql = "DELETE FROM binhluan WHERE ma_bl=".$id;
    pdo_execute($sql);
}
function list_cmt_search($keyword="",$id){
    $sql =  "SELECT bl.*, tk.ma_nd, tk.ho_ten
    FROM binhluan bl
    JOIN nguoidung tk ON bl.ma_nd = tk.ma_nd
    WHERE bl.ma_sp = $id";
    if (!empty($keyword)) {
        $sql .= " WHERE nguoidung.ho_ten LIKE '%".$keyword."%'";
    }
    $account = pdo_query($sql);
    return $account;
}
?>