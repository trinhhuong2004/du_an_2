<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Thêm người dùng </h3>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label mt-3">Họ tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ tên" />

                        <label for="name" class="form-label mt-3">Giới tính</label>
                        <select id="gender" class="form-select" name="gender" aria-label="Default select example">
                        <option selected>Chọn giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                    </select>
                    <br>

                    <?php
                  
                    ?>

                        <label for="name" class="form-label mt-3">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" placeholder="Nhập số điện thoại" />

                        <label for="name" class="form-label mt-3">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Nhập Email" />

                        <label for="name" class="form-label mt-3">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" />

                        <label for="name" class="form-label mt-3">Tên tài khoản</label>
                        <input type="text" name="name_acount" class="form-control" placeholder="Nhập tên tài khoản" />

                        <label for="name" class="form-label mt-3">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu" />

                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Quyền</label>
                                <select class="form-select" name="permission" aria-label="Default select example">
                                    <option selected>Chọn quyền</option>
                                    <option value="1">Người dùng</option>
                                    <option value="2">Nhân viên</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                            <div class="mx-5">
                                <label for="name" class="form-label mt-3">Trạng Thái</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected>Chọn trạng thái</option>
                                    <option value="1">0</option>
                                    <option value="2">1</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <button type="submit" name="add_user" class="btn btn-primary">Thêm mới</button>
                       
                        <a href="index.php?act=list_user" class="btn btn-primary">Danh sách</a>
                </form> <br>
                <h6>
                <?php
                if(isset($thongbao)){
                    echo $thongbao;
                }
                ?>
                </h6>
            </div>
        </div>
    </div>
</div>