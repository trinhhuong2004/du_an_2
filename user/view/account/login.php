<!-- login area start -->
<div class="login-register-area pt-100px pb-100px" style="margin-left: 450px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" href="?act=login">
                                <h4>Đăng nhập</h4>
                            </a>
                            <a href="?act=register">
                                <h4>Đăng ký</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form id="myForm" action="?act=login" method="post">
                                            <input style="margin-bottom: 16px;" type="text" name="username" placeholder="Tài khoản" />
                                            <input style="margin-bottom: 16px;" type="password" name="pass" placeholder="Mật khẩu" />
                                            <?php 
                                                if (isset($message)) {
                                                    echo '<span class="text-danger">'.$message.'</span>';
                                                }
                                            ?>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Nhớ mật khẩu</a>
                                                    <a href="?act=forgot_pass">Quên mật khẩu?</a>
                                                </div>
                                                <button type="submit" name="login"><span>Đăng nhập</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="?act=register" method="post">
                                            <input type="text" name="email" placeholder="Email" />
                                            <input type="text" name="username" placeholder="Tài khoản" />
                                            <input type="password" name="pass" placeholder="Mật khẩu" />
                                            <input type="password" name="repass" placeholder="Nhập lại mật khẩu" />
                                            <div class="button-box">
                                                <button type="submit" name="add_account">Đăng ký</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->