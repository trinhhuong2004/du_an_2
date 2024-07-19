<head>
    <style>
        .chart-product{
            margin: 50px 250px;
            
        }
        .thongke{
            margin-top: 150px;
        }
    </style>
</head>
<div class="thongke">

        <div class="chart-product">
            <div id="myChart" style="width:1000px; max-width:1000px; height:500px;">>
                </div>

                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([

                                ['Danh Mục', 'Số Lượng Sản Phẩm'],
                                <?php
                                $tongdm = COUNT($statistical_product_seling);
                                $i=1;
                                    foreach ($statistical_product_seling as $tk){
                                        extract($tk);
                                        echo "['".$tk['ten_sp']."',".$tk['so_luong_ban']."],";
                                        $i+=1;
                                    }
                                ?>
                                
                            ]);

                            var options = {
                                title: 'Thống kê sản phẩm bán chạy',   
                                is3D: true
                            };

                            var chart = new google.visualization.BarChart(document.getElementById('myChart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <a href="index.php" style="margin:10px 0px 0px" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
        </div>
</div>