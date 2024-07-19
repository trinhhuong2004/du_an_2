<head>
    <style>
        .chart{
            margin: 10px 250px;
            
        }
        .thongke{
            margin-top: 150px;
        }
      
    </style>
</head>
<div class="thongke">
        <div class="chart">
            <div id="myChart" style="width:1000px; max-width:1000px; height:500px;">
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
                                $i=1;
                                    foreach ($statistical_category as $tk){
                                        extract($tk);
                                        echo "['".$tk['ten_lsp']."',".$tk['so_luong']."],";
                                        $i+=1;
                                    }
                                ?>
                                
                            ]);

                            var options = {
                                title: 'Thống kê sản phẩm theo danh mục',   
                                is3D: true
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <a href="index.php" style="margin:10px 0px 0px -35px ;" class="btn btn-warning">Quay lại</a>
                </div>
                
            </div>
        </div>
</div>


