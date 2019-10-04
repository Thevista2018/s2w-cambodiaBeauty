<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Application</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Application</strong>
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
                      <th style="width:35%;">Full name</th>
                      <th style="width:15%;">Position</th>
                      <th style="width:15%;">Phone</th>
                      <th style="width:15%;">Email</th>
                      <th style="width:15%;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                    if($lg == "english"){
                      $fullname = $value['apply_fullname_en'];
                    }else{
                      $fullname = $value['apply_fullname_th'];
                    }
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="J".str_pad($value['apply_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                          <a href="<?=site_url('jobposition/application/previewapply/'.$value['apply_id']);?>"><?=$fullname;?></a><br />
                          <small><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['apply_datecreate']));?></small>
                      </td>
                      <td>
                        <?=$value['apply_position'];?><br />
                      </td>
                      <td>
                        <?=$value['apply_phone'];?><br />
                      </td>
                      <td>
                        <?=$value['apply_email'];?><br />
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('jobposition/application/previewapply/'.$value['apply_id']);?>"><i class="fa fa-file-text-o"></i> Preview</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('jobposition/application/delete/'.$value['apply_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
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
