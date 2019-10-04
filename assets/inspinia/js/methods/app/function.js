define(["jquery","jqueryForm","toastr","sweetalert","easyautocomplete"], function($,jqueryForm,toastr,swal,easyAutocomplete) {
  var methods = {}

  methods.Testfunction = function(element, animation){
    console.log("Testfunction");
  }
  methods.animationHover = function(element, animation) {
      element = $(element);
      element.hover(
          function () {
              element.addClass('animated ' + animation);
          },
          function () {
              //wait for animation to finish before removing classes
              window.setTimeout(function () {
                  element.removeClass('animated ' + animation);
              }, 2000);
          });
  }

  methods.dataSubmit = function(form){
    $(form).ajaxSubmit({
        dataType: "json",
        success: function(result) {

          // $(form).each(function(){
          //     this.reset();
          // });

          toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
          };
          if(result.error === true){
            toastr.error(result.title, result.msg);
          }else{
            toastr.success(result.title, result.msg);
            // location.href = result.url
          }

        }
    });
  }

  methods.dataSubmitdir = function(form){
    $(form).ajaxSubmit({
        dataType: "json",
        success: function(result) {
          console.log('Test Data');

          if(result.error === true){
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.error(result.msg,result.title);
          }else{
            location.href = result.url
          }
        }
    });
  }


  methods.deleteData = function(e){
    var url = $(e).attr('data-url');
    swal({
      title: "Would you like to delete this data?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false },
      function (isConfirm) {
      if (isConfirm) {
        location.href = url;
      }
    });
  }

  methods.easyAutocomplete = function(e){
      var options = {
          url: function(phrase) {
              var curl = e.attr('data-url');
              console.log(curl);
              return curl;
          },
          getValue: function(element) {
            return element.country_name;
          },
          ajaxSettings: {
              dataType: "json",
              method: "POST",
              data: {
                  dataType: "json"
              }
          },
          preparePostData: function(data) {
              data.country_name = e.val();
              console.log(data);
              return data;
          },
          requestDelay: 400
      };

      e.easyAutocomplete(options);
  }


  methods.jsonFilemanager = function(listFile){
    var siteUrl = listFile.attr('data-url');
    var jsonUrl = siteUrl+"manager/filemanager/jsonListdata";
    var typeFile = listFile.attr('data-type');
    var Folder = listFile.attr('data-folder');
    var Tags = listFile.attr('data-tags');
    $.ajax({
        method: "POST",
        dataType: "json",
        url: jsonUrl,
        data: {
          typeFile:typeFile,
          Folder:Folder,
          Tags:Tags
        },
        beforeSend: function(){
            // Id_even.html('');
            // Id_source.append(
            //     $("<option></option>").text(" Loading ... ").val(0)
            // );
        },
        success: function(result){
          console.log(result);
            listFile.html('');
            $.each(result.listdata, function(index, item) {
              var Texthtml = '<a href="'+siteUrl+'filemanager/'+item.file_folder+'/'+item.file_name+'" target="_blank"><span class="corner"></span>';
              var $ext = item.file_name.split('.').pop();
              if($ext == "jpg" || $ext == "png" || $ext == "gif"){
                Texthtml+= '<div class="image"><img alt="image" class="img-responsive" src="'+siteUrl+'filemanager/'+item.file_folder+'/'+item.file_name+'"></div>';
              }else if($ext == "mp3"){
                Texthtml+= '<div class="icon"><i class="fa fa-music"></i>a</div>';
              }else if($ext == "mpg4"){
                Texthtml+= '<div class="icon"><i class="img-responsive fa fa-film"></i></div>';
              }else if($ext == "xls" || $ext == "xlsx"){
                Texthtml+= '<div class="icon"><i class="fa fa-bar-chart-o"></i></div>';
              }else{
                Texthtml+= '<div class="icon"><i class="fa fa-file"></i></div>';
              }
              Texthtml+= '<div class="file-name">'+item.file_name+'<br/><small>Added: '+item.file_lastedit+'</small><br /><small class="tooltip-demo"></a>';
              Texthtml+= '<button class="btn btn-white Btn-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" data-url="'+siteUrl+'manager/filemanager/delete/'+item.file_id+'"><i class="fa fa-trash"></i></button>';
              Texthtml+= '<button class="btn btn-white pull-right clipboard" data-toggle="tooltip" data-placement="top" title="" data-original-title="Copy url file" data-clipboard-text="'+siteUrl+'filemanager/'+item.file_folder+'/'+item.file_name+'"><i class="fa fa-copy"></i></button>';
              Texthtml+= '</small></div>';
              listFile.append(
                    $('<div class="file-box"></div>').append(
                      $('<div class="file"></div>').html(Texthtml)
                    )
                );
            });
            $('.Btn-delete').click(function(){
              methods.deleteData(this);
            });
            // Tooltips demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            });
        }
    })
  }

  return methods;
});
