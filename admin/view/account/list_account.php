<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2">
                    <h3 class="fs-1">Thông tin người dùng</h3>
                    <div class="row my-2">
                        <div class="col-md-20">
                            <form method="POST" action="index.php?act=list_account" style="display: inline-block;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm người dùng" />
                        </div>
                        <input class="btn btn-primary my-md-0 my-1" style="height: 38px; margin-left: 10px" name="search" type="submit" value="Tìm kiếm">
                    </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Mã tài khoản</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!isset($list_account) || $list_account == null) {
                            echo '<tr>
                                    <td class="text-danger" colspan=10>Không tìm thấy sản phẩm!</td>
                                </tr>';
                        } else {
                            foreach ($list_account as $account) : ?>
                                <?php extract($account) ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $ma_nd ?>
                                    </td>

                                    <td class="text-center">
                                        <?= $ho_ten ?>
                                    </td>

                                    <td class="text-center">
                                        <?= (isset($email) && $email != "") ? $email : "Chưa có"; ?>
                                    </td>

                                    <td class="text-center">
                                        <?= (isset($sdt) && $sdt != "") ? $sdt : "Chưa có"; ?>
                                    </td>

                                    <td class="text-center">
                                        <?= $tai_khoan ?>
                                    </td>

                                    <?php $role = ($vai_tro == 0) ? "Người dùng" : "Admin" ?>
                                    <td class="text-center">
                                        <?= $role ?>
                                    </td>

                                    <?php $status = ($trang_thai == 0) ? "Khóa" : "Kích hoạt" ?>
                                    <td class="text-center">
                                        <?= $status ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if (($vai_tro == 0)) {
                                            echo '
                                    <a href="?act=edit_account&id=' . $ma_nd . '" class="btn btn-warning">Sửa</a>
                                    <a href="?act=del_account&id=' . $ma_nd . '" onclick="return confirm(\'Bạn có xóa không?\')" class="btn btn-danger">Xóa</a>
                                    ';
                                        } ?>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>