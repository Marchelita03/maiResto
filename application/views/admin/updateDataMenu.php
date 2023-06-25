<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
            
            <?php foreach ($menu as $m): ?>    		
    		<form method="POST" action="<?php echo base_url('admin/dataMenu/updateDataAksi') ?>">
    			
    			<div class="form-group">
                    <input type="hidden" name="id_menu" class="form-control" value="<?php echo $m->id_menu ?>">
    				<label>Nama</label>
    				<input type="text" name="nama_menu" class="form-control" value="<?php echo $m->nama_menu ?>">
                    <?php echo form_error('nama_menu','<div class="text-small text-danger"></div>'); ?>
    			</div>

    			<div class="form-group">
    				<label>Harga</label>
    				<input type="text" name="harga" class="form-control" value="<?php echo $m->harga ?>">
                    <?php echo form_error('harga','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <button type="submit" class="btn btn-success">Perbarui</button>
                
    		</form>
        <?php endforeach ?>

    	</div>
    </div>


</div>