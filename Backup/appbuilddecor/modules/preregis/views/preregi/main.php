<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>List Visitor</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>List Visitor</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<!-- End breadcrumb for page -->

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-content">
              <!-- Contents for page -->
              <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                  <a href="<?=site_url('preregis/wexcel');?>" target="_blank">
                  <button class="btn btn-w-m btn-primary btn-sm pull-right">Export excel</button>
                  </a>
                  <div class="input-group">
                    <input type="text" placeholder="Search" name="search-draw" id="search-draw" class="input-sm form-control">
                    <span class="input-group-btn">
                      <button type="button" id="btnsearch" class="btn btn-sm btn-primary"> Go!</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <?PHP if(count($listdata) != 0){ ?>
                <table class="table table-striped table-hover dataTables-example" >
                  <thead>
                  <tr>
                      <th style="width:10%;">#</th>
                      <th style="width:35%;">Full Name</th>
                      <th style="width:10%;">Company</th>
                      <th style="width:10%;">Email</th>
                      <th style="width:10%;">Country</th>
                      <th style="width:15%;">Date regis</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="MBD".str_pad($value['visitor_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <a href="<?=site_url('preregis/detail/'.$value['visitor_id']);?>">
                          <?=$value['visitor_title']." ".$value['visitor_firstname']." ".$value['visitor_lastname'];?>
                        </a><br />
                        <small><?=$value['visitor_jobtitle'];?></small>
                      </td>
                      <td>
                        <?=$value['visitor_company'];?>
                      </td>
                      <td>
                        <?=$value['visitor_email'];?>
                      </td>
                      <td>
                        <?=$value['visitor_country'];?>
                      </td>
                      <td>
                        <i class="fa fa-clock-o"></i> <?=date('d/m/Y', strtotime($value['visitor_datecreate']));?>
                      </td>
                  </tr>
                  <?PHP }?>

                  </tbody>
                </table>
                <?PHP }else{echo "No results found in this list.";}?>
              </div>

              <!-- End contents for page -->
          </div>
      </div>
    </div>
</div>
</div>
