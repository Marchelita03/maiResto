<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
            
            <?php foreach ($karyawan as $k): ?>    		
    		<form method="POST" action="<?php echo base_url('admin/dataKaryawan/updateDataAksi') ?>">
    			
    			<div class="form-group">
                    <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $k->id_karyawan ?>">
    				<label>Nama</label>
    				<input type="text" name="nama_karyawan" class="form-control" value="<?php echo $k->nama_karyawan ?>">
                    <?php echo form_error('nama_karyawan','<div class="text-small text-danger"></div>'); ?>
    			</div>

    			<div class="form-group">
    				<label>Tanggal Lahir</label>
    				<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $k->tgl_lahir ?>">
                    <?php echo form_error('tgl_lahir','<div class="text-small text-danger"></div>'); ?>
    			</div>

    			<div class="form-group">
    				<label>Alamat</label>
    				<input type="text" name="alamat" class="form-control" value="<?php echo $k->alamat ?>">
                    <?php echo form_error('alamat','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $k->jabatan ?>">
                    <?php echo form_error('jabatan','<div class="text-small text-danger"></div>'); ?>
                </div>

                <!-- <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="<?php echo $k->hak_akses ?>">
                            <?php if($k->hak_akses == '1') {
                                echo "Admin";
                            }else{
                                echo "Umum";
                            }
                            ?>        
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Umum</option>
                    </select>
                    <?php echo form_error('jabatan','<div class="text-small text-danger"></div>'); ?>
                </div> -->

                <button type="submit" class="btn btn-success">Perbarui</button>
                
    		</form>
        <?php endforeach ?>

    	</div>
    </div>


</div>