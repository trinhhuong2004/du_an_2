<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Sửa mã khuyến mãi </h3>
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="id_voucher" value="<?= $voucher['ma_voucher'] ?>">

                        <label for="name" class="form-label mt-3">Tên giảm giá</label>
                        <input type="text" name="name_voucher" class="form-control" placeholder="Nhập tên giảm giá" value="<?= $voucher['ten_ma_voucher'] ?>" />

                        <label for="name" class="form-label mt-3">Giá giảm</label>
                        <input type="number" name="discount" class="form-control" placeholder="Nhập giá giảm" value="<?= $voucher['giam_gia'] ?>" />

                        <label for="name" class="form-label mt-3">Số lượng giảm giá</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng giảm giá" value="<?= $voucher['so_luong'] ?>" />

                        <label for="name" class="form-label">Trạng thái</label>
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option value="1" <?= ($voucher['status']) == 1 ? 'selected' : ''; ?>>Còn</option>
                            <option value="0" <?= ($voucher['status']) == 0 ? 'selected' : ''; ?>>Hết</option>
                        </select>
                        <br>

                        <button type="submit" name="update_voucher" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>