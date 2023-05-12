<?php
    $is_edit    = isset($item);
    $target_url = ($is_edit) ? "/staff-editpro" : "/staff-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Add Staff</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_content">
							<form action="<?=base_url($target_url)?>" method="post" enctype="multipart/form-data">
								<?=csrf_field()?>

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
									<label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="email" name="email" class="form-control <?=(!empty(session()->getFlashdata('validation')['email'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? $item['email'] : old('email') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['email'])) ? session()->getFlashdata('validation')['email'] : ''?>
										</div>
									</div>
								</div>
								<div class=" field item form-group">
									<label class="col-form-label col-md-3 col-sm-3  label-align">Password</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="text" name="password" class="form-control <?=(!empty(session()->getFlashdata('validation')['password'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? '' : old('password') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['password'])) ? session()->getFlashdata('validation')['password'] : ''?>
										</div>
									</div>
								</div>
								<button class="btn btn-success" style="float: right;"><?= ($is_edit) ? 'Edit' : 'Save' ?></button>
							</form>




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

<?= $this->endsection() ?>