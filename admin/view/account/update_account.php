<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Cập nhật tài khoản </h3>
                <form method="post" action="?act=update_account" enctype="multipart/form-data">
                    <?php
                    if (isset($getone_account)) {
                        extract($getone_account);
                    }
                    ?>
                    <table class="table mt-4">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Mã tài khoản</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tài khoản</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                    </table>
                    <div>
                        <label for="name" class="form-label mt-3">Vai trò</label>
                        <select class="form-control" name="role" aria-label="Default select example">
                            <option disabled>Lựa chọn</option>
                            <option value="1" <?= ($getone_account['vai_tro'] == 1) ? "selected" : "" ?>>Admin</option>
                            <option value="0" <?= ($getone_account['vai_tro'] == 0) ? "selected" : "" ?>>Người dùng</option>
                        </select>
                    </div>

                    <input type="hidden" name="id_user" value="<?= $ma_nd ?>">

                    <div>
                        <label for="name" class="form-label mt-3">Trạng thái</label>
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option disabled>Lựa chọn</option>
                            <option value="1" <?= ($getone_account['trang_thai'] == 1) ? "selected" : "" ?>>Kích hoạt</option>
                            <option value="0" <?= ($getone_account['trang_thai'] == 0) ? "selected" : "" ?>>Khóa</option>
                        </select>
                    </div>


                    <br>
                    <button type="submit" name="update" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>