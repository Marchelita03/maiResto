<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
    <center>
        <h1>MaiResto</h1>
        <h2 colspan=6 height="20px">Laporan Laba Rugi Restoran</h2>
        <h3 colspan=6 height="20px">Periode : Keseluruhan</h3>
        <hr style="width: 70%; border-width: 5px; color: black">
    </center>
        


<table style="width: 100%" class="table table-striped table-bordered mt-3">
    <th colspan="3"><b>Pendapatan</b></th>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kategori</th> 
            <th class="text-center">Total</th>
        </tr>

        <tbody>
        <?php
        $no = 1;
        $no2 = 1;
        $saldo = 0;
        foreach ($pendapatan as $pd) :
            
        $date = date_create($pd['tanggal']);

        $nominal = $pd['pd'];
        $saldo = $saldo + $nominal;

        // s
        ?>

        <tr>
            <td><center><?php echo $no++ ?></center></td>
            <!-- <td><?php echo date_format($date, "d F Y") ?></td> -->
            <td><?php echo $pd['kategori'] ?></td>
            <!--  <td style="text-align:right;">Rp. <?php echo number_format($pd['pendapatan'],0,',','.') ?></td>
            <td style="text-align:right;">Rp. <?php echo number_format($pd['pengeluaran'],0,',','.') ?></td>
            <td style="text-align:right;">Rp. <?= number_format($saldo, 0, ',', '.') ?></td> -->
            <td>Rp. <?php echo number_format($pd['pd'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" style="text-align:right">Jumlah</td>
            <td colspan="2" >Rp. <?= number_format($saldo, 0, ',', '.') ?></td>
        </tr>

       

    <th colspan="3"><b>Pengeluaran</b></th>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kategori</th> 
            <th class="text-center">Total</th>
        </tr>
        <?php
        $saldopg = 0;
        foreach ($pengeluaran as $pg) : 
        $nominalpg = $pg['pg'];
        $saldopg = $saldopg + $nominalpg;
        ?>
        <tr>
            <td><center><?php echo $no2++ ?></center></td>
            <td><?php echo $pg['kategori'] ?></td>
            <td>Rp. <?php echo number_format($pg['pg'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>

        <?php
        $saldob = 0;
        foreach ($beban as $b) : 
        $nominalb = $b['b'];
        $saldob = $saldob + $nominalb;
        ?>
        <tr>
            <td><center><?php echo $no2++ ?></center></td>
            <td><?php echo $b['kategori'] ?></td>
            <td>Rp. <?php echo number_format($b['b'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
       
        <tr>
            <td colspan="2" style="text-align:right">Jumlah</td>
            <td colspan="2" >Rp. <?= number_format($saldopg+$saldob, 0, ',', '.') ?></td>
        </tr>  

        <tr>
            <td colspan="2" style="text-align:right"><b>Total</b></td>
            <td><b>Rp. <?= number_format($saldo-($saldopg+$saldob), 0, ',', '.') ?></b></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:right"><b>Keterangan</b></td>
            <td><b>
                <?php 
                if ($saldo-($saldopg+$saldob) < 0) {
                    echo "Rugi"; 
                }else{
                    echo "Laba";
                }
                ?></b>
            </td>
        </tr> 
    </tbody>
</table>

<table width="100%">
    <tr>
        <td></td>
        <td>
            <p></p>
            <br>
            <br>
            <p></p>
        </td>

        <td width="200px">
            <p>Yogyakarta, <?php echo date("d M Y"); ?> <br> Penanggung Jawab, </p>
            <br>
            <br>
            <p>_________________________________</p>
            <p>Owner</p>
        </td>
    </tr>
</table>


</body>
</html>

<script type="text/javascript">
    window.print();
</script>