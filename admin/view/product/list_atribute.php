<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2">
                    <h3 class="fs-1">Thông tin sản phẩm</h3>
                        <div class="row my-2">
                            <div class="col-md-20">
                                <form method="POST" action="index.php?act=list_atribute" style="display: inline-block;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm" />
                            </div>
                            <input class="btn btn-primary my-md-0 my-1" style="height: 38px; margin-left: 10px" name="btn_search" type="submit" value="Tìm kiếm">
                        </div>
                        </form>
                    <a href="index.php?act=list_product" class="btn btn-primary my-md-2 my-1">Sản phẩm</a>
                    <a href="index.php?act=add_product" class="btn btn-primary my-md-2 my-1">Thêm mới sản phẩm</a>
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá gốc</th>
                            <th scope="col">Giá sale</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Màu</th>
                            <th scope="col">Size</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                if (!isset($list_atribute) || $list_atribute == null) {
                                    echo '<tr>
                                            <td class="text-danger" colspan=10>Không tìm thấy sản phẩm!</td>
                                        </tr>';
                                } else {
                                foreach ($list_atribute as $product) {
                                    extract($product);
                                    $edit_product = "index.php?act=edit_atribute&id=$ma_bien_the";
                                    $del_atribute = "index.php?act=del_atribute&id=$ma_bien_the";
                                    $target_file = $dir_img .$hinh_anh;
                                    if (is_file($target_file)) {
                                        $img = '<img src="'.$target_file.'" alt="No photo" height="50">';
                                    } else {
                                        $img = "No photo";
                                    }
                                    if ($so_luong > 0) {
                                        $status = "Còn hàng";
                                    } else {
                                        $status = "Hết hàng";
                                    }
                                    echo '<tr>
                                            <td class="text-center">'.$ma_sp.'</td>
                                            <td class="text-center">'.$ten_sp.'</td>
                                            <td class="text-center">'.$img.'</td>
                                            <td class="text-center">'.$gia_sp.'</td>
                                            <td class="text-center">'.$gia_km.'</td>
                                            <td class="text-center">'.$so_luong.'</td>
                                            <td class="text-center">'.$ten_mau.'</td>
                                            <td class="text-center">'.$ten_kich_co.'</td>
                                            <td class="text-center">'.$status.'</td>
                                            <td class="text-center">
                                                <a href="'.$edit_product.'" class="btn btn-warning">Sửa</a>
                                                <a onclick="return confirm(\'Bạn có xoá không?\')" href="'.$del_atribute.'" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>';
                                }
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>