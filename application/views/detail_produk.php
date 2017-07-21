<link href="<?php echo base_url() ?>lighting_web/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url() ?>lighting_web/css/flexslider.css" type="text/css" media="screen" />
<div class="product-model">
	<div class="container">	
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>katalog_produk">Katalog Produk</a></li>
			<li class="active">Detail Produk "<?php echo $fields['nama_produk'] ?>"</li>
		</ol>			
		<div class="product-price1">
			<div class="top-sing">
				<div class="col-md-7 single-top">	
					<div class="flexslider">
					  <ul class="slides">
							<li data-thumb="<?php echo base_url() ?>assets/pictures/<?php echo $fields['gambar'] ?>">
								<div class="thumb-image"> <img src="<?php echo base_url() ?>assets/pictures/<?php echo $fields['gambar'] ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
							</li>
					  </ul>
					</div>					 					 
					<script src="<?php echo base_url() ?>lighting_web/js/imagezoom.js"></script>
					<script defer src="<?php echo base_url() ?>lighting_web/js/jquery.flexslider.js"></script>
					<script>
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				</div>	
			  <div class="col-md-5 single-top-in simpleCart_shelfItem">
				  <div class="single-para ">
						<h4><?php echo $fields['nama_produk'] ?></h4>							
						<h5 class="item_price">Rp <?php echo number_format($fields['harga'], 0, ',','.') ?></h5>							
						<p class="para"><?php echo $fields['deskripsi'] ?></p>

						<input type="text" class="item_quantity" value="1" style="width: 60px;" id="item_quantity<?php echo $fields['kd_produk'] ?>"/>
						<input type="button" class="item_add items" value="ADD" onclick="add_to_cart(event, '<?php echo $fields['kd_produk'] ?>')">
					</div>
				</div>
				<div class="clearfix"> </div>
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