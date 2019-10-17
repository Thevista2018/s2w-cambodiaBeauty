<?PHP
  if($type == "news"){
    $Title = "News";
  }else if($type == "publicities"){
    $Title = "Publicities";
  }else if($type == "seminars"){
    $Title = "Seminars";
  }
?>
<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$Title?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong><?=$Title?></strong>
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
                  <a href="<?=site_url('article/custom/form/'.$type);?>">
                  <button class="btn btn-w-m btn-primary btn-sm pull-right">Add <?=$Title?></button>
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
                      <th style="width:35%;">Title</th>
                      <th style="width:10%;">Type</th>
                      <th style="width:10%;">Sort</th>
                      <th style="width:15%;">Create By</th>
                      <th style="width:10%;">Action</th>
                      <th style="width:5%;"></th>
                      <th style="width:5%;"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="N".str_pad($value['article_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <?PHP
                          if($value['article_type'] == 1 || $value['article_type'] == 2){
                            $Linkurl = site_url('newscontent/'.$value['article_id']);
                          }else if($value['article_type'] == 3){
                            $Linkurl = site_url('publicitiescontent/'.$value['article_id']);
                          }else if($value['article_type'] == 4){
                            $Linkurl = site_url('seminarscontent/'.$value['article_id']);
                          }else if($value['article_type'] == 5){
                            $Linkurl = site_url('activitycontent/'.$value['article_id']);
                          }
                        ?>
                        <a href="<?=$Linkurl;?>" target="_blank">
                          <?=character_limiter(strip_tags($value['article_title']),30);?>
                        </a><br />
                        <small><?=character_limiter(strip_tags($value['article_detail']),50);?></small>
                      </td>
                      <td>
                        <?PHP
                          if($value['article_type'] == 1){
                            echo 'News';
                          }else if($value['article_type'] == 2){
                            echo 'Press Release';
                          }else if($value['article_type'] == 3){
                            echo 'Publicities';
                          }else if($value['article_type'] == 4){
                            echo 'Seminar';
                          }else if($value['article_type'] == 5){
                            echo 'Special Activity';
                          }
                        ?>
                      </td>
                      <td>
                        <?=$value['article_sort'];?>
                      </td>
                      <td>
                        <?=$value['article_createby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d/m/Y', strtotime($value['article_datecreate']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('article/custom/form/'.$type.'/'.$value['article_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <?PHP if($value['article_show']  != 1){ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('article/custom/show/'.$type.'/'.$value['article_id']);?>"><i class="fa fa-eye"></i> Show</a></li>
                              <?PHP }else{ ?>
                                <li><a class="Btn-eye" data-url="<?=site_url('article/custom/hide/'.$type.'/'.$value['article_id']);?>"><i class="fa fa-eye-slash"></i> Hide</a></li>
                              <?PHP } ?>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('article/custom/delete/'.$type.'/'.$value['article_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                      </td>
                      <td class="center">
                        <?PHP if($value['article_show'] == 1){?>
                          <span class="label label-primary">Active</span>
                        <?PHP }else{ ?>
                          <span class="label label-danger">Deactivate</span>
                        <?PHP }?>
                      </td>
                      <td class="center">
                        <?PHP if($value['article_status'] == 1){?>
                          <span class="label label-info">Normal</span>
                        <?PHP }else if($value['article_status'] == 2){ ?>
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
