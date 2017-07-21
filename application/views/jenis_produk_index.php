<div class="box box-danger">
	<div class="box-header">
	  <i class="fa fa-file-text-o"></i>
	  <h3 class="box-title"><?php echo $title ?></h3>
	  <div class="box-tools pull-right">
	  	<a href="<?php echo base_url() ?>jenis_produk/create" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Jenis produk</a>
    </div>
    <hr style="margin-bottom:0px;">
	</div><!-- /.box-header -->
	<div class="box-body" style="margin:10px;">
	  <?php if(count($jenis_produk['entries'])) { ?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($jenis_produk['entries'] as $key => $jenis_produk) {

					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $jenis_produk['nama_jenis_produk'] ?></td>
							<td>
								<a href="<?php echo base_url() ?>jenis_produk/edit/<?php echo $jenis_produk['id_jenis_produk'] ?>" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="" data-original-title="Ubah">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>jenis_produk/delete/<?php echo $jenis_produk['id_jenis_produk'] ?>" class="btn btn-xs btn-danger confirm"   data-toggle="tooltip" title="" data-original-title="Hapus">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
		&nbsp;&nbsp; Saat ini belum ada data jenis produk yang ditambahkan
		<?php } ?>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	</div>
</div>
