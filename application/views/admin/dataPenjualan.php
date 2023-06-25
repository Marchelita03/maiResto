<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

<!-- Page Heading -->
    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penjualan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php
                    	// echo var_dump($penjualan);
						$total = 0;
						foreach ($penjualan as $pj) {
							$total += $pj['harga_lama'] * $pj['jumlah'];	
						}
						echo number_format($total,0,',','.') 
					?></div> 
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

<?php echo $this->session->flashdata('pesan') ?>

<div class="card mb-3">
	<div class="card-header bg-Secondary text-black">
        <i class="fas fa-table me-1"></i> Data Penjualan</div> 
<div class="card-body">

<!-- <table class="table table-striped table-bordered" style="margin-bottom: 100px" id="datatables"> 
 -->

<!-- Search -->
<!-- <form action="" method="get" autocomplete="off">
<div class="navbar-form navbar-right">
	<?php //echo form_open('admin/dataPenjualan') ?>
	<button type="submit" class="btn btn-success mb-3" style="height:32px; float: right;"><i class="fas fa-search"></i></button>
	<input type="text" name="keyword" class="form-control mb-3 mr-2" style="height:32px; width:200px; float: right;">
	
	<?php //echo form_close() ?>
</div>
</form> -->
<!-- end -->

<!-- <table class="table table-striped table-bordered" style="margin-bottom: 100px" id="datatables2"> -->	
<table class="table table-bordered table-striped mt-2" style="margin-bottom: 100px" id="datatables2">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Nama Menu</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Bayak</th>
			<th class="text-center">Total</th>
		</tr>
	</thead> 

	<tbody>
		<?php 
			$no=1; 
			$total=0;
				foreach ($penjualan as $pj) : 
			$date = date_create($pj['tanggal']);
			
		?>
			<tr>
				<td><center><?php echo $no++ ?></center></td>
				<td><?php echo date_format($date, "d F Y") ?></td>
				<td><?php echo $pj['nama_menu'] ?></td>				
				<td>Rp. <?php echo number_format($pj['harga_lama'],0,',','.') ?></td>
				<td><?php echo $pj['jumlah'] ?></td>
				<td data-total>Rp. <?php echo number_format($pj['harga_lama']*$pj['jumlah'],0,',','.') ?></td>
				<!-- <td>
					<center>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataPenjualan/updateData/'.$pj['id_penjualan']) ?>"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataPenjualan/deleteData/'.$pj['id_penjualan']) ?>"><i class="fas fa-trash"></i></a>
					</center>
				</td> -->
			</tr>

			<?php 
				$total += $pj['harga_lama']*$pj['jumlah']; 
			?>

		<?php endforeach; ?>
	</tbody>
	
	<tr style="font-weight: bold;">
		<td colspan="5"><center>Jumlah</center></td>
		<td data-keseluruhan colspan="5">Rp. <?php echo number_format($total,0,',','.') ?></td>
	</tr>
</table>

</div>