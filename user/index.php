<?php
ob_start();
session_start();
include "config/connectdb.php";
include "user/model/product.php";
include "model/product_catalog.php";
include "user/model/comment.php";
include "user/model/checkout.php";
include "user/model/history_order.php";
include "model/account.php";
include "view/header.php";
include "global/global.php";
// Load product - Our product

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
// $list_product = load_product(0);
$list_product = get_all_product();
$best_saleProduct = best_saleProduct();

// Load product discount
$list_product_discount = load_product(1);

if (isset($_GET['act']) && $_GET['act'] != "") {
    switch ($_GET['act']) {
        case 'home':
            if (isset($_GET['id_pro'])) {
                // load product_detail by id_pro
                $productone = getone_product($_GET['id_pro']);
                $productOne = load_detail_product($_GET['id_pro']);
            }
            include "view/home.php";
            break;

        case 'about':
            include "view/about.php";
            break;

        case 'blog':
            include "view/blog.php";
            break;

        case 'contact':
            include "view/contact.php";
            break;
            // Giỏ hàng
        case 'addtocart':
            if (isset($_POST['addtocart'])) {
                $stock = $_POST['quantity_variant'];
                $idpro = $_POST['idpro'];
                $id_variant = $_POST['id_variant'];
                $name = $_POST['name'];
                ($_POST['image_variant']) ? $image = $_POST['image_variant'] : $image = $_POST['imagedefault'];
                ($_POST['price_variant']) ? $price = $_POST['price_variant'] : $price = $_POST['pricedefault'];
                $quantity = $_POST['quantity'];
                $name_color = $_POST['namecolor'];
                $name_size = $_POST['namesize'];
                $total = $price * $quantity;
                $product_exists = false;
                $i = 0;
                foreach ($_SESSION['mycart'] as $item) {
                    if ($item[0] == $idpro && $item[1] == $name && $item[2] == $image && $item[3] == $price && $item[5] == $name_color && $item[6] == $name_size) {
                        $_SESSION['mycart'][$i][4] += $quantity;
                        if ($_SESSION['mycart'][$i][4] > $_SESSION['mycart'][$i][8]) {
                            $_SESSION['mycart'][$i][4] = $_SESSION['mycart'][$i][8];
                        }
                        $product_exists = true;
                        break;
                    }
                    $i++;
                }
            
                if (!$product_exists) {
                    $add_product = [$idpro, $name, $image, $price, $quantity, $name_color, $name_size, $total, $stock, $id_variant];
                    // array_push($_SESSION['mycart'], $add_product);
                    $_SESSION['mycart'][] = $add_product;
                }
                echo '<script>window.location.href = window.location.href;</script>';
            }
            include "view/cart/cart.php";
            break;
        case 'del_cart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
                header('location: index.php?act=viewcart');
            } else {
                header('location: index.php?act=empty_cart');
            }
            // header('Location: index.php?act=viewcart');
            break;
            // case 'checkout':
            //     if (isset($_POST['checkout'])) {
            //         if (isset($_POST['checkout_delivery)'])) {
            //             # code...
            //         } elseif (isset($_POST['redirect'])) {
            //             $tong_gia = "200000";
            //             execPostRequest($url, $data);
            //             include 'view/checkout/checkout_vnpay.php';
            //         } elseif (isset($_POST['payUrl'])) {
            //             $tong_gia = "200000";
            //             execPostRequest($url, $data);
            //             include 'view/checkout/checkout_momo.php';
            //         }
            //     }
            //     break;
        case 'payment':
            if (isset($_POST['checkout']) && $_POST['checkout']) {
                $total_order = $_POST['totalorder'];
                $id_user = $_POST['id_user'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];
                $id_order = 'LTH' . rand(0, 999999);
                $note = $_POST['note'];
                $date_create = date('Y-m-d H:i:s');
                if (isset($_POST['cod'])) {
                    $method_pay = $_POST['cod'];
                } else if (isset($_POST['redirect'])) {
                    $method_pay = $_POST['redirect'];
                } else if (isset($_POST['payUrl'])) {
                    $method_pay = $_POST['payUrl'];
                }
                $_SESSION['order_info'] = [$total_order, $id_user, $name, $address, $telephone, $email, $id_order, $note, $date_create, $method_pay];

                if (isset($_POST['cod'])) {
                    echo "<script> window.location.href='index.php?act=bill_success';</script>";
                } else if (isset($_POST['redirect'])) {
                    // execPostRequest($url, $data);
                    include 'view/checkout/checkout_vnpay.php';
                } else if (isset($_POST['payUrl'])) {
                    // execPostRequest($url, $data);
                    include 'view/checkout/checkout_momo.php';
                }
            }
            // include "view/checkout/bill_checkout.php";
            break;
        case 'bill_success':
            if (isset($_SESSION['order_info']) && !empty($_SESSION['order_info']) && isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
                $order_info = $_SESSION['order_info'];

                // Tạo đơn hàng
                // $item = [$idpro, $name, $image, $price, $quantity, $name_color, $name_size, $total]
                $create_order_id = create_order($order_info[6], $order_info[0], $order_info[1], $order_info[2], $order_info[3], $order_info[4], $order_info[5], $order_info[9], $order_info[7], $order_info[8]);
                $_SESSION['id_order'] = $create_order_id;
                // Lấy từ checkout_info
                foreach ($_SESSION['select_cart'] as $key) {
                    $cart_product = $_SESSION['mycart'][$key];
                    // Thêm vào đơn hàng chi tiết
                    $total_price_pro = $cart_product[4] * $cart_product[3];
                    add_order_detail($create_order_id, $cart_product[0], $cart_product[1], $cart_product[2], $cart_product[5], $cart_product[6], $cart_product[4], $total_price_pro);
                    // reduce_quantity_pro($cart_product[0], $cart_product[4]);
                    if (isset($_SESSION['mycart'][$key])) {
                        unset($_SESSION['mycart'][$key]);
                    }
                }
            }
            include 'view/checkout/bill_success.php';
            break;
        case 'pockup':
            if (isset($_GET['idpro']) && $_GET['idpro'] > 0) {
                // load product_detail by id_pro
                $check_variant = check_variant($_GET['idpro']);
                $one_variant = get_one_product($_GET['idpro']);
                $one_product = get_one_product($_GET['idpro']);
                $get_color_size = get_color_size($_GET['idpro']);

                $img_product = load_img_by_idpro(($_GET['idpro']));
            }
            include 'view/pockup.php';
            break;
        case 'viewcart':
            // $id_variant = $_POST['id_variant'];
            // echo $id_variant;
            // $update_quantity = updateCartFromDatabase($id_variant);
            // foreach($_SESSION['mycart'] as $key => $cart) {
            //     echo $cart[9];
            // }
            include 'view/cart/cart.php';
            break;

        case 'empty_cart':
            include 'view/cart/empty_cart.php';
            break;

            // checkout 
        case 'checkout_info':
            if (isset($_POST['process_pay'])) {
                $select_product = $_POST['select_product'];
                $_SESSION['select_cart'] = $select_product;
            }
            // if (isset($_POST['checkout'])) {
            //     $one_account = getOne_account($_SESSION['id_account']);
            // }
            include 'view/checkout/checkout_info.php';
            break;

            // Bill checkout
        case 'bill_checkout':
            include 'view/checkout/bill_checkout.php';
            break;

            // Begin-> Account
        case 'account':
            include "view/account.php";
            break;

        case 'register':
            if (isset($_POST['add_account'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $full_name = $username;
                $pass = $_POST['pass'];
                // add_account($full_name, $email, $username, $pass);
                $message = add_account($full_name, $email, $username, $pass);
            }
            include "view/account/register.php";
            break;

        case 'login':
            if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $check_account = check_account($username, $pass);
                if (is_array($check_account)) {
                    if ($check_account['trang_thai'] == 1) {
                        if ($check_account['vai_tro'] == 1) {
                            $_SESSION['account'] = $check_account;
                            echo "<script> window.location.href='./admin/index.php';</script>";
                        } else {
                            echo "<script> window.location.href='index.php?act=home';</script>";
                            $_SESSION['account'] = $check_account;
                            $_SESSION['id_account'] = $check_account['ma_nd'];
                        }
                    } else {
                        $message = "Tài khoản đã bị khóa";
                    }
                } else {
                    $message = "Sai tài khoản hoặc mật khẩu";
                }
            }
            include "view/account/login.php";
            break;

        case 'edit_account':
            if (isset($_POST['update'])) {
                $full_name = $_POST['full_name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $telephone = $_POST['telephone'];
                $id = $_POST['id'];

                update_account($id, $full_name, $gender, $email, $address, $telephone);
                $getOne_account = getOne_account($id);
                $_SESSION['account'] = $getOne_account;
                $message = "Đã cập nhật thành công!";
            }
            include "view/account/edit_account.php";
            break;

        case 'forgot_pass':
            if (isset($_POST['send_email'])) {
                $email = $_POST['email'];
                $message = check_email($email);
            }
            include "view/account/forgot_pass.php";
            break;

        case 'logout':
            session_unset();
            echo "<script> window.location.href='index.php?act=login';</script>";
            break;

        case 'change_pass':
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $pass = $_POST['pass'];
                $newPass = $_POST['newpass'];
                $newRepass = $_POST['newrepass'];

                $check_account = check_account("", $pass);
                if ($check_account) {
                    if ($newPass === $newRepass) {
                        $_SESSION['account'] = $check_account;
                        update_password($id, $newPass);
                        $message = '<p class="alert alert-success">Đổi mật khẩu thành công</p>';
                    } else {
                        $message = '<p class="alert alert-danger">Mật khẩu không trùng khớp!</p>';
                    }
                } else {
                    $message = '<p class="alert alert-danger">Mật khẩu không chính xác!</p>';
                }
            }
            include "view/account/edit_account.php";
            break;
            // End-> Account        



        case 'list_history_order':
            if (isset($_GET['id_account']) && $_GET['id_account'] > 0) {
                $list_his_order = list_history_order($_GET['id_account']);
            }
            include "view/history_order/list_history_order.php";
            break;

        case 'detail_history':
            if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                $list_his_detail = list_his_detail($_GET['id_order']);
                $list_his_order = list_one_history_order($_GET['id_account'], $_GET['id_order']);
            }
            include "view/history_order/detail_history.php";
            break;

        case 'update_status_order':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id_order = $_POST['id_order'];
                $status = $_POST['status'];
                update_status($id_order, $status);
                echo '<script>window.location.href="index.php?act=list_history_order&id_account=' . $_SESSION['account']['ma_nd'] . '"</script>';
            }
            include "view/history_order/detail_history.php";
            break;

        case 'contact':
            include "view/contact.php";
            break;

        case 'product_detail':
            // add comment
            if (isset($_POST['add_comment'])) {
                $noi_dung = $_POST['comment'];
                if (isset($_SESSION['account'])) {
                    insert_comment($_GET['id_pro'],  $_SESSION['account']['ma_nd'], $noi_dung);
                } else {
                    $message_noLogin = "Bạn chưa đăng nhập - Vui lòng đăng nhập để thực hiện bình luận";
                }
                echo '<script>window.location.href = window.location.href;</script>';
            }

            if (isset($_GET['id_pro'])) {
                $check_variant = check_variant($_GET['id_pro']);
                $one_variant = get_one_product($_GET['id_pro']);
                $one_product = get_one_product($_GET['id_pro']);
                $get_color_size = get_color_size($_GET['id_pro']);

                $img_product = load_img_by_idpro(($_GET['id_pro']));
                // load product_detail by id_pro
                $product_detail = load_detail_product($_GET['id_pro']);

                // load img
                $list_img_pro = load_img_by_idpro(($_GET['id_pro']));

                // load color size
                $one_color_size = load_color_size($_GET['id_pro']);

                // load comments by id_pro
                $product_comment = load_comment($_GET['id_pro']);

                // load product in the same catalog
                $similar_products = similar_products($product_detail['ma_lsp']);

                // load 10 prouct most view
                $view_most_product = view_most_product();

                //count comment
                $count_comment = count_comment_by_idpro($_GET['id_pro']);
                include "view/product_detail.php";
            }
            break;
        //     case 'search_product':
        //         if(isset($_POST['search'])){
        //             if (isset($_GET['id_lsp'])) {
        //                 $id = $_GET['id_lsp'];
        //                 $orderCondition = "";
        //                 $orderField = isset($_GET['field']) ? $_GET['field'] : "";
        //                 $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
        //                 if (!empty($orderField) && !empty($orderSort)) {
        //                     $orderCondition = "ORDER BY `".$orderField."` ".$orderSort;
        //                 }
        //                 $product_sum = product_sum($id);

        //                 $product = getAll_product($_GET['id_lsp'],$orderCondition);
        //             } else {
        //                 $orderCondition = "";
        //                 $orderField = isset($_GET['field']) ? $_GET['field'] : "";
        //                 $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
    
        //                 if (!empty($orderField) && !empty($orderSort)) {
        //                     $orderCondition = "ORDER BY `".$orderField."` ".$orderSort;
        //                 }
        //                 $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
        //                 $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        //                 $offset = ($current_page - 1) * $item_per_page;
    
        //                 if(isset($_POST['kyw']) && ($_POST['kyw'] != "" )){
        //                     $kyw = $_POST['kyw'];
                            
        //                 }else{
        //                     $kyw = "";
        //                 }
        //                 if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    
        //                     $min_price = intval($_GET['min_price']);
        //                     $max_price = intval($_GET['max_price']);
                            
        //                 }else {
        //                     $min_price = 0;
        //                     $max_price = PHP_INT_MAX;
        //                 }
        
                
        //                 $product = loadAll_product($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);

        //             }
        //         }
        //         $product_catalog = getAll_product_catalog();
        //         $product_count = product_Count();
                

        //         include "view/product_catalog.php";
        //         break;
            

        // case 'product_catalog':
        //     if (isset($_GET['id_lsp'])) {
        //         $id = $_GET['id_lsp'];
        //         $orderCondition = "";
        //         $orderField = isset($_GET['field']) ? $_GET['field'] : "";
        //         $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
        //         if (!empty($orderField) && !empty($orderSort)) {
        //             $orderCondition = "ORDER BY `" . $orderField . "` " . $orderSort;
        //         }
        //         $product_sum = product_sum($id);
        //         $product = getAll_product($_GET['id_lsp'], $orderCondition);
        //     } else {
        //         $orderCondition = "";
        //         $orderField = isset($_GET['field']) ? $_GET['field'] : "";
        //         $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

        //         if (!empty($orderField) && !empty($orderSort)) {
        //             $orderCondition = "ORDER BY `" . $orderField . "` " . $orderSort;
        //         }
        //         $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
        //         $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        //         $offset = ($current_page - 1) * $item_per_page;
        //         if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    
        //             $min_price = intval($_GET['min_price']);
        //             $max_price = intval($_GET['max_price']);
                    
        //         }else {
        //             $min_price = 0;
        //             $max_price = PHP_INT_MAX;
        //         }



        //         if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
        //             $kyw = $_POST['kyw'];
        //         } else {
        //             $kyw = "";
        //         }
                
        //         $product = loadAll_product($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);
        //     }
          
        //     $product_catalog = getAll_product_catalog();

        //     $product_count = product_Count();

        //     include "view/product_catalog.php";
        //     break;
        case 'search_product':
            if(isset($_POST['search'])){
                if (isset($_GET['id_lsp'])) {
                    $id = $_GET['id_lsp'];
                    $orderCondition = "";
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    if (!empty($orderField) && !empty($orderSort)) {
                        $orderCondition = "ORDER BY `".$orderField."` ".$orderSort;
                    }
                    $product_sum = product_sum($id);

                    $product = getAll_product($_GET['id_lsp'],$orderCondition);
                } else {
                    $orderCondition = "";
                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

                    if (!empty($orderField) && !empty($orderSort)) {
                        $orderCondition = "ORDER BY `".$orderField."` ".$orderSort;
                    }
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $item_per_page;

                    if(isset($_POST['kyw']) && ($_POST['kyw'] != "" )){
                        $kyw = $_POST['kyw'];
                        
                    }else{
                        $kyw = "";
                    }
                    if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    
                    $min_price = intval($_GET['min_price']);
                    $max_price = intval($_GET['max_price']);
                    
                }else {
                    $min_price = 0;
                    $max_price = PHP_INT_MAX;
                }
            
                    $product = loadAll_product($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);
                    $product_quantity = loadAll_product_sum($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);

                }
            }
            $product_catalog = getAll_product_catalog();
            $product_count = product_Count();
            include "view/product_catalog.php";
            break;
        

    case 'product_catalog':
        if (isset($_GET['id_lsp'])) {
            $id = $_GET['id_lsp'];
            $orderCondition = "";
            $orderField = isset($_GET['field']) ? $_GET['field'] : "";
            $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
            if (!empty($orderField) && !empty($orderSort)) {
                $orderCondition = "ORDER BY `" . $orderField . "` " . $orderSort;
            }
            $product_sum = product_sum($id);
            $product = getAll_product($_GET['id_lsp'], $orderCondition);
        } else {
            $orderCondition = "";
            $orderField = isset($_GET['field']) ? $_GET['field'] : "";
            $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

            if (!empty($orderField) && !empty($orderSort)) {
                $orderCondition = "ORDER BY `" . $orderField . "` " . $orderSort;
            }
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $item_per_page;

            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
             if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    
                    $min_price = intval($_GET['min_price']);
                    $max_price = intval($_GET['max_price']);
                    
                }else {
                    $min_price = 0;
                    $max_price = PHP_INT_MAX;
                }

            $product = loadAll_product($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);
            $product_quantity = loadAll_product_sum($item_per_page, $offset, $orderCondition, $kyw,$min_price,$max_price);
        }

        $product_catalog = getAll_product_catalog();
        $product_count = product_Count();

        include "view/product_catalog.php";
        break;

        

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";