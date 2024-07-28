<div class="container">
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <div class="row2">
        <div class="row2 font_title">
            <h1>BIỂU ĐỒ</h1>
        </div>
        <div class="row bieudo">
                <div class="col-md-12 ">
                    <div class="col-xs-3">
                        <h5><a href="index.php?act=thongke"><i class="fa fa-list" aria-hidden="true"></i> Thống kê.</a></h5>
                    </div>
                </div>
       
            </div>
        <div class="row2 form_content ">
            <div id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
            </div>

            <script>
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    // Set Data
                    // const data = google.visualization.arrayToDataTable([
                    //   ['Contry', 'Mhl'],
                    //   ['Italy',54.8],
                    //   ['France',48.6],
                    //   ['Spain',44.4],
                    //   ['USA',23.9],
                    //   ['Argentina',14.5]
                    // ]);
                    const data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng'],
                        <?php
                        foreach ($listtk as $tk) {
                            extract($tk);
                            echo "['$tendm', $countsp],";
                        }
                        ?>
                    ]);

                    // Set Options
                    const options = {
                        title: 'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
                        is3D: true
                    };

                    // Draw
                    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);

                }

            </script>
            

        </div>
    </div>
</div>