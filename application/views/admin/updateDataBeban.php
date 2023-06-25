<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($beban as $b): ?>
            <form method="POST" action="<?php echo base_url('admin/DataBeban/updateDataAksi') ?>">

                <div class="form-group">
                    <input type="hidden" name="id_keuangan" class="form-control" value="<?php echo $b->id_keuangan ?>">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo $b->tanggal ?>">

                    <?php echo form_error('tanggal','<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Kategori</label> 
                    <select name="kategori" class="form-control">
                        <?php foreach($kategori as $k) : ?>
                        <option <?= $b->kategori == $k->kategori ? 'selected' : '' ?> value="<?php echo $k->kategori ?>">
                        <?php echo $k->kategori ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('kategori','<div class="text-small text-danger"></div>'); ?>
                </div> 

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $b->keterangan ?>">

                    <?php echo form_error('keterangan','<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="pengeluaran" class="form-control" value="<?php echo $b->pengeluaran ?>">

                    <?php echo form_error('pengeluaran','<div class="text-small text-danger"></div>'); ?>
                </div>
                
                <button type="submit" class="btn btn-success">Perbarui</button>

            </form>
        <?php endforeach; ?>
        </div>
    </div>

</div>