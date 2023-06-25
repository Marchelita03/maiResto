<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
    	<div class="card-body">
            
    		<form method="POST" action="<?php echo base_url('umum/DataPengeluaran/tambahDataAksi') ?>">

    			<div class="form-group">
    				<label>Tanggal</label>
    				<input type="date" name="tanggal" class="form-control" <?php echo date("Y-m-d ") ?>>

    				<?php echo form_error('tanggal','<div class="text-small text-danger"></div>'); ?>
    			</div>

                <div class="form-group">
                    <label>Kategori</label> 
                    <select name="kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach($kategori as $k) : ?>
                        <option value="<?php echo $k->kategori ?>">
                        <?php echo $k->kategori ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('kategori','<div class="text-small text-danger"></div>'); ?>
                </div> 

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">

                    <?php echo form_error('keterangan','<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="pengeluaran" class="form-control">

                    <?php echo form_error('pengeluaran','<div class="text-small text-danger"></div>'); ?>
                </div>

    			<button type="submit" class="btn btn-success">Tambahkan</button>

    		</form>
    	</div>
    </div>

</div>