                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="row">
                            <div class="col-md-12">
                            <h1 class="h1 mb-0 text-gray-800"><?php echo $title ?></h1>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Chart Table --> 
                        <div class="container mt-3" style="width:1000px; margin-bottom: 80px;">
                            <h5 class="mb-0 text-gray-800">Data Penjualan</h5>
                            <canvas id="myChart"></canvas>
                            <?php
                            $tanggal = "";            // string kosong untuk menampung data tanggal
                            $total_penjualan = null;    // nilai awal null untuk menampung data total penjualan

                            // looping data dari $chartSiswa
                            foreach ($penjualan as $chart) {
                                $dataTahun     = $chart['tanggal'];
                                $tanggal        .= "'$dataTahun'" . ",";
                                $dataTotal     = $chart['pd']; 
                                $total_penjualan  .= "'$dataTotal'" . ",";
                            }

                            ?>
                        </div>
                    </body>
                    <!-- CDN CHART JS -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                    <script type="text/javascript">
                        const penjualan = document.getElementById('myChart').getContext('2d');
                        const chart = new Chart(penjualan, {
                            type: 'bar',
                            data: {
                                labels: [<?= $tanggal; ?>], // data tanggal sebagai label dari chart
                                datasets: [{
                                    label: 'Jumlah Penjualan',
                                    backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                                    borderColor: ['rgb(255, 99, 132)'],
                                    data: [<?= $total_penjualan; ?>] //data penjualan sebagai data dari chart
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                </div>
            </div>