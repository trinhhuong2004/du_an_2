<?php
function load_product($sp_km)
{
    if ($sp_km == 1) {
        $sql = "SELECT sp.*, bt.* FROM sanpham sp JOIN bienthe bt ON sp.ma_sp = bt.ma_sp WHERE bt.gia_km != 0 GROUP BY sp.ten_sp";
    } else {
        $sql = "SELECT sp.*, bt.* FROM sanpham sp JOIN bienthe bt ON sp.ma_sp = bt.ma_sp GROUP BY sp.ten_sp";
    }
    $result = pdo_query($sql);
    return $result;
}

function get_all_product() {
        $sql = "SELECT sanpham.*, bienthe.*, mau_sac.*, kich_co.*
        FROM sanpham 
        JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
        JOIN mau_sac ON bienthe.ma_mau = mau_sac.ma_mau
        JOIN kich_co ON bienthe.ma_kich_co = kich_co.ma_kich_co
        AND bienthe.ma_bien_the IN (
            SELECT MIN(b.ma_bien_the) AS min_bien_the
            FROM bienthe b
            GROUP BY b.ma_sp
        )
        GROUP BY sanpham.ten_sp
        ORDER BY sanpham.ma_sp DESC LIMIT 0,8";
    $products = pdo_query($sql);
    return $products;
}

function view_most_product() {
    $sql = "SELECT sanpham.*, bienthe.*, mau_sac.*, kich_co.*
    FROM sanpham 
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    JOIN mau_sac ON bienthe.ma_mau = mau_sac.ma_mau
    JOIN kich_co ON bienthe.ma_kich_co = kich_co.ma_kich_co
    AND bienthe.ma_bien_the IN (
        SELECT MIN(b.ma_bien_the) AS min_bien_the
        FROM bienthe b
        GROUP BY b.ma_sp
    )
    GROUP BY sanpham.ten_sp
    ORDER BY sanpham.luot_xem DESC";
$products = pdo_query($sql);
return $products;
}

function load_detail_product($id_product)
{
    $sql = "SELECT sanpham.*, bienthe.*  FROM sanpham 
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    WHERE bienthe.ma_sp=$id_product";
    $result = pdo_query_one($sql);

    // update view
    $update_view = $result['luot_xem'] + 1;
    $sql_ = "UPDATE sanpham sp SET sp.luot_xem=$update_view WHERE sp.ma_sp=$id_product";
    pdo_execute($sql_);

    return $result;
}

function get_one_product($id_product)
{
    $sql = "SELECT sanpham.*, bienthe.*  FROM sanpham 
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    WHERE bienthe.ma_sp=$id_product";
    $result = pdo_query_one($sql);
    return $result;
}

function check_variant($idpro) {
    $sql = "SELECT * FROM bienthe WHERE ma_sp = $idpro";
    $variant = pdo_query($sql);
    return $variant;
}
function get_color_size($id_product) {
    $sql = "SELECT sanpham.*, bienthe.*, mau_sac.*, kich_co.*
    FROM sanpham 
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    JOIN mau_sac ON bienthe.ma_mau = mau_sac.ma_mau
    JOIN kich_co ON bienthe.ma_kich_co = kich_co.ma_kich_co
    WHERE bienthe.ma_sp = $id_product";
    $variant = pdo_query($sql);
    return $variant;
}

function get_one_variant($idpro) {
    $sql = "SELECT * FROM bienthe WHERE ma_sp = $idpro";
    $variant = pdo_query_one($sql);
    return $variant;
}
function get_all_variant() {
    $sql = "SELECT * FROM bienthe ORDER BY ma_sp ASC";
    $variant = pdo_query($sql);
    return $variant;
}

function load_img_by_idpro($id_product)  {
    $sql = "SELECT sanpham.*, bienthe.*  FROM sanpham 
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    WHERE bienthe.ma_sp=$id_product";
    $result = pdo_query($sql);
    return $result;
}

function load_color_size($id_pro)
{
    $sql = "SELECT DISTINCT kich_co.*, mau_sac.* FROM bienthe
    JOIN kich_co ON bienthe.ma_kich_co = kich_co.ma_kich_co 
    JOIN mau_sac ON bienthe.ma_mau= mau_sac.ma_mau WHERE bienthe.ma_sp = $id_pro";
    $result = pdo_query($sql);
    return $result;
}

function similar_products($id_catalog){
    $sql = "SELECT sanpham.*, bienthe.*, mau_sac.*, kich_co.*
    FROM sanpham
    JOIN bienthe ON sanpham.ma_sp = bienthe.ma_sp 
    JOIN mau_sac ON bienthe.ma_mau = mau_sac.ma_mau
    JOIN kich_co ON bienthe.ma_kich_co = kich_co.ma_kich_co
    AND bienthe.ma_bien_the IN (
        SELECT MIN(b.ma_bien_the) AS min_bien_the
        FROM bienthe b
        GROUP BY b.ma_sp
    )
    WHERE sanpham.ma_lsp = $id_catalog
    GROUP BY sanpham.ten_sp
    ORDER BY sanpham.ma_sp DESC";
$products = pdo_query($sql);
return $products;
}

function product_most_view(){
    $sql = "SELECT * FROM sanpham sp JOIN bienthe bt ON bt.ma_sp = sp.ma_sp WHERE 1 ORDER BY luot_xem DESC LIMIT 0,10";
    $result = pdo_query($sql);
    return $result;
}

//luan
