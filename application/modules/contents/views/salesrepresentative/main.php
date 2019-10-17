<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2>Salesrepresentative</h2>
      <ol class="breadcrumb">
        <li> <a href="#">Home</a> </li>
        <li class="active"> <strong>Salesrepresentative</strong> </li>
      </ol>
  </div>
  <div class="col-lg-2"> </div>
</div>
<!-- End breadcrumb for page -->

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-content">
              <!-- Contents for page -->
              <div class="row">
                <div class="col-sm-8">

                </div>
                <div class="col-sm-4">
                  <a href="<?=site_url('contents/salesrepresentative/form');?>">
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
                      <th style="width:40%;">Page Name</th>
                      <th style="width:15%;">Edit By</th>
                      <th style="width:15%; text-align: center">Action</th>
                      <th style="width:15%; text-align: center">Hide / Show</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP foreach ($listdata as $key => $value) { ?>
                  <tr class="gradeX">
                      <td><strong><?="P".str_pad($value['salerep_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title"><?=$value['salerep_company'];?></td>
                      <td class="center">
                        <?=$value['salerep_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['salerep_lastedit']));?></small>
                      </td>
                      <td class="center" style="text-align: center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('contents/salesrepresentative/index/'.$value['salerep_id']);?>"><i class="fa fa-plus-square"></i> Sub page</a></li>
                              <?PHP if($value['salerep_show']  != 1){ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('contents/salesrepresentative/show/'.$value['salerep_id']);?>"><i class="fa fa-eye"></i> Show</a></li>
                              <?PHP }else{ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('contents/salesrepresentative/hide/'.$value['salerep_id']);?>"><i class="fa fa-eye-slash"></i> Hide</a></li>
                              <?PHP } ?>
                              <li><a href="<?=site_url('contents/salesrepresentative/form/'.$value['salerep_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('contents/salesrepresentative/delete/'.$value['salerep_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                      </td>
                      <td style="text-align: center">
                        <?PHP if($value['salerep_show'] == 1){?>
                          <span class="label label-info">Active</span>
                        <?PHP }else{ ?>
                          <span class="label label-danger">Deactivate</span>
                        <?PHP }?>
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
