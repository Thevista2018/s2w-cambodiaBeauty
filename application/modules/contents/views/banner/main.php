<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Banner</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Banner</strong>
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
                <div class="col-sm-8">

                </div>
                <div class="col-sm-4">
                  <a href="<?=site_url('contents/banner/form/');?>">
                    <button class="btn btn-w-m btn-primary btn-sm pull-right">Add Banner</button>
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
                    <th style="width:50%;">Banner</th>
                    <th style="width:15%;">Edit By</th>
                    <th style="width:15%;">Action</th>
                    <th style="width:5%;"></th>
                    <th style="width:5%;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="B".str_pad($value['banner_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <img src="<?=base_url('uploads/banner/'.$value['banner_image']);?>" alt="" style="with:auto; height:150px;">
                        <br />
                        <small><?=character_limiter($value['banner_link'],50);?></small>
                      </td>
                      <td class="center">
                        <?=$value['banner_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['banner_lastedit']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('contents/banner/form/'.$value['banner_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('contents/banner/delete/'.$value['banner_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                      </td>
                      <td class="center">
                        <?PHP if($value['banner_show'] == 1){?>
                          <span class="label label-primary">Active</span>
                        <?PHP }else{ ?>
                          <span class="label label-danger">Deactivate</span>
                        <?PHP }?>
                      </td>
                      <td class="center">
                        <?PHP if($value['banner_status'] == 1){?>
                          <span class="label label-info">Normal</span>
                        <?PHP }else if($value['banner_status'] == 2){ ?>
                          <span class="label label-success">Important</span>
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
