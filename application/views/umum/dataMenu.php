<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-Secondary text-BLACK">
            <i class="fas fa-table me-1"></i> Data Menu</div>
            <div class="card-body">

    <table class="table table-striped table-bordered" style="margin-bottom: 100px" id="datatables">
        <thead>
        	<tr>
        		<th class="text-center">No</th>
        		<th class="text-center">Nama Menu</th>
        		<th class="text-center">Harga</th>
        	</tr>
        </thead>

        <tbody>
        	<?php $no=1; foreach ($menu as $m): 
            ?>
        	<tr>
        		<td><?php echo $no++ ?></td>
        		<td><?php echo $m['nama_menu'] ?></td>
                <td><?php echo $m['harga'] ?></td>
        	</tr>
    			
            <?php endforeach; ?>
        </tbody>
    </table>

</div>