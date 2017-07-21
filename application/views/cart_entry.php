<!-- check out -->
<div class="container">
	<ol class="breadcrumb" style="margin-bottom: 0px !important">
		<li><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
		<li><a href="<?php echo base_url() ?>katalog_produk">Katalog Produk</a></li>
		<li class="active">Keranjang Belanja</li>
	</ol>
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?php echo base_url() ?>katalog_produk">Belanja Lagi</a>
			<?php
				$jasa_pengiriman = $this->session->userdata('set_jasa_pengiriman');
				$harga_jasa_pengiriman = (!$jasa_pengiriman) ? 0 : $jasa_pengiriman['harga'];
				$id_paket_pengiriman = (!$jasa_pengiriman) ? 0 : $jasa_pengiriman['id_paket_pengiriman'];
			?>
			<div class="price-details">
				<h3>Detail Harga</h3>
				<span>Total</span>
				<span class="total1"><?php echo number_format($subtotal, 0,',','.'); ?></span>
				<!-- <span>Discount</span>
				<span class="total1">10%(Festival Offer)</span> -->
				<span>Jasa Pengiriman</span>
				<span class="total1">
					<select id="list_pengiriman">
						<option value="">Pilih</option>		
						<?php foreach ($paket_pengiriman as $key => $paket) { ?>
							<option value="<?php echo $paket['id_paket_pengiriman'] .'|'.$paket['harga'] ?>" <?php echo($paket['id_paket_pengiriman'] == $id_paket_pengiriman ? 'selected' : ''); ?>><?php echo $paket['nama_jasa_pengiriman'] .' '.$paket['paket_pengiriman']; ?></option>	
						<?php } ?>
					</select>
				</span>
				<span>Biaya Pengiriman</span>
				<span class="total1" id="delivery_charges"><?php echo number_format($harga_jasa_pengiriman, 0,',','.'); ?></span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   	<li class="last_price"> <h4>TOTAL</h4></li>	
			   	<li class="last_price"><span id="lbl-subtotal"><?php echo 'Rp '.number_format(($subtotal+$harga_jasa_pengiriman), 0,',','.'); ?></span></li>
					<input type="hidden" value="<?php echo $subtotal ?>" id="subtotal">			   
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>

			<a class="order" id="next_order" style="margin-bottom: 30px;">Selesai</a>


			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<hr>
		</div>
		<div class="col-md-9 cart-items">
			<h1>Produk yang dipilih (<span id="count_checkout"><?php echo count($this->cart->contents()); ?></span>) <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
			<div class="pull-right">
				<div class="closeall" id="closeall"> </div>
			</div>
			</h1>
			
			<?php 
				$no = 1;
				foreach ($this->cart->contents() as $key => $items){ ?>
				<div class="cart-header2" id="cart-header<?php echo $no ?>">
					<div class="close2" id="close<?php echo $no ?>"> </div>
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="<?php echo base_url() ?>assets/pictures/<?php echo $items['gambar'] ?>" class="img-responsive" alt=""/>
						</div>
				   	<div class="cart-item-info">
					    <h3><a href="single.html"><?php echo $items['name'] ?></a><span>Jenis: <?php echo $items['jenis_produk'] ?></span></h3>
							<ul class="qty">
								<li><p>Harga satuan : Rp<?php echo number_format($items['price'], 0,',','.') ?></p></li>
								<li><p>Qty : <?php echo $items['qty'] ?></p></li>
							</ul>
							<div class="delivery">
							 <p>Total Harga : Rp<?php echo number_format($items['subtotal'], 0,',','.') ?></p>
							 <span>Estimasi pengiriman: 2-3 hari kerja</span>
							 <div class="clearfix"></div>
							</div>								
				   	</div>
			   		<div class="clearfix"></div>						
			  	</div>
			 	</div>
			 	<script>
			 		$(document).ready(function(c) {
						$('#close<?php echo $no ?>').on('click', function(c){
							$('#cart-header<?php echo $no ?>').fadeOut('slow', function(c){
								$('#cart-header<?php echo $no ?>').remove();
								min_count();
								delete_item("<?php echo $items['rowid'] ?>");
							});
						});	  
					});
			  </script>
			<?php $no++; } ?>	
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->

<script src="<?php echo base_url() ?>assets/plugins/others/accounting.js"></script>
<script>
	function min_count(){
		var count_checkout = $("#count_checkout").html();
		$("#count_checkout").html((count_checkout-1));
	}
	$(document).ready(function(c) {
		$('#closeall').on('click', function(c){
			$('.cart-header2').fadeOut('slow', function(c){
				$('.cart-header2').remove();
				min_count();
			});
			delete_cart();
		});	  
	});

	$("#list_pengiriman").change(function(){
		var val = ($(this).val() == "") ? 0 : $(this).val();
		if(val != 0){
			var split_val = val.split('|');
			var id = split_val[0];
			val = parseInt(split_val[1]);
		}else{
			var id = 0;
		}
		var subtotal = parseInt($("#subtotal").val());
		
		var total = (subtotal+val);
		$("#delivery_charges").html(accounting.formatMoney(val, "", 0,'.'));
		$("#lbl-subtotal").html(accounting.formatMoney(total, "Rp ", 0,'.'));

		$.ajax({
	    url: "<?php echo base_url() ?>katalog_produk/set_jasa_pengiriman" + '/' + id + '/' +val,
	    dataType: 'json',
	    success: function(data){
	      console.log(data);
	    }
	  });
	});

	$("#next_order").click(function(e){
		e.preventDefault();
		var base_url = '<?php echo base_url() ?>';
		var jasa = $("#list_pengiriman").val();
		if(jasa == ""){
			alert('Jasa pengiriman harus dipilih');
		}else{
			window.location = base_url+'pemesanan/create';
		}
	});
</script>
