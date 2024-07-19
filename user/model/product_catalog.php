<?php
    function getAll_product_catalog(){
        $sql = "SELECT lsp.ma_lsp, COUNT(sp.ma_lsp) AS soluong, lsp.ten_lsp
        FROM loaisanpham lsp
        LEFT JOIN sanpham sp ON sp.ma_lsp = lsp.ma_lsp
        GROUP BY lsp.ma_lsp, lsp.ten_lsp;";
        $result = pdo_query($sql);
        return $result;
    }

    function getAll_product($id,$orderCondition){
        $sql = "SELECT sp.*, bt.* FROM sanpham sp JOIN bienthe bt ON sp.ma_sp = bt.ma_sp JOIN ( SELECT ma_sp, MIN(ma_bien_the) AS min_ma_bien_the FROM bienthe GROUP BY ma_sp ) AS min_bt ON bt.ma_sp = min_bt.ma_sp AND bt.ma_bien_the = min_bt.min_ma_bien_the WHERE sp.ma_lsp = ".$id." ".$orderCondition." ";
        $result = pdo_query($sql);
        return $result;
    }

        function loadAll_product($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price) {
        $sql = "SELECT sp.*, bt.*
        FROM sanpham sp
        JOIN bienthe bt ON sp.ma_sp = bt.ma_sp
        JOIN (
            SELECT ma_sp, MIN(ma_bien_the) AS min_ma_bien_the
            FROM bienthe
            GROUP BY ma_sp
        ) AS min_bt ON bt.ma_sp = min_bt.ma_sp AND bt.ma_bien_the = min_bt.min_ma_bien_the
         WHERE `ten_sp` LIKE '%".$kyw."%' AND gia_sp BETWEEN ".$min_price." AND ".$max_price." ".$orderCondition." LIMIT ".$item_per_page." OFFSET ".$offset."
         ";
        $result = pdo_query($sql);
        return $result;
    }
        function loadAll_product_sum($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price) {
        $sql = "SELECT sp.*, bt.*,COUNT(bt.so_luong) AS tong
        FROM sanpham sp
        JOIN bienthe bt ON sp.ma_sp = bt.ma_sp
        JOIN (
            SELECT ma_sp, MIN(ma_bien_the) AS min_ma_bien_the
            FROM bienthe
            GROUP BY ma_sp
        ) AS min_bt ON bt.ma_sp = min_bt.ma_sp AND bt.ma_bien_the = min_bt.min_ma_bien_the
         WHERE `ten_sp` LIKE '%".$kyw."%' AND gia_sp BETWEEN ".$min_price." AND ".$max_price." ".$orderCondition." LIMIT ".$item_per_page." OFFSET ".$offset."
         ";
        $result = pdo_query($sql);
        return $result;
    }
   
    function product_Count(){
        $sql = "SELECT COUNT(*) AS total_count FROM sanpham WHERE ma_lsp = ma_lsp";
        $product_count = pdo_query($sql);
        return $product_count;
    }
        function product_sum($id){
        $sql = "SELECT COUNT(*) AS sum FROM sanpham  WHERE ma_lsp = $id";
        $product_count = pdo_query($sql);
        return $product_count;
    }
    function fetchAndSortProductsAZ($kytu) {
        $sql = "SELECT * FROM sanpham ORDER BY ". $kytu." ";
        $result = pdo_query($sql);
        return $result;
    }
 
    function best_saleProduct() {
        $sql="SELECT bienthe.ma_bien_the, bienthe.ma_sp, bienthe.so_luong AS sl, giohang.*, donhang.trang_thai FROM donhang JOIN giohang ON donhang.ma = giohang.ma_dh JOIN sanpham ON giohang.ma_sp = sanpham.ma_sp 
        JOIN bienthe ON bienthe.ma_sp = sanpham.ma_sp WHERE donhang.trang_thai = 5 GROUP BY bienthe.ma_sp ORDER BY sl DESC LIMIT 0, 10";
        $result = pdo_query($sql);
        return $result;
    }
?>

