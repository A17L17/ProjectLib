<?php
    $is_edit    = isset($item);
    $target_url = ($is_edit) ? "/publisher-editpro" : "/publisher-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3><?= ($is_edit) ? "Edit" : "Add" ?> Publisher</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_content">
							<form action="<?=base_url($target_url)?>" method="post" enctype="multipart/form-data">
								<?=csrf_field()?>

								<input hidden type="text" name="id" value="<?= ($is_edit) ? $id : ''?>">

								<div class=" field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Name</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="text" name="name" class="form-control <?=(!empty(session()->getFlashdata('validation')['name'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? $item['name'] : old('name') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['name'])) ? session()->getFlashdata('validation')['name'] : ''?>
										</div>
									</div>
								</div>
								<div class=" field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Address</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="text" name="address" class="form-control <?=(!empty(session()->getFlashdata('validation')['address'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? $item['address'] : old('address') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['email'])) ? session()->getFlashdata('validation')['address'] : ''?>
										</div>
									</div>
								</div>
								<div class=" field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Contact</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="text" name="contact" class="form-control <?=(!empty(session()->getFlashdata('validation')['contact'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? '' : old('contact') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['contact'])) ? session()->getFlashdata('validation')['contact'] : ''?>
										</div>
									</div>
								</div>
								<button class="btn btn-success" style="float: right;"><?= ($is_edit) ? 'Edit' : 'Save' ?></button>
								<a class="btn btn-danger" style="float: left;" href="<?= base_url('/category') ?>"> Back </a>

							</form>




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

<?= $this->endsection() ?>