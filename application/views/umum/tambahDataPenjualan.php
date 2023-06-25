<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
            
    		<form method="POST" action="<?php echo base_url('umum/DataPenjualan/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>Tanggal</label>
    				<input type="date" name="tanggal" class="form-control" value="">

    				<?php echo form_error('tanggal','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <div class="form-group">
                    <label>Nama Menu</label> 
                    <select name="nama_menu" class="form-control">
                        <option value="">--Pilih Menu--</option>
                        <?php foreach($menu as $m) : ?>
                        <option value="<?php echo $m->nama_menu ?>">
                        <?php echo $m->nama_menu ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nama_menu','<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control">

                    <?php echo form_error('jumlah','<div class="text-small text-danger"></div>'); ?>
                </div>             

    
    			<button type="submit" class="btn btn-success">Tambahkan</button>

    		</form>
    	</div>
    </div>
</div>