<!-- Cart Area Start -->
<style>
    .cancel-order {
        background-color: #f2f2f2;
        border-radius: 0;
        color: #212121;
        display: inline-block;
        font-size: 14px;
        font-weight: 600;
        line-height: 1;
        padding: 18px 63px 17px;
        text-transform: uppercase;
    }
    .cancel-order:hover {
        background-color: #ff7004;
        color: #fff;
    }
</style>
<!-- Cart Area Start -->
<div class="cart-main-area pt-100px">
        <div class="container">
            <h3 class="cart-page-title">Đơn hàng</h3>
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
                                    </tr>
                                    
                                    <?php endforeach; }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->


<div class="cart-main-area pt-70px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Đơn hàng chi tiết</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Màu</th>
                                        <th>Kích cỡ</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        if (isset($list_his_detail)) {
                                            $total_order = 0;
                                            foreach ($list_his_detail as $order) :
                                                extract($order);
                                                $image = $link_img .$hinh_anh;
                                                $status = $trang_thai;
                                                $total_order += $don_gia;
                                    ?>
                                        
                                    <tr>
                                        <td><a href="#" style="color: #333;"><?=$ten_sp?></a></td>
                                        <td class="product-thumbnail">
                                            <a href="#" style="color: #333;"><img class="img-responsive ml-15px" src="<?= $image ?>" alt="" /></a>
                                        </td>
                                        <td class="product-name"><?= $mau_sac ?></td>
                                        <td class="product-name"><?= $kich_co ?></td>
                                        <td class="product-name"><?= $so_luong ?></td>
                                        <td><?=number_format($don_gia, 0, '.', '.')?> đ</td>
                                    </tr>
                                    
                                    <?php endforeach; }?>
                                    <tr>
                                        <td colspan="2"><strong>VẬN CHUYỂN</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2">30.000 đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>TỔNG ĐƠN</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2"><?=number_format($total_order + 30000, 0, '.', '.')?> đ</td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <form id="paymentForm" action="index.php?act=update_status_order" method="POST">
                        <input type="hidden" name="id_order" value="<?=$ma?>">
                        <input type="hidden" name="status" value="<?=$trang_thai?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="index.php?act=home">Tiếp tục mua sắm</a>
                                    </div>
                                    <div class="cart-shiping-update" style="text-align: left">
                                        <?php 
                                            if ($status == 0 || $status == 5) {
                                                echo '<a href="?act=product_catalog" class="cancel-order">Mua lại</a>';
                                            } elseif ($status == 4) {
                                        ?>
                                        
                                            <button name="receive" class="cancel-order">Đã nhận được hàng</button>
                                        
                                            <?php } else { 
                                                if ($status == 2 || $status == 3){
                                                    echo "<script>var isCancel = false;</script>";
                                                }else {
                                                    echo "<script>var isCancel = true;</script>";
                                                }    
                                            ?>
                                                    <button name="cancel" class="cancel-order" onclick="return confirm('Bạn có muốn hủy không?')">Hủy đơn hàng</button>
                                            <?php } ?>
                                            <p class="text-danger mt-15px" style="display: none" id="messageLogin"></p>
                                        
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
    <?php 
        
    ?>
    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
        if (!isCancel) {
            // Ngăn chặn việc gửi form nếu người dùng chưa đăng nhập
            event.preventDefault();
            document.getElementById('messageLogin').style.display = 'block';
            document.getElementById('messageLogin').textContent = 'Không thể hủy đơn hàng này!';
            // Hoặc có thể chuyển hướng đến trang đăng nhập
            // window.location.href = 'login.php';
        }
    });
    </script>