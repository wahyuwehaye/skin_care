<?php if ($this->session->flashdata('error')): ?>

<div class="alert alert-block alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['error'])): ?>

<div class="alert alert-block alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?php echo $messages['error']; ?>
</div>
<?php endif; ?>

<?php if (validation_errors()): ?>

<div class="alert alert-block alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('notice')): ?>

<div class="alert alert-block alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-warning"></i> Alert!</h4>
	<?php echo $this->session->flashdata('notice');?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['notice'])): ?>

<div class="alert alert-block alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-warning"></i> Alert!</h4>
	<?php echo $messages['notice']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>

<div class="alert alert-block alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Alert!</h4>
	<?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['success'])): ?>

<div class="alert alert-block alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Alert!</h4>
	<?php echo $messages['success']; ?>
</div>
<?php endif; ?>