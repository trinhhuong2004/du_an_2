<div class="shop-category-area pb-100px pt-70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                    <?php
                        if (isset($product_sum) && !empty($product_sum)) {
                            // Nếu $product_sum tồn tại và không rỗng, sử dụng foreach cho product_sum
                            foreach ($product_sum as $value) {
                                extract($value);
                                echo '<p>Có '.$sum.' sản phẩm.</p>';
                            }
                        } else {
                            // Cuối cùng, sử dụng foreach cho product
                            foreach ($product_quantity as $value) {
                                extract($value);
                                echo '<p>Có '.$tong.' sản phẩm.</p>';
                            }
                        }
                        ?>
                        <!-- Left Side End -->
                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sắp xếp theo:</p>
                            </div>
                            <div class="shop-select">
                                <select class="shop-sort" onchange="if (this.value) { window.location = this.value; }">
                                    <option value="?act=product_catalog&field=ten_sp&sort=asc" <?php echo ($orderField == 'ten_sp' && $orderSort == 'asc') ? 'selected' : ''; ?>>Tên, A ₫ến Z</option>
                                    <option value="?act=product_catalog&field=ten_sp&sort=desc" <?php echo ($orderField == 'ten_sp' && $orderSort == 'desc') ? 'selected' : ''; ?>>Tên, Z ₫ến A</option>
                                    <option value="?act=product_catalog&field=gia_sp&sort=asc" <?php echo ($orderField == 'gia_sp' && $orderSort == 'asc') ? 'selected' : ''; ?>>Giá, từ thấp ₫ến cao</option>
                                    <option value="?act=product_catalog&field=gia_sp&sort=desc" <?php echo ($orderField == 'gia_sp' && $orderSort == 'desc') ? 'selected' : ''; ?>>Giá, từ cao ₫ến thấp</option>
                                </select>
                            </div>
                           
                        </div>
                        
                        <!-- Right Side End -->
                    </div>


                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <div class="row">
                        <?php
                    $i = 0;
                    foreach ($product as $load_product) {
                        extract($load_product);
                        $img = "upload/" . $hinh_anh;
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" data-aos="fade-up" data-aos-delay="400">
                            <!-- Single Product -->
                            <div class="product mb-25px">
                                <div class="thumb">
                                    <a href="index.php?act=product_detail&id_pro=<?=$ma_sp; ?>" class="image">
                                         <?php 
                                    if ($i == 0 || $i == 2 || $i == 4 || $i == 8 || $i == 10) {
                                        echo '<span class="badges">
                                            <span class="new">Mới</span>
                                        </span>';
                                    } elseif($i == 3 || $i == 5 || $i == 7 || $i == 9){
                                        echo '<span class="badges">
                                        <span class="sale">-5%</span>
                                    <span class="new">New</span>
                                    </span>';
                                    } else{
                                        echo '<span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>';
                                    }
                                    ?>
                                        <img src="<?php echo $img; ?>" alt="Product" />
                                        <img class="hover-image" src="<?php echo $img; ?>" alt="Product" />
                                    </a>
                                    <?php 
                                    if ($i == 0 || $i == 2 || $i == 4 || $i == 8 || $i == 10) {
                                        echo '<span class="badges">
                                            <span class="new">Mới</span>
                                        </span>';
                                    } elseif($i == 3 || $i == 5 || $i == 7 || $i == 9){
                                        echo '<span class="badges">
                                        <span class="sale">-5%</span>
                                    <span class="new">New</span>
                                    </span>';
                                    } else{
                                        echo '<span class="badges">
                                            <span class="sale">-7%</span>
                                        </span>';
                                    }
                                    ?>
                                    <div class="actions">
                                        <a href="#" class="action wishlist" title="Wishlist"><i class="icon-heart"></i></a>
                                        <a href="?act=home&id_pro=<?=$ma_sp; ?>" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen"></i></a>
                                        <a href="#" class="action compare" title="Compare"><i class="icon-refresh"></i></a>
                                    </div>
                                    <?php $link_pockup = "?act=pockup&idpro=$ma_sp"?>
                                            <a href="<?=$link_pockup?>" class="action quickview add-to-cart" data-link-action="quickview" title="Quick view" data-bs-target="#exampleModal">Thêm vào giỏ hàng</a>
                                
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="shop-left-sidebar.html"><?php echo $ten_sp; ?></a></h5>
                                    <span class="price">
                                    <span class="new"><?php echo number_format($gia_sp, 0, '.', '.'); ?> ₫</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                      
                          
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-30px" data-aos="fade-up">
                            <ul>
                                
                                <li>
                                    <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                                </li>
                                <li><a id="page1" href="?act=product_catalog&per_page=6&page=1">1</a></li>
                                <li><a id="page2" href="?act=product_catalog&per_page=6&page=2">2</a></li>
                                <li><a id="page3" href="?act=product_catalog&per_page=6&page=3">3</a></li>

                                <li>
                                    <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                                </li>   
                            </ul>
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                    <div class="shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <div class="main-heading">
                                <h3 class="sidebar-title">Tất cả danh mục</h3>
                            </div>
                            
                            <div class="sidebar-widget-category">
                                
                                <ul>
                                <?php foreach ($product_count as $value) {
                                    echo ' <li><a href="index.php?act=product_catalog" class="selected">Tất cả <span>'.$value['total_count'].'</span> </a></li>';
                                    }?>
                                    <?php
                                    foreach ($product_catalog as $catalog) :?>
                                    <?php extract($catalog);?>    
                                    
                                    
                                    <li><a href="index.php?act=product_catalog&id_lsp=<?=$ma_lsp?>" class=""><?=$ten_lsp?> <span>(<?=$soluong?>)</span> </a></li>
                                    
                                    <?php endforeach?>
                                   
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget-group">
                            <h3 class="sidebar-title">Tìm kiếm</h3>
                            <div class="sidebar-widget">
                                
                                <div class="price-filter">
                                <form method="POST" action="index.php?act=product_catalog" style="position: relative;">
                                    <input style=" height: 30px;" id="search-input" type="text" name="kyw" class="form-control" placeholder="Nhập tìm kiếm sản phẩm">
                                    <button class="search_c search_catalog" style="position: absolute;
                                                                               right:4%;
                                                                               top: 50%;
                                                                               transform: translateY(-50%);                           
                                                                               border: none;
                                                                               outline: none;
                                                                               background-color: transparent;">
                                        <i style="color: #6D757D;" class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>

                                </div>
                                
                            </div>
                            <!-- Sidebar single item -->
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title mt-5">Lọc giá </h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                       
                                            <li>
                                                <div class="sidebar-widget-list-left">
                                                <input id="page1" type="checkbox" /><a href="index.php?act=product_catalog&min_price=0&max_price=250000" class="">Giá từ 0 - 250.000 đ<span></span> </a> </a>
                                                    <span class="checkmark"></span>
                                                </div>
                                                </li>
                                        
                                            <li>
                                                <div class="sidebar-widget-list-left">
                                                <input id="page2" type="checkbox" /><a href="index.php?act=product_catalog&min_price=250000&max_price=500000" class="">Giá từ 250.000 - 500.000 đ<span></span> </a> </a>
                                                    <span class="checkmark"></span>
                                                </div>
                                                </li>
                                            <li>
                                                <div class="sidebar-widget-list-left">
                                                <input id="page3" type="checkbox" /><a href="index.php?act=product_catalog&min_price=500000&max_price=750000" class="">Giá từ 500.000 - 750.000 đ<span></span> </a> </a>
                                                    <span class="checkmark"></span>
                                                </div>
                                                </li>
                                            <li>
                                                <div class="sidebar-widget-list-left">
                                                    <input type="checkbox" /><a href="index.php?act=product_catalog&min_price=750000&max_price=1000000" class="">Giá từ 750.000 - 1.000.000 đ<span></span> </a> </a>
                                                    <span class="checkmark"></span>
                                                </div>
                                                </li>
                                                     
                                                
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar single item -->

                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy tất cả các ô checkbox trong danh sách
        var checkboxes = document.querySelectorAll('.sidebar-widget-list-left input[type="checkbox"]');

        // Thêm sự kiện click cho từng ô checkbox
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('click', function () {
                // Gửi yêu cầu load lại trang khi có sự kiện click
                window.location.href = this.parentElement.querySelector('a').getAttribute('href');
            });
        });
    });
</script>

