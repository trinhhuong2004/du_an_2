<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2">
                    <h3 class="fs-1">Sản phẩm đã thêm</h3>
                    <div class="row my-2">
                        <div class="col-md-20">
                            <form method="POST" action="index.php?act=list_product" style="display: inline-block;">
                                <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm" />
                        </div>
                        <input class="btn btn-primary my-md-0 my-1" style="height: 38px; margin-left: 10px" name="btn_search" type="submit" value="Tìm kiếm">
                    </div>
                    </form>
                    <!-- <a href="index.php?act=list_atribute" class="btn btn-primary my-md-2 my-1">Thông tin sản phẩm</a> -->
                    <a href="index.php?act=add_product" class="btn btn-primary my-md-2 my-1">Thêm mới sản phẩm</a>
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th width="25%" scope="col">Mã sản phẩm</th>
                            <th width="25%" scope="col">Tên</th>
                            <th width="50%" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!isset($list_product) || $list_product == null) {
                            echo '<tr>
                                            <td class="text-danger" colspan=10>Không tìm thấy sản phẩm!</td>
                                  </tr>';
                        } else {
                            foreach ($list_product as $product) {
                                extract($product);
                                $list_attribute = "index.php?act=list_atribute&id=$ma_sp";
                                $edit_product = "index.php?act=edit_product&id=$ma_sp";
                                $add_product = "index.php?act=add_atribute&id=$ma_sp";
                                $del_product = "index.php?act=del_product&id=$ma_sp";
                                echo '<tr>
                                            <td class="text-center">' . $ma_sp . '</td>
                                            <td class="text-center">' . $ten_sp . '</td>
                                            <td class="text-center">
                                                <a href="' . $list_attribute . '" class="btn btn-warning">Thông tin sản phẩm</a>
                                                <a href="' . $add_product . '" class="btn btn-warning">Thêm thuộc tính</a>
                                                <a href="' . $edit_product . '" class="btn btn-warning">Sửa</a>
                                                <a onclick="return confirm(\'Bạn có xoá không?\')" href="' . $del_product . '" class="btn btn-danger">Xóa</a>
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