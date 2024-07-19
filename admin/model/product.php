<?php
    function get_product($keyword="") {
        $sql = "SELECT * FROM sanpham";
        if (!empty($keyword)) {
            $sql .= " WHERE ten_sp LIKE '%".$keyword."%'";
        }
        $sql .= " ORDER BY ma_sp DESC";
        $products = pdo_query($sql);
        return $products;
    }
    function get_all_product($keyword="") {
        $sql = "SELECT s.ma_sp, s.ten_sp, b.gia_sp, b.gia_km, b.hinh_anh, b.so_luong, b.trang_thai, m.ten_mau, k.ten_kich_co, b.ma_bien_the
        FROM sanpham s
        JOIN bienthe b ON s.ma_sp = b.ma_sp
        JOIN mau_sac m ON b.ma_mau = m.ma_mau
        JOIN kich_co k ON b.ma_kich_co = k.ma_kich_co";
        if (!empty($keyword)) {
            $sql .= " WHERE s.ten_sp LIKE '%".$keyword."%'";
        }
        $sql .= " ORDER BY b.ma_sp DESC";
        $products = pdo_query($sql);
        return $products;
    }

    function get_all_atribute($keyword="",$id_pro) {
        $sql = "SELECT s.ma_sp, s.ten_sp, b.gia_sp, b.gia_km, b.hinh_anh, b.so_luong, b.trang_thai, m.ten_mau, k.ten_kich_co, b.ma_bien_the
        FROM sanpham s
        JOIN bienthe b ON s.ma_sp = b.ma_sp
        JOIN mau_sac m ON b.ma_mau = m.ma_mau
        JOIN kich_co k ON b.ma_kich_co = k.ma_kich_co";
        if (!empty($keyword)) {
            $sql .= " WHERE s.ma_sp = $id_pro AND s.ten_sp LIKE '%".$keyword."%'";
        }
        $sql .= " WHERE s.ma_sp = $id_pro ORDER BY b.ma_sp DESC";
        $products = pdo_query($sql);
        return $products;
    }

    function get_all_color() {
        $sql = "SELECT * FROM mau_sac
        ORDER BY ma_mau DESC";
        $color = pdo_query($sql);
        return $color;
    }

    function get_all_size() {
        $sql = "SELECT * FROM kich_co
        ORDER BY ma_kich_co DESC";
        $size = pdo_query($sql);
        return $size;
    }

    function search_product($keyword) {
        $sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '%".$keyword."%' ORDER BY ma_sp DESC";
        $search = pdo_query($sql);
        return $search;
    }

    function add_product($ma_lsp, $ten_sp) {
        $sql = "INSERT INTO sanpham (ma_lsp, ten_sp) VALUES(?, ?)";
        pdo_execute($sql, $ma_lsp, $ten_sp);
    }

    function add_atribute($ma_sp, $ma_mau, $ma_kich_co, $gia_sp, $gia_km, $hinh_anh, $so_luong, $mo_ta) {
        $sql = "INSERT INTO bienthe (ma_sp, ma_mau, ma_kich_co, gia_sp, gia_km, hinh_anh, so_luong, mo_ta) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $ma_sp, $ma_mau, $ma_kich_co, $gia_sp, $gia_km, $hinh_anh, $so_luong, $mo_ta);
    }

    function del_product($ma_sp) {
        $sql = "DELETE FROM sanpham WHERE ma_sp = $ma_sp";
        pdo_query($sql);
    }
    function del_atribute($ma_bien_the) {
        $sql = "DELETE FROM bienthe WHERE ma_bien_the = $ma_bien_the";
        $product = getone_atribute($ma_bien_the);
        if ($product['hinh_anh'] !== "") {
            $anh_cu = "../upload/" .$product['hinh_anh'];
            unlink($anh_cu);
        }
        pdo_query($sql);
    }

    function getone_product($ma_sp) {
        $sql = "SELECT * FROM sanpham WHERE ma_sp = ?";
        $product = pdo_query_one($sql, $ma_sp);
        return $product;
    }
    function getone_atribute($ma_bien_the) {
        $sql = "SELECT * FROM bienthe WHERE ma_bien_the = ?";
        $atribute = pdo_query_one($sql, $ma_bien_the);
        return $atribute;
    }
    // $file_name: tên ảnh từ upload, $hinh_anh: tên ảnh nhập từ form
    function update_atribute($ma_bien_the, $ma_mau, $ma_kich_co, $gia_sp, $gia_km, $so_luong, $mo_ta, $file_name, $hinh_anh) {
        $product = getone_atribute($ma_bien_the);
        if($hinh_anh != "") {
            if ($product['hinh_anh'] !== "") {
                $anh_cu = "../upload/" .$product['hinh_anh'];
                unlink($anh_cu);
            }
            $sql = "UPDATE bienthe SET ma_bien_the = '".$ma_bien_the."', ma_mau = '".$ma_mau."',ma_kich_co = '".$ma_kich_co."',gia_sp = '".$gia_sp."',gia_km = '".$gia_km."',so_luong = '".$so_luong."',mo_ta = '".$mo_ta."',hinh_anh = '".$file_name."' WHERE ma_bien_the = ?";
        } else {
            $sql = "UPDATE bienthe SET ma_bien_the = '".$ma_bien_the."', ma_mau = '".$ma_mau."',ma_kich_co = '".$ma_kich_co."',gia_sp = '".$gia_sp."',gia_km = '".$gia_km."',so_luong = '".$so_luong."',mo_ta = '".$mo_ta."' WHERE ma_bien_the = ?";
        }
        pdo_execute($sql, $ma_bien_the);
    }

    function update_product($ma_sp, $ma_lsp, $ten_sp) {
            $sql = "UPDATE sanpham SET ma_sp = '".$ma_sp."', ma_lsp = '".$ma_lsp."', ten_sp = '".$ten_sp."' WHERE ma_sp = ?";
            pdo_execute($sql, $ma_sp);
    }

    function update_variant($ma_sp, $ma_lsp, $ten_sp, $gia_sp, $so_luong, $ma_km, $mo_ta ,$hinh_anh) {
        if ($hinh_anh != "") {
            $sql = "UPDATE sanpham SET ma_sp = '".$ma_sp."', ma_lsp = '".$ma_lsp."', ten_sp = '".$ten_sp."', gia_sp = '".$gia_sp."', so_luong = '".$so_luong."', ma_km = '".$ma_km."', mo_ta = '".$mo_ta."', hinh_anh = '".$hinh_anh."' WHERE ma_sp = ?";
        } else {
            $sql = "UPDATE sanpham SET ma_sp = '".$ma_sp."', ma_lsp = '".$ma_lsp."', ten_sp = '".$ten_sp."', gia_sp = '".$gia_sp."', so_luong = '".$so_luong."', ma_km = '".$ma_km."', mo_ta = '".$mo_ta."' WHERE ma_sp = ?";
        }
        pdo_execute($sql, $ma_sp);
    }

    function check_query($ma_sp, $ma_mau, $ma_kich_co) {
        $sql = "SELECT * FROM bienthe WHERE ma_sp = $ma_sp AND ma_mau = $ma_mau AND ma_kich_co = $ma_kich_co";
        $check = pdo_query_one($sql);
        return $check;
    }
?>