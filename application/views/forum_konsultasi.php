<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
			<li><a href="<?php echo base_url(); ?>konsultasi">Konsultasi</a></li>
			<li class="active">Forum Konsultasi</li>
		</ol>
  </div>
</div>
<!---->
<div class="offers">
	 <h3>Forum Konsultasi dengan Dokter</h3>
	 <div class="container">
	<div class="box-tools pull-left">
		<a href="<?php echo base_url(); ?>konsultasi"" class="btn btn-success bg-olive btn-xs pull-left" style="margin-top: 3px; margin-left:5px;"><i class="fa fa-plus"></i> Konsultasi</a>
	 </div>
		 <div class="col-md-12 grid-left">
			 <a href=""><div class="offer-grid1">
				 <div class="col-md-12 about-us">
					<h3 style="text-align: left;"><?php echo $konsultasi['pertanyaan'] ?></h3>
					<h5 style="text-align: left;">Posted by <?php echo get_profil_by_array(($konsultasi['id_konsumen']), 'nama_lengkap') ?></h5>
					<?php $time_get = strtotime($konsultasi['tgl_konsultasi']); ?>
					<h6 style="text-align: left;"><?php echo time_ago($time_get) ?></h6>
					</br>
					<p><?php echo $konsultasi['diagnosa'] ?></p>
				</div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 <div class="clearfix"></div>
	 <div class="box-tools pull-right">
	 	<?php
	 		$sesi = $this->session->userdata('id_pengguna');
	 		$kamu = $konsultasi['id_konsumen'];
	 		if($this->session->userdata('grup') == 'dokter'){
	 			?>
	 				<button onclick="formkonsultasi(event)" class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Jawab</button>
	 			<?php
	 		}
	 		else if ($sesi==$kamu) {
	 			?>
	 				<button onclick="formkonsultasi(event)" class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Jawab</button>
	 			<?php
	 		}else{
	 			?>
	 				<button disabled class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Jawab</button>
	 			<?php
	 		}
	 	?>
		<!-- <button onclick="formkonsultasi(event)" class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Jawab</button> -->
	 </div>
	<div>
	    <?php $this->load->view('notice'); ?>
	</div>
	 	 <!-- <div class="offer-grids">
		 <div class="col-md-12 grid-left">
			 <a href=""><div class="offer-grid1">
				 <div class="col-md-12 about-us">
					<h3 style="text-align: left;"><?php echo $konsultasi['pertanyaan'] ?></h3>
					<h5 style="text-align: left;">Posted by <?php echo get_profil_by_array(($konsultasi['id_konsumen']), 'nama_lengkap') ?></h5>
					<?php $time_get = strtotime($konsultasi['tgl_konsultasi']); ?>
					<h6 style="text-align: left;"><?php echo time_ago($time_get) ?></h6>
					</br>
					<p><?php echo $konsultasi['diagnosa'] ?></p>
				</div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 </div>
		 <div class="clearfix"></div> -->
		 <?php 
		if(count($forumkonsultasi['forumentries']) > 0) {
			foreach ($forumkonsultasi['forumentries'] as $key => $forumkonsultasi) { ?>
	 	 <div class="offer-grids">
		 <div class="col-md-12 grid-left">
			 <a href=""><div class="offer-grid1">
				 <div class="col-md-12 about-us">
					<h3 style="text-align: left;">commentary by <?php echo get_profil_by_array(($forumkonsultasi['id_user']), 'nama_lengkap') ?></h3>
					<?php $time_get = strtotime($forumkonsultasi['tgl_post']); ?>
					<h6 style="text-align: left;"><?php echo time_ago($time_get) ?></h6>
					</br>
					<p><?php echo $forumkonsultasi['komentar'] ?></p>
				</div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 </div>
		 <div class="clearfix"></div>
		 <?php 
			} 
		}else {
		?>
		<div class="offer-grids">
		<div class="col-md-12 grid-left">
			 <a href="#"><div class="offer-grid1">
				 <div class="col-md-12 about-us">
					<h3 style="text-align: center;">Tidak ada Komentar</h3>
				</div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 </div>
		 <div class="clearfix"></div>
		<?php } ?>
	 </div>
	 </div>
</div>
<!---->

<!-- MODALS -->
<div class="modal fade cust-modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cust-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Komentar</h4>
      </div>
      <?php $id=$this->uri->segment(3, 0); ?>
    <form action="<?php echo base_url() ?>konsultasi/createkomen/<?php echo $id; ?>" onsubmit="return Validate(this);" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
				  
				  <div class="form-group">
				    <label>Komentar/Masukkan</label>
				    <textarea rows="10" class="form-control" name="komentar" id="komentar" required></textarea>
				  </div>

	      </div>
	      <hr>
	      <div class="modal-footer cust-modal-footer">
	        <button type="submit" class="btn btn-primary">Kirim</button>
	        <button type="reset" class="btn btn-warning">Hapus</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
	      </div>
	</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- MODALS -->

<script type="text/javascript">
	function formkonsultasi(e){
		e.preventDefault();
		$('#myModal').modal('show');
	}
</script>