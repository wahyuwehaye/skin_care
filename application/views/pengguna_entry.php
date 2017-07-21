<div class="form-horizontal style-form">
	<div class="box box-danger">
	  <div class="box-header">
	    <i class="fa fa-user-plus"></i>
	    <h3 class="box-title"><?php echo $title ?></h3>
	    <div class="box-tools pull-right">
        <a href="<?php echo base_url() ?>pengguna/index/<?php echo $grup ?>" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
	    <hr>
	  </div>

	  <div class="box-body">
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Nama Lengkap</label>
	      <div class="col-sm-4">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo $fields['nama_lengkap'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Tanggal Lahir</label>
	      <div class="col-sm-2">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo $fields['tgl_lahir'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Username</label>
	      <div class="col-sm-3">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo $fields['username'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">No HP</label>
	      <div class="col-sm-2">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo $fields['no_hp'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Email</label>
	      <div class="col-sm-2">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo $fields['email'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Alamat</label>
	      <div class="col-sm-5">
	        <div class="form-control col-sm-12 col-xs-12 lbl-textarea"><?php echo $fields['alamat'] ?></div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Status</label>
	      <div class="col-sm-2">
	        <div class="form-control col-sm-12 col-xs-12"><?php echo ($fields['status'] == 1) ? 'Aktif' : 'Tidak Aktif'; ?></div>
	      </div>
	    </div>
		</div>
	</div>
</div>