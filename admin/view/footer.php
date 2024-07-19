<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">© 2023 Furns Made With By LTH Furniture.</div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- jQuery  -->
<!-- <script src="../admin/public/assets_admin/js/jquery.min.js"></script> -->

<!-- <script src="../admin/public/assets_admin/js/popper.min.js"></script>
    <script src="../admin/public/assets_admin/js/bootstrap.min.js"></script>
    <script src="../admin/public/assets_admin/js/modernizr.min.js"></script>
    <script src="../admin/public/assets_admin/js/waves.js"></script>
    <script src="../admin/public/assets_admin/js/jquery.slimscroll.js"></script>
    <script src="../admin/public/assets_admin/js/jquery.nicescroll.js"></script>
    <script src="../admin/public/assets_admin/js/jquery.scrollTo.min.js"></script> -->
<!-- KNOB JS -->
<!-- <script src="../admin/public/assets_admin/plugins/jquery-knob/excanvas.js"></script>
    <script src="../admin/public/assets_admin/plugins/jquery-knob/jquery.knob.js"></script>-->
<!-- <script src="../admin/public/assets_admin/plugins/chart.js/chart.min.js"></script>  -->
<!-- <script src="../admin/public/assets_admin/pages/dashboard.js"></script> -->
<!-- App js -->
<!-- <script src="../admin/public/assets_admin/js/app.js"></script> -->

<!-- validate form -->
<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                id_catalog: "required",
                name_catalog: "required",
                name: "required",
                name_voucher: "required",
                discount: {
                    required: true,
                    number: true,
                    min: 1
                },
                quantity: {
                    required: true,
                    number: true,
                    min: 0
                },

                ma_mau:"required",
                ma_kich_co:"required",
                gia_sp: {
                    required: true,
                    number: true,
                    min: 1
                },
                gia_km: {
                    required: true,
                    number: true,
                    min: 1
                },
               
                so_luong: {
                    required: true,
                    number: true,
                    min: 0
                },
                mo_ta: "required",
            },
            messages: {
                id_catalog: "Vui lòng chọn loại sản phẩm.",
                name_catalog: "Vui lòng nhập tên danh mục.",
                name: "Vui lòng nhập tên sản phẩm.",
                name_voucher: "Vui lòng nhập tên giảm giá.",
                discount: {
                    required: "Vui lòng nhập giá giảm.",
                    number: "Vui lòng nhập số hợp lệ.",
                    min: "Vui lòng nhập số dương."
                },
                quantity:  {
                    required: "Vui lòng nhập số lượng.",
                    number: "Vui lòng nhập số hợp lệ.",
                    min: "Vui lòng nhập số dương."
                },

                ma_mau:"Vui lòng chọn màu sắc",
                ma_kich_co:"Vui lòng chọn kích cỡ",
                gia_sp: {
                    required:  "Vui lòng nhập giá.",
                    number: "Vui lòng nhập số hợp lệ.",
                    min: "Vui lòng nhập số dương."
                },
                gia_km: {
                    required:  "Vui lòng nhập giá khuyến mãi.",
                    number: "Vui lòng nhập số hợp lệ.",
                    min: "Vui lòng nhập số dương."
                },
                
                so_luong: {
                    required:  "Vui lòng nhập số lượng.",
                    number: "Vui lòng nhập số hợp lệ.",
                    min: "Vui lòng nhập số dương."
                },
                mo_ta: "Vui lòng nhập mô tả.",
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element); // Hiển thị thông báo lỗi dưới ô input
            }
        });
    });
</script>

</body>
<!-- Mirrored from mannatthemes.com/zoogler/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Nov 2023 04:35:37 GMT -->

</html>