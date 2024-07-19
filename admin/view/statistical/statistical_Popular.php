<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2 ">
                    <h3 class="fs-1">Thống kê sản phẩm phổ biến nhất </h3>
                    
    
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10%;" scope="col">Mã sản phẩm</th>
                            <th style="width: 16%;" scope="col">Tên sản phẩm</th>
                            <th style="width: 8%;" scope="col">Hình ảnh</th>
                            <th style="width: 10%;" scope="col">Lượt xem</th>
                            <th style="width: 10%;" scope="col">Số đơn hàng</th>
                            <th style="width: 10%;" scope="col">Số lượng bán ra</th>
                            <th style="width: 10%;" scope="col">Doanh thu</th>
                           
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statistical_Popular as $value) {
                      
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
                                    <td class="text-center">' . $img. '</td>
                                    <td class="text-center">' . $luot_xem . '</td>
                                    <td class="text-center">' . $so_don_hang . '</td>
                                    <td class="text-center">' . $so_luong_ban . '</td>
                                    <td class="text-center">' . $doanh_thu . '</td>
                               
     
                                </tr>';
                                
                        } ?>
                        
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Thông tin biểu đồ</a>
            </div>
                        
        </div>
    </div>
</div>
<div class="container-fluid" style="margin: 20px 50px;">           
    <div class="row">
        <div id="myChart" style="width:98%; height:400px;">
        <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tên sản phẩm', 'Số lượng bán', 'Doanh thu', 'Lượt xem'],
            <?php
                foreach ($statistical_Popular as $tk){
                    extract($tk);
                    echo "['".$tk['ten_sp']."', ".$tk['so_luong_ban'].", ".$tk['doanh_thu'].", ".$tk['luot_xem']."],";
                }
            ?>
        ]);

        var options = {
            title: 'Thống kê sản phẩm phổ biến nhất',
            seriesType: 'bars',
            series: {
                0: { targetAxisIndex: 0, color: '#3366CC', bar: { groupWidth: '20%' } }, // Số lượng bán
                1: { targetAxisIndex: 1, color: '#DC3913', bar: { groupWidth: '20%' } }, // Doanh thu
                2: { targetAxisIndex: 2, type: 'line', color: 'orange', lineWidth: 3 }  // Lượt xem (đường)
            },
            axes: {
                y: {
                    0: {label: 'Số lượng bán'},
                    1: {label: 'Doanh thu'},
                    2: {label: 'Lượt xem'}
                }
            },
            vAxes: {
                0: {title: 'Số lượng bán'},
                1: {title: 'Doanh thu'},
                
            },
            isStacked: true,
            areaOpacity: 0.7,  // Điều chỉnh độ trong suốt của khu vực miền
            backgroundColor: '#f9f9f9',  // Màu nền của biểu đồ
            legend: { position: 'bottom', maxLines: 3 }  // Hiển thị chú thích ở dưới
        };

        var chart = new google.visualization.ComboChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
            </div>
        </div>
    </div>
</div>

