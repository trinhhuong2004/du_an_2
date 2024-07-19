<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row breadcrumb_box  align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center text-md-start">
                        <h2 class="breadcrumb-title">Tài khoản</h2>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list text-center text-md-end">
                            <li><a href="?act=home">Trang chủ</a></li>
                            <li class="active">/Tài khoản</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- account area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>

                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="true" href="#my-account-1">Chỉnh sửa thông tin tài khoản</a>
                                </h3>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <?php
                                            if (isset($_SESSION['account']) && is_array($_SESSION['account'])) {
                                                extract($_SESSION['account']);
                                            }
                                        ?>
                                        <form id="myForm" action="?act=edit_account" method="POST">
                                            <div class="account-info-wrapper">
                                                <h4>Thông tin tài khoản</h4>
                                                <h5>Thông tin của bạn</h5>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="id" value="<?=$ma_nd?>">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="full_name">Họ tên</label>
                                                        <input type="text" name="full_name" value="<?=$ho_ten?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Giới tính</label>
                                                        <select class="form-select" name="gender" id="">
                                                            <option value="">Lựa chọn</option>
                                                            <option value="0" <?=($gioi_tinh==0) ? "selected" : "";?>>Nam</option>
                                                            <option value="1" <?=($gioi_tinh==1) ? "selected" : "";?>>Nữ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?=$email?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="telephone">Số điện thoại</label>
                                                        <input type="text" name="telephone" value="<?=$sdt?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>địa chỉ</label>
                                                        <input type="text" name="address" value="<?=$dia_chi?>"/>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="?act=home"><i class="icon-arrow-up-circle"></i> Quay lại</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit" name="update">Tiếp tục</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default single-my-account active" data-aos="fade-up" data-aos-delay="400">
                            <div class="panel-heading my-account-title">
                                <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse" class="collapsed" aria-expanded="false" href="#my-account-2">Đổi mật khẩu </a></h3>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="myaccount-info-wrapper">
                                        <form id="myForm_" action="?act=change_pass" method="POST">
                                            <div class="account-info-wrapper">
                                                <h4>Đổi mật khẩu</h4>
                                                <h5>Mật khẩu của bạn</h5>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="id" value="<?=$ma_nd?>">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Mật khẩu cũ</label>
                                                        <input type="password" name="pass"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Mật khẩu mới</label>
                                                        <input id="newpass" type="password" name="newpass"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Xác nhận mật khẩu mới</label>
                                                        <input type="password" name="newrepass"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="?act=home"><i class="icon-arrow-up-circle"></i> Quay lại</a>
                                                </div>
                                                <div class="billing-btn">
                                                    <button type="submit" name="update">Tiếp tục</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area end -->