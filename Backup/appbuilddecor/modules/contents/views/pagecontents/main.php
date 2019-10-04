<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Contents</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Contents</strong>
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
                  <a href="<?=site_url('contents/pagecontents/form');?>">
                    <button class="btn btn-w-m btn-primary btn-sm pull-right">Add Pages</button>
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
                      <th style="width:60%;">Page Name</th>
                      <th style="width:15%;">Edit By</th>
                      <th style="width:15%;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  foreach ($listdata as $key => $value) {
                    if($lg_set == "english"){
                      $Valuepage = $value['con_page_en'];
                      $Valuedecision = $value['con_decision_en'];
                    }else{
                      $Valuepage = $value['con_page_th'];
                      $Valuedecision = $value['con_decision_th'];
                    }
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="P".str_pad($value['con_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                      <?PHP
                        $Url = site_url('main/pageDetail/'.$value['con_id']);
                      ?>
                      <a href="<?=$Url;?>" target="_blank">
                        <?=$Valuepage;?>
                      </a><br/>
                      <small><?=character_limiter($Valuedecision,50);?></small>
                      </td>
                      <td class="center">
                        <?=$value['con_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['con_lastedit']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('contents/subcontents/index/'.$value['con_id']);?>"><i class="fa fa-plus-square"></i> Sub page</a></li>
                              <li><a href="<?=site_url('contents/pagecontents/form/'.$value['con_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('contents/pagecontents/delete/'.$value['con_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
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
