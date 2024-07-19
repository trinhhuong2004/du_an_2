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
                                <h2 class="title-1">Ghế sofa</h2>
                                <p>Với thiết kế tinh tế, chất liệu chất cao cấp cùng sự kết hợp hoàn hảo giữa kiểu dáng hiện đại và phong cách cổ điển mang đến một điểm nhấn đặc biệt cho không gian nội thất</p>
                                <a href="?act=product_catalog" class="btn btn-lg btn-primary btn-hover-dark mt-5">Mua ngay</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img width="100%" src="upload/sofa.png" alt="" />
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
                                <h2 class="title-1">Giường đôi</h2>
                                <p>Với chất liệu chất lượng cao, cùng với các chi tiết tinh tế và hoàn thiện tỉ mỉ, giường đôi cao cấp mang lại không gian nghỉ ngơi sang trọng và thoải mái</p>
                                <a href="?act=product_catalog" class="btn btn-lg btn-primary btn-hover-dark mt-5">Mua ngay</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5 col-sm-5">
                            <div class="hero-slide-image">
                                <img src="upload/giuong.png" alt="" />
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



<!-- Product tab Area Start -->
<div class="section product-tab-area pt-100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" data-aos="fade-up">
                <div class="section-title mb-0">
                    <h2 class="title">Sản phẩm Mới nhất</h2>
                    <p class="sub-title mb-30px">Chuyên nghiệp, Sang trọng, Tiện nghi - Nơi hoàn hảo cho không gian sống của bạn.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                        <div class="row">
                            <?php
                            foreach ($list_product as $value) :
                                extract($value);
                            ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
                                    <!-- Single Product -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="index.php?act=product_detail&id_pro=<?= $ma_sp ?>" class="image">
                                                <img src="<?= $link_img . $hinh_anh; ?>" alt="Product" />
                                                <!-- <img class="hover-image" src="" alt="Product" /> -->
                                            </a>

                                            <div class="actions">
                                                <a href="#" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                                <a href="index.php?act=home&id_pro=<?= $ma_sp ?>&id_catalog=<?= $ma_lsp ?>" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                                <a href="#" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                            </div>
                                            <!-- <form action="index.php?act=pockup" ></form> -->
                                            <?php $link_pockup = "?act=pockup&idpro=$ma_sp"?>
                                            <a href="<?=$link_pockup?>" class="action quickview add-to-cart" data-link-action="quickview" title="Quick view" data-bs-target="#exampleModal">Thêm vào giỏ hàng</a>
                                      
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="index.php?act=product_detail&id_pro=<?= $ma_sp ?>&id_catalog=<?= $ma_lsp ?>"><?= $ten_sp; ?></a></h5>
                                            <span class="price">
                                                <?php
                                                if ($gia_km == 0) {   ?>
                                                    <span class="new fs-5"><?= number_format($gia_sp, 0, '.', '.') . " ₫"?></span>
                                                <?php } else { ?>
                                                    <span class="new fs-5 mx-3"><?= number_format($gia_km, 0, '.', '.') . " ₫"?></span>
                                                    <span style="text-decoration: line-through; opacity:.5;" class="new"><?= number_format($gia_sp, 0, '.', '.') . " ₫"?></span>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product tab Area End -->

<!-- Banner Section Start -->
<div class="section pb-100px pt-100px">
    <div class="container">
        <!-- Banners Start -->
        <div class="row">
            <!-- Banner Start -->
            <div class="col-lg-6 col-12 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                <a href="index.php?act=product_catalog" class="banner">
                    <img src="./user/public/assets/images/banner/1.jpg" alt="" />
                    <div class="info justify-content-end">
                        <div class="content align-self-center">
                            <h3 class="title">
                                Giảm giá mùa <br /> Giáng Sinh
                            </h3>
                            <p>Giảm ngay 50%</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Banner End -->

            <!-- Banner Start -->
            <div class="col-lg-6 col-12" data-aos="fade-up" data-aos-delay="400">
                <a href="index.php?act=product_catalog" class="banner">
                    <img src="./user/public/assets/images/banner/2.jpg" alt="" />
                    <div class="info justify-content-start">
                        <div class="content align-self-center">
                            <h3 class="title">
                                Ghế Sofa <br /> Ưu đãi lớn nhất</h3>
                            <p>Giảm ngay 50%</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Banner End -->
        </div>
        <!-- Banners End -->
    </div>
</div>
<!-- Banner Section End -->

<!-- New Product Start -->
<div class="section pb-100px">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12" data-aos="fade-up">
                <div class="section-title text-center mb-11">
                    <h2 class="title">Sản phẩm bán chạy</h2>
                    <p class="sub-title">Tiết kiệm vô vàn, Trải nghiệm vô tận - Tạo nên không gian sống lý tưởng với Ưu đãi tuyệt vời.</p>
                </div>
            </div>
        </div>
        <!-- section title start -->
        <div class="new-product-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
            <div class="new-product-wrapper swiper-wrapper">
                <!-- Single Prodect -->
                <?php
               
                foreach ($best_saleProduct as $value) :
                    extract($value);
                ?>
                    <div class="new-product-item swiper-slide">
                        <div class="product">
                            <div class="thumb">
                                <a href="index.php?act=product_detail&id_pro=<?=$ma_sp; ?>&id_catalog=<?= $ma_lsp ?>" class="image">
                                    <img src="<?= $link_img . $hinh_anh ?>" alt="Product" />
                                    <img class="hover-image" src="<?= $link_img . $hinh_anh ?>" alt="Product" />
                                </a>

                                <div class="actions">
                                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                    <a href="?act=home&id_pro=<?=$ma_sp; ?>"><a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a></a> 
                                    <a href="compare.html" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                </div>
                                <?php $link_pockup = "?act=pockup&idpro=$ma_sp"?>
                                <?php if($sl > 0){?>
                                            <a href="<?=$link_pockup?>" class="action quickview add-to-cart" data-link-action="quickview" title="Quick view" data-bs-target="#exampleModal">Thêm vào giỏ hàng</a>
                                            <?php }else{?>
                                                <p class="action quickview add-to-cart" data-link-action="quickview" title="Quick view" data-bs-target="#exampleModal" style=" background-color: #ff7004; color: #ffffff; border-radius: 5px;">Đã hết hàng</p>
                                               
                                            <?php }?>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="index.php?act=product_detail&id_pro=<?= $ma_sp ?>&id_catalog=<?= $ma_lsp ?>"><?= $ten_sp ?></a></h5>
                                <span class="price">
                                    <?php
                                    if ($gia_km == 0) {   ?>
                                        <span class="new fs-5"><?= number_format($gia_sp, 0, '.', '.') . " ₫"?></span>
                                    <?php } else { ?>
                                        <span class="new fs-5 mx-3"><?= number_format($gia_km, 0, '.', '.') . " ₫"?></span>
                                        <span style="text-decoration: line-through; opacity:.5;" class="new"><?= number_format($gia_sp, 0, '.', '.') . " ₫"?></span>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- New Product End -->
