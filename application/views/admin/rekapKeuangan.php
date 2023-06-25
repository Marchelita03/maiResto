<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Laporan
        </div>
        <div class="card-body">
            <form class="form-inline" action="<?= base_url('admin/rekapKeuangan/search') ?>" method="get">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Bulan:
                    </label>
                    <select class="form-control ml-2" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2 ml-3">
                    <label for="staticEmail2">Tahun:</label>
                    <select class="form-control ml-2" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i=2020; $i<$tahun+5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-2">Tampilkan</button>
                <a href="<?= base_url('admin/rekapKeuangan/cetakKeseluruhan?p=keseluruhan') ?>" class="btn btn-success mb-2 ml-auto"><i class="fas fa-file"></i> Cetak</a>
            </form>
        </div>
    </div>

    <!-- <?php 
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?> -->

    <!-- <div class="alert alert-info">
        Menampilkan Data Pada Bulan: <span class="font-weight-bold"><?php echo $bulan ?>&nbsp;</span>Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div> -->

    <div class="table-responsive" style="margin-bottom: 80px;">
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Pemasukan</th>
                <th class="text-center">Pengeluaran</th>
                <th class="text-center">Saldo</th>
            </tr>

            <?php 
            $no = 1;
            $saldo = 0;

            foreach ($rekap as $r) :
            $date = date_create($r['tanggal']);
                if ($r['pendapatan'] == 0) {
                    $nominal = $r['pengeluaran'];
                    $saldo = $saldo - $nominal;
                } else {
                    $nominal = $r['pendapatan'];
                    $saldo = $saldo + $nominal;
                }
            ?>
            <tr>
                <td><center><?php echo $no++ ?></center></td>
                <td><?php echo date_format($date, "d F Y") ?></td>
                <td><?php echo $r['kategori'] ?></td>
                <td><?php echo $r['keterangan'] ?></td>
                <td style="text-align:right;">Rp. <?php echo number_format($r['pendapatan'],0,',','.') ?></td>
                <td style="text-align:right;">Rp. <?php echo number_format($r['pengeluaran'],0,',','.') ?></td>
                <td style="text-align:right;">Rp. <?= number_format($saldo, 0, ',', '.') ?></td>
            </tr>

            <?php endforeach ?>
        </table>
    </div>
</div>
</div>