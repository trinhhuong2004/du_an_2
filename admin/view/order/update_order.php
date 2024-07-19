<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h3>Cập nhật đơn hàng </h3>
                <form method="post" action="?act=update_order" enctype="multipart/form-data">
                    <table class="table mt-4">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Số hóa đơn</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">PT thanh toán</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($get_one_order)) {
                                extract($get_one_order);
                            }
                            ?>
                            <tr>
                                <td class="text-center">
                                    <?= $ma ?>
                                </td>
                                <td class="text-center">
                                    <?= $ma_dh ?>
                                </td>
                                <td class="text-center">
                                    <?= $ho_ten ?>
                                </td>
                                <td class="text-center">
                                    <?= $ngay_dat ?>
                                </td>
                                <td class="text-center">
                                    <?= $dia_chi ?>
                                </td>
                                <td class="text-center">
                                    <?= get_payment($pttt) ?>
                                </td>
                                <td class="text-center">
                                    <?= number_format($tong_dh, 0, '.', '.')." ₫"  ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <label for="name" class="form-label mt-3">Trạng thái</label>
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="0" <?= ($get_one_order['trang_thai'] == 0) ? "selected" : "" ?>>Đã hủy đơn</option>
                            <option value="1" <?= ($get_one_order['trang_thai'] == 1) ? "selected" : "" ?>>Chưa xử lý</option>
                            <option value="2" <?= ($get_one_order['trang_thai'] == 2) ? "selected" : "" ?>>Đã xác nhận</option>
                            <option value="3" <?= ($get_one_order['trang_thai'] == 3) ? "selected" : "" ?>>Đang giao hàng</option>
                            <option value="4" <?= ($get_one_order['trang_thai'] == 4) ? "selected" : "" ?>>Đã giao hàng</option>
                            <option value="5" <?= ($get_one_order['trang_thai'] == 5) ? "selected" : "" ?>>Đã nhận hàng</option>
                        </select>
                    </div>
                    <input type="hidden" name="idorder" value="<?= $get_one_order['ma'] ?>">
                    <br>
                    <button type="submit" name="update" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>