<?PHP
  if(isset($listdata) && count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Id = $value['set_id'];
      $Text_Keywords = $value['set_keywords'];
      $Text_Description = $value['set_description'];
      $Text_Webmaster = $value['set_googletool'];
      $Text_Analytics = $value['set_googleanalytics'];
      $Num_Perpagenews = $value['set_perpage_news'];
      $Num_Perpagegallery = $value['set_perpage_gallery'];
      $Num_Perpageknowledge = $value['set_perpage_knowledge'];
      $Select_Apply = $value['set_apply_online'];
      $Text_UrlLanguage = $value['set_urllanguage'];

    }
  }
?>
<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Settings</h2>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Settings</li>
            <li class="active"><strong>Extensions</strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<!-- End breadcrumb for page -->
<form action="<?=site_url('administrator/settings/updateextensions')?>" method="post" enctype="multipart/form-data" name="formSettings" id="formSettings" class="form-horizontal" novalidate>
<input type="hidden" name="formcrf" id="formcrf" value="<?=$formcrf;?>">
<input type="hidden" name="Id" id="Id" value="<?=$Id?>">

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
              <div class="well well-lg">
                  <h3>Google Webmaster tools</h3>
                  คือ บริการฟรีจาก Google ซึ่งเป็นเครื่องมือสำหรับช่วยเหลือผู้ใช้งานทั่วๆ ไปเพื่อเพิ่มโอกาสในการแสดงผลที่ดีขึ้น ในผลการค้นหาของ Google
                  <br/><br/><b>ศึกษาเพิ่มเติมได้ที่ <a href="https://accounts.google.com/signin/v2/sl/pwd?service=sitemaps&passive=1209600&continue=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fhome%3Fhl%3Dth&followup=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fhome%3Fhl%3Dth&hl=th&authuser=0&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_bank"> accounts.google.com</a></b>
              </div>
              <div class="form-group">
                    <div class="col-sm-12"><input type="text" name="Text_Webmaster" id="Text_Webmaster" value="<?=$Text_Webmaster;?>" placeholder="Google Webmaster tools" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="well well-lg">
                  <h3>Google Analytics</h3>
                  คือ บริการฟรีจาก Google ที่ช่วยในการเก็บข้อมูลผู้เยี่ยมชมเว็บไซต์ เพื่อที่จะนำข้อมูลไปวิเคราะห์ปรับปรุงในส่วนงานต่างๆ ไม่ว่าจะเป็นการทำการตลาด การซื้อโฆษณา การปรับเปลี่ยนเว็บไซต์ เป็นต้น
                  <br/><br/><b>ศึกษาเพิ่มเติมได้ที่ <a href="https://googleanalyticsthailand.com/2014/01/13/google-analytics-%E0%B8%84%E0%B8%B7%E0%B8%AD%E0%B8%AD%E0%B8%B0%E0%B9%84%E0%B8%A3/" target="_bank"> googleanalyticsthailand.com</a></b>
                </div>
                <div class="form-group">
                    <div class="col-sm-12"><input type="text" name="Text_Analytics" id="Text_Analytics" value="<?=$Text_Analytics;?>" placeholder="Google Analytics" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="well well-lg">
                  <h3>Keyword</h3>
                  คือ คีย์เวิร์ดที่เกี่ยวข้องเว็บไซต์ สำหรับเพิ่มการค้นหาใน Google ประมาณ 10 คีย์เวิร์ด และใช้เครื่องหมายคอมม่า (,) คั่นระหว่างคีย์เวิร์ดแต่ละคำ โดยไม่ต้องเว้นวรรคข้างหลังคอมม่า
                </div>
                <div class="form-group">
                    <div class="col-sm-12"><input type="text" id="Text_Keywords" name="Text_Keywords" placeholder="Keyword" class="form-control" value="<?=$Text_Keywords;?>"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="well well-lg">
                  <h3>Descriptions</h3>
                  คือ คำอธิบายที่เกี่ยวกับ Website จะไม่แสดงในเว็บไซต์ แต่จะแสดงที่หน้าการแสดงผลการค้นหาของ Google
                </div>
                <div class="form-group">
                    <div class="col-sm-12"><textarea maxlength="170"  type="text" id="Text_Description" name="Text_Description" rows="8" placeholder="Descriptions" class="form-control"><?=$Text_Description;?></textarea></div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-12" align="right">
        <button class="btn btn-w-m btn-danger Btn-reload" type="button">Reset</button>
        <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
       <div style="padding-top: 40px;"></div>
    </div>
</div>
</div>

</form>
