<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.html">Beranda</a></li>
			<li class="active">Konsultasi</li>
		</ol>
		<h2>Daftar Konsultasi</h2>
		<hr>
		<br>
		<div class="row">
			<div class="col-sm-12">
			<div class="box-tools pull-right">
			  	<button onclick="formkonsultasi(event)" class="btn btn-success bg-olive btn-xs pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah Konsultasi</button>
		    </div>
				<div>
	      	<?php $this->load->view('notice'); ?>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No Konsultasi</th>
							<th>Tanggal Konsultasi</th>
							<th>Diagnosa</th>
							<th>ID Pasien</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(count($konsultasi['entries']) > 0) {
							foreach ($konsultasi['entries'] as $key => $konsultasi) { ?>
							<tr>
								<td><?php echo $konsultasi['no_konsultasi'] ?></td>
								<td><?php echo $konsultasi['tgl_konsultasi'] ?></td>
								<td><?php echo $konsultasi['diagnosa'] ?></td>
								<td><?php echo $konsultasi['id_konsumen'] ?></td>
								<td><a href="<?php echo base_url() ?>konsultasi/forum/<?php echo $konsultasi['no_konsultasi'] ?>">Detail</td>
							</tr>
							<?php 
							} 
						}else {
						?>
						<tr>
							<td colspan="8" style="text-align: center">Tidak ada konsultasi</td>
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
				    <label>Diagnosa</label>
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