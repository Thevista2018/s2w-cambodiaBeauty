<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sub Contents</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="<?=site_url('contents/pagecontents/index')?>">Contents</a>
            </li>
            <li class="active">
                <strong>Sub Contents</strong>
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
                  <a href="<?=site_url('contents/subcontents/form/'.$con_id);?>">
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
                      $Valuepage = $value['consub_page_en'];
                      $Valuedecision = $value['consub_decision_en'];
                    }else{
                      $Valuepage = $value['consub_page_th'];
                      $Valuedecision = $value['consub_decision_th'];
                    }
                  ?>
                  <tr class="gradeX">
                      <td><strong><?="S".str_pad($value['consub_id'],5,"0",STR_PAD_LEFT);?></strong></td>
                      <td class="project-title">
                        <a href="<?=site_url('main/pagesubDetail/'.$value['consub_id']);?>" target="_blank">
                          <?=$Valuepage;?>
                        </a><br />
                        <small><?=character_limiter($Valuedecision,50);?></small>
                      </td>
                      <td class="center">
                        <?=$value['consub_editby'];?><br />
                        <small class="text-muted"><i class="fa fa-clock-o"></i> <?=date('d M Y h:i A', strtotime($value['consub_lastedit']));?></small>
                      </td>
                      <td class="center">
                        <div class="btn-group">
                          <button data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?=site_url('contents/subcontents/form/'.$con_id."/".$value['consub_id']);?>"><i class="fa fa-pencil"></i> Edit</a></li>
                              <li><a href="#" class="Btn-delete" data-url="<?=site_url('contents/subcontents/delete/'.$value['consub_id']);?>"><i class="fa fa-trash"></i> Delete</a></li>
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
