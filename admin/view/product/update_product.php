<?php
    if (is_array($product_one)) {
        extract($product_one);
    }
    $target_file = $dir_img .$hinh_anh;
    if (is_file($target_file)) {
        $img = '<img class="mt-1" src="'.$target_file.'" alt="No photo" height="50">';
    } else {
        $img = "No photo";
    }
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Cập nhật sản phẩm </h3>
                <form id="myForm" action="index.php?act=update_product" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <label for="name" class="form-label mt-3">Loại sản phẩm</label>
                                <select class="form-select" name="id_catalog" aria-label="Default select example">
                                    <option value="" >Chọn loại</option>
                                    <?php
                                        foreach ($list_catalog as $catalog) {
                                            extract($catalog);
                                            ($catalog['ma_lsp'] == $product_one['ma_lsp']) ? $selec = "selected" : $selec = "";
                                            echo '<option value="'.$ma_lsp.'" '.$selec.'>'.$ten_lsp.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                        <label for="name" class="form-label mt-3">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="<?=$ten_sp?>" placeholder="Nhập tên sản phẩm" />

                        <input type="hidden" name="id" value="<?=$ma_sp?>">
                        <br>
                         <button type="submit" name="update" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>