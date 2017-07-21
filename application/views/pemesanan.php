<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.html">Beranda</a></li>
			<li class="active">Pemesanan</li>
		</ol>
		<h2>Daftar Pemesanan</h2>
		<hr>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<div>
	      	<?php $this->load->view('notice'); ?>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No Pemesanan</th>
							<th>Jumlah Produk</th>
							<th>Tanggal Pemesanan</th>
							<th>Paket Pengiriman</th>
							<th>Ongkos Kirim</th>
							<th>Total Biaya</th>
							<th>Status Pembayaran</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(count($pemesanan['entries']) > 0) {
							foreach ($pemesanan['entries'] as $key => $pemesanan) { ?>
							<tr>
								<td><?php echo $pemesanan['id_pemesanan'] ?></td>
								<td><?php echo $pemesanan['jml_barang'] ?></td>
								<td><?php echo $pemesanan['tanggal_pemesanan'] ?></td>
								<td><?php echo $pemesanan['paket_pengiriman'] ?></td>
								<td><?php echo 'Rp'.number_format($pemesanan['ongkir'],0 ,',','.') ?></td>
								<td><?php echo 'Rp'.number_format($pemesanan['total_biaya'],0,',','.') ?></td>
								<td><?php echo $pemesanan['status_pembayaran'] ?></td>
								<td><a href="<?php echo base_url() ?>pemesanan/detail/<?php echo $pemesanan['id_pemesanan'] ?>">Detail</td>
							</tr>
							<?php 
							} 
						}else {
						?>
						<tr>
							<td colspan="8" style="text-align: center">Tidak ada pemesanan</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<br>
  </div>
</div>