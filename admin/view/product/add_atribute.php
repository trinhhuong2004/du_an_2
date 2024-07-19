<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Thêm mới sản phẩm </h3>
                <form id="myForm" action="index.php?act=add_atribute" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <?php
                            if (is_array($product_one)) {
                                extract($product_one);
                            }
                        ?>
                    
                        <input type="hidden" name="ma_sp" class="form-control" value="<?=$ma_sp?>" placeholder="Nhập mã sản phẩm muốn thêm thuộc tính" />
                        <?php
                            if (isset($message) && $message != "") {
                                echo '<span class="text-danger" colspan="4">'.$message.'</span>';
                            }
                        ?>  

                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Màu sắc</label>
                                <select class="form-select" name="ma_mau" aria-label="Default select example">
                                    <option disabled selected>Chọn màu sắc</option>
                                    <?php
                                        foreach ($list_color as $color) {
                                            extract($color);
                                            echo '<option value="'.$ma_mau.'">'.$ten_mau.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Kích cỡ</label>
                                <select class="form-select" name="ma_kich_co" aria-label="Default select example">
                                    <option disabled selected>Chọn kích cỡ</option>
                                    <?php
                                        foreach ($list_size as $size) {
                                            extract($size);
                                            echo '<option value="'.$ma_kich_co.'">'.$ten_kich_co.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <label for="name" class="form-label mt-3">Giá gốc</label>
                        <input type="text" name="gia_sp" class="form-control" placeholder="Nhập giá gốc" />

                        <label for="name" class="form-label mt-3">Giá sale</label>
                        <input type="text" name="gia_km" class="form-control" placeholder="Nhập giá sale" />

                        <label for="name" class="form-label mt-3">Hình ảnh</label>
                        <input type="file" name="hinh_anh" class="form-control" placeholder="Nhập hình ảnh" />

                        <label for="name" class="form-label mt-3">Số lượng</label>
                        <input type="text" name="so_luong" class="form-control" placeholder="Nhập số lượng" />

                        <label for="name" class="form-label mt-3">Nhập mô tả</label>
                        <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control" placeholder="Nhập mô tả"></textarea>

                        <br>
                         <button type="submit" name="add_variant" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>