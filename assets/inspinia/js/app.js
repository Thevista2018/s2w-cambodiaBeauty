requirejs.config({
    // baseUrl: 'http://cambodiahealthbeauty.com/assets/inspinia/js/lib',
    baseUrl: 'http://localhost:8001/assets/inspinia/js/lib',
    paths: {
        jquery: 'jquery-2.1.1',
        bootstrap: 'bootstrap.min',
        metisMenu: 'plugins/metisMenu/jquery.metisMenu',
        slimscroll: 'plugins/slimscroll/jquery.slimscroll.min',
        pace: 'plugins/pace/pace.min',
        codemirror: 'plugins/codemirror/codemirror',
        summernote: 'plugins/summernote/summernote',
        bootstrap_colorpicker: 'plugins/colorpicker/bootstrap-colorpicker.min',
        codemirrorjs: 'plugins/codemirror/mode/javascript/javascript',
        jqueryForm: 'plugins/jqueryForm/jquery.form',
        validate: 'plugins/validate/jquery.validate.min',
        easyautocomplete: 'plugins/easyautocomplete/jquery.easy-autocomplete.min',
        toastr: 'plugins/toastr/toastr.min',
        dataTables: 'plugins/dataTables/datatables',
        sweetalert: 'plugins/sweetalert/sweetalert.min',
        datepicker: 'plugins/datapicker/bootstrap-datepicker',
        clipboard: 'plugins/clipboard/clipboard.min',
        inspinia: '../methods/inspinia.min',
        function: '../methods/app/function',
        callvalidate: '../methods/callvalidate.min',
        callplugins: '../methods/callplugins.min'
    },
    shim: {
      'bootstrap':{
          deps: ['jquery']
      },
      'codemirrorjs':{
          deps: ['codemirror']
      },
      'metisMenu': {
        deps: ['jquery']
      },
      'slimscroll': {
        deps: ['jquery']
      },
      'summernote': {
        deps: ['jquery','bootstrap','codemirror']
      },
      'easyautocomplete': {
        deps: ['jquery']
      },
      'datepicker': {
        deps: ['jquery','bootstrap']
      },
      'jqueryForm': {
        deps: ['jquery']
      },
      'clipboard': {
        deps: ['jquery']
      },
      'inspinia': {
        deps: ['jquery','metisMenu','slimscroll']
      },
      'bootstrap_colorpicker': {
        deps: ['jquery']
      }

  	}
});

// Start the main app logic.
requirejs([
  'jquery',
  'bootstrap',
  'codemirrorjs',
  'metisMenu',
  'slimscroll',
  'pace',
  'codemirror',
  'summernote',
  'jqueryForm',
  'validate',
  'clipboard',
  'bootstrap_colorpicker',
  'easyautocomplete',
  'inspinia'
],
function($) {
  require(['function','callplugins','callvalidate','clipboard'],function(fun,plug,vali,Clipboard){
    new Clipboard('.clipboard');
    plug.summernote();
    plug.dataTables();
    plug.colorpicker();
    plug.datepicker();
    vali.validate();
    if($("#listFile").length){
      var listFile = $("#listFile");
      fun.jsonFilemanager(listFile);
    }

    if($("#Text_country").length){
      var Textcountry = $("#Text_country");
      fun.easyAutocomplete(Textcountry);
    }

    $('.Btn-delete').click(function(){
      fun.deleteData(this);
    });
    $('.file-box').each(function() {
      fun.animationHover(this, 'pulse');
    });

    $('.file-type').click(function(){
      $( ".file-type" ).removeClass( "active" );
      $(this).addClass("active");
      var type = $(this).attr('data-type');
      listFile.attr("data-type",type);
      fun.jsonFilemanager(listFile);
    });

    $('.file-folder').click(function(){
      $( ".file-folder i" ).removeClass( "fa-folder-open" );
      $("i",this).addClass("fa-folder-open");
      var folder = $(this).attr('data-folder');
      listFile.attr("data-folder",folder);
      fun.jsonFilemanager(listFile);
    });

    $('.file-tag').click(function(){
      $(this).toggleClass("active");
      var tag = $(this).attr('data-tag');
      var tags = listFile.attr('data-tags');
      if(tags != ""){
        var t = tags.split(',');
        var key = $.inArray( tag, t );
        if(key >= 0){
          t = $.grep(t, function(value) {
            return value != tag;
          });
        }else{
          t.push(tag);
        }
        t.toString();
      }else{
        t = tag;
      }

      listFile.attr("data-tags",t);
      fun.jsonFilemanager(listFile);
    });

    $('.Btn-reload').click(function(){
      location.reload();
    });

    $('.Btn-url').click(function(){
      var Url = $(this).attr('data-url');
      window.open(Url,'_blank');
    });

    $('.Btn-eye').click(function() {
      // $('.Text_eye').each(function() {
      //   var v = $(this).val();
      //   if(v == 1){
      //     $(this).val(2);
      //   }else{
      //     $(this).val(1);
      //   }
      // });
      // $("i", this).toggleClass("fa-eye-slash fa-eye");

        fun.showandhideData(this);

    });

    $('.Btn-check').click(function() {
      $('.Text_check').each(function() {
        var v = $(this).val();
        if(v == 1){
          $(this).val(2);
        }else{
          $(this).val(1);
        }
      });
      $("i", this).toggleClass("fa-check-square fa-check-square-o");
    });

    if($("#Text_slidertype").length){
      $( "#Text_slidertype" ).change(function() {
        var v = $(this).val();
        if(v == 1){
          $('#sliderImage').show();
          $('#sliderVideo').hide();
          $('#sliderUrl').hide();
        }else if(v == 2){
          $('#sliderImage').hide();
          $('#sliderVideo').show();
          $('#sliderUrl').hide();
        }else if(v == 3){
          $('#sliderImage').hide();
          $('#sliderVideo').hide();
          $('#sliderUrl').show();
        }
      });
    }


  });
});
