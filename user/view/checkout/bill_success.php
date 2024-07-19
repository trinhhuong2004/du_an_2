<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div  class="col-lg-6 mt-md-30px mt-lm-30px">
                <div class="your-order-area">
                    <h3 class="text-success">Đặt hàng thành công</h3>
                    <div class="your-order-wrap gray-bg-4 mt-2 mb-3">
                        <h5 class="mb-3">Chi tiết đơn hàng</h5>
                        <?php
                        if (isset($_SESSION['id_order']) && $_SESSION['id_order'] > 0) {
                            $get_show_info = get_show_bill_info($_SESSION['id_order']);
                            extract($get_show_info);
                            if (count($get_show_info) > 0) {
                                $pttt = get_payment($pttt);
                        ?>
                        <p class="mb-2"> 
                            <span>Mã đơn hàng: </span><span><?=$ma_dh?></span> 
                        </p>
                        <p class="mb-2">
                            <span>Người nhận: </span><span><?=$ho_ten?></span>
                        </p>
                        <p class="mb-2">
                            <span>Địa chỉ: </span><span><?=$dia_chi?></span>
                        </p>
                        <p class="mb-2">
                            <span>Email: </span><span><?=$email?></span>
                        </p>
                        <p class="mb-2">
                            <span>Số điện thoại: </span><span><?=$sdt?></span>
                        </p>
                        <p class="mb-3">
                            <span>Ghi chú: </span><span><?=$ghi_chu?></span>
                        </p>
                        <h5 class="mb-3">Phương thức thanh toán</h5>
                        <p class="mb-2">
                            <span><?=$pttt?></span>
                        </p>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="d-flex justify-content-left">
                        <a href="?act=home" style="padding: 12px 20px; background-color: #FF7004;" class="text-center text-white ">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-md-30px mt-lm-30px ">
            <div class="your-order-area">
                    <h3>Thông tin đơn hàng</h3>
                    <form action="?act=checkout" method="post">
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Tổng cộng</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        <?php
                                        $tong = 0;
                                        $ship = 30000;
                                        if (isset($_SESSION['id_order']) && $_SESSION['id_order'] > 0) {
                                            $get_show_pro = get_show_bill_cart($_SESSION['id_order']);
                                            if ($get_show_pro && count($get_show_pro) > 0) {
                                            foreach ($get_show_pro as  $item) :
                                                $tong += $item['don_gia'];
                                                $image = $link_img .$item['hinh_anh'];
                                        ?>
                                            <li><span class="order-middle-left"><img style="margin-right:12px" width=50 src="<?=$image?>"><?= $item['ten_sp'] ?> (<?= $item['mau_sac'] ?>, <?= $item['kich_co'] ?>) X <?= $item['so_luong'] ?> </span> <span class="order-price"><?= number_format($item['don_gia'], '0', '.', '.') ?> đ </span></li>
                                            
                                        <?php 
                                            endforeach; 
                                            } else {
                                                echo 'Không có thông tin';
                                            }
                                        } else {
                                            echo 'Không có thông tin';
                                        }
                                        ?>
                                    </ul>

                                </div>

                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Tổng phụ</li>
                                        <li><?= number_format($tong, '0', '.', '.') ?>đ</li>
                                    </ul>
                                </div>

                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Phí vận chuyển</li>
                                        <li><?= number_format($ship, '0', '.', '.') ?>đ</li>
                                    </ul>
                                </div>

                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Tổng cộng</li>
                                        <li><?= number_format($ship + $tong, '0', '.', '.') ?>đ</li>
                                        <input type="hidden" name="totalorder" value="<?=$ship + $tong?>">
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div id="faq" class="panel-group">
                                        <!-- <div class="panel panel-default single-my-account m-0">
                                        <div class="panel-heading my-account-title">
                                            <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1" class="collapsed" aria-expanded="true">Phương thức thanh toán</a>
                                            </h4>
                                        </div>
                                        <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">

                                            <div class="panel-body">
                                              
                                            </div>
                                        </div>
                                    </div> -->
                                        <!-- <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-2" aria-expanded="false" class="collapsed">Kiểm tra thanh toán</a></h4>
                                            </div>
                                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Vui lòng gửi séc đến Tên cửa hàng, Đường cửa hàng, Thị trấn cửa hàng, Tiểu bang / Quận của cửa hàng, Mã bưu điện của cửa hàng.</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-3">Phương thức thanh toán</a></h4>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" id="option1" type="radio" value="1" name="methodpay" />
                                                <label class="mb-0 mx-2">Thanh toán khi nhận hàng</label>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" type="radio" value="2" name="methodpay" />
                                                <span class="mb-0 mx-2">Thanh toán VNPay</span>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" type="radio" value="3" name="methodpay" />
                                                <span class="mb-0 mx-2">Thanh toán Momo</span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>