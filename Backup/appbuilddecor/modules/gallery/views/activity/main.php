<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gallery</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Gallery</strong>
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
                  <a href="<?=site_url('gallery/activity/form');?>">
                  <button class="btn btn-w-m btn-primary btn-sm pull-right">Add Gallery</button>
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
                    <th style="width:40%;">Title</th>
                    <th style="width:15%;">Sort</th>
                    <th style="width:15%;">Create By</th>
                    <th style="width:10%;">Action</th>
                    <th style="width:5%;"></th>
                    <th style="width:5%;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                    if($lg == "english"){
                      $Valuetitle = $value['gallery_title_en'];
                      $Valuedetail = $value['gallery_detail_en'];
                    }else{
                      $Valuetitle = $value['gallery_title_th'];
                      $Valuedetail = $value['gallery_detail_th'];
                    }
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="G".str_pad($value['gallery_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <a href="<?=site_url('gallerys/gallerydetail/'.$value['gallery_id']);?>" target="_blank">
                          <?=character_limiter(strip_tags($Valuetitle),30);?>
                        </a><br />
                        <small><?=character_limiter(strip_tags($Valuedetail),50);?></small>
                      </td>
                      <td>
                        <?=$value['gallery_sort'];?>
                      </td>
                      <td>
                        <?=$value['gallery_createby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d/m/Y', strtotime($value['gallery_datecreate']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('gallery/activity/form/'.$value['gallery_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('gallery/activity/delete/'.$value['gallery_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                      </td>
                      <td class="center">
                        <?PHP if($value['gallery_show'] == 1){?>
                          <span class="label label-primary">Active</span>
                        <?PHP }else{ ?>
                          <span class="label label-danger">Deactivate</span>
                        <?PHP }?>
                      </td>
                      <td>
                        <?PHP if($value['gallery_status'] == 1){?>
                          <span class="label label-info">Normal</span>
                        <?PHP }else if($value['gallery_status'] == 2){ ?>
                          <span class="label label-success">Important</span>
                        <?PHP }?>
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
