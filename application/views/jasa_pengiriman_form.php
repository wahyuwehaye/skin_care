<?php echo form_open_multipart(uri_string().'?'.$_SERVER['QUERY_STRING'] , array('class' => 'form-horizontal style-form')); ?>
  <div class="box box-danger">
    <div class="box-header">
      <i class="fa fa-user-plus"></i>
      <h3 class="box-title"><?php echo $title ?></h3>
      <div class="box-tools pull-right">
        <a href="<?php echo base_url() ?>jasa_pengiriman/index" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
      <hr>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama Jasa Pengiriman</label>
        <div class="col-sm-3">
          <?php 
            $value = NULL;
            if($this->input->post('nama_jasa_pengiriman') != NULL){
              $value = $this->input->post('nama_jasa_pengiriman');
            }elseif($mode == 'Edit'){
              $value = $fields['nama_jasa_pengiriman'];
            }
          ?>
          <input type="text" name="nama_jasa_pengiriman" class="form-control" value="<?php echo $value ?>">
        </div>
      </div>

      <div class="form-group" style="margin-top:25px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-check"></i> Simpan</button>
            <?php if($mode != 'Edit') { ?>
              <button type="reset" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</button>
            <?php }else{ ?>
              <a href="<?php echo base_url() ?>jasa_pengiriman/index" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</a>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php echo form_close();?>