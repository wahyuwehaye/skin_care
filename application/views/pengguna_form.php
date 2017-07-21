<?php echo form_open_multipart(uri_string(), array('class' => 'form-horizontal style-form')); ?>
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
        <label class="col-sm-2 control-label">Nama Lengkap</label>
        <div class="col-sm-4">
          <?php 
            $value = NULL;
            if($this->input->post('nama_lengkap') != NULL){
              $value = $this->input->post('nama_lengkap');
            }elseif($mode == 'Edit'){
              $value = $fields['nama_lengkap'];
            }
          ?>
          <input type="hidden" name="grup" class="form-control" value="<?php echo $grup ?>">
          <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $value ?>" onkeypress="return isCharKey(event)">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Lahir</label>
        <div class="col-sm-4">
          <div class="row">
            <?php 
              $value = NULL;
              if($this->input->post('tahun') != NULL){
                $value = $this->input->post('tahun');
              }elseif($mode == 'Edit'){
                $value = $fields['tahun'];
              }
            ?>
            <div class="col-sm-4">
              <select class="form-control" name="tahun">
                <option value="">-Thn-</option>
                <?php for ($i=1940; $i <= date('Y'); $i++) { ?> 
                  <option <?php echo($i==$value) ? 'selected' : ''; ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
            <?php 
              $value = NULL;
              if($this->input->post('bulan') != NULL){
                $value = $this->input->post('bulan');
              }elseif($mode == 'Edit'){
                $value = $fields['bulan'];
              }
            ?>
            <div class="col-sm-4">
              <select class="form-control" name="bulan">
                <option value="">-Bln-</option>
                <?php for ($i=1; $i <= 12; $i++) { ?> 
                  <option <?php echo($i==$value) ? 'selected' : ''; ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
            <?php 
              $value = NULL;
              if($this->input->post('hari') != NULL){
                $value = $this->input->post('hari');
              }elseif($mode == 'Edit'){
                $value = $fields['hari'];
              }
            ?>
            <div class="col-sm-4">
              <select class="form-control" name="hari">
                <option value="">-Hari-</option>
                <?php for ($i=1; $i <= 31; $i++) { ?> 
                  <option <?php echo($i==$value) ? 'selected' : ''; ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>

      <?php if($mode=='Edit') : ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Username</label>
          <div class="col-sm-4">
            <?php 
              $value = NULL;
              if($this->input->post('username') != NULL){
                $value = $this->input->post('username');
              }elseif($mode == 'Edit'){
                $value = $fields['username'];
              }
            ?>
            <input type="text" name="username" class="form-control" value="<?php echo $value ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Password</label>
          <div class="col-sm-3">
            <?php 
              $value = NULL;
              if($this->input->post('password') != NULL){
                $value = $this->input->post('password');
              }elseif($mode == 'Edit'){
                $value = $fields['password'];
              }
            ?>
            <input type="hidden" name="password" class="form-control" value="<?php echo $value ?>">
            <input type="password" name="newpassword" class="form-control">
          </div>
        </div>
      <?php endif; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">No HP</label>
        <div class="col-sm-3">
          <?php 
            $value = NULL;
            if($this->input->post('no_hp') != NULL){
              $value = $this->input->post('no_hp');
            }elseif($mode == 'Edit'){
              $value = $fields['no_hp'];
            }
          ?>
          <input type="text" name="no_hp" class="form-control" value="<?php echo $value ?>" onkeypress="return isNumberKey(event)">
          <span class="help-block">Tidak boleh lebih dari 12 digit</span>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
          <?php 
            $value = NULL;
            if($this->input->post('email') != NULL){
              $value = $this->input->post('email');
            }elseif($mode == 'Edit'){
              $value = $fields['email'];
            }
          ?>
          <input type="text" name="email" class="form-control" value="<?php echo $value ?>">
          <span class="help-block">Contoh: email@example.com</span>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-6">
          <?php 
            $value = NULL;
            if($this->input->post('alamat') != NULL){
              $value = $this->input->post('alamat');
            }elseif($mode == 'Edit'){
              $value = $fields['alamat'];
            }
          ?>
          <textarea class="form-control" type="text" name="alamat"><?php echo $value ?></textarea>
        </div>
      </div>

      <?php if($mode=='Edit') : ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-2">
              <?php 
                $value = NULL;
                if($this->input->post('status') != NULL){
                  $value = $this->input->post('status');
                }elseif($mode == 'Edit'){
                  $value = $fields['status'];
                }
              ?>
              <select class="form-control" name="status">
                <option value="0" <?php echo ($value == '0') ? "selected" : ""; ?>>Tidak Aktif</option>
                <option value="1" <?php echo ($value == '1') ? "selected" : ""; ?>>Aktif</option>
              </select>
          </div>
        </div>
      <?php endif; ?>
      
      <div class="form-group" style="margin-top:25px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-flat btn-primary"><i class="fa fa-check"></i> Simpan</button>
            <?php if($mode != 'Edit') { ?>
              <button type="reset" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</button>
            <?php }else{ ?>
              <a href="<?php echo base_url() ?>pengguna/index/<?php echo $grup ?>" class="btn btn-flat btn-danger"><i class="fa fa-close"></i> Batal</a>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php echo form_close();?>