<!-- check out -->
<div class="container">
	<ol class="breadcrumb" style="margin-bottom: 0px !important">
		<li><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
		<li><a href="<?php echo base_url() ?>konsultasi">Konsultasi</a></li>
		<li class="active">Forum Konsultasi</li>
	</ol>
	<div class="check-sec">	 
		<div style="margin-left:15px; margin-right: 15px;">
	  	<?php $this->load->view('notice'); ?>
		</div>
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?php echo base_url() ?>konsultasi">Kembali ke Daftar Konsultasi</a> 
			<div class="price-details">
				<h3>Diagnosa</h3>
				<h4>...</h4>
				<div class="clearfix"></div>				 
			</div>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->