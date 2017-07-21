<div class="box box-danger">
	<div class="box-header">
	  <i class="fa fa-file-text-o"></i>
	  <h3 class="box-title"><?php echo $title ?></h3>
	  <div class="box-tools pull-right">
	  	<a href="<?php echo base_url() ?>pengguna/create/<?php echo $grup ?>" class="btn btn-flat bg-olive btn-sm pull-right" style="margin-top: 3px; margin-right:5px;"><i class="fa fa-plus"></i> Tambah <?php echo ucfirst($grup) ?></a>
    </div>
    <hr style="margin-bottom:0px;">
	</div><!-- /.box-header -->
	<div class="box-body" style="margin:10px;">
	  <?php if(count($user['entries']) > 0) { ?>
			<table id="datatable" class="table table-bordered table-hover display responsive nowrap">
				<thead>
					<tr>
						<!-- <th>No</th> -->
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Umur</th>
						<th>Email</th>
						<th>No Telp</th>
						<!-- <th>Alamat</th> -->
						<th width="10">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach ($user['entries'] as $key => $user) {

					?>
						<tr>
							<!-- <td><?php echo $no++ ?></td> -->
							<td><?php echo $user['username'] ?></td>
							<td><?php echo $user['nama_lengkap'] ?></td>
							<td><?php echo $user['umur'] ?></td>
							<td><?php echo $user['email'] ?></td>
							<td><?php echo $user['no_hp'] ?></td>
							<td>
								<a href="<?php echo base_url() ?>pengguna/view/<?php echo $user['id_pengguna'] ?>" class="btn btn-xs bg-orange" data-toggle="tooltip" title="" data-original-title="Detail">
									<i class="fa fa-list-alt"></i>
								</a>
								<a href="<?php echo base_url() ?>pengguna/edit/<?php echo $user['id_pengguna'] ?>" class="btn btn-xs btn-primary"  data-toggle="tooltip" title="" data-original-title="Ubah">
									<i class="fa fa-edit"></i>
								</a>
								<a href="<?php echo base_url() ?>pengguna/delete/<?php echo $grup ?>/<?php echo $user['id_pengguna'] ?>" class="btn btn-xs btn-danger confirm"   data-toggle="tooltip" title="" data-original-title="Hapus">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
		&nbsp;&nbsp; Saat ini belum ada data <?php echo $grup ?> yang ditambahkan
		<?php } ?>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	</div>
</div>
