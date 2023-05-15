<?php
$is_edit    = isset($item);
$target_url = ($is_edit) ? "/borrower-editpro" : "/borrower-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= ($is_edit) ? "Edit" : "Add" ?> Borrower</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="<?= base_url($target_url) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <input hidden type="text" name="id" value="<?= ($is_edit) ? $id : '' ?>">

                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Name</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="name" class="form-control <?= (!empty(session()->getFlashdata('validation')['name'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['name'] : old('name') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['name'])) ? session()->getFlashdata('validation')['name'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Birthdate</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="date" name="birthdate" class="form-control <?= (!empty(session()->getFlashdata('validation')['birthdate'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['birthdate'] : old('birthdate') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['birthdate'])) ? session()->getFlashdata('validation')['birthdate'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="address" class="form-control <?= (!empty(session()->getFlashdata('validation')['address'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['address'] : old('address') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['address'])) ? session()->getFlashdata('validation')['address'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Gender</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="gender" class="form-control <?= (!empty(session()->getFlashdata('validation')['gender'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['gender'] : old('gender') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['gender'])) ? session()->getFlashdata('validation')['gender'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Contact</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="number" name="contact" class="form-control <?= (!empty(session()->getFlashdata('validation')['contact'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['contact'] : old('contact') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['contact'])) ? session()->getFlashdata('validation')['contact'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="email" class="form-control <?= (!empty(session()->getFlashdata('validation')['email'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['email'] : old('email') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['email'])) ? session()->getFlashdata('validation')['email'] : '' ?>
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