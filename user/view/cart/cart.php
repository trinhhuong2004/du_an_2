<style>
    .nextPay {
        background-color: #ff7004;
        border-radius: 0;
        color: #fff;
        display: block;
        font-size: 14px;
        font-weight: 700;
        line-height: 1;
        padding: 18px 10px 17px;
        text-align: center;
        text-transform: uppercase;
        text-transform: uppercase;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
    .nextPay:hover {
        color: #fff;
        background: #212121;
    }
</style>
<!-- Cart Area Start -->
<form action="index.php?act=checkout_info" method="post"  id="cartSection">
<div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Giỏ hàng</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên SP</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Màu, kích cỡ</th>
                                        <th>Thành tiền</th>
                                        <th>Hoạt động</th>
                                        <th>Chọn</th>
                                    </tr>
                                </thead>
                                <tbody">
                                
                                    <?php
                                        $sum = 0;
                                        $i = 0;
                                        foreach($_SESSION['mycart'] as $key => $cart) :
                                            $img = $link_img . $cart[2];
                                            $thanhtien = $cart[3] * $cart[4];
                                            $sum += $thanhtien;
                                            $update_quantity = updateCartFromDatabase($cart[9]);
                                            $new_quantity = $update_quantity[0]['so_luong'];
                                            if ($new_quantity == 0) {
                                                $cart[4] = $new_quantity;
                                                $mess_update = 'Đã hết hàng';
                                            } 
                                    ?>
                                        
                                        <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px" src="<?= $img ?>" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#"><?= $cart[1] ?></a></td>
                                        <td class="product-price-cart"><span class="amount"><?= number_format($cart[3], 0, '.', '.') ?> đ</span></td>
                                        <td>
                                            <div style="margin-left: 12px;width: 140px;height:40px;display:flex; align-items:center;border:1px solid #ccc; border-radius: 5px;">
                                                <span style="cursor: pointer; padding-left: 15px; font-size:20px" onclick="decrease(this)">-</span>
                                                <input style="border: none; text-align: center; padding: 0" type="text" value="<?=$cart[4]?>" min="0" max="<?=$new_quantity?>" onchange="updateQuantity(<?=$cart[0]?>, <?=$key?>, this.value)" disabled>
                                                <span style="cursor: pointer; padding-right: 15px; font-size:18px" onclick="increase(this)">+</span>
                                            </div>
                                            <p class="text-danger"><?php if (isset($mess_update) && $new_quantity == 0) {echo $mess_update;}?></p>
                                        </td>
                                       
                                        <td class="product-subtotal"><?= $cart[5] .', ' .$cart[6]?></td>
                                        <td class="product-subtotal"><?= number_format($thanhtien, 0, '.', '.') ?> đ</td>
                                        <td class="product-remove">
                                            <a href="index.php?act=del_cart&idcart=<?= $i ?>"><i class="icon-close"></i></a>
                                        </td>
                                        <td class="product-subtotal"><input data-quantity="<?=$new_quantity?>" style="width: 20px;" type="checkbox" name="select_product[]" id="checkbox_<?=$cart[0]?>" data-key="<?= $thanhtien ?>" value="<?=$key?>" onchange="updateTotal(); displayQuantity(this)"></td>
                                    </tr>
                                    
                                    <?php $i++; endforeach ?>
                                    <tr>
                                        <td class="product-thumbnail " colspan = "6">Tổng Đơn hàng</td>
                                        <td><span class="total_order">0 đ</span></td>
                                    </tr>

                                     <!-- <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px" src="./user/public/assets/images/product-image/2.jpg" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">Product Name</a></td>
                                        <td class="product-price-cart"><span class="amount">$50.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$80.00</td>
                                        <td class="product-subtotal">$80.00</td>
                                        <td class="product-subtotal">$80.00</td>
                                        
                                        <td class="product-remove">
                                            
                                            <a href="#"><i class="icon-close"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px" src="./user/public/assets/images/product-image/3.jpg" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">Product Name</a></td>
                                        <td class="product-price-cart"><span class="amount">$70.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$90.00</td>
                                        <td class="product-remove">
                                            
                                            <a href="#"><i class="icon-close"></i></a>
                                        </td>
                                    </tr>  -->
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="index.php?act=home">Tiếp tục mua sắm</a>
                                    </div>
                                    <div class="cart-clear">
                                        <!-- <a href="index.php?act=viewcart" style="margin-right:40px">Cập nhật giỏ hàng</a> -->
                                        <a href="index.php?act=del_cart">Xóa giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-6 mb-lm-30px" style="width: 50%;">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Sử dụng phiếu giảm giá</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Nhập mã phiếu của bạn nếu có.</p>
                                    <form>
                                        <input type="text" name="name" />
                                        <button class="cart-btn-2" type="submit" name="discount">Áp dụng giảm giá</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px" style="width: 50%;">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng số giỏ hàng</h4>
                                </div>
                                <?php
                                    $shippingFee = 30000; // Phí vận chuyển
                                    $total = $sum + $shippingFee; // Tổng tiền sau khi trừ phí vận chuyển
                                ?>
                                    <h5>Tổng số sản phẩm <span>.</span></h5>
                                    
                                    <div class="total-shipping">
                                        <h5>Tổng số vận chuyển</h5>
                                        <ul>
                                            <li>Tiêu chuẩn <span class="total_order">0 đ</span></li>
                                            <li>Vận chuyển <span><?=number_format($shippingFee, 0, '.', '.')?> đ</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Tổng cộng <span id="shipping">0 đ</span></h4>
                                    
                                        <button name="process_pay" class="nextPay" onclick="return validateForm()">Tiến hành thanh toán</button>
                                        <p class="text-danger mt-15px" style="display: none" id="messageLogin"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
    <!-- Cart Area End -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function updateQuantity(productId, cartIndex, newQuantity) {
        var checkboxes = document.getElementsByName("select_product[]");
        var checkedStatus = {};
        
        checkboxes.forEach(function(checkbox) {
            checkedStatus[checkbox.value] = checkbox.checked;
        });
        // var newQuantity = parseInt(document.getElementById('quantityInput_' + productId).value);
        // var inputElement = document.getElementById('quantityInput_' + productId);
        // var currentValue = parseInt(inputElement.value);

            $.ajax({
            type: "POST",
            url: "user/view/cart/update_cart.php",
            data: {
                product_id: productId,
                cart_index: cartIndex,
                new_quantity: newQuantity,
            },
            success: function(response){
                console.log("Cập nhật thành công!");
                $.post('user/view/cart/show_update_cart.php', function(data) {
                    $('#cartSection').html(data);
                    checkboxes.forEach(function(checkbox) {
                        checkbox.checked = checkedStatus[checkbox.value];
                    });
                // Cập nhật tổng tiền sau khi khôi phục trạng thái checkbox
                updateTotal();
            });

            },
            error: function(){
                console.log("Đã xảy ra lỗi khi cập nhật!");
            }
        });
    }

    

    
    function increase(element) {
        var inputElement = element.previousElementSibling;
        var currentValue = parseInt(inputElement.value);
        var maxQuantity = parseInt(inputElement.getAttribute('max')); // Lấy giá trị tối đa (tồn kho)

        if (currentValue < maxQuantity) {
            inputElement.value = currentValue + 1;
            updateQuantity(inputElement.dataset.productId, inputElement.dataset.cartIndex, currentValue + 1);
        } else {
            updateQuantity(inputElement.dataset.productId, inputElement.dataset.cartIndex);
            alert("Số lượng vượt quá tồn kho!");
            // Hiển thị thông báo hoặc xử lý theo ý muốn của bạn khi số lượng vượt quá tồn kho
        }
    }

    function decrease(element) {
        var inputElement = element.nextElementSibling;
        var currentValue = parseInt(inputElement.value);
        var maxQuantity = parseInt(inputElement.getAttribute('max')); // Lấy giá trị tối đa (tồn kho)

        if (currentValue > 1) {
            inputElement.value = currentValue - 1;
            updateQuantity(inputElement.dataset.productId, inputElement.dataset.cartIndex, currentValue - 1);
        } else {
            console.log("Số lượng không được dưới 1");
        }
    }

    function updateTotal(quantity) {
        var checkboxes = document.getElementsByName("select_product[]");
        var selectedTotal = 0;
            

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var thanhtien = parseInt(checkbox.getAttribute('data-key'));
                selectedTotal += thanhtien;
            }
        });
        var totalAll = selectedTotal + 30000;
        var totalProduct = document.querySelectorAll(".total_order");
        // console.log(totalProduct);
        totalProduct.forEach(function(total) {
            total.textContent = selectedTotal.toLocaleString('vi-VN') + ' đ';
        });
        document.getElementById("shipping").textContent = totalAll.toLocaleString('vi-VN') + ' đ';
    }

    function displayQuantity(checkbox) {
    var input = checkbox.parentNode.parentNode.querySelector('input[type="text"]');
    var quantity = parseInt(input.value);

    if (checkbox.checked) {
        console.log(quantity);
    }
}

function validateForm() {
    var checkboxes = document.getElementsByName('select_product[]');
    var checked = false;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            var quantity = parseInt(checkboxes[i].getAttribute('data-quantity'));
            checked = true;
            
            if (quantity === 0) {
                document.getElementById('messageLogin').style.display = 'block';
                document.getElementById('messageLogin').textContent = 'Số lượng đã được cập nhật, vui lòng kiểm tra lại';
                return false; // Ngăn chặn thêm sản phẩm có số lượng 0
            }
        }
    }

    if (!checked) {
        document.getElementById('messageLogin').style.display = 'block';
        document.getElementById('messageLogin').textContent = 'Vui lòng chọn ít nhất một sản phẩm để thanh toán';
        return false; // Ngăn chặn gửi form nếu không có checkbox nào được chọn
    }
    return true; // Gửi form nếu có ít nhất một checkbox được chọn và không có sản phẩm nào hết hàng
}
    </script>