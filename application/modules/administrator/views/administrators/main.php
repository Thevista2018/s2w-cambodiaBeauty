<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Administrators</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Administrators</strong>
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
                  <a href="<?=site_url('administrator/form');?>">
                    <button class="btn btn-w-m btn-primary btn-sm pull-right">Add Data</button>
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
                <?PHP if(count($listdata) != 0){?>
                <table class="table table-striped table-hover dataTables-example" >
                  <thead>
                  <tr>
                      <th style="width:10%;">#</th>
                      <th style="width:25%;">Fullname</th>
                      <th style="width:20%;">Email</th>
                      <th style="width:15%;">Edit By</th>
                      <th style="width:15%;">Last login</th>
                      <th style="width:15%;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP foreach ($listdata as $key => $value) {?>
                  <tr class="gradeX">
                      <td><strong><?="A".str_pad($value['ad_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <?=$value['ad_fullname']?><br />
                        <small><?=$value['position_name']?></small>
                      </td>
                      <td><?=$value['ad_email']?></td>
                      <td>
                        <?=$value['ad_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d/m/Y h:i A', strtotime($value['ad_lastedit']));?></small>
                      </td>
                      <td class="center"><?PHP if($value['ad_lastlogin'] != "0000-00-00 00:00:00"){ ?><i class="fa fa-clock-o"></i> <?=date('d/m/Y h:i A', strtotime($value['ad_lastlogin']));?> <?PHP }else{?> - <?PHP }?></td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('administrator/form/'.$value['ad_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('administrator/delete/'.$value['ad_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                              <li><a href="<?=site_url('administrator/formpassword/'.$value['ad_id']);?>"><i class="fa fa-repeat"></i> Change Password</a></li>
                            </ul>
                        </div>
                      </td>
                  </tr>
                  <?PHP }?>
                  </tbody>
                </table>
              <?PHP }?>
              </div>

              <!-- End contents for page -->
          </div>
      </div>
    </div>
</div>
</div>
