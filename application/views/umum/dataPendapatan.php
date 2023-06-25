<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

<!-- Page Heading -->
    <div class="card border-left-primary shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($uang_masuk['pendapatan']) ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

<a class="mb-3 mt-2 btn btn-sm btn-success" href="<?php echo base_url('umum/DataPendapatan/tambahData/') ?>"><i class="fas fa-plus"></i> Tambah Data</a>

<?php echo $this->session->flashdata('pesan') ?>

<div class="card mb-3">
	<div class="card-header bg-Secondary text-black">
        <i class="fas fa-table me-1"></i> Data Pendapatan</div> 
<div class="card-body">



<table class="table table-bordered table-striped mt-2" style="margin-bottom: 100px" id="datatables">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Tanggal</th>
			<th class="text-center">Kategori</th>
			<th class="text-center">Keterangan</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php $no=1; foreach ($masuk as $m) : 
			$date = date_create($m['tanggal']);
		?>
			<tr>
				<td><center><?php echo $no++ ?></center></td>
				<td><?php echo date_format($date, "d F Y") ?></td>
				<td><?php echo $m['kategori'] ?></td>
				<td><?php echo $m['keterangan'] ?></td>
				<td>Rp. <?php echo number_format($m['pendapatan'],0,',','.') ?></td>
				<td>
					<center>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('umum/DataPendapatan/updateData/'.$m['id_keuangan']) ?>"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('umum/DataPendapatan/deleteData/'.$m['id_keuangan']) ?>"><i class="fas fa-trash"></i></a>
					</center>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>



</div>