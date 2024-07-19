<!-- Hero/Intro Slider Start -->
<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <!-- Hero slider Active -->
        <div class="swiper-wrapper">
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">New Products</span>
                                <h2 class="title-1">Flexible Chair </h2>
                                <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="./user/public/assets/images/slider-image/slider-1.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single slider item -->
            <div class="hero-slide-item slider-height swiper-slide d-flex">
                <div class="container align-self-center">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                            <div class="hero-slide-content slider-animated-1">
                                <span class="category">New Products</span>
                                <h2 class="title-1">Flexible Chair </h2>
                                <p>Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="./user/public/assets/images/slider-image/slider-2.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Hero/Intro Slider End -->
<?php
extract($one_product);
?>
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="?act=home"><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button></a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top mb-20px">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($check_variant as $variant) {
                                    extract($variant);
                                    $image = $link_img . $hinh_anh;
                                    echo '<div class="swiper-slide">
                                                <img class="img-responsive m-auto" src="' . $image . '" onclick="selectVariant(\'' . $hinh_anh . '\', ' . $gia_km . ', ' . $gia_sp . ', ' . $so_luong . ', '.$ma_bien_the.')">
                                            </div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($check_variant as $variant) {
                                    extract($variant);
                                    $image = $link_img . $hinh_anh;
                                    echo '<div class="swiper-slide">
                                                <img class="img-responsive m-auto" src="' . $image . '" onclick="selectVariant(\'' . $hinh_anh . '\', ' . $gia_km . ', ' . $gia_sp . ', ' . $so_luong . ', '.$ma_bien_the.')">
                                            </div>';
                                }
                                // foreach ($img_product as $img) {
                                //     extract($img);
                                //     $image = $link_img .$hinh_anh;
                                //     echo '<div class="swiper-slide">
                                //         <img class="img-responsive m-auto" src="'.$image.'" alt="">
                                //     </div>';
                                // }
                                ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <a onclick="nextVariant()" class="swiper-button-next"></a>
                                <a onclick="previousVariant()" class="swiper-button-prev"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2><?= $ten_sp ?></h2>
                            <p class="reference" id="quantityDisplay">Tồn kho:</span></p>
                            <input type="hidden" id="valueQuantity" value="0">
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">Đọc đánh giá (1)</a></span>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <span class="old-price not-cut" id="priceDisplay"><?= number_format($check_variant[0]['gia_km'], 0, '.', '.') ?></span>
                                    <span id="priceDisplaySub" style="text-decoration: line-through; opacity:.5; margin-left:10px; font-size:18px" class="new"><?= number_format($check_variant[0]['gia_sp'], 0, '.', '.') ?></span>
                                    <!-- <img src="" id="imageVariant" alt="no php"> -->
                                </ul>
                            </div>
                            <p class="quickview-para"><?=$mo_ta?></p>
                        <form id="myForm" action="index.php?act=addtocart" method="post">
                            <div class="pro-details-size-color d-flex">
                                <div style="margin-right: 12px;"  class="pro-details-color-wrap">
                                    <label for="">Màu</label>
                                    <select name="namecolor" id="colorSelect" class="form-control">
                                        <option disabled selected>Chọn màu</option>
                                        <?php
                                            foreach ($get_color_size as $color) {
                                                extract($color);
                                                echo '<option value="' . $ten_mau . '">' . $ten_mau . '</option>';
                                            }
                                        ?>
                                    </select>
                                    
                                </div>
                                <div class="pro-details-color-wrap">
                                    <label>Kích thước</label>
                                    <select name="namesize" id="sizeSelect" class="form-control">
                                        <option disabled selected>Chọn kích thước</option>
                                        <?php
                                            foreach ($get_color_size as $size) {
                                                extract($size);
                                                echo '<option value="' . $ten_kich_co . '">' . $ten_kich_co . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                        <p style="position: relative; top: 20px; color: red; font-size: 15px;" id="error"></p>
                                <div class="pro-details-quality">
                                    <input type="hidden" name="idpro" value="<?= $ma_sp ?>">
                                    <input type="hidden" id="idVariant" name="id_variant" value="<?= $ma_bien_the ?>">
                                    <input type="hidden" name="name" value="<?= $ten_sp ?>">
                                    <input type="hidden" name="quantity_variant" id="quantityVariant" value="<?= $so_luong ?>">
                                    <input type="hidden" name="imagedefault" value="<?= $check_variant[0]['hinh_anh'] ?>">
                                    <input type="hidden" name="pricedefault" value="<?= $check_variant[0]['gia_km'] ?>">
                                    <input type="hidden" name="price_variant_sub" id="priceVariantSub">
                                    <input type="hidden" name="price_variant" id="priceVariant">
                                    <input type="hidden" name="image_variant" id="imageVariant">

                                    <!-- <div class="cart-plus-minus" style="margin-right: 15px;">
                                </div> -->
                                    <div style="height:50px;display:flex; align-items:center;border:1px solid #ccc; border-radius: 5px; margin-right:30px">
                                        <span style="cursor: pointer; padding-left: 20px; font-size:20px" onclick="decrease()">-</span>
                                        <input type="text" name="quantity" id="quantityInput" class="cart-plus-minus" style="border: none;display: inline-block; text-align:center" value="1" readonly>
                                        <span style="cursor: pointer; padding-right: 20px; font-size:20px" onclick="increase()">+</span>
                                    </div>
                                    <!-- <input class="cart-plus-minus" style="margin-right: 15px; text-align:center" type="number" name="quantity" value="1" id="quantity" onclick="limitQuantity()"/> -->
                                    <div class="">
                                        <button title="Add To Cart" id="addToCart" class="add-cart btn btn-primary btn-hover-primary ml-4" name="addtocart">Thêm vào giỏ hàng</button>
                                        <p id="outStock" style="display: none; color: #fff; background-color:#ccc" class="btn btn-primary">Đã hết hàng</p>
                                    </div>

                                </div>
                            </form>

                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to
                                        wishlist</a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                </div>
                            </div>
                            <div class="pro-details-social-info">
                                <span>Share</span>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<script>
    function increase() {
        var maxQuantity = document.getElementById('quantityVariant').value;
        var input = document.getElementById('quantityInput');
        var error = document.getElementById('error');
        var currentValue = parseInt(input.value, 10);
        // Kiểm tra giới hạn tối đa là 5
        if (currentValue < maxQuantity) {
            input.value = currentValue + 1;
        } else {
            error.innerText = "Số lượng bạn chọn đã đạt mức tối đa của sản phẩm này";
            input.value = maxQuantity;
        }
    }

    function decrease() {
        var maxQuantity = document.getElementById('quantityVariant').value;
        var input = document.getElementById('quantityInput');
        var error = document.getElementById('error');
        var currentValue = parseInt(input.value, 10);

        // Kiểm tra giới hạn tối thiểu là 1
        if (currentValue > 1) {
            input.value = currentValue - 1;
            error.innerText = "";

        } else {
            input.value = 1
        }
    }

    function limitQuantity() {
        var maxQuantity = document.getElementById('quantityVariant').value;
        var quantityInput = document.getElementById("quantityInput");
        var checkNaN = parseInt(quantityInput.value);

        if (checkNaN >= maxQuantity) {
            quantityInput.value = maxQuantity; // Đặt lại giá trị nếu vượt quá ngưỡng
        }
    }

    // Xử lý khi người dùng chọn biến thể
    function selectVariant(imageVariant, priceVariant, priceVariantSub, quantityVariant, idVariant) {
        document.getElementById('imageVariant').value = imageVariant;
        document.getElementById('priceVariant').value = priceVariant;
        document.getElementById('priceVariantSub').value = priceVariantSub;
        document.getElementById('quantityVariant').value = quantityVariant;
        var quantityInput = document.getElementById('quantityInput').value = 1; // Reset value

        // Format price
        const formatPrice = priceVariant.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        const formatPriceSub = priceVariantSub.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        // Show content
        document.getElementById('priceDisplay').textContent = formatPrice;
        document.getElementById('priceDisplaySub').textContent = formatPriceSub;
        document.getElementById('quantityDisplay').textContent = 'Tồn kho: ' + quantityVariant;
        var valueQuantity = document.getElementById('valueQuantity').value = quantityVariant;
        document.getElementById('idVariant').value = idVariant;

        var addToCart = document.getElementById('addToCart');
        var outStock = document.getElementById('outStock');
        if (valueQuantity == 0) {
            document.getElementById('addToCart').style.display = 'none';
            document.getElementById('outStock').style.display = 'block';
        } else {
            document.getElementById('addToCart').style.display = 'block';
            document.getElementById('outStock').style.display = 'none';
        }
    }

    var variants = <?php echo json_encode($check_variant); ?>;
    let variantIndex = 0;

    function displayVariant(index) {
        const currentVariant = variants[index];

        document.getElementById('priceVariant').value = currentVariant.gia_km;
        document.getElementById('quantityVariant').value = currentVariant.so_luong;
        document.getElementById('imageVariant').value = currentVariant.hinh_anh;

        const formatPrice = currentVariant.gia_km.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        const formatPriceSub = currentVariant.gia_sp.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });

        document.getElementById('priceDisplay').textContent = formatPrice;
        document.getElementById('priceDisplaySub').textContent = formatPriceSub;
        document.getElementById('quantityDisplay').textContent = 'Tồn kho: ' + currentVariant.so_luong;
        document.getElementById('imageVariant').src = 'upload/' + currentVariant.hinh_anh;
        
        var valueQuantity = document.getElementById('valueQuantity').value = currentVariant.so_luong;
        console.log(valueQuantity);
        document.getElementById('imageVariant').src = 'upload/' + currentVariant.hinh_anh;

        var addToCart = document.getElementById('addToCart');
        var outStock = document.getElementById('outStock');
        if (valueQuantity == 0) {
            document.getElementById('addToCart').style.display = 'none';
            document.getElementById('outStock').style.display = 'block';
        } else {
            document.getElementById('addToCart').style.display = 'block';
            document.getElementById('outStock').style.display = 'none';
        }
    }

    function nextVariant() {
        variantIndex = (variantIndex === variants.length - 1) ? 0 : variantIndex + 1;
        // console.log(variantIndex);
        displayVariant(variantIndex);
    }

    function previousVariant() {
        variantIndex = (variantIndex <= 0) ? (variants.length - 1) : (variantIndex - 1);
        // console.log(variantIndex);
        displayVariant(variantIndex);
    }

    displayVariant(variantIndex);
</script>