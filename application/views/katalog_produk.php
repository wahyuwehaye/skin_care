<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.html">Beranda</a></li>
			<li class="active">Katalog Produk</li>
			</ol>
			<h2>Katalog Produk</h2>		
			<div class="col-md-9 product-model-sec">
				<?php foreach ($produk['entries'] as $key => $produk) { ?>
					<a href="<?php echo base_url() ?>katalog_produk/detail/<?php echo $produk['kd_produk'] ?>">
						<div class="product-grid">
							<div class="more-product">
								<span> </span>
							</div>						
							<div class="product-img b-link-stripe b-animate-go  thickbox">
								<img src="<?php echo base_url() ?>assets/pictures/<?php echo $produk['gambar'] ?>" class="img-responsive" alt="" style="height:218px !important;">
								<div class="b-wrapper">
									<h4 class="b-animate b-from-left  b-delay03">							
										<button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
									</h4>
								</div>
							</div>
					</a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4><?php echo $produk['nama_produk'] ?></h4>								
								<span class="item_price">Rp <?php echo number_format($produk['harga']) ?></span>
								<div class="ofr">
								  <!-- <p class="pric1"><del>Rs 280</del></p> -->
						      <p class="disc">Tersedia <?php echo $produk['stok'].' '.$produk['satuan'] ?></p>
								</div>
								<input type="text" id="item_quantity<?php echo $produk['kd_produk'] ?>" name="item_quantity<?php echo $produk['kd_produk'] ?>" class="item_quantity" value="1" />
								<input type="button" onclick="add_to_cart(event, '<?php echo $produk['kd_produk'] ?>')" class="item_add items" value="ADD">
								<div class="clearfix"> </div>
							</div>															
						</div>
					</div>
				<?php } ?>	
			</div>
			<div class="rsidebar span_1_of_left">
				<section  class="sky-form">
					<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Jenis</h4>
					<div class="row row1 scroll-pane">
						<div class="col col-4">
							<?php foreach ($jenis_produk['entries'] as $key => $jenis_produk) { ?>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i><?php echo $jenis_produk['nama_jenis_produk'] ?> (30)</label>
							<?php } ?>
						</div>
					</div>
			  </section>
				 

				<script type="text/javascript" src="<?php echo base_url() ?>lighting_web/js/jquery-ui.min.js"></script>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>lighting_web/css/jquery-ui.css">
				<script type='text/javascript'>//<![CDATA[ 
					$(window).load(function(){
					  $( "#slider-range" ).slider({
							range: true,
							min: 0,
							max: 100000,
							values: [ 500, 100000 ],
							slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					  });
						$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
					});//]]> 
				</script>
				<!---->
  
					   
			</div>				 
	  </div>
	</div>
</div>

<div class="modal fade cust-modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cust-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Keranjang Belanja</h4>
        <input type="hidden" name="rowid" id="rowid" value="">
      </div>
      <div class="modal-body">
      	<div class="alert alert-success" role="alert">
					<strong><i class="glyphicon glyphicon-shopping-cart"></i></strong> "<span id="alert-name"></span>" telah ditambahkan ke Keranjang Belanja.
			   </div>
        <div class="row">
        	<div class="col-sm-2">
        		 <img id="img-modal" class="img-responsive" alt="" width="100" />
        	</div>
        	<div class="col-sm-6" style="padding-left: 0px;">
        		<div id="name"></div>
        		<div id="price" style="font-weight: bold;"></div>
        	</div>
        	<div class="col-sm-4">
        		<div class="input-group qty-modal"> 
        			<span class="input-group-addon pointer" onclick="change_qty('min')">-</span> 
        			<input class="form-control" id="qty"> 
        			<span class="input-group-addon pointer" onclick="change_qty('plus')">+</span> 
        		</div>
        		<button class="btn btn-sm btn-danger btn-trash-modal" onclick="delete_item()"><span class="glyphicon glyphicon-trash"></span></button>
        	</div>
        </div>
        <hr>
        <div class="row" style="line-height: 1.8;">
        	<div class="col-sm-4">
        		Total harga barang:<br>
        		Biaya kirim:<br>
        		Subtotal:
        	</div>
        	<div class="col-sm-8">
        		<div class="text-right">
        			<span id="total"></span><br>
        			<span id="biaya_kirim">Diproses setelah melanjutkan pembayaran</span><br>
        			<span id="subtotal" class="sub-total-modal"></span><br>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer cust-modal-footer">
      <a href="<?php echo base_url() ?>katalog_produk/view_cart" class="btn btn-default">Lihat Keranjang</a>
        <button type="button" class="btn btn-primary">Lanjut ke Pembayaran</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->