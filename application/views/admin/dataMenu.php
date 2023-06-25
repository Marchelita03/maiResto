<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="mb-3 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataMenu/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Menu</a>

    <div class="card mb-3">
        <div class="card-header bg-Secondary text-black">
            <i class="fas fa-table me-1"></i> Data Menu</div>
            <div class="card-body">

    <table class="table table-striped table-bordered" style="margin-bottom: 100px" id="datatables">
        <thead>
        	<tr>
        		<th class="text-center">No</th>
        		<th class="text-center">Nama Menu</th>
        		<th class="text-center">Harga</th>
        		<th class="text-center">Action</th>
        	</tr>
        </thead>

        <tbody>
        	<?php $no=1; foreach ($menu as $m): ;
            ?>
        	<tr>
        		<td><center><?php echo $no++ ?></center></td>
        		<td><?php echo $m['nama_menu'] ?></td>
                <td>Rp. <?php echo number_format($m['harga'],0,',','.') ?></td>
        		<td>
        			<center>
        				<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataMenu/updateData/'.$m['id_menu']) ?>"><i class="fas fa-edit"></i></a>
        				<a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataMenu/deleteData/'.$m['id_menu']) ?>"><i class="fas fa-trash"></i></a>
    				</center>
        		</td>
        	</tr>
    			
            <?php endforeach; ?>
        </tbody>
    </table>

</div>