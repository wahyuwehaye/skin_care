<div class="box box-danger">
	<div class="box-header">
	  <i class="fa fa-file-text-o"></i>
	  <h3 class="box-title"><?php echo $title ?></h3>
	  <div class="box-tools pull-right">
	  	<a href="<?php echo base_url() ?>paket_pengiriman/create" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Paket Pengiriman</a>
    </div>
    <hr style="margin-bottom:0px;">
	</div><!-- /.box-header -->
	<div class="box-body" style="margin:10px;">
	  <?php if(count($paket_pengiriman['entries'])) { ?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Jasa Pengiriman</th>
						<th>Paket Pengiriman</th>
						<th>Harga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($paket_pengiriman['entries'] as $key => $paket_pengiriman) {

					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $paket_pengiriman['nama_jasa_pengiriman'] ?></td>
							<td><?php echo $paket_pengiriman['paket_pengiriman'] ?></td>
							<td>Rp <?php echo number_format($paket_pengiriman['harga'], 0, ',','.') ?></td>
							<td>
								<a href="<?php echo base_url() ?>paket_pengiriman/edit/<?php echo $paket_pengiriman['id_paket_pengiriman'] ?>" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="" data-original-title="Ubah">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>paket_pengiriman/delete/<?php echo $paket_pengiriman['id_paket_pengiriman'] ?>" class="btn btn-xs btn-danger confirm"   data-toggle="tooltip" title="" data-original-title="Hapus">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
		&nbsp;&nbsp; Saat ini belum ada data paket pengiriman yang ditambahkan
		<?php } ?>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	</div>
</div>
