<?= $this->extend('main')?>


<?= $this->section('content')?>

<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                Book Page
                            <a href="<?=base_url('book-add')?>" class="btn btn-round btn-success btn-sm"><i class="fa fa-plus"></i></a>
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                </div>
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th><center>Title</center></th>
                          <th><center>Author</center></th>
                          <th><center>Publication</center></th>
                          <th><center>Id P</center></th>
                          <th><center>Id C</center></th>
                          <th width="100px"><center>Quantity</center></th>
                        </tr>
                      </thead>
                      <tbody>

                            <?php foreach($book as $item) : ?>

                        <tr>
                          <td><?= $item['title']?></td>
                          <td><?= $item['author']?></td>
                          <td><?= $item['publisher_year']?></td>
                          <td><?= $item['name']?></td>
                          <td><?= $item['category']?></td>
                          <td><?= $item['quantity']?></td>
                          <td>

                            <center>
                                <a href="<?=base_url('book-edit/').$item['id']?>" class="btn btn-round btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Yakin Ingin Menghapus ? ')" href="<?=base_url('book-del/').$item['id']?>" class="btn btn-round btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </center>

                          </td>
                        </tr>

                            <?php endforeach ?>

                      </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            


<?= $this->endsection() ?>