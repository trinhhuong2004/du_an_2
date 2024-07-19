<?php
function list_catalog()
{
    $sql = "select * from loaisanpham";
    $result = pdo_query($sql);
    return $result;
}

function add_catalog($name_catalog)
{
    $sql = "INSERT INTO loaisanpham(ten_lsp) VALUES('$name_catalog')";
    pdo_execute($sql);
}

function update_catalog($id_catalog ,$name_catalog ,$status_catalog)
{
    $sql = "update loaisanpham set ten_lsp='$name_catalog', trang_thai=$status_catalog where ma_lsp=$id_catalog";
    pdo_execute($sql);
}


function getone_catalog($id_catalog) {
    $sql="select * from loaisanpham where ma_lsp=$id_catalog";
    $result = pdo_query_one($sql);
    return $result;
}

function count_catalog($id_catalog){
    $sql="SELECT COUNT(*) AS soluong FROM `sanpham` WHERE ma_lsp=$id_catalog";
    $result = pdo_query_one($sql);
    return $result;
}

function delete_catalog($id_catalog)
{
    $sql = "delete from loaisanpham where ma_lsp=$id_catalog";
    pdo_execute($sql);
}

function search_catalog($name_catalog )
{
    $sql = "select * from loaisanpham where ten_lsp like '%" . $name_catalog . "%' ";
    $result = pdo_query($sql);
    return $result;
}
?>

