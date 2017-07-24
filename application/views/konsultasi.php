<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
			<li class="active">Konsultasi</li>
		</ol>
  </div>
</div>
<!---->
<div class="offers">
	 <div class="container">
	 <h3>Konsultasi dengan Dokter</h3>
	 <div class="box-tools pull-right">
	 	<?php
	 		if($this->session->userdata('grup') == 'dokter'){
	 			?>
	 				<button disabled class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Konsultasi</button>
	 			<?php
	 		}else{
	 			?>
	 				<button onclick="formkonsultasi(event)" class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Konsultasi</button>
	 			<?php
	 		}
	 	?>
	 </div>
	<div>
	    <?php $this->load->view('notice'); ?>
	</div>
	 <?php 
		if(count($konsultasi['entries']) > 0) {
			foreach ($konsultasi['entries'] as $key => $konsultasi) { ?>
	 	 <div class="offer-grids">
		 <div class="col-md-12 grid-left">
			 <a href="<?php echo base_url() ?>konsultasi/forum/<?php echo $konsultasi['no_konsultasi'] ?>"><div class="offer-grid1">
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
		 <div class="clearfix"></div>
		 <?php 
			} 
		}else {
		?>
		<div class="offer-grids">
		<div class="col-md-12 grid-left">
			 <a href="#"><div class="offer-grid1">
				 <div class="col-md-12 about-us">
					<h3 style="text-align: center;">Tidak ada konsultasi</h3>
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
        <h4 class="modal-title">Tambah Konsultasi</h4>
      </div>
    <form action="<?php echo base_url() ?>konsultasi/create" onsubmit="return Validate(this);" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
				  
				  <div class="form-group">
				    <label>Pertanyaan</label>
				    <input class="form-control" type="text" name="pertanyaan" id="pertanyaan" required>
				  </div>
				  <div class="form-group">
				    <label>Keluhan</label>
				    <textarea rows="10" class="form-control" name="diagnosa" id="diagnosa" required></textarea>
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