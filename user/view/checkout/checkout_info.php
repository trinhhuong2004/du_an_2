<!-- checkout area start -->
<div class="checkout-area pt-100px pb-100px">
    <form action="?act=payment" id="paymentForm" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Thông tin đặt hàng</h3>
                    <?php
                    if (isset($one_account) && is_array($one_account)) {
                        extract($one_account);
                    }
                    ?>
                    
                        <input type="hidden" name="id_user" value="<?=$ma_nd?>">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Người nhận</label>
                                    <input type="text" name="name" value="<?php echo (isset($ho_ten) && $ho_ten != "") ? $ho_ten : ""; ?>" placeholder="Nhập Họ tên*" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" value="<?php echo (isset($dia_chi) && $dia_chi != "") ? $dia_chi : ""; ?>" placeholder="Nhập Địa Chỉ*" />
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Điện thoại</label>
                                    <input id="myInput" type="text" name="telephone" value="<?php echo (isset($sdt) && $sdt != "") ? $sdt : ""; ?>" placeholder="Nhập Số Điện Thoại*" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20px">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo (isset($email) && $email != "") ? $email : ""; ?>" placeholder="Nhập Email" />
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrap">
                            <h4>Thông tin thêm</h4>
                            <div class="additional-info">
                                <label>Ghi chú </label>
                                <textarea placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ ghi chú đặc biệt khi giao hàng. " name="note"></textarea>
                            </div>
                        </div>
                        <!-- <input style="width: 26%; background-color: #FF7004;" name="save_info" type="button" class="btn-hover text-center text-white border-0" value="Lưa thông tin" onclick="toggleValue()"> -->
                    
                    <!-- <div class="checkout-account mt-25">
                            <input class="checkout-toggle w-auto h-auto" type="checkbox" />
                            <label>Gửi đến một người khác?</label>
                        </div>
                        <div class="different-address open-toggle mt-30px">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Tên</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Họ</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20px">
                                        <label>Quốc gia</label>
                                        <select>
                                            <option>Chọn một quốc gia</option>
                                            <option>Việt Nam</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Địa chỉ nhà</label>
                                        <input class="billing-address" placeholder="Số nhà, Tên đường" type="text" />
                                        <input placeholder="Một phòng phù hợp..." type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Quận / Huyện</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Thị trấn / Thành phố</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Điện thoại</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Email </label>
                                        <input type="text" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>
            <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                <div class="your-order-area">
                    <h3>Thông tin đơn hàng</h3>
                    <!-- <form action="?act=checkout" method="post"> -->
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Tổng giỏ hàng</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        <?php
                                        $tong = 0;
                                        $ship = 30000;
                                        foreach ($select_product as $key) :
                                            $product = $_SESSION['mycart'][$key];
                                            
                                            $thanhtien = $product[3] * $product[4];
                                            $tong += $thanhtien;
                                            $image = $link_img .$product[2];

                                            // if (isset($_SESSION['mycart'][$key])) {
                                            //     unset($_SESSION['mycart'][$key]);
                                            // }
                                            
                                        ?>
                                            <li><span class="order-middle-left"><img style="margin-right:12px" width=50 src="<?=$image?>"><?= $product[1] ?> (<?= $product[5] ?>, <?= $product[6] ?>) X <?= $product[4] ?> </span> <span class="order-price"><?= number_format($thanhtien, '0', '.', '.') ?> đ </span></li>
                                            
                                        <?php endforeach; ?>
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
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title">Phương thức thanh toán</h4>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" id="option1" type="radio" value="1" name="cod" />
                                                <label class="mb-0 mx-2">Thanh toán khi nhận hàng</label>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" type="radio" value="2" name="redirect" />
                                                <span class="mb-0 mx-2">Thanh toán VNPay</span>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <input style="width: 20px;" type="radio" value="3" name="payUrl" />
                                                <span class="mb-0 mx-2">Thanh toán Momo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <?php 
                                if (isset($_SESSION['account'])){
                                    echo "<script>var isLogIn = true;</script>";
                                }else {
                                    echo "<script>var isLogIn = false;</script>";
                                }
                                ?>
                                <p class="alert alert-danger" style="display: none" id="messageLogin"></p>
                            <input style="background-color: #FF7004;" name="checkout" type="submit" class="mb-5 btn-hover text-center text-white border-0" value="Đặt hàng">
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </form>
    </div>
</form>
</div>
<!-- checkout area end -->
<script>
    const checkboxes = document.querySelectorAll('input[type="radio"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });

    function toggleValue() {
        var button = document.querySelector('[name="save_info"]');
        
        var input = document.getElementById('myInput');
        
        // Chuyển đổi giá trị giữa "Lưu" và "Sửa"
        button.value = (button.value === "Lưu") ? "Sửa" : "Lưu";

        // Nếu giá trị là "Sửa", disable trường nhập liệu; ngược lại, bật lại trường nhập liệu
        input.disabled = (button.value === "Sửa");
    }

    document.addEventListener('DOMContentLoaded', function() {
    var firstRadio = document.getElementById('option1'); // Lấy ra input radio đầu tiên
    if (firstRadio) {
        firstRadio.checked = true; // Thiết lập input radio đầu tiên là đã chọn
    }
    });
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        if (!isLogIn) {
            // Ngăn chặn việc gửi form nếu người dùng chưa đăng nhập
            event.preventDefault();
            document.getElementById('messageLogin').style.display = 'block';
            document.getElementById('messageLogin').textContent = 'Bạn cần đăng nhập để thực hiện đặt hàng!';
            // Hoặc có thể chuyển hướng đến trang đăng nhập
            // window.location.href = 'login.php';
        }
    });
</script>
