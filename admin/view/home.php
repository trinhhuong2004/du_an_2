<head>
    <style>
    .card h3 {
        color: #333;
        padding: 15px 0px 0px 20px;
    }

    .card form {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        /* flex-direction: row;
        gap: 10px;
        width: 100%;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto; */
        padding: 0px 10px 20px; 
    }

    .card h5 {
        color: #333;
        margin-bottom: 5px;
    }
    .flex-betwent a{
        margin-left: 300px;
        padding: 10px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .flex-betwent a:hover{
        background-color: #2980b9;
        color: #fff;

    }

    .card input[type="date"],
    .card input[type="week"],
    .card input[type="month"],
    .card select {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 5px 0;
    }

    .card input[type="submit"] {

        padding: 10px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .card input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .card .chart {
        height: 360px;
    }
    </style>
</head>
<div class="wrapper" >
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right hide-phone">

                    </div>
                    <h4 class="page-title">Bảng điều khiển</h4>
                    <div class="btn-group mt-2">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item active">Bảng điều khiển</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="fas fa-tasks text-gradient-success"></i>
                                        </div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">Tổng đơn hàng</h5>
                                            <h5 class="mt-0 mb-1"><?php echo $sum_Oder[0]['so_don_hang_da_giao']?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body justify-content-center">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="far fa-gem text-gradient-danger"></i>
                                        </div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">Dự án</h5>
                                            <h5 class="mt-0 mb-1">1</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="fas fa-users text-gradient-warning"></i>
                                        </div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">Thành viên</h5>
                                            <h5 class="mt-0 mb-1">3</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <i class="fa-regular fa-eye text-gradient-primary"></i>
                                        </div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">Tổng lượt xem</h5>
                                            <h5 class="mt-0 mb-1"><?php echo $sum_view[0]['tong_luot_xem']?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h3>Thống kê doanh thu đơn hàng</h3>
                        <form action="index.php?act=home" method="POST">
                            <h5>Chọn thời gian:</h5>
                            <input type="date" name="start_date">
                            <input type="date" name="end_date">
                            <select name="choose_time" id="">
                                <option value="year">Năm</option>
                                <option value="month">Tháng</option>
                                <option value="week">Tuần</option>
                                <option value="date">Ngày</option>
                            </select>
                            <div class="flex-betwent ">
                            <input type="submit" value="Lọc" name="search">
                            <a href="?act=statistical_sale" class="btn btn-warning">Xem Chi tiết</a>
                            </div>

                        </form>
                        
                    </div>

                    <div style="height: 300px;" id="chart"></div>
                    <script>
                    CKEDITOR.replace('thongtinlienhe');
                    CKEDITOR.replace('tomtat');
                    CKEDITOR.replace('noidung');

                    $(document).ready(function() {
                            <?php
                               //$statistical_sale = statistical_sale();
                                $chartData = [];
                              
                                    foreach ($statistical_sale as $value) {
                                        extract($value);
                                        $chartData[] = [
                                            'year' => $date, // Thay 'year' bằng trường trong $value chứa thông tin năm
                                            'order' => $so_luong_don_hang, // Thay 'order' bằng trường trong $value chứa thông tin đơn hàng
                                            'sales' => $doanh_thu, // Thay 'sales' bằng trường trong $value chứa thông tin doanh thu
                                            'quantity' => $so_luong_ban_ra, // Thay 'quantity' bằng trường trong $value chứa thông tin số lượng bán ra
                                        ];
                                    }
                                
                              
                            ?>

                        new Morris.Area({
                            element: 'chart',
                            data: <?php echo json_encode($chartData); ?>,
                            xkey: 'year',
                            ykeys: ['order', 'sales', 'quantity'],
                            labels: ['Đơn hàng', 'Doanh thu', 'Số lượng bán ra'],
                            lineColors: ['#3498db', '#2ecc71', '#e74c3c'],
                            lineWidth: 2,
                            pointSize: 4,
                            hideHover: 'auto',
                            parseTime: false,
                            behaveLikeLine: true,
                            fillOpacity: 0.2,
                            stacked: true,
                            smooth: false
                        });
                    });
                    </script>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown d-inline-block float-right">
                            <a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4">
                                <a class="dropdown-item" href="#">Create Project</a>
                                <a class="dropdown-item" href="#">Open Project</a>
                                <a class="dropdown-item" href="#">Tasks Details</a>
                            </div>
                        </div>
                        <h5 class="header-title mb-4 mt-0">Hoạt động</h5>
                        <div>
                            <div id="myChart" style="width:300px; height:200px;">

                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Tên sản phẩm', 'Số lượng bán', 'Doanh thu'],
                                        <?php
                                            foreach ($statistical_Popular as $tk){
                                                extract($tk);
                                                echo "['".$tk['ten_sp']."', ".$tk['so_luong_ban'].", ".$tk['doanh_thu']."],";
                                            }
                                        ?>
                                    ]);

                                    var options = {
                                        title: 'Thống kê sản phẩm phổ biến nhất',
                                        bars: 'vertical',
                                        series: {
                                            0: { targetAxisIndex: 0 }, // Số lượng bán
                                            1: { targetAxisIndex: 1 }  // Doanh thu
                                        },
                                        axes: {
                                            y: {
                                                0: {label: 'Số lượng bán'},
                                                1: {label: 'Doanh thu'}
                                            }
                                        },
                                        vAxes: {
                                            0: {title: 'Số lượng bán'},
                                            1: {title: 'Doanh thu'}
                                        },
                                        is3D: true
                                    };

                                    var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
                                    chart.draw(data, options);
                                }
                            </script>

                            </div>
                            <ul class="list-unstyled list-inline text-center mb-0 mt-3">
                                <li class="mb-2 list-inline-item text-muted font-13">
                                    <i
                                        class="mdi mdi-label text-success mr-2"></i><?= $statistical_Popular[0]['ten_sp'] ?>
                                </li>
                                <li class="mb-2 list-inline-item text-muted font-13">
                                    <i
                                        class="mdi mdi-label text-danger mr-2"></i><?= $statistical_Popular[1]['ten_sp'] ?>
                                </li>
                                <li class="mb-2 list-inline-item text-muted font-13">
                                    <i
                                    class="mdi mdi-label text-warning mr-2"></i><?php echo isset($statistical_Popular[2]['ten_sp']) ? $statistical_Popular[2]['ten_sp'] : "";  ?>

                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <p class="mb-0 text-muted font-13">
                                        <i class="mdi mdi-album mr-2 text-warning"></i>Sản phẩm phổ biến nhất
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0 text-muted font-13">
                                        <i class="mdi mdi-album mr-2 text-danger"></i>Mục tiêu sản phẩm phổ biến
                                    </p>
                                </div>
                            </div>
                            <div class="progress bg-gradient1 mb-3" style="height:5px;">
                                <div class="progress-bar bg-gradient3" role="progressbar" style="width: 65%"
                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <a href="?act=statistical_Popular" class="btn btn-primary btn-sm btn-block text-white">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-between my-md-2 my-2 ">
                    <h3 class="fs-1">Thống kê sản phẩm bán chạy </h3>


                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 8%;" scope="col">Mã sản phẩm</th>
                            <th style="width: 14%;" scope="col">Tên sản phẩm</th>
                            <th style="width: 8%;" scope="col">Hình ảnh</th>
                            <th style="width: 10%;" scope="col">Số lần bán</th>
                            <th style="width: 14%;" scope="col">Số lượng bán</th>
                            <th style="width: 10%;" scope="col">Thành tiền</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistical_product_seling as $value) {
                      
                            extract($value);
                            $target_file = $dir_img .$hinh_anh;
                            if (is_file($target_file)) {
                                $img = '<img src="'.$target_file.'" alt="No photo" height="50">';
                            } else {
                                $img = "No photo";
                            }
                            echo '<tr>
                                    <td class="text-center">' . $ma_sp . '</td>
                                    <td class="text-center">' . $ten_sp . '</td>
                                    <td class="text-center">' . $img . '</td>
                                    <td class="text-center">' . $so_lan_ban . '</td>
                                    
                                    <td class="text-center">' . $so_luong_ban . '</td>
                                    <td class="text-center">' .number_format($thanh_tien, 0, '.', '.').  '</td>
                               
     
                                </tr>';
                                
                        } ?>

                    </tbody>
                </table>
                <a href="?act=product_chart" class="btn btn-warning">Xem biểu đồ</a>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-between my-md-2 my-2 ">
                    <h3 class="fs-1">Thống kê sản phẩm theo danh mục </h3>


                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10%;" scope="col">Mã loại</th>
                            <th style="width: 18%;" scope="col">Tên sản phẩm</th>
                            <th style="width: 12%;" scope="col">Số lượng</th>
                            <th style="width: 12%;" scope="col">Giá Min</th>
                            <th style="width: 12%;" scope="col">Giá Max</th>
                            <th style="width: 18%;" scope="col">Giá Trung bình</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistical_category as $value) {
                      
                            extract($value);

                            echo '<tr>
                                    <td class="text-center">' . $ma_lsp . '</td>
                                    <td class="text-center">' . $ten_lsp . '</td>
                                    <td class="text-center">' . $so_luong . '</td>
                                    <td class="text-center">' . number_format($gia_min, 0, '.', '.') . '</td>
                                    <td class="text-center">' . number_format($gia_max, 0, '.', '.') . '</td>
                                    <td class="text-center">' . number_format($gia_avg, 0, '.', '.') . '</td>
     
                                </tr>';
                                
                        } ?>

                    </tbody>
                </table>
                <a href="?act=statistical" class="btn btn-warning">Xem biểu đồ</a>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>