<?php
session_start();
include '../config/connectdb.php';
include '../global/global.php';
include 'model/catalog.php';
include "model/comment.php";
include "model/account.php";
include "model/product.php";
include "model/voucher.php";
include "model/statistical.php";
include "model/order.php";
include 'view/header.php';
$statistical_product_seling = statistical_product_seling();
$statistical_category = statistical_category();
$statistical_Popular = statistical_Popular();
$statistical_sale = statistical_sale(date('Y-m-d', time() - (86400 * 7)), date('Y-m-d', time()));
$sum_Oder = sum_Oder();
$sum_view = sum_view();

?>

   <?php
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
           case 'home':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
                $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
                $choose_time = isset($_POST['choose_time']) ? $_POST['choose_time'] : null;
            
                $statistical_sale = statistical_sale($start_date, $end_date, $choose_time);
            }
            
            // if (isset($_GET['search']) && ($_GET['search'])) {
            //     $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : null;
            //     $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : null;
            //     $choose_time = isset($_GET['choose_time']) ? $_GET['choose_time'] : null;
            
            //     $statistical_sale = statistical_sale($start_date, $end_date, $choose_time);
            // }
            
            
           //$statistical_sale = statistical_sale();

            include 'view/home.php';
            break;

                // Catalog
            case 'list_catalog':
                $list_catalog = list_catalog();
                include '../admin/view/catalog/list_catalog.php';
                break;
            case 'add_catalog':
                if (isset($_POST['add_catalog'])) {
                    $name_catalog = $_POST['name_catalog'];
                    add_catalog($name_catalog);
                    echo "<script> window.location.href='index.php?act=list_catalog';</script>";
                }
                include '../admin/view/catalog/add_catalog.php';
                break;
            case 'update_catalog':
                if (isset($_GET['id_catalog'])) {
                    $catalog = getone_catalog($_GET['id_catalog']);
                }

                if (isset($_POST['update_catalog'])) {
                    $id_catalog = $_POST['id_catalod'];
                    $name_catalog = $_POST['name_catalog'];
                    $status_catalog = $_POST['status_catalog'];
                    update_catalog($id_catalog, $name_catalog, $status_catalog);
                    echo "<script> window.location.href='index.php?act=list_catalog';</script>";
                }
                include '../admin/view/catalog/update_catalog.php';
                break;
            case 'delete_catalog':
                if (isset($_GET['id_catalog'])) {
                    $count_catalog=count_catalog($_GET['id_catalog']);
                    if ($count_catalog['soluong']>0) {
                        $list_catalog = list_catalog();
                        $message_noDelete='<h6 class="alert alert-danger">Danh mục vẫn chứa sản phẩm, không thể xoá.</h6>';
                        include '../admin/view/catalog/list_catalog.php';
                    } else {
                        delete_catalog($_GET['id_catalog']);
                        echo "<script> window.location.href='index.php?act=list_catalog';</script>";
                    }
                }
                break;          
            case 'search_catalog':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name_catalog = $_POST['name_catalog'];
                    $list_catalog = search_catalog($name_catalog);
                }
                include '../admin/view/catalog/list_catalog.php';
                break;

            // Product_atribute
            case 'list_atribute':
                if (isset($_POST['btn_search']) && $_POST['btn_search']) {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $list_atribute = get_all_atribute($keyword,$_GET['id']);
                }
                include 'view/product/list_atribute.php';
                break;
            
            case 'add_atribute':
                $product_one = getone_product($_GET['id']);
                if (isset($_POST['add_variant'])) {
                    $ma_sp = $_POST['ma_sp'];
                    $product = getone_product($ma_sp);
                    $ma_mau = $_POST['ma_mau'];
                    $ma_kich_co = $_POST['ma_kich_co'];
                    $gia_sp = $_POST['gia_sp'];
                    $gia_km = $_POST['gia_km'];
                    $so_luong = $_POST['so_luong'];
                    $mo_ta = $_POST['mo_ta'];
                    $hinh_anh = $_FILES['hinh_anh']['name'];

                        $check_variant = check_query($ma_sp, $ma_mau, $ma_kich_co);
                        if ($check_variant) {
                            $message = "Thuộc tính sản phẩm đã tồn tại!"; 
                        } else {
                            $file_name = $dir_img .time() .basename($hinh_anh);
                            move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $file_name);
                            add_atribute($ma_sp, $ma_mau, $ma_kich_co, $gia_sp, $gia_km, $file_name, $so_luong, $mo_ta);
                            echo "<script> window.location.href='index.php?act=list_atribute&id=$ma_sp';</script>";
                        }
                }
                $list_product = get_product();
                $list_color = get_all_color();
                $list_size = get_all_size();
                include 'view/product/add_atribute.php';
                break;
            case 'del_atribute':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $one_attribute=getone_atribute($_GET['id']);
                    $ma_sp=$one_attribute['ma_sp'];
                    del_atribute($_GET['id']);
                    $list_product = get_all_product();
                    echo "<script> window.location.href='index.php?act=list_atribute&id=$ma_sp';</script>";
                }
                break;
            case 'edit_atribute':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $atribute_one = getone_atribute($_GET['id']);
                }
                // $list_product = get_all_product($keyword);
                $list_color = get_all_color();
                $list_size = get_all_size();
                include 'view/product/update_atribute.php';
                break;

            // Product
            case 'list_product':
                if (isset($_POST['btn_search']) && $_POST['btn_search']) {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
                
                $list_product = get_product($keyword);
                include 'view/product/list_product.php';
                break;
            case 'add_product':
                if (isset($_POST['add_new'])) {
                    $ma_lsp = $_POST['id_catalog'];
                    $ten_sp = $_POST['name'];
                    
                    add_product($ma_lsp, $ten_sp);
                    $message = "Thêm thành công!";
                    echo "<script> window.location.href='index.php?act=list_product';</script>";
                }
                $list_catalog = list_catalog();
                include 'view/product/add_product.php';
                break;
            case 'edit_product':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $product_one = getone_product($_GET['id']);
                }
                $list_catalog = list_catalog();
                include 'view/product/update_product.php';
                break;
            case 'update_atribute':
                if (isset($_POST['update_atribute'])) {
                    $ma_sp = $_POST['ma_sp'];
                    $ma_bien_the = $_POST['ma_bien_the'];
                    $ma_mau = $_POST['ma_mau'];
                    $ma_kich_co = $_POST['ma_kich_co'];
                    $gia_sp = $_POST['gia_sp'];
                    $gia_km = $_POST['gia_km'];
                    $so_luong = $_POST['so_luong'];
                    $mo_ta = $_POST['mo_ta'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $file_name = $dir_img .time() .basename($hinh_anh);
                    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $file_name);

                    // $file_name: tên ảnh từ upload, $hinh_anh: tên ảnh nhập từ form
                    update_atribute($ma_bien_the, $ma_mau, $ma_kich_co, $gia_sp, $gia_km, $so_luong, $mo_ta, $file_name, $hinh_anh);
                }
                echo "<script> window.location.href='index.php?act=list_atribute&id=$ma_sp';</script>";
                include 'view/product/update_atribute.php';
                break;
            case 'update_product':
                if (isset($_POST['update'])) {
                    $ma_sp = $_POST['id'];
                    $ma_lsp = $_POST['id_catalog'];
                    $ten_sp = $_POST['name'];

                    update_product($ma_sp, $ma_lsp, $ten_sp);
                }
                echo "<script> window.location.href='index.php?act=list_product';</script>";
                include 'view/product/update_product.php';
                break;
            case 'del_product':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    del_product($_GET['id']);
                }
                $list_product = get_product();
                include 'view/product/list_product.php';
                break;


                // Account
                case 'list_account':
                    if (isset($_POST['search']) && $_POST['search']) {
                        $keyword = $_POST['keyword'];
                    } else {
                        $keyword = "";
                    }
                    $list_account = getAll_account($keyword);
                    include '../admin/view/account/list_account.php';
                    break;

                case 'edit_account':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $getone_account = getone_account($_GET['id']);
                    }
                    $list_account = getAll_account();
                    include 'view/account/update_account.php';
                    break;

                case 'update_account':
                    if (isset($_POST['update'])) {
                        $id_user = $_POST['id_user'];
                        $role = $_POST['role'];
                        $status = $_POST['status'];
    
                        update_account($id_user, $role, $status);
                    }
                    echo "<script> window.location.href='index.php?act=list_account';</script>";
                    include 'view/product/update_account.php';
                    break;
                
                case 'logout':
                    session_unset();
                    echo "<script> window.location.href='../index.php?act=login';</script>";
                    break;

                case 'del_account':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        del_account($_GET['id']);
                    }
                    $list_account = getAll_account();
                    include 'view/account/list_account.php';
                    break;
                // case 'add_account':
                //     if (isset($_POST['add_account'])) {
                //         $name = $_POST['name'];
                //         $gender = $_POST['gender'];
                //         $phone = $_POST['phone'];
                //         $email = $_POST['email'];
                //         $address = $_POST['address'];
                //         $name_acount = $_POST['name_acount'];
                //         $password = $_POST['password'];
                //         $permission = $_POST['permission'];
                //         $status = $_POST['status'];
                //         insert_account($name, $gender, $phone, $email, $address, $name_acount, $permission, $status);
    
                //         $thongbao = "Thêm thành công";         
                //     }
                //     include '../admin/view/account/add_account.php';
                //     break;
                // Comment
            case 'list_cmt':
                $list_cmt = list_comment();
                include '../admin/view/comment/list_cmt.php';
                break;
            
            case 'detail_cmt':
                if(($_GET['id_cmt']) && ($_GET['id_cmt']>0)){
                    $id = $_GET['id_cmt'];
                    $list_cmt_detail = loadAll_comment($id);
                }
                include '../admin/view/comment/detail_cmt.php';
                break;
            case 'delete_cmt':
                if(($_GET['id_cmt']) && ($_GET['id_cmt']>0)){
                    $id = $_GET['id_cmt'];
                    delete_commet($id);
                }
                $list_cmt_detail = loadAll_comment(0);
                include '../admin/view/comment/detail_cmt.php';
                break;

                // Staff
          

                // Begin-order
            case 'list_order':
                $list_order = list_order();
                include '../admin/view/order/list_order.php';
                break;

            case 'list_order_search':
                if (isset($_POST['btn_search']) && $_POST['btn_search']) {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = "";
                }
                $list_order = list_order_search($keyword);
             include '../admin/view/order/list_order.php';

            break;
            case 'edit_order':
                if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                    $get_one_order = get_one_order($_GET['id_order']);
                }
                $list_order = list_order();
                include '../admin/view/order/update_order.php';
                break;
            case 'update_order':
                if (isset($_POST['update'])) {
                    $id_order = $_POST['idorder'];
                    $status = $_POST['status'];

                    update_order($id_order, $status);
                }
                echo "<script>window.location.href='index.php?act=list_order'</script>";
                break;
            case 'detail_order':
                if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                    $get_one_order = get_one_order($_GET['id_order']);
                    $detail_order = detail_order($_GET['id_order']);
                }
                include '../admin/view/order/detail_order.php';
                break;    


                // Thống kê 
            case 'statistical':
                $statistical_category = statistical_category();
                
                include '../admin/view/statistical/statistical.php';
                break;
            case 'statistical_sale':
                $statisticalDate_ago = statisticalDate_ago();
                
                include '../admin/view/statistical/statistical_sale.php';
                break;
            case 'statistical_Popular':
                $statistical_Popular = statistical_Popular();
                
                include '../admin/view/statistical/statistical_Popular.php';
                break;
            case 'product_chart':
                $statistical_product_seling = statistical_product_seling();
                include '../admin/view/statistical/product_chart.php';
                break;

            case 'delete_order':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    delete_order($_GET['id']);
                    echo "<script> window.location.href='index.php?act=list_order';</script>";
                }
                include '../admin/view/order/list_order.php';
                break;
                // End- order

                // voucher
            case 'list_voucher':
                $list_voucher = list_voucher();
                include 'view/voucher/list_voucher.php';
                break;
            case 'add_voucher':
                if (isset($_POST['add_voucher'])) {
                    $name_voucher = $_POST['name_voucher'];
                    $discount = $_POST['discount'];
                    $quantity = $_POST['quantity'];
                    add_voucher($name_voucher, $discount, $quantity);
                    echo "<script> window.location.href='index.php?act=list_voucher';</script>";
                }
                include 'view/voucher/add_voucher.php';
                break;
            case 'update_voucher':
                if (isset($_GET['id_voucher'])) {
                    $voucher = get_one_voucher($_GET['id_voucher']);
                }

                if (isset($_POST['update_voucher'])) {
                    $id_voucher = $_POST['id_voucher'];
                    $name_voucher = $_POST['name_voucher'];
                    $discount = $_POST['discount'];
                    $quantity = $_POST['quantity'];
                    $status = $_POST['status'];
                    update_voucher($id_voucher, $name_voucher, $discount, $quantity, $status);
                    echo "<script> window.location.href='index.php?act=list_voucher';</script>";
                }
                include 'view/voucher/update_voucher.php';
                break;

            case 'delete_voucher':
                if (isset($_GET['id_voucher'])) {
                    delete_voucher($_GET['id_voucher']);
                    echo "<script> window.location.href='index.php?act=list_voucher';</script>";
                }
                break;
        }
    } else {
        include 'view/home.php';
    }
    ?>
    
<?php
include 'view/footer.php';
?>