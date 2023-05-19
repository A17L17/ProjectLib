<?= $this->extend('main') ?>

<?= $this->section('content') ?>

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row">
				<div class="col-12">
					<div class="tile_count">
						<div class="row" >
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-sitemap"></i> Staff</span>
								<div class="count"><?= $qstaff ?></div>
							</div>
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-group"></i> Borrower</span>
								<div class="count"><?= $qborrower ?></div>
							</div>
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-book"></i> Book</span>
						   		<div class="count green"><?= $qbook ?></div>
							</div>
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-male"></i> Publisher</span>
								<div class="count"><?= $qpublisher ?></div>
							</div>
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-cubes"></i> Category</span>
								<div class="count"><?= $qcategory ?></div>
							</div>
							<div class="col-md-2  tile_stats_count">
								<span class="count_top"><i class="fa fa-inbox"></i> Borrow</span>
								<div class="count"><?= $qborrow ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /top tiles -->


  <br />

  <div class="row">


    <div class="col-md-6">
      <div class="x_panel tile fixed_height_320">
        <div class="x_title">
          <h2>User Domisili</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <h4>Jumlah Buku Category</h4>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>Bandung</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>123k</span>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="widget_summary">
            <div class="w_left w_25">
              <span>Jakarta</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>53k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>Subang</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>23k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>Garut</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>3k</span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="widget_summary">
            <div class="w_left w_25">
              <span>Medan</span>
            </div>
            <div class="w_center w_55">
              <div class="progress">
                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                  <span class="sr-only">60% Complete</span>
                </div>
              </div>
            </div>
            <div class="w_right w_20">
              <span>1k</span>
            </div>
            <div class="clearfix"></div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="x_panel tile fixed_height_320 overflow_hidden">
        <div class="x_title">
          <h2>Device Usage</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="" style="width:100%">
            <tr>
              <th style="width:37%;">
                <p>Top 5</p>
              </th>
              <th>
                <div class="col-lg-7 col-md-7 col-sm-7 ">
                  <p class="">Device</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 ">
                  <p class="">Progress</p>
                </div>
              </th>
            </tr>
            <tr>
              <td>
                <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
              </td>
              <td>
                <table class="tile_info">
                  <tr>
                    <td>
                      <p><i class="fa fa-square blue"></i>IOS </p>
                    </td>
                    <td>30%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square green"></i>Android </p>
                    </td>
                    <td>10%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square purple"></i>Blackberry </p>
                    </td>
                    <td>20%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square aero"></i>Symbian </p>
                    </td>
                    <td>15%</td>
                  </tr>
                  <tr>
                    <td>
                      <p><i class="fa fa-square red"></i>Others </p>
                    </td>
                    <td>30%</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>



</div>
<!-- /page content -->

<!-- /page content -->

<?= $this->endsection() ?>