
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between my-md-2 my-2 ">
                    <h3 class="fs-1">Thống kê doanh thu đơn hàng </h3>
                    
    
                </div>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10%;" scope="col">Mã sản phẩm</th>
                            <th style="width: 16%;" scope="col">Tên sản phẩm</th>
                            <th style="width: 8%;" scope="col">Hình ảnh</th>
                            <th style="width: 10%;" scope="col">Ngày đặt</th>
                            <th style="width: 10%;" scope="col">Số đơn hàng</th>
                            <th style="width: 10%;" scope="col">Số lượng bán ra</th>
                            <th style="width: 10%;" scope="col">Doanh thu</th>
                           
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($statisticalDate_ago as $value) {
                      
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
                                    <td class="text-center">' . $ngay_dat_hang . '</td>
                                    <td class="text-center">' . $so_luong_don_hang . '</td>
                                    <td class="text-center">' . $so_luong_ban . '</td>
                                    <td class="text-center">' . $tong_don_hang . '</td>
                               
     
                                </tr>';
                                
                        } ?>
                        
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Thông tin biểu đồ</a>

            </div>
        
        </div>
    </div>
</div>
<div class="row-statistical">
<figure class="highcharts-figure" style="width: 100%;">
    <div id="container" ></div>
    <p class="highcharts-description" style="padding-top: 15px; font-size: 16px;">
        Biểu đồ thống kê chi tiết đơn hàng 30 ngày trước giúp cho chúng ta khái quát được đơn hàng thông qua biểu đồ.
    </p>
</figure>                  
</div>

<script>
    Highcharts.chart('container', {
        title: {
            text: 'Biểu đồ thống kê doanh thu đơn hàng',
            align: 'left'
        },
        xAxis: {
            categories: [
                <?php foreach ($statisticalDate_ago as $value) {
                    extract($value);
                    echo "'$thang',";
                } ?>
            ]
        },
        yAxis: {
            title: {
                text: ' vNĐ'
            }
        },
        tooltip: {
            valueSuffix: 'VNĐ'
        },
        plotOptions: {
            series: {
                borderRadius: '25%'
            }
        },
        series: [
            <?php
            $i = 0;
            foreach ($statisticalDate_ago as $value) {?>
                <?php extract($value);?>
            
            {
                type: 'column',
                name: '<?php echo $ten_sp,'';  ?>',
                data: [<?php echo $so_luong_ban; ?>, <?php echo $so_luong_don_hang; ?>, <?php echo $tong_don_hang; ?>]
            },
            
            <?php $i++; } ?>
            {
                type: 'line',
                step: 'center',
                name: '<?php echo $ten_sp; ?>',
                data: [<?php echo $so_luong_ban; ?>, <?php echo $so_luong_don_hang; ?>, <?php echo $tong_don_hang; ?>],
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }, 
            {
                type: 'pie',
                name: 'Doanh thu',
                data: [
                    <?php
                    $i = 0;
                    $sum = 0;
                    foreach ($statisticalDate_ago as $value) {
                        extract($value);
                        $sum += $tong_don_hang;
                        echo "{ name: '$thang', y: $sum, color: Highcharts.getOptions().colors[$i], dataLabels: { enabled: true, distance: -50, format: '{point.total} M', style: { fontSize: '15px' } } },";
                        $i++;
                    }
                    ?>
                ],
                center: [75, 65],
                size: 100,
                innerSize: '70%',
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }
        ]
    });
   
</script>

