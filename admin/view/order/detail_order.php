<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>Chi tiết đơn hàng </h3>
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
                            <th scope="col">Trạng thái</th>
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
                                <?= number_format($tong_dh, 0, '.', '.') . " ₫" ?>
                            </td>
                            <td class="text-center">
                                <?= get_status($trang_thai) ?>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <table class="table mt-4">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Kích cỡ</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($detail_order as $value) :
                            extract($value);
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?= $ten_sp ?>
                                </td>
                                <td class="text-center">
                                    <img width="30px" src="<?= $hinh_anh ?>" alt="">
                                </td>
                                <td class="text-center">
                                    <?= $mau_sac ?>
                                </td>
                                <td class="text-center">
                                    <?= $kich_co ?>
                                </td>
                                <td class="text-center">
                                    <?= $so_luong ?>
                                </td>
                                <td class="text-center">
                                    <?= number_format($don_gia, 0, '.', '.') . " ₫"  ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <a class="mt-2 btn btn-primary" href="?act=list_order">Quay lại</a>
                    <p>*Lưu ý: Tổng tiền = Tổng tiền hàng + Phí Ship (<?= number_format(30000, 0, '.', '.'). " ₫"  ?>)</p>
                </div>
            </div>
        </div>
    </div>
</div>