////////// Switch form type #add_type //////////
$(document).ready(function() {
    var add_type = $('#add_type').val();
    
    if (add_type==1) {
        $('.photo_url').css("display", "");
        $('.photo_browse').css("display", "none");
    } else {
        $('.photo_url').css("display", "none");
        $('.photo_browse').css("display", "");
     }
});

////////// Switch form type #add_type //////////
$(document).ready(function() {
    $('#add_type').change(function() {
        $('.alert_photo').css("display", "none");
        var add_type = $('#add_type').val();
        
        if (add_type==1) {
            $('.photo_url').css("display", "");
            $('.photo_browse').css("display", "none");
            
            var inputURL_id = $('.photo_url input').size() + 1;
            
            if (inputURL_id<20)
                $("#bt_more").removeAttr("disabled");
            
            $("#bt_more").attr("onclick", "addRow(1, "+inputURL_id+");");
        } else {
            $('.photo_url').css("display", "none");
            $('.photo_browse').css("display", "");
            
            var inputBrowse_id = $('.photo_browse input').size() + 1;
            
            if (inputBrowse_id<20)
                $("#bt_more").removeAttr("disabled");
            
            $("#bt_more").attr("onclick", "addRow(2, "+inputBrowse_id+");");
        }
    });
});

////////// Add Row //////////
function addRow(type, id) {
    var max = 10;
    var type_name;
    var i;
    
    if (type==1) {
        for (i=1; i<=5; i++) {
            $('#tb_addrow > tbody').append(
                '<tr class="photo_url">\n\
                    <td class="td_top">\n\
                        <span class="span_topic">URL รูปภาพ #'+id+' :</span>\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="inputURL[]" id="inputURL_'+id+'" value="" class="style_1" />\n\
                    </td>\n\
                </tr>'
            );
            id++;
        }
        $("#bt_more").attr("onclick", "addRow(1, "+id+");");
    } else {
        for (i=1; i<=5; i++) {
            $('#tb_addrow > tbody').append(
                '<tr class="photo_browse">\n\
                    <td class="td_top">\n\
                        <span class="span_topic">Upload #'+id+' :</span>\n\
                    </td>\n\
                    <td>\n\
                        <input type="file" size="35" name="inputBrowse[]" id="inputBrowse_'+id+'" />\n\
                    </td>\n\
                </tr>'
            );
            id++;
        }
        $("#bt_more").attr("onclick", "addRow(2, "+id+");");
    }
        
    // If more 20 - Disabled button
    if (id>=max)
        $("#bt_more").attr("disabled", "disabled");
        
}