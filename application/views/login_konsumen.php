<div class="product-model">	 
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.html">Beranda</a></li>
			<li class="active">Login</li>
		</ol>
		<h2>Login</h2>
		<hr>
		<br>
		<div class="row">
			<div class="col-md-4">
				<?php if(isset($_POST['btn-login'])) { ?>
				<div style="">
	      	<?php $this->load->view('notice'); ?>
				</div>
				<?php  } ?>
				<div class="contact-form">
	    	 	<h4>Form Login</h4>
	    	 	<br>
	    	 	<form action="<?php echo base_url() ?>login?<?php echo $_SERVER['QUERY_STRING'] ?>" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1" class="lbl-form">Username</label>
					    <input type="text" class="cust-text" id="exampleInputEmail1" name="username" placeholder="Username">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1" class="lbl-form">Password</label>
					    <input type="password" class="cust-text" id="exampleInputPassword1" name="password" placeholder="Password">
					  </div>
					  <div>
				   		<span><input type="submit" class="mybutton" value="Masuk" name="btn-login"></span>
				  	</div>
					</form>
				</div>
			</div>				
			<div class="col-md-8">
				<?php if(isset($_POST['btn-register'])) { ?>
				<div style="width: 600px; float: right;">
	      	<?php $this->load->view('notice'); ?>
				</div>
				<?php  } ?>
			  <div class="contact-form" style="width: 600px; float: right;">
	  	 		<h4>Form Registrasi</h4><br>
			    <form method="post" action="<?php echo base_url() ?>konsumen/login?<?php echo $_SERVER['QUERY_STRING'] ?>">
				    <?php 
	            $value = NULL;
	            if($this->input->post('nama_lengkap') != NULL){
	              $value = $this->input->post('nama_lengkap');
	            }
	          ?>
			    	<div class="form-group">
					    <label class="lbl-form">Nama Lengkap</label>
					    <input type="text" class="cust-text" name="nama_lengkap" value="<?php echo $value ?>">
					  </div>
					  <div class="form-group">
					    <label class="lbl-form">Tanggal Lahir</label>
					    <div class="row" style="padding-left: 15px !important; padding: 0px;">
		            <?php 
		              $value = NULL;
		              if($this->input->post('tahun') != NULL){
		                $value = $this->input->post('tahun');
		              }
		            ?>
		            <div class="col-sm-3">
		              <select class="cust-text" name="tahun">
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
		              }
		            ?>
		            <div class="col-sm-3">
		              <select class="cust-text" name="bulan">
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
		              }
		            ?>
		            <div class="col-sm-3">
		              <select class="cust-text" name="hari">
		                <option value="">-Hari-</option>
		                <?php for ($i=1; $i <= 31; $i++) { ?> 
		                  <option <?php echo($i==$value) ? 'selected' : ''; ?>><?php echo $i ?></option>
		                <?php } ?>
		              </select>
		            </div>
		          </div>
					  </div>

			    	<div class="form-group">
			    		<?php 
		            $value = NULL;
		            if($this->input->post('no_hp') != NULL){
		              $value = $this->input->post('no_hp');
		            }
		          ?>
					    <label class="lbl-form">No HP</label>
					    <input type="text" class="cust-text" name="no_hp" value="<?php echo $value ?>">
					  </div>

					  <div class="form-group">
			    		<?php 
		            $value = NULL;
		            if($this->input->post('username') != NULL){
		              $value = $this->input->post('username');
		            }
		          ?>
					    <label class="lbl-form">Username</label>
					    <input type="text" class="cust-text" name="username" value="<?php echo $value ?>">
					  </div>

					  <div class="form-group">
			    		<?php 
		            $value = NULL;
		            if($this->input->post('password') != NULL){
		              $value = $this->input->post('password');
		            }
		          ?>
					    <label class="lbl-form">Password</label>
					    <input type="password" class="cust-text" name="password" value="<?php echo $value ?>">
					  </div>

					  <div class="form-group">
			    		<?php 
		            $value = NULL;
		            if($this->input->post('email') != NULL){
		              $value = $this->input->post('email');
		            }
		          ?>
					    <label class="lbl-form">Email</label>
					    <input type="text" class="cust-text" name="email" value="<?php echo $value ?>">
					  </div>

					  <div class="form-group">
			    		<?php 
		            $value = NULL;
		            if($this->input->post('alamat') != NULL){
		              $value = $this->input->post('alamat');
		            }
		          ?>
					    <label class="lbl-form">Alamat</label>
					    <textarea class="cust-text" name="alamat"><?php echo $value ?></textarea>
					  </div>
					  <div>
				   		<span><input type="submit" class="mybutton" value="Daftar" name="btn-register"></span>
				  	</div>
		    	</form>
				</div>
		  </div>
		</div>
  </div>
</div>