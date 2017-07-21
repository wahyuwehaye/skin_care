<div class="row">
	<div class="col-sm-7">
		<div class="box box-danger">
		  <div class="box-header">
		    <i class="fa fa-user-plus"></i>
		    <h3 class="box-title">Update No Resi</h3>
		    <div class="box-tools pull-right">
		      <a href="<?php echo base_url() ?>pengiriman" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a>
		    </div>
		    <hr>
		  </div>

		  <div class="box-body">
				<form class="form-inline" style="margin: 10px; margin-top:0px;">
					<div class="form-group" >
			      <label style="margin-right:10px;">No Resi</label>
		        <input type="text" name="f-no_resi" class="form-control" value="<?php echo $konfirmasi['nomor_resi'] ?>" onkeypress="return isNumberKey(event)" style="margin-right:10px;">
		        <input type="submit" value="Update" class="btn btn-sm btn-primary" style="margin-right:5px;">
		        <!-- <button type="reset" class="btn btn-sm btn-default">Reset</button> -->
			    </div>
			  </form>
			</div>
		</div>

		<div class="box box-warning">
		  <div class="box-header">
		    <i class="fa fa-user-plus"></i>
		    <h3 class="box-title">Detail Pemesanan</h3>
		    <div class="box-tools pull-right">
		      <!-- <a href="<?php echo base_url() ?>pembayaran" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a> -->
		    </div>
		    <hr>
		  </div>

		  <div class="box-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach ($detail_pemesanan['entries'] as $key => $items){ ?>
							<tr>
								<td><?php echo $items['kd_produk'] ?></td>
								<td><?php echo $items['nama_produk'] ?></td>
								<td style="text-align: right;"><?php echo 'Rp'.number_format($items['harga'], 0,',','.') ?></td>
								<td style="text-align: right;"><?php echo $items['jml_produk'] ?></td>
								<td style="text-align: right;"><?php echo 'Rp'.number_format($items['jml_produk']*$items['harga'], 0,',','.') ?></td>
							</tr>
						<?php $no++;} ?>
						<tr>
							<td colspan="4" style="text-align: right;">Ongkir</td>
							<td style="text-align: right;"><?php echo 'Rp '.number_format($pemesanan['ongkir'], 0,',','.'); ?></td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: right;">Total Keseluruhan</td>
							<td style="text-align: right; color: #ce2c2c; font-weight: bold;"><?php echo 'Rp '.number_format($pemesanan['total_biaya'], 0,',','.'); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-sm-5">
		<div class="box box-info">
		  <div class="box-header">
		    <i class="fa fa-user-plus"></i>
		    <h3 class="box-title">Konfirmasi Pembayaran</h3>
		    <div class="box-tools pull-right">
		      <!-- <a href="<?php echo base_url() ?>pembayaran" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px;"><i class="fa fa-arrow-left"></i> Kembali</a> -->
		    </div>
		    <hr>
		  </div>

		  <div class="box-body">
		  	<?php if(count($konfirmasi) > 0) { ?>
				<div class="form-horizontal style-form">
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Atas Nama</label>
			      <div class="col-sm-8">
			        <div class="form-control col-sm-12 col-xs-12"><?php echo $konfirmasi['atas_nama'] ?></div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Nama Bank</label>
			      <div class="col-sm-8">
			        <div class="form-control col-sm-12 col-xs-12"><?php echo $konfirmasi['nama_bank'] ?></div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Nominal</label>
			      <div class="col-sm-8">
			        <div class="form-control col-sm-12 col-xs-12" style="color:#ce2c2c"><b><?php echo 'Rp'.number_format($konfirmasi['nominal'],0,',','.') ?></b></div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Alamat Pengiriman</label>
			      <div class="col-sm-8">
			        <div class="form-control col-sm-12 col-xs-12 lbl-textarea"><?php echo $konfirmasi['alamat_pengiriman'] ?></div>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Bukti Transfer</label>
			      <div class="col-sm-8">
			        <img id="img-modal" class="img-responsive" style="border: 1px solid #d2d6de;" alt="" width="100" src="<?php echo base_url() ?>assets/pictures/<?php echo $konfirmasi['bukti_pembayaran'] ?>" />
			      </div>
			    </div>

			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left">Status</label>
			      <div class="col-sm-8">
			        <div class="form-control col-sm-12 col-xs-12"><?php echo $konfirmasi['status_konfirmasi'] ?></div>
			      </div>
			    </div>
			    <?php if($konfirmasi['status_konfirmasi'] != 'Diterima') { ?>
			    <div class="form-group">
			      <label class="col-sm-3 control-label text-align-left text-align-left text-align-left"></label>
			      <div class="col-sm-8">
			        <a href="<?php echo base_url() ?>pembayaran/approve/<?php echo $pemesanan['id_pemesanan'] ?>" class="btn btn-primary btn-flat confirm">Approve ?</a>
			      </div>
			    </div>
			   	<?php } ?>
				</div>
			  <?php }else{ ?>
			  	<div style="margin:10px;">
			  		Belum melakukan konfirmasi pembayaran. 
			  	</div>
			  <?php } ?>
			</div>
		</div>	
	</div>
</div>