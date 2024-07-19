<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Cập nhật thuộc tính sản phẩm</h3>
                <form id="myForm" action="index.php?act=update_atribute" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <?php
                            if (is_array($atribute_one)) {
                                extract($atribute_one);
                            }
                            $target_file = $dir_img .$hinh_anh;
                            if (is_file($target_file)) {
                                $hinh_anh = '<img class="mt-1" src="'.$target_file.'" height="50" alt="">';
                            } else {
                                $hinh_anh = 'No photo';
                            }
                        ?>
                        <input type="hidden" name="ma_sp" class="form-control" value="<?=$ma_sp?>" placeholder="Nhập mã sản phẩm muốn thêm thuộc tính" />
                        <input type="hidden" name="ma_bien_the" class="form-control" value="<?=$ma_bien_the?>" placeholder="Nhập mã sản phẩm muốn thêm thuộc tính" />
                        <?php
                            if (isset($message) && $message != "") {
                                echo '<span class="text-danger" colspan="4">'.$message.'</span>';
                            }
                        ?>  

                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Màu sắc</label>
                                <select class="form-select" name="ma_mau" aria-label="Default select example">
                                    <option value="<?=$ma_mau?>" selected>Chọn màu sắc</option>
                                    <?php
                                        foreach ($list_color as $color) {
                                            extract($color);
                                            ($color['ma_mau'] == $atribute_one['ma_mau']) ? $selec = "selected" : $selec = "";
                                            echo '<option value="'.$ma_mau.'" '.$selec.'>'.$ten_mau.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Kích cỡ</label>
                                <select class="form-select" name="ma_kich_co" aria-label="Default select example">
                                    <option value="<?=$ma_kich_co?>" selected>Chọn kích cỡ</option>
                                    <?php
                                        foreach ($list_size as $size) {
                                            extract($size);
                                            ($size['ma_kich_co'] == $atribute_one['ma_kich_co']) ? $selec = "selected" : $selec = "";
                                            echo '<option value="'.$ma_kich_co.'" '.$selec.'>'.$ten_kich_co.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <label for="name" class="form-label mt-3">Giá gốc</label>
                        <input type="text" name="gia_sp" class="form-control" value="<?=$gia_sp?>" placeholder="Nhập giá gốc" />

                        <label for="name" class="form-label mt-3">Giá sale</label>
                        <input type="text" name="gia_km" class="form-control" value="<?=$gia_km?>" placeholder="Nhập giá sale" />

                        <label for="name" class="form-label mt-3">Hình ảnh</label>
                        <input type="file" name="hinh_anh" class="form-control" placeholder="Nhập hình ảnh" />
                        <?=$hinh_anh?>

                        <label for="name" class="form-label mt-3">Số lượng</label>
                        <input type="text" name="so_luong" class="form-control" value="<?=$so_luong?>" placeholder="Nhập số lượng" />

                        <label for="name" class="form-label mt-3">Nhập mô tả</label>
                        <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control" placeholder="Nhập mô tả"><?=$mo_ta?></textarea>

                        <br>
                         <button type="submit" name="update_atribute" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>