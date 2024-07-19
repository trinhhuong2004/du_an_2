<?php
    function getAll_account($keyword=""){
        $sql =  "SELECT * FROM nguoidung";
        if (!empty($keyword)) {
            $sql .= " WHERE ho_ten LIKE '%".$keyword."%'";
        }
        $sql .= " ORDER by ma_nd DESC";
        $account = pdo_query($sql);
        return $account;
    }

    function getone_account($id_user) {
        $sql = "SELECT * FROM nguoidung WHERE ma_nd = ?";
        $account = pdo_query_one($sql, $id_user);
        return $account;
    }

    function update_account($id_user, $role, $status) {
        $sql = "UPDATE nguoidung SET vai_tro = '".$role."', trang_thai = '".$status."' WHERE ma_nd = ?";
        pdo_execute($sql, $id_user);
    }

    function del_account($id_user) {
        $sql = "DELETE FROM nguoidung WHERE ma_nd = ?";
        pdo_query($sql, $id_user);
    }
    // function insert_User($name, $gender, $phone, $email, $address, $name_acount, $permission, $status){
    //     $sql = "INSERT INTO nguoidung (ho_ten, gioi_tinh, email, sdt, tai_khoan, mat_khau, ma_quyen, trang_thai)
    //     VALUES ('$name', '$gender', '$phone', '$email', '$address', '$name_acount', '$permission', '$status');
    //     )";
    //     pdo_execute($sql);
    // }

?>