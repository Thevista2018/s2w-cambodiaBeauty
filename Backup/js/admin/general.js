var cur_domain = document.domain;
if (cur_domain=='203.150.20.151') cur_domain = cur_domain+'/~myanmararchitectdecor';

var folder_am = 'myanmin';

///////////////////////////////////////////////// Update : Status /////////////////////////////////////////////////
function updateStatus(id, status, type) {
    var msg = 'ต้องการเปลี่ยนสถานะ รายการนี้ใช่มั้ย ?';
    if (!confirm(msg)) {
        return;
    }
     
    var url = 'http://'+cur_domain+'/'+folder_am+'/center/update_ajax';

    $.ajax({
        type: "POST",
        url: url,
        data: { id: id, status: status, type: type },
        dataType: "json"
    }).done(function(data) {
        console.log(data);
        
        switch (type) {
            case 'admin' :
                id = data.admin_id;
                status = data.admin_status;
                break;
            case 'member' :
                id = data.m_id;
                status = data.m_status;
                break;
            case 'cat' :
                id = data.cat_id;
                status = data.cat_status;
                break;
            case 'product' :
                id = data.p_id;
                status = data.p_status;
                break;
            case 'faq' :
                id = data.faq_id;
                status = data.faq_status;
                break;
            case 'branch' :
                id = data.branch_id;
                status = data.branch_status;
                break;
            case 'agent' :
                id = data.agent_id;
                status = data.agent_status;
                break;
            case 'job' :
                id = data.job_id;
                status = data.job_status;
                break;
            case 'download' :
                id = data.download_id;
                status = data.download_status;
                break;
            case 'article' :
                id = data.article_id;
                status = data.article_status;
                break;
            default :
                break;
        }
        
        if (type=='admin') {
            if (status==2) {
                $('#result_'+id+' .status_a').attr('src', 'http://'+cur_domain+'/images/admin/icons/admin.png');
                $('#result_'+id+' .status_m').attr('src', 'http://'+cur_domain+'/images/admin/icons/moderator_grey.png');
                $('#result_'+id+' .status_n').attr('src', 'http://'+cur_domain+'/images/admin/icons/status_close_grey.png');
            }
            else if (status==1) {
                $('#result_'+id+' .status_a').attr('src', 'http://'+cur_domain+'/images/admin/icons/admin_grey.png');
                $('#result_'+id+' .status_m').attr('src', 'http://'+cur_domain+'/images/admin/icons/moderator.png');
                $('#result_'+id+' .status_n').attr('src', 'http://'+cur_domain+'/images/admin/icons/status_close_grey.png');
            }
            else {
                $('#result_'+id+' .status_a').attr('src', 'http://'+cur_domain+'/images/admin/icons/admin_grey.png');
                $('#result_'+id+' .status_m').attr('src', 'http://'+cur_domain+'/images/admin/icons/moderator_grey.png');
                $('#result_'+id+' .status_n').attr('src', 'http://'+cur_domain+'/images/admin/icons/status_close.png');
            } 
        }
        else {
            if (status==1) {
                $('#result_'+id+' .status_y').attr('src', 'http://'+cur_domain+'/images/admin/icons/icon_yes.gif');
                $('#result_'+id+' .status_n').attr('src', 'http://'+cur_domain+'/images/admin/icons/icon_no_grey.gif');
            }
            else {
                $('#result_'+id+' .status_y').attr('src', 'http://'+cur_domain+'/images/admin/icons/icon_yes_grey.gif');
                $('#result_'+id+' .status_n').attr('src', 'http://'+cur_domain+'/images/admin/icons/icon_no.gif');
            }
        }
    });
}

///////////////////////////////////////////////// Delete : ID /////////////////////////////////////////////////
function delete_id(id, type) 
{
    var msg = 'ต้องการลบ รายการนี้ใช่มั้ย ?';
    
    if (confirm(msg)) {
        URL = 'http://'+cur_domain+'/'+folder_am+'/center/del_id?id='+id+'&type='+type;
        window.location=URL;
    } 
}

///////////////////////////////////////////////// Update : Ajax /////////////////////////////////////////////////
function updateAjax(id, type, url) {
     var msg = 'ต้องการเปลี่ยนสถานะ รายการนี้ใช่มั้ย ?';
     if (!confirm(msg)) {
         return;
     }

     $.post('http://'+document.domain+"/"+folder_am+"/update_ajax", { id: id, status: $("#status_"+id).val(), type: type },
         function(data) {
            process(data, url, type);
         },
         "json"
      );
 }
 
///////////////////////////////////////////////// Process /////////////////////////////////////////////////
function process(data, url, type) {
    var id;
    
    if (data) { 
        switch (type) {
            case 'admin' :
                id = data.admin_id;
                status = data.admin_status;
                break;
            case 'cat' :
                id = data.cat_id;
                status = data.cat_status;
                break;
            default :
                break;
        }
        
        if (type=='admin') {
            if (status==2) pic = "<img src='"+url+"images/admin/icons/admin.png' />";
            else if (status==1) pic = "<img src='"+url+"images/admin/icons/moderator.png' />";
            else pic = "<img src='"+url+"images/admin/icons/status_close.png' />";
        }
        else {
            if (status==1) pic = "<img src='"+url+"images/admin/icons/status_open.png' />";
            else pic = "<img src='"+url+"images/admin/icons/status_close.png' />";
        }
        
        $("#result_pic_"+id['$id']).html(pic);
        alert("บันทึกข้อมูลเรียบร้อย");
    }
}

////////// Zebra table //////////
$(document).ready(function() {    
    $('#strip tr').mouseover(function() {
        $(this).addClass('over');
    }); 

    $('#strip tr').mouseout(function() {
        $(this).removeClass('over');
    });

    $('#strip tr:odd').addClass('alt');
});    

////////// Tooltip //////////
$(document).ready(function() {
    $('.tooltip').tooltip({
        track: true,
        delay: 0,
        showURL: false,
        showBody: " - ",
        fade: 250
    });
});

////////// Redirect //////////
function redirect(URL) {
    window.location=URL;
}

////////// Date Picker //////////
$(document).ready(function() {
    $( ".calendar" ).datepicker({ 
        dateFormat: 'yy-mm-dd',
//        defaultDate: '-40y',
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  
        changeYear: true, 
        yearRange: '1960:2012',
        showAnim: 'slideDown'
    });
});

//////////////////// Menu : Multi level ////////////////////
$(document).ready(function() {
    /* Submenu : Slide down */
    $('.dropdown').each(
        function() {
            $(this).parent().eq(0).hoverIntent({
                timeout: 100,
                over: function() {
                    var current = $('.dropdown:eq(0)', this);
                    current.slideDown(300);
                },
                out: function() {
                    var current = $('.dropdown:eq(0)', this);
                    current.slideUp(200);
                }
            });

            /* Remove : Border-bottom in last row */
            var n = $(this).children().length;
            if (n%2==0)
                $(this).find("a").eq(n-2).css('border-bottom', 'none');
        });
	
    /* Animate : Mouseover on submenu */    
    $('.dropdown a').hover(
        function() {
            $(this).stop(true).animate({paddingLeft: '15px'}, {speed: 100, easing: 'easeOutBack'});
        }, 
        function() {
            $(this).stop(true).animate({paddingLeft: '0'}, {speed: 100, easing: 'easeOutBounce'});
        }
    );
});

///////////////////////////////////////////////// Image : Error /////////////////////////////////////////////////
function handleImgError(pic, folder, img_width) {
    pic.src = 'http://'+document.domain+'/uploads/'+folder+'/default.jpg';
    pic.width = img_width;
    return true;
}