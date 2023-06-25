<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="mb-3 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataKaryawan/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Karyawan</a>

    <div class="card mb-3">
        <div class="card-header bg-Secondary text-black">
            <i class="fas fa-table me-1"></i> Data Karyawan</div>
            <div class="card-body">

    <table class="table table-striped table-bordered" style="margin-bottom: 100px" id="datatables">
        <thead>
        	<tr>
        		<th class="text-center">No</th>
        		<th class="text-center">Nama Karyawan</th>
        		<th class="text-center">Tanggal Lahir</th>
        		<th class="text-center">Alamat</th>
        		<th class="text-center">Jabatan</th>
                <!-- <th class="text-center">Hak Akses</th> -->
        		<th class="text-center">Action</th>
        	</tr>
        </thead>

        <tbody>
        	<?php $no=1; foreach ($karyawan as $k): 
            $date = date_create($k['tgl_lahir']);
            ?>
        	<tr>
        		<td><center><?php echo $no++ ?></center></td>
        		<td><?php echo $k['nama_karyawan'] ?></td>
        		<td><?php echo date_format($date, "d F Y") ?></td>
        		<td><?php echo $k['alamat'] ?></td>
                <td><?php echo $k['jabatan'] ?></td>
                    <!-- <?php if($k['hak_akses'] == '1') { ?> 
                        <td>Admin</td>
                    <?php }else{ ?>
                        <td>Umum</td>
                    <?php } ?> -->
        		<td>
        			<center>
        				<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataKaryawan/updateData/'.$k['id_karyawan']) ?>"><i class="fas fa-edit"></i></a>
        				<a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataKaryawan/deleteData/'.$k['id_karyawan']) ?>"><i class="fas fa-trash"></i></a>
    				</center>
        		</td>
        	</tr>
    			
            <?php endforeach; ?>
        </tbody>
    </table>

</div>