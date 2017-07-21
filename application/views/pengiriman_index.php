<div class="box box-danger">
	<div class="box-header">
	  <i class="fa fa-file-text-o"></i>
	  <h3 class="box-title"><?php echo $title ?></h3>
    <hr style="margin-bottom:0px;">
	</div><!-- /.box-header -->
	<div class="box-body" style="margin:10px;">
		<form class="form-inline" style="margin-bottom: 30px;">
			<div class="form-group" >
	      <label style="margin-right:10px;">No Pemesanan</label>
        <input type="text" name="f-id_pemesanan" class="form-control" value="<?php echo $this->input->get('f-id_pemesanan') ?>" onkeypress="return isNumberKey(event)" style="margin-right:10px;">
        <input type="submit" value="Cari" class="btn btn-sm btn-primary" style="margin-right:5px;">
        <a href="<?php echo base_url() ?>pengiriman" class="btn btn-sm btn-default">Reset</a>
	    </div>
	   </form>
	  <?php if(count($pengiriman['entries'])) { ?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No Pemesanan</th>
						<th>Jumlah Produk</th>
						<th>Tanggal Pemesanan</th>
						<th>Paket Pengiriman</th>
						<th>Ongkos Kirim</th>
						<th>Total Biaya</th>
						<th>Status Konfirmasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($pengiriman['entries'] as $key => $pemesanan) {

					?>
						<tr>
							<td><?php echo $pemesanan['id_pemesanan'] ?></td>
							<td><?php echo $pemesanan['jml_barang'] ?></td>
							<td><?php echo $pemesanan['tanggal_pemesanan'] ?></td>
							<td><?php echo $pemesanan['paket_pengiriman'] ?></td>
							<td><?php echo 'Rp'.number_format($pemesanan['ongkir'],0 ,',','.') ?></td>
							<td><?php echo 'Rp'.number_format($pemesanan['total_biaya'],0,',','.') ?></td>
							<td><?php echo ($pemesanan['status_konfirmasi'] == "") ? 'Belum konfirmasi' : $pemesanan['status_konfirmasi']; ?></td>
							<td><a href="<?php echo base_url() ?>pengiriman/view/<?php echo $pemesanan['id_pemesanan'] ?>">Detail</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
			Data pemesanan tidak ditemukan.
		<?php } ?>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	</div>
</div>
