define(["jquery","bootstrap","summernote","dataTables","bootstrap_colorpicker","datepicker"], function($) {
  var methods = {}

  methods.summernote = function(e){

    $('.summernote').summernote({
      height: 320,
      callbacks: {
        onImageUpload: function(image) {
            uploadImage(image[0]);
        }
      }
    });

    function uploadImage(image) {
      var $url = $('.summernote').attr('data-img');
        var data = new FormData();
        data.append("File_images", image);
        $.ajax({
            url: $url,
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(url) {
                var image = $('<img>').attr('src', url);
                $('.summernote').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

  }

  methods.dataTables = function(e){

    var table = $('.dataTables-example').DataTable({
      searching: true,
      ordering:  false,
      bLengthChange: false,
      pageLength: 25
    });
    $(".dataTables_filter").hide();
    $('#btnsearch').on( 'click', function () {
        var val = $("#search-draw").val();
        console.log(val);
        table.search( val ).draw();
    });

  }

  methods.colorpicker = function(){

    $('.colorpicker').colorpicker();

  }

  methods.datepicker = function(){

    $('.date').datepicker({
        startView: 1,
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "yyyy-mm-dd"
    });

  }

  return methods;
});
