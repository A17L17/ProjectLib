<?php
$is_edit    = isset($item);
$target_url = ($is_edit) ? "/borrow-editpro" : "/borrow-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= ($is_edit) ? "Edit" : "Add" ?> Peminjaman</h3>
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
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Peminjam</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <select class="form-control <?= (!empty(session()->getFlashdata('validation')['id_borrower'])) ? 'is-invalid' : '' ?>" name="id_borrower">
                                        <option value=""></option>
                                        <?php foreach ($borrower as $poin) : ?>
                                            <option <?= ($poin['id'] == old('id_borrower')) ? 'selected' : (($is_edit) ? (($poin['id'] == $item['id_borrower']) ? 'selected' : '') : '') ?> value="<?= $poin['id'] ?>"><?= $poin['name'] ?></option>
                                        <?php endforeach ?>
                                        <div class="invalid-feedback">
                                            <?= (!empty(session()->getFlashdata('validation')['id_borrower'])) ? session()->getFlashdata('validation')['id_borrower'] : '' ?>
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Buku</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <select class="form-control <?= (!empty(session()->getFlashdata('validation')['id_book'])) ? 'is-invalid' : '' ?>" name="id_book">
                                        <option value=""></option>
                                        <?php foreach ($book as $poin) : ?>
                                            <option <?= ($poin['id'] == old('id_book')) ? 'selected' : (($is_edit) ? (($poin['id'] == $item['id_book']) ? 'selected' : '') : '') ?> value="<?= $poin['id'] ?>"><?= $poin['title'] ?></option>
                                        <?php endforeach ?>
                                        <div class="invalid-feedback">
                                            <?= (!empty(session()->getFlashdata('validation')['id_book'])) ? session()->getFlashdata('validation')['id_book'] : '' ?>
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Staff</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <select class="form-control <?= (!empty(session()->getFlashdata('validation')['id_staff'])) ? 'is-invalid' : '' ?>" name="id_staff">
                                        <option value=""></option>
                                        <?php foreach ($staff as $poin) : ?>
                                            <option <?= ($poin['id'] == old('id_staff')) ? 'selected' : (($is_edit) ? (($poin['id'] == $item['id_staff']) ? 'selected' : '') : '') ?> value="<?= $poin['id'] ?>"><?= $poin['email'] ?></option>
                                        <?php endforeach ?>
                                        <div class="invalid-feedback">
                                            <?= (!empty(session()->getFlashdata('validation')['id_staff'])) ? session()->getFlashdata('validation')['id_staff'] : '' ?>
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Peminjaman</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="date" name="release_date" class="form-control <?= (!empty(session()->getFlashdata('validation')['release_date'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['release_date'] : old('release_date') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['release_date'])) ? session()->getFlashdata('validation')['release_date'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Pengembalian</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="date" name="due_date" class="form-control <?= (!empty(session()->getFlashdata('validation')['due_date'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['due_date'] : old('due_date') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['due_date'])) ? session()->getFlashdata('validation')['due_date'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="note" class="form-control <?= (!empty(session()->getFlashdata('validation')['note'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['note'] : old('note') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['note'])) ? session()->getFlashdata('validation')['note'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" style="float: right;"><?= ($is_edit) ? 'Edit' : 'Save' ?></button>
                            <a class="btn btn-danger" style="float: left;" href="<?= base_url('/borrow') ?>"> Back </a>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?= $this->endsection() ?>