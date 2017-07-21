<?php echo form_open_multipart(uri_string().'?'.$_SERVER['QUERY_STRING'] , array('class' => 'form-horizontal style-form')); ?>
  <div class="box box-danger">
    <div class="box-header">
      <i class="fa fa-user-plus"></i>
      <h3 class="box-title"><?php echo $title ?></h3>
      <div class="box-tools pull-right">
        <a href="<?php echo base_url() ?>produk/index" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
      <hr>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Kode Produk</label>
        <div class="col-sm-2">
          <?php 
            $value = NULL;
            if($this->input->post('kd_produk') != NULL){
              $value = $this->input->post('kd_produk');
            }elseif($mode == 'Edit'){
              $value = $fields['kd_produk'];
            }
          ?>
          <input type="text" name="kd_produk" class="form-control" value="<?php echo $value ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama Produk</label>
        <div class="col-sm-3">
          <?php 
            $value = NULL;
            if($this->input->post('nama_produk') != NULL){
              $value = $this->input->post('nama_produk');
            }elseif($mode == 'Edit'){
              $value = $fields['nama_produk'];
            }
          ?>
          <input type="text" name="nama_produk" class="form-control" value="<?php echo $value ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Produk</label>
        <div class="col-sm-2">
          <?php 
            $value = NULL;
            if($this->input->post('id_jenis_produk') != NULL){
              $value = $this->input->post('id_jenis_produk');
            }elseif($mode == 'Edit'){
              $value = $fields['id_jenis_produk'];
            }
          ?>
          <select name="id_jenis_produk" class="form-control">
            <option value="">- Pilih -</option>
            <?php foreach ($jenis_produk['entries'] as $jenis) { ?>
              <option value="<?php echo $jenis['id_jenis_produk'] ?>" <?php echo ($jenis['id_jenis_produk'] == $value) ? 'selected' : ''; ?>><?php echo $jenis['nama_jenis_produk'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Satuan</label>
        <div class="col-sm-2">
          <?php 
            $value = NULL;
            if($this->input->post('satuan') != NULL){
              $value = $this->input->post('satuan');
            }elseif($mode == 'Edit'){
              $value = $fields['satuan'];
            }
          ?>
          <select name="satuan" class="form-control">
            <option value="">- Pilih -</option>
            <option value="pcs" <?php echo ($value == 'pcs') ? 'selected' : ''; ?>>Pcs</option>
          </select>
        </div>
      </div>
      
      <?php if($mode != 'Edit') { ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Stok Awal</label>
        <div class="col-sm-1">
          <?php 
            $value = NULL;
            if($this->input->post('stok') != NULL){
              $value = $this->input->post('stok');
            }elseif($mode == 'Edit'){
              $value = $fields['stok'];
            }
          ?>
          <input type="text" name="stok" class="form-control" value="<?php echo $value ?>" onkeypress="return isNumberKey(event)">
        </div>
      </div>
      <?php } ?>

      <div class="form-group">
        <label class="col-sm-2 control-label">Minimum Stok</label>
        <div class="col-sm-1">
          <?php 
            $value = NULL;
            if($this->input->post('min_stok') != NULL){
              $value = $this->input->post('min_stok');
            }elseif($mode == 'Edit'){
              $value = $fields['min_stok'];
            }
          ?>
          <input type="text" name="min_stok" class="form-control" value="<?php echo $value ?>" onkeypress="return isNumberKey(event)">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Harga</label>
        <div class="col-sm-2">
          <?php 
            $value = NULL;
            if($this->input->post('harga') != NULL){
              $value = $this->input->post('harga');
            }elseif($mode == 'Edit'){
              $value = $fields['harga'];
            }
          ?>
          <input type="text" name="harga" class="form-control" value="<?php echo $value ?>" onkeypress="return isNumberKey(event)">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-5">
          <?php 
            $value = NULL;
            if($this->input->post('deskripsi') != NULL){
              $value = $this->input->post('deskripsi');
            }elseif($mode == 'Edit'){
              $value = $fields['deskripsi'];
            }
          ?>
          <textarea name="deskripsi" rows="5" class="form-control"><?php echo $value ?></textarea>
        </div>
      </div>
      <?php if($mode == 'Edit') { ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Gambar</label>
        <div class="col-sm-3">
          <input type="hidden" value="<?php echo $fields['gambar'] ?>" name="gambar">
          <img src="<?php echo base_url() ?>assets/pictures/<?php echo $fields['gambar'] ?>" class="img" width="100">
        </div>
      </div>
      <?php } ?>
      <div class="form-group">
        <label class="col-sm-2 control-label"><?php echo ($mode == 'Edit') ? 'Ganti ' : ''; ?>Gambar</label>
        <div class="col-sm-3">
          <input type="file" name="file" class="form-control" value="">
        </div>
      </div>

      <div class="form-group" style="margin-top:25px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-check"></i> Simpan</button>
            <?php if($mode != 'Edit') { ?>
              <button type="reset" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</button>
            <?php }else{ ?>
              <a href="<?php echo base_url() ?>produk/index" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</a>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php echo form_close();?>