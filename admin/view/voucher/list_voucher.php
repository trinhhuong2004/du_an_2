<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2">
                    <h3 class="fs-1">Danh sách khuyến mãi</h3>
                    <a href="?act=add_voucher" class="btn btn-primary my-md-2 my-1">Thêm mới</a>
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Giá giảm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        foreach ($list_voucher as $value) :
                            extract($value)
                        ?>
                            <tr>
                                <td class="text-center">
                                    <?= $stt += 1; ?>
                                </td>
                                <td class="text-center">
                                    <?= $ten_ma_voucher; ?>
                                </td>
                                <td class="text-center">
                                    <?=number_format($giam_gia,'0','.','.')." vnd"; ?>
                                </td>
                                <td class="text-center">
                                    <?= $so_luong; ?>
                                </td>
                                <td class="text-center">
                                    <?= ($status==1)?"Còn":"Hết"; ?>
                                </td>
                                <td class="text-center">
                                    <a href="?act=update_voucher&id_voucher=<?=$ma_voucher?>" class="btn btn-warning">Sửa</a>
                                    <a onclick="return confirm('Bạn có xoá không?')" href="?act=delete_voucher&id_voucher=<?=$ma_voucher?>" class="btn btn-danger">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>