<!-- check out -->
<div class="container">
	<ol class="breadcrumb" style="margin-bottom: 0px !important">
		<li><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
		<li><a href="<?php echo base_url() ?>pemesanan">Pemesanan</a></li>
		<li class="active">Detail Pemesanan</li>
	</ol>
	<div class="check-sec">	 
		<div style="margin-left:15px; margin-right: 15px;">
	  	<?php $this->load->view('notice'); ?>
		</div>
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?php echo base_url() ?>pemesanan">Daftar Pemesanan</a>
			<div class="price-details">
				<h3>Detail Harga</h3>
				<span>Total</span>
				<span class="total1"><?php echo number_format($pemesanan['total'], 0,',','.'); ?></span>
				<!-- <span>Discount</span>
				<span class="total1">10%(Festival Offer)</span> -->
				<span>Jasa Pengiriman</span>
				<span class="total1">
					<?php echo $pemesanan['nama_jasa_pengiriman'].' '.$pemesanan['paket_pengiriman']; ?>
				</span>
				<span>Biaya Pengiriman</span>
				<span class="total1" id="delivery_charges"><?php echo number_format($pemesanan['ongkir'], 0,',','.'); ?></span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   	<li class="last_price"> <h4>TOTAL</h4></li>	
			   	<li class="last_price"><span id="lbl-subtotal"><?php echo 'Rp '.number_format($pemesanan['total_biaya'], 0,',','.'); ?></span></li>
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>

			<a href="#" class="order" onclick="konfirmasi_pembayaran(event)" style="margin-bottom: 30px;"><?php echo (count($cek_konfirmasi) > 0) ? 'Lihat ' : ''; ?>Konfirmasi Pembayaran</a>

			<?php if(count($cek_konfirmasi) > 0) { ?>
				<div class="price-details">
					<span>Status Konfirmasi</span>
					<span class="total1"><?php echo $cek_konfirmasi['status_konfirmasi'] ?></span>
					<span>Nomor Resi</span>
					<span class="total1"><?php echo ($cek_konfirmasi['nomor_resi']) ? $cek_konfirmasi['nomor_resi'] : 'Belum ada'; ?></span>

					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-9 cart-items">
			<h1>Produk yang dipesan (<span id="count_checkout"><?php echo count($detail_pemesanan); ?></span>)
			</h1>
			
			<?php 
				$no = 1;
				foreach ($detail_pemesanan['entries'] as $key => $items){ ?>
				<div class="cart-header2" id="cart-header<?php echo $no ?>">
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="<?php echo base_url() ?>assets/pictures/<?php echo $items['gambar'] ?>" class="img-responsive" alt=""/>
						</div>
				   	<div class="cart-item-info">
					    <h3><a href="single.html"><?php echo $items['nama_produk'] ?></a><span>Jenis: <?php echo $items['nama_jenis_produk'] ?></span></h3>
							<ul class="qty">
								<li><p>Harga satuan : Rp<?php echo number_format($items['harga'], 0,',','.') ?></p></li>
								<li><p>Qty : <?php echo $items['jml_produk'] ?></p></li>
							</ul>
							<div class="delivery">
							 <p>Total Harga : Rp<?php echo number_format(($items['jml_produk']*$items['harga']), 0,',','.') ?></p>
							 <span>Pengiriman: <?php echo $pemesanan['nama_jasa_pengiriman'].' '.$pemesanan['paket_pengiriman'] ?></span>
							 <div class="clearfix"></div>
							</div>								
				   	</div>
			   		<div class="clearfix"></div>						
			  	</div>
			 	</div>
			<?php $no++; } ?>	
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->

<div class="modal fade cust-modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cust-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Pembayaran</h4>
        <input type="hidden" name="rowid" id="rowid" value="">
      </div>
      <form action="<?php echo base_url() ?>pemesanan/konfirmasi_pembayaran" onsubmit="return Validate(this);" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
      		<div class="alert alert-info" role="alert">
						Nomor rekeneing yang valid <b>723492349023</b> atas nama <b>Vania Skin Care</b>
					</div>
					<?php
						$value = NULL;
						if(count($cek_konfirmasi) > 0){
							$value = $cek_konfirmasi['atas_nama'];
						}
					?>
				  <div class="form-group">
				    <label>Atas Nama</label>
				    <input type="text" class="form-control" name="atas_nama" value="<?php echo $value ?>" required>
				    <input type="hidden" class="form-control" name="id_pemesanan" value="<?php echo $pemesanan['id_pemesanan'] ?>">
				  </div>

					<?php
						$value = NULL;
						if(count($cek_konfirmasi) > 0){
							$value = $cek_konfirmasi['nama_bank'];
						}
					?>
				  <div class="form-group">
				    <label>Nama Bank</label>
				    <input type="text" class="form-control" name="nama_bank" value="<?php echo $value ?>" required>
				  </div>

					<?php
						$value = NULL;
						if(count($cek_konfirmasi) > 0){
							$value = $cek_konfirmasi['nominal'];
						}
					?>
				  <div class="form-group">
				    <label>Nominal</label>
				    <input type="text" class="form-control" name="nominal" value="<?php echo $value ?>" required>
				  </div>

					<?php
						$value = NULL;
						if(count($cek_konfirmasi) > 0){
							$value = $cek_konfirmasi['alamat_pengiriman'];
						}
					?>
				  <div class="form-group">
				    <label>Alamat Pengiriman</label>
				    <textarea class="form-control" name="alamat_pengiriman" required><?php echo $value ?></textarea>
				  </div>

				  <div class="form-group">
				    <label>Bukti Transfer</label>
				    <?php if(count($cek_konfirmasi) == 0) { ?>

				    <input type="file" class="form-control" name="file" required>
				    <p class="help-block">File yang diperbolehkan : jpg, jpeg, png.</p>
				    <?php }else{ ?>
				    	<img id="img-modal" class="img-responsive" alt="" width="100" src="<?php echo base_url() ?>assets/pictures/<?php echo $cek_konfirmasi['bukti_pembayaran'] ?>" />
				    <?php } ?>
				  </div>
	      </div>
	      <hr>
	      <div class="modal-footer cust-modal-footer">
	      	<?php if(count($cek_konfirmasi) == 0) { ?>
	        <button type="submit" class="btn btn-primary">Kirim</button>
	        <button type="reset" class="btn btn-warning">Hapus</button>
	        <?php }else{ ?>
	        	<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
	        <?php } ?>
	      </div>
			</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
	function konfirmasi_pembayaran(e){
		e.preventDefault();
		$('#myModal').modal('show');
	}

	var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
  function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
      var oInput = arrInputs[i];
      if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
          var blnValid = false;
          for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                blnValid = true;
              break;
            }
          }
          
          if (!blnValid) {
            alert("Terjadi Kesalahan, '" + sFileName + "' tidak sesuai dengan ketentuan. Format file yang diperbolehkan: " + _validFileExtensions.join(", "));
            return false;
          }
        }
      }
    }
  
    return true;
  }
</script>