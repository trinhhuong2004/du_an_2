<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Thêm mới khuyến mãi </h3>
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label mt-3">Tên giảm giá</label>
                        <input type="text" name="name_voucher" class="form-control" placeholder="Nhập tên giảm giá"/>

                        <label for="name" class="form-label mt-3">Giá giảm</label>
                        <input type="number" name="discount" class="form-control" placeholder="Nhập giá giảm"/>

                        <label for="name" class="form-label mt-3">Số lượng giảm giá</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Nhập số lượng giảm giá" />
                        <br>

                        <button type="submit" name="add_voucher" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>