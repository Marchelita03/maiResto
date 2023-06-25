                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <marquee behavior="" direction="" style="font-size: 19px; color: maroon;">Selamat Datang Di Sistem Informasi Pengelolaan Kas </marquee> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="row">
                            <div class="col-md-12">
                            <h1 class="h1 mb-0 text-gray-800"><?php echo $title ?></h1>
                            <h4 class="h4 mb-0 text-gray-800">Selamat Datang <b>Admin</b></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Saldo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($uang_masuk['pendapatan'] - $uang_keluar['pengeluaran'] - $uang_beban['pengeluaran']) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Pendapatan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($uang_masuk['pendapatan']) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-hands fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($uang_keluar['pengeluaran']) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-hand-holding-usd fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Beban
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($uang_beban['pengeluaran']) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-solid fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Chart Table --> 
                    <div class="container mt-3" style="width:1000px; margin-bottom: 80px;">

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
                <!-- /.container-fluid -->

                        <!-- Pie Chart -->
                            <div class="card shadow mb-4">

            </div>
            <!-- End of Main Content -->


