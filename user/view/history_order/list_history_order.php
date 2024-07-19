<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Lịch sử mua hàng</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Người nhận</th>
                                        <th>Hóa đơn</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng đơn</th>
                                        <th>Địa chỉ</th>
                                        <th>PTTT</th>
                                        <th>Tình trạng</th>
                                        <th>Hoạt động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        if (isset($list_his_order)) {
                                            foreach ($list_his_order as $order) :
                                                extract($order);
                                                $payment = method_pay($pttt);
                                                $status = status($trang_thai);
                                    ?>
                                        
                                    <tr>
                                        <td><?=$ho_ten?></td>
                                        <td><?=$ma_dh?></td>
                                        <td><?=$ngay_dat?></td>
                                        <td><?=number_format($tong_dh, 0, '.', '.')?> đ</td>
                                        <td><?=$dia_chi .'</br>' .$sdt.'</br>' .$email?></td>
                                        <td><?=$payment?></td>
                                        <td><?=$status?></td>
                                        <td><a href="?act=detail_history&id_order=<?= $ma ?>&id_account=<?= $_SESSION['account']['ma_nd'] ?>">Xem chi tiết</a></td>
                                    </tr>
                                    
                                    <?php endforeach; }?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update" style="text-align: left">
                                        <a href="index.php?act=home">Tiếp tục mua sắm</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->