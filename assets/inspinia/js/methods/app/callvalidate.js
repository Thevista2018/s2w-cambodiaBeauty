define(["jquery","function","bootstrap","validate"], function($,fun) {
  var methods = {}

  methods.validate = function(e){

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please"); 

    // Form content page detail update TH
    if($("#formPagedetailTH").length){
      $("#formPagedetailTH").validate({
        rules: {
          Text_namePageTH: {
                required: true
            }
        },
        messages: {
          Text_namePageTH: {
                required: "please enter data."
            }
        },submitHandler: function(form) {
          var Id = $('#Id').val();
          if(Id != ""){
            fun.dataSubmit(form);
          }else{
            fun.dataSubmitdir(form);
          }
          return false;
        }
      });
    }

    if($("#formSubdetailTH").length){
      $("#formSubdetailTH").validate({
        rules: {
          Text_namePageTH: {
                required: true
            }
        },
        messages: {
          Text_namePageTH: {
                required: "please enter data."
            }
        },submitHandler: function(form) {
          var Id = $('#Id').val();
          if(Id != ""){
            fun.dataSubmit(form);
          }else{
            fun.dataSubmitdir(form);
          }
          return false;
        }
      });
    }

    // Form sub content page detail update EN
    if($("#formSubdetailEN").length){
      $("#formSubdetailEN").validate({
        rules: {
            Text_namePageEN: {
                required: true
            }
        },
        messages: {
            Text_namePageEN: {
                required: "please enter page name."
            }
        },submitHandler: function(form) {
          var Id = $('#Id').val();
          if(Id != ""){
            fun.dataSubmit(form);
          }else{
            fun.dataSubmitdir(form);
          }
          return false;
        }
      });
    }

    // Form upload file manager
    if($("#formFileManager").length){
      $("#formFileManager").validate({
        rules: {
            File_images: {
                required: true
            }
        },
        messages: {
            File_images: {
                required: "please select file for upload."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    // Form administrators
    if($("#formAdministrators").length){
      $("#formAdministrators").validate({
        rules: {
            Text_fullName: {
                required: true
            },
            Select_Positon: {
                required: true
            },
            Text_Email: {
                required: true,
                email: true,
                remote: {
                    url: $( "#Text_Email" ).attr('data-url'),
                    type: "post",
                    data: {
                        Text_Email: function() {
                            return $( "#Text_Email" ).val();
                        }
                    }
                }
            },
            Text_passWord: {
                required: true,
                required: true,
                minlength: 6
            },
            Text_confirmPassword: {
                required: true,
                minlength: 6,
                equalTo: "#Text_passWord"
            }
        },
        messages: {
            Text_fullName: {
                required: "please enter fullname."
            },
            Select_Positon: {
                required: "please enter positon."
            },
            Text_Email: {
                required: "please enter email.",
                email: "Please enter a valid email.",
                remote: "This email is already activated !"
            },
            Text_passWord: {
                required: "please enter password.",
                minlength: "Please specify at least 6 characters."
            },
            Text_confirmPassword: {
                required: "please enter confirm password.",
                minlength: "Please specify at least 6 characters.",
                equalTo: "Please specify the same password as the password."
            },
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

     /*############# salesrepresentative #############*/
    // Form create en
    if($("#formSalesrepresentative_Create").length){
      $("#formSalesrepresentative_Create").validate({
        rules: {
          Text_file: { required: true  },
          Text_Title: { required: true  },
        },
        messages: {
          Text_file: { required: "please select file." },
          Text_Title: { required: "please enter title." },
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }
    // Form update en
    if($("#formSalesrepresentative_Update").length){
      $("#formSalesrepresentative_Update").validate({
        rules: {
          Text_Title: { required: true  },
        },
        messages: {
          Text_Title: { required: "please enter title." },
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }


    /*############# News #############*/
    // Form create en
    if($("#formNewsEN_Create").length){
      $("#formNewsEN_Create").validate({
        rules: {
            Text_titleEN: {
                required: true
            }
        },
        messages: {
            Text_titleEN: {
                required: "please enter title."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }
    // Form update en
    if($("#formNewsEN_Update").length){
      $("#formNewsEN_Update").validate({
        rules: {
            Text_titleEN: {
                required: true
            }
        },
        messages: {
            Text_titleEN: {
                required: "please enter title."
            }
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    // Form create th
    if($("#formNewsTH_Create").length){
      $("#formNewsTH_Create").validate({
        rules: {
            Text_titleTH: {
                required: true
            }
        },
        messages: {
            Text_titleTH: {
                required: "please enter title."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    // Form update th
    if($("#formNewsTH_Update").length){
      $("#formNewsTH_Update").validate({
        rules: {
            Text_titleTH: {
                required: true
            }
        },
        messages: {
            Text_titleTH: {
                required: "please enter title."
            }
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    /*############# End News #############*/

    // Form images en
    if($("#formImages").length){
      $("#formImages").validate({
        rules: {
            Text_title: {
                required: true
            },
            File_images: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            },
            File_images: {
                required: "please selete image for upload."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    // Form content page detail update EN
    if($("#formSettings").length){
      $("#formSettings").validate({
        rules: {
            Text_nameweb_th: {
                required: true
            },
            Text_address_th: {
                required: true
            },
        },
        messages: {
            Text_nameweb_th: {
                required: "please enter data."
            },
            Text_address_th: {
                required: "please enter data."
            },
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    // Form slider create
    if($("#formSlider_Create").length){
      $("#formSlider_Create").validate({
        rules: {
            File_images: {
                required: true
            },
            File_videoimages: {
                required: true
            },
            File_video: {
                required: true
            },
            Text_linkurl: {
                required: true
            }
        },
        messages: {
            File_images: {
                required: "select file for upload."
            },
            File_videoimages: {
                required: "select file for upload."
            },
            File_video: {
                required: "select file for upload."
            },
            Text_linkurl: {
                required: "please enter link url."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    // Form slider update
    if($("#formSlider_Update").length){
      $("#formSlider_Update").validate({
        rules: {
            
        },
        messages: {

        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    if($("#formCustom_Create").length){
      $("#formCustom_Create").validate({
        rules: {
            Text_title: {
                required: true
            },
            Text_type: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            },
            Text_type: {
                required: "please enter type."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    if($("#formCustom_Update").length){
      $("#formCustom_Update").validate({
        rules: {
            Text_title: {
                required: true
            },
            Text_type: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            },
            Text_type: {
                required: "please enter type."
            }
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    if($("#formDownload_Create").length){
      $("#formDownload_Create").validate({
        rules: {
            Text_title: {
                required: true
            },
            Text_type: {
                required: true
            },
            File_download: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            },
            Text_type: {
                required: "please enter type."
            },
            File_download: {
                required: "please selete file for upload."
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    if($("#formDownload_Update").length){
      $("#formDownload_Update").validate({
        rules: {
            Text_title: {
                required: true
            },
            Text_type: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            },
            Text_type: {
                required: "please enter type."
            }
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    if($("#formIndustry").length){
      $("#formIndustry").validate({
        rules: {
            Text_title: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter title."
            }
        },submitHandler: function(form) {
          var Id = $('#Id').val();
          if(Id != ""){
            fun.dataSubmit(form);
          }else{
            fun.dataSubmitdir(form);
          }
          return false;
        }
      });
    }

    if($("#formBanner_Create").length){
      $("#formBanner_Create").validate({
        rules: {
            Text_link: {
                required: true
            },
            File_images: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter link."
            },
            File_images: {
                required: true
            }
        },submitHandler: function(form) {
          fun.dataSubmitdir(form);
          return false;
        }
      });
    }

    if($("#formBanner_Update").length){
      $("#formBanner_Update").validate({
        rules: {
            Text_link: {
                required: true
            }
        },
        messages: {
            Text_title: {
                required: "please enter link."
            }
        },submitHandler: function(form) {
          fun.dataSubmit(form);
          return false;
        }
      });
    }

    if($("#formVisitor").length){
        $("#formVisitor").validate({
          rules: {
            Country: { lettersonly: true }
          },
          messages: {
              
          },submitHandler: function(form) {
            fun.dataSubmitdir(form);
            return false;
          }
        });
      }

  }

  return methods;
});
