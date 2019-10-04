<style type="text/css">
@page {
  size: 21cm 29.7cm;
  margin: 0;
}
@media print{
  .footer{
    display: none;
  }
  .page-heading{
    display: none;
  }
  .btn-print{
    display: none;
  }
  .form-group{
    width: 100%;
  }
  .col-md-12{
    width: 100%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-11{
    width: 91.5%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-10{
    width: 83%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-9{
    width: 74%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-8{
    width: 66.5%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-7{
    width: 58%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-6{
    width: 50%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-5{
    width: 40%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-4{
    width: 33%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-3{
    width: 26%;
    padding: 0px;
    float: left;
    display: inline-table;
  }
  .col-md-2{
    float: left;
    padding: 0px;
    width: 16.5%;
    display: inline-table;
  }
  .navbar-static-top{
    display: none;
  }
  .ibox-content{
    border-color: #FFF;
  }
}
</style>
<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Preview</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="<?=site_url('jobposition/position/index');?>">Position</a>
            </li>
            <li class="active">
                <strong>Preview</strong>
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
      <!-- Contents for page -->
          <div class="ibox float-e-margins">
              <div class="ibox-content p-md w-print">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="pull-right tooltip-demo">
                      <a href="javascript:window.print()" class="btn btn-white btn-sm btn-print" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print"><i class="fa fa-print"></i> </a>
                    </div>
                  </div>

                  <?PHP foreach ($listdata as $key => $value) {?>
                  <?PHP if(!empty($value['apply_image'])){?>
                  <div class="col-md-12 text-center">
                    <div class="profile">
                      <img src="<?=base_url('uploads/application/profile/'.$value['apply_image']);?>" alt="">
                    </div>
                  </div>
                  <?PHP }?>
                  <div class="col-md-12 text-center">
                    <h3>ใบสมัครงาน</h3>
                  </div>

                  <div class="col-md-12">
                    <h3>ประวัติส่วนตัว</h3>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">สมัครตำแหน่ง :</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_position']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">เงินเดือนที่ต้องการ :</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_salary']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">วันที่สามารถเริ่มงานได้ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_startjob']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-4 nopadding">ชื่อ-สกุล (ภาษาไทย) :</label>
                        <div class="col-md-8 border-dashed nopadding">
                          <?=empty_str($value['apply_fullname_th']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">วัน/เดือน/ปี เกิด :</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_birthday']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">อายุ :</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_age']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-4 nopadding">ชื่อ-สกุล (ภาษาอังกฤษ) :</label>
                        <div class="col-md-8 border-dashed nopadding">
                          <?=empty_str($value['apply_fullname_en']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-6 nopadding">สัญชาติ :</label>
                        <div class="col-md-6 border-dashed nopadding">
                          <?=empty_str($value['apply_nationality']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-7 nopadding">เชื้อชาติ :</label>
                        <div class="col-md-5 border-dashed nopadding">
                          <?=empty_str($value['apply_race']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-7 nopadding">ศาสนา :</label>
                        <div class="col-md-5 border-dashed nopadding">
                          <?=empty_str($value['apply_religion']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">บัตรประจำตัวประชาชนเลขที่ :</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_identitycard']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">วันที่ออกบัตร :</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_startidentity']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">บัตรหมดอายุ :</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_endidentity']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">ที่อยู่ปัจจุบัน :  เลขที่</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_numberhome']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">หมู่ที่</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_moo']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">ตรอก/ซอย</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_alley']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">ถนน</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_road']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">ตำบล/แขวง</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_tambon']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">อำเภอ/เขต</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_district']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">จังหวัด</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_province']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">รหัสไปรษณีย์</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_zipcode']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-6 nopadding">ส่วนสูง</label>
                        <div class="col-md-6 border-dashed nopadding">
                          <?=empty_str($value['apply_height']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2 f-apply">
                    <div class="form-group">
                        <label class="col-md-6 nopadding">น้ำหนัก</label>
                        <div class="col-md-6 border-dashed nopadding">
                          <?=empty_str($value['apply_weight']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-5 nopadding">เบอร์โทรศัพท์ติดต่อ</label>
                        <div class="col-md-7 border-dashed nopadding">
                          <?=empty_str($value['apply_phone']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">E-mail</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_email']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">สถานะทางทหาร :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=status_military($value['apply_militarystatus']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">สถานะภาพ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=status_marry($value['apply_status']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">โรคประจำตัว :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=status_disease($value['apply_disease']);?> <?=$value['apply_diseasenote'];?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <h3>ประวัติการศึกษา</h3>
                  </div>

                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-12 nopadding">มัธยมศึกษาตอนปลาย/ปวช.</label>
                    </div>
                  </div>
                  <div class="col-md-5 f-apply">
                    <div class="form-group">
                        <label class="col-md-4 nopadding">ชื่อสถาบันการศึกษา:</label>
                        <div class="col-md-8 border-dashed nopadding">
                          <?=empty_str($value['apply_college_1']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">สาขาวิชา:</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_branch_1']);?>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-12 nopadding">ปวท/ปวส.</label>
                    </div>
                  </div>
                  <div class="col-md-5 f-apply">
                    <div class="form-group">
                        <label class="col-md-4 nopadding">ชื่อสถาบันการศึกษา:</label>
                        <div class="col-md-8 border-dashed nopadding">
                          <?=empty_str($value['apply_college_2']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">สาขาวิชา:</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_branch_2']);?>
                        </div>
                    </div>
                  </div>
                  <br />
                  <div class="col-md-3 f-apply">
                    <div class="form-group">
                        <label class="col-md-12 nopadding">ปริญญาตรี</label>
                    </div>
                  </div>
                  <div class="col-md-5 f-apply">
                    <div class="form-group">
                        <label class="col-md-4 nopadding">ชื่อสถาบันการศึกษา:</label>
                        <div class="col-md-8 border-dashed nopadding">
                          <?=empty_str($value['apply_college_3']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">สาขาวิชา:</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_branch_3']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">อื่นๆ(โปรดระบุ)</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_college_other']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <h3>ประสบการณ์ทำงาน</h3>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">1. บริษัท/หน่วยงาน</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_company_1']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ตำแหน่ง</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_position_1']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ลักษณะงานที่รับผิดชอบ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_jobdescription_1']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">2. บริษัท/หน่วยงาน</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_company_2']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ตำแหน่ง</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_position_2']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ลักษณะงานที่รับผิดชอบ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_jobdescription_2']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">3. บริษัท/หน่วยงาน</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_company_3']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ตำแหน่ง</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_position_3']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ลักษณะงานที่รับผิดชอบ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_jobdescription_3']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-3 nopadding">4. บริษัท/หน่วยงาน</label>
                        <div class="col-md-9 border-dashed nopadding">
                          <?=empty_str($value['apply_company_4']);?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ตำแหน่ง</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_position_4']);?>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-12 f-apply">
                    <div class="form-group">
                        <label class="col-md-2 nopadding">ลักษณะงานที่รับผิดชอบ :</label>
                        <div class="col-md-10 border-dashed nopadding">
                          <?=empty_str($value['apply_jobdescription_4']);?>
                        </div>
                    </div>
                  </div>

                  <?PHP }?>

                </div>
              </div>
          </div>
      <!-- End contents for page -->
    </div>
</div>
</div>
