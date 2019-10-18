<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Slider</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Slider</strong>
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
                  <a href="<?=site_url('contents/slider/form/');?>">
                    <button class="btn btn-w-m btn-primary btn-sm pull-right">Add Slider</button>
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
                    <th style="width:40%;">Slider</th>
                    <th style="width:10%;">Sort</th>
                    <th style="width:15%;">Edit By</th>
                    <th style="width:15%;">Action</th>
                    <th style="width:10%;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                    if($lg == "english"){
                      $msg = $value['slider_msg_en'];
                    }else{
                      $msg = $value['slider_msg_th'];
                    }
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="S".str_pad($value['slider_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <?PHP
                          if($value['slider_type'] == 1){
                        ?>
                        <img src="<?=base_url('uploads/slider/'.$value['slider_name']);?>" alt="" style="with:auto; height:150px;">
                        <?PHP
                          }else if($value['slider_type'] == 2){
                            $ex = explode(".",$value['slider_video']);
                            $type = $ex[1];
                        ?>
                        <video id="slide-video" poster="<?=base_url('uploads/slider/'.$value['slider_imagesvideo']);?>" controls>
                          <?PHP if($type=="webm"){ ?>
        									<source src='<?=base_url('uploads/slider/'.$value['slider_video']);?>' type='video/webm' />
                          <?PHP }else if($type=="mp4"){?>
        									<source src='<?=base_url('uploads/slider/'.$value['slider_video']);?>' type='video/mp4' />
                          <?PHP }?>
        								</video>

                        <?PHP }else if($value['slider_type'] == 3){?>
                          <a href="<?=$value['slider_url'];?>" target="_blank"><?=$value['slider_url'];?></a>
                        <?PHP }?>
                        <br />
                        <small><?=character_limiter($msg,50);?></small>
                      </td>
                      <td class="center">
                        <?=$value['slider_sort'];?>
                      </td>
                      <td class="center">
                        <?=$value['slider_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['slider_lastedit']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('contents/slider/form/'.$value['slider_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <?PHP if($value['slider_show']  != 1){ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('contents/slider/show/'.$value['slider_id']);?>"><i class="fa fa-eye"></i> Show</a></li>
                              <?PHP }else{ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('contents/slider/hide/'.$value['slider_id']);?>"><i class="fa fa-eye-slash"></i> Hide</a></li>
                              <?PHP } ?>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('contents/slider/delete/'.$value['slider_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                      </td>
                      <td class="center">
                        <?PHP if($value['slider_show'] == 1){?>
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
