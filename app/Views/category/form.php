<?php
    $is_edit    = isset($item);
    $target_url = ($is_edit) ? "/category-editpro" : "/category-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3><?= ($is_edit) ? "Edit" : "Add" ?> Staff</h3>
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
									<label class="col-form-label col-md-3 col-sm-3  label-align">Category</label>
									<div class="input-group col-md-6 col-sm-6">
										<input type="text" name="category" class="form-control <?=(!empty(session()->getFlashdata('validation')['category'])) ? 'is-invalid' : ''?>" placeholder="" value="<?= ($is_edit) ? $item['category'] : old('category') ?>">
										<div class="invalid-feedback">
											<?=(!empty(session()->getFlashdata('validation')['category'])) ? session()->getFlashdata('validation')['category'] : ''?>
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