<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Cập nhật danh mục </h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Mã danh mục</label>
                        <input type="text" disabled class="form-control"  value="<?= $catalog['ma_lsp']; ?>" />
                        <input type="hidden" name="id_catalod" class="form-control"  value="<?= $catalog['ma_lsp']; ?>" />
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" name="name_catalog" class="form-control" placeholder="Nhập tên danh mục" value="<?= $catalog['ten_lsp']; ?>" />
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">Trạng thái</label>
                            <select class="form-control" name="status_catalog" aria-label="Default select example">
                                <option value="2" <?= ($catalog['trang_thai']) == 2 ? 'selected' : ''; ?>>Ẩn</option>
                                <option value="1" <?= ($catalog['trang_thai']) == 1 ? 'selected' : ''; ?>>Hiện</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="update_catalog" class="btn btn-primary">Sửa </button>
                </form>
            </div>
        </div>
    </div>
</div>