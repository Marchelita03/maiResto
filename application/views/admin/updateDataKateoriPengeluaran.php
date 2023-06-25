<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
            
            <?php foreach ($kategori as $k): ?>    		
    		<form method="POST" action="<?php echo base_url('admin/dataKategoriPengeluaran/updateDataAksi') ?>">
    			
    			<div class="form-group">
                    <input type="hidden" name="id_kategori" class="form-control" value="<?php echo $k->id_kategori ?>">
    				<label>Nama</label>
    				<input type="text" name="kategori" class="form-control" value="<?php echo $k->kategori ?>">
                    <?php echo form_error('kategori','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <button type="submit" class="btn btn-success">Perbarui</button>
                
    		</form>
        <?php endforeach ?>

    	</div>
    </div>


</div>