<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
    		
    		<form method="POST" action="<?php echo base_url('admin/dataKategoriPengeluaran/tambahDataAksi') ?>">
    			
    			<div class="form-group">
    				<label>Kategori</label>
    				<input type="text" name="kategori" class="form-control">
                    <?php echo form_error('kategori','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <button type="submit" class="btn btn-success">Tambahkan</button>
                
    		</form>

    	</div>
    </div>


</div>