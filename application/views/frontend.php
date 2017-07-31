<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	<head>
		<title>Vania Skin Scare</title>
		<link href="<?php echo base_url() ?>lighting_web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="<?php echo base_url() ?>lighting_web/js/jquery.min.js"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

		<!-- Custom Theme files -->
		<!--theme style-->
		<link href="<?php echo base_url() ?>lighting_web/css/style.css" rel="stylesheet" type="text/css" media="all" />	
		<!--//theme style-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- start menu -->
		<!-- <script src="<?php echo base_url() ?>lighting_web/js/simpleCart.min.js"> </script> -->
		<script src="<?php echo base_url() ?>lighting_web/js/cart.js"> </script>
		<!-- start menu -->
		<link href="<?php echo base_url() ?>lighting_web/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="<?php echo base_url() ?>lighting_web/js/memenu.js"></script>
		<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
		<!-- /start menu -->
		<link href="<?php echo base_url() ?>lighting_web/css/form.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/custom/style.css">
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="<?php echo base_url() ?>lighting_web/js/jquery.jscrollpane.min.js"></script>
				<script type="text/javascript" id="sourcecode">
					$(function()
					{
						$('.scroll-pane').jScrollPane();
					});
				</script>
		<!-- //the jScrollPane script -->

		</head>
	<body> 
	<!--header-->	
	<script src="<?php echo base_url() ?>lighting_web/js/responsiveslides.min.js"></script>
	<script>  
	    $(function () {
	      $("#slider").responsiveSlides({
	      	auto: true,
	      	nav: true,
	      	speed: 500,
	        namespace: "callbacks",
	        pager: false,
	      });
	    });
	  </script>
	  
	<div class="header-top">
		<div class="header-bottom">			
			<div class="logo">
				<h1><a href="<?php echo base_url() ?>">Vania SC</a></h1>					
			</div>
			<!---->		 
			<div class="top-nav" style="width: 60% !important;">
				<ul class="memenu skyblue">
					<?php
					if($this->session->userdata('grup') == 'dokter'){
						?>
					<li class="<?php echo ($page == 'konsultasi') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>konsultasi"">Konsultasi</a></li>
					<?php if(!$this->session->userdata('is_logged_in')){ ?>
						<li class="<?php echo ($page == 'login') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>login">Login</a></li>	
					<?php }else{ ?>
						<li class="<?php echo ($page == 'logout') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>logout">Logout</a></li>	
					<?php } ?>
						<?php
					}else{
						?>
					<li class="<?php echo ($page == 'beranda') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
					<li class="<?php echo ($page == 'katalog_produk') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>katalog_produk">Produk</a></li>
					<li class="<?php echo ($page == 'konsultasi') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>konsultasi"">Konsultasi</a></li>
					<li class="<?php echo ($page == 'tentang_kami') ? 'active' : 'grid'; ?>"><a href="#">Tentang Kami</a></li>
					<li class="<?php echo ($page == 'pemesanan') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>pemesanan">Pemesanan</a></li>
					<?php if(!$this->session->userdata('is_logged_in')){ ?>
						<li class="<?php echo ($page == 'login') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>login">Login</a></li>	
					<?php }else{ ?>
						<li class="<?php echo ($page == 'logout') ? 'active' : 'grid'; ?>"><a href="<?php echo base_url() ?>logout">Logout</a></li>	
					<?php } ?>	
						<?php
					}
					?>
							
				</ul>				
			</div>
			<!---->
			<div class="cart box_1">
				<a href="<?php echo base_url() ?>katalog_produk/view_cart">
					<div class="total" id="cart_total_home">
						<!-- <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span>) -->
						<span class="Cart_total">Rp 0.00</span> (<span id="Cart_quantity" class="Cart_quantity">0</span>)
					</div>
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
				</a>
				<a href="<?php echo base_url() ?>konsultasi" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-bell"></i>
              <span class="label label-warning"><?php
											                  $this->db->select('id');
											                  $this->db->from('notifikasi');
											                  // $this->db->where('status','new');
											                  echo $this->db->count_all_results();
											                ?></span>
            </a>
				<p><a href="javascript:delete_cart();" class="simpleCart_empty">Kosongkan <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></p>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		<!---->			 
 		</div>
		<div class="clearfix"> </div>
	</div>
	<!---->	
	<?= $contents ?>
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 about-us">
					<h3>About Us</h3>
					<p>Maecenas nec auctor sem. Vivamus porttitor tincidunt elementum nisi a, euismod rhoncus urna. Curabitur scelerisque vulputate arcu eu pulvinar. Fusce vel neque diam</p>
				</div>
				<div class="col-md-3 ftr-grid">
					<h3>Information</h3>
					<ul class="nav-bottom">
						<li><a href="#">Track Order</a></li>
						<li><a href="#">New Products</a></li>
						<li><a href="#">Location</a></li>
						<li><a href="#">Our Stores</a></li>
						<li><a href="#">Best Sellers</a></li>	
					</ul>					
				</div>
				<div class="col-md-3 ftr-grid">
					<h3>More Info</h3>
					<ul class="nav-bottom">
						<li><a href="login.html">Login</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Membership</a></li>	
					</ul>					
				</div>
				<div class="col-md-3 ftr-grid">
					<h3>Categories</h3>
					<ul class="nav-bottom">
						<li><a href="#">Car Lights</a></li>
						<li><a href="#">LED Lights</a></li>
						<li><a href="#">Decorates</a></li>
						<li><a href="#">Wall Lights</a></li>
						<li><a href="#">Protectors</a></li>	
					</ul>					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="copywrite">
		<div class="container">
			<div class="copy">
				<p>© 2015 Vania Skincare	. All Rights Reserved</p>
			</div>
			<div class="social">							
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>	
				<a href="#"><i class="google"></i></a>	
				<a href="#"><i class="youtube"></i></a>	
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!---->
	<script type="text/javascript">
		$(document).ready(function(){
      cek_cart();
    });
		function cek_cart(){
      var site_url = "<?php echo base_url() ?>katalog_produk/cart";
      $.ajax({
        url: site_url,
        cache: false,
        type: "POST",
        data : {
          stat : 0
        },
        success: function(data){
          $("#cart_total_home").html(data);
        }
      });

      // var waktu = setTimeout("cek_cart()",1000);
    }
    function delete_cart(){
    	var site_url = "<?php echo base_url() ?>katalog_produk/delete_cart";
      $.ajax({
        url: site_url,
        cache: false,
        type: "POST",
        data : {
          stat : 0
        },
        success: function(data){
        }
      });
    }
		function add_to_cart(e, kd_produk, link){
			e.preventDefault();
			var qty = $("#item_quantity"+kd_produk).val();
			$("#img-modal").removeAttr('src');
			$.ajax({
		    url: "<?php echo base_url() ?>katalog_produk/add_to_cart" + '/' + kd_produk + '/' +qty,
		    dataType: 'json',
		    success: function(data){
		      console.log(data);
		      $("#img-modal").attr('src','<?php echo base_url() ?>assets/pictures/'+data.gambar);
		      $("#name, #alert-name").html(data.name);
		      $("#rowid").val(data.rowid);
		      $("#price").html(data.price);
		      $("#qty").val(data.qty);
		      $("#total, #subtotal").html(data.subtotal);
		      $('#myModal').modal('show');
		    }
		  });
		}

		function change_qty(opr){
			var qty = parseInt($("#qty").val());
			var rowid = $("#rowid").val();
			if(opr == 'min'){
				if(qty > 1){
					qty = qty-1;
				}
			}else{
				qty = qty+1;
			}
			$("#qty").val(qty);
			$.ajax({
		    url: "<?php echo base_url() ?>katalog_produk/change_qty" + '/' + rowid + '/' +qty,
		    dataType: 'json',
		    success: function(data){
		      $("#img-modal").attr('src','<?php echo base_url() ?>assets/pictures/'+data.gambar);
		      $("#name, #alert-name").html(data.name);
		      $("#kd_produk").val(data.id);
		      $("#price").html(data.price);
		      $("#qty").val(data.qty);
		      $("#total, #subtotal").html(data.subtotal);
		      $('#myModal').modal('show');
		    }
		  });
		}

		function delete_item(id = null){
			var rowid = (id == null) ? $("#rowid").val() : id;
			var qty = 0;
			$.ajax({
		    url: "<?php echo base_url() ?>katalog_produk/change_qty" + '/' + rowid + '/' +qty,
		    dataType: 'json',
		    success: function(data){
					$('#myModal').modal('hide');
		    }
		  });
		}
	</script>
	</body>
</html>
