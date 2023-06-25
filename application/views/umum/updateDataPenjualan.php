<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($penjualan as $pj): ?>
            <form method="POST" action="<?php echo base_url('umum/DataPenjualan/updateDataAksi') ?>">

                <div class="form-group">
                    <input type="hidden" name="id_penjualan" class="form-control" value="<?php echo $pj->id_penjualan ?>">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo $pj->tanggal ?>">

                    <?php echo form_error('tanggal','<div class="text-small text-danger"></div>'); ?>
                </div>

                <div class="form-group">
                    <label>Nama Menu</label>
                    <select name="nama_menu" class="form-control" required>
                        <?php foreach($menu as $m) : ?>
                        <option <?= $pj->nama_menu == $m->nama_menu ? 'selected' : '' ?> value="<?php echo $m->nama_menu ?>">
                        <?php echo $m->nama_menu ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?php echo $pj->jumlah ?>">

                    <?php echo form_error('jumlah','<div class="text-small text-danger"></div>'); ?>
                </div>

                <button type="submit" class="btn btn-success">Perbarui</button>

            </form>
        <?php endforeach; ?>
        </div>
    </div>

</div>