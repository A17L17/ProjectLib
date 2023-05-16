<?php
$is_edit    = isset($item);
$target_url = ($is_edit) ? "/book-editpro" : "/book-addpro";
?>

<?= $this->extend('main') ?>

<?= $this->section('content') ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= ($is_edit) ? "Edit" : "Add" ?> Buku</h3>
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
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Judul</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="title" class="form-control <?= (!empty(session()->getFlashdata('validation')['title'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['title'] : old('title') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['title'])) ? session()->getFlashdata('validation')['title'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Pengarang</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="text" name="author" class="form-control <?= (!empty(session()->getFlashdata('validation')['author'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['author'] : old('author') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['author'])) ? session()->getFlashdata('validation')['author'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="number" name="publisher_year" class="form-control <?= (!empty(session()->getFlashdata('validation')['publisher_year'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['publisher_year'] : old('publisher_year') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['publisher_year'])) ? session()->getFlashdata('validation')['publisher_year'] : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Penerbit</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <select class="form-control <?= (!empty(session()->getFlashdata('validation')['is_publisher'])) ? 'is-invalid' : '' ?>" name="id_publisher">
                                        <option value=""></option>
                                        <?php foreach ($publisher as $poin) : ?>
                                            <option <?= ($poin['id'] == old('id_publisher')) ? 'selected' : (($is_edit) ? (($poin['id'] == $item['id_publisher']) ? 'selected' : '') : '') ?> value="<?= $poin['id'] ?>"><?= $poin['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <select class="form-control <?= (!empty(session()->getFlashdata('validation')['is_publisher'])) ? 'is-invalid' : '' ?>" name="id_category">
                                        <option value=""></option>
                                        <?php foreach ($category as $poin) : ?>
                                            <option <?= ($poin['id'] == old('id_category')) ? 'selected' :  (($is_edit) ? (($poin['id'] == $item['id_publisher']) ? 'selected' : '') : '') ?> value="<?= $poin['id'] ?>"><?= $poin['category'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah</label>
                                <div class="input-group col-md-6 col-sm-6">
                                    <input type="number" name="quantity" class="form-control <?= (!empty(session()->getFlashdata('validation')['quantity'])) ? 'is-invalid' : '' ?>" placeholder="" value="<?= ($is_edit) ? $item['quantity'] : old('quantity') ?>">
                                    <div class="invalid-feedback">
                                        <?= (!empty(session()->getFlashdata('validation')['quantity'])) ? session()->getFlashdata('validation')['quantity'] : '' ?>
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