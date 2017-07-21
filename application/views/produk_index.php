<div class="box box-danger">
	<div class="box-header">
	  <i class="fa fa-file-text-o"></i>
	  <h3 class="box-title"><?php echo $title ?></h3>
	  <div class="box-tools pull-right">
	  	<a href="<?php echo base_url() ?>produk/create" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Produk</a>
    </div>
    <hr style="margin-bottom:0px;">
	</div><!-- /.box-header -->
	<div class="box-body" style="margin:10px;">
	  <?php if(count($produk['entries']) > 0) { ?>
			<table id="datatable" class="table table-bordered table-hover display responsive nowrap">
				<thead>
					<tr>
						<!-- <th>No</th> -->
						<th>Kode</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Stok</th>
						<th>Min Stok</th>
						<th>Satuan</th>
						<th>Harga</th>
						<th width="10">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($produk['entries'] as $key => $produk) {

					?>
						<tr>
							<!-- <td><?php echo $no++ ?></td> -->
							<td><?php echo $produk['kd_produk'] ?></td>
							<td><?php echo $produk['nama_produk'] ?></td>
							<td><?php echo $produk['jenis_produk'] ?></td>
							<td><?php echo $produk['stok'] ?></td>
							<td><?php echo $produk['min_stok'] ?></td>
							<td><?php echo $produk['satuan'] ?></td>
							<td><?php echo 'Rp '.number_format($produk['harga'],0,',','.') ?></td>
							<td>
								<a href="<?php echo base_url() ?>produk/edit/<?php echo $produk['kd_produk'] ?>" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="" data-original-title="Ubah">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>produk/delete/<?php echo $produk['kd_produk'] ?>" class="btn btn-xs btn-danger confirm"   data-toggle="tooltip" title="" data-original-title="Hapus">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
		&nbsp;&nbsp; Saat ini belum ada data produk yang ditambahkan
		<?php } ?>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	</div>
</div>
