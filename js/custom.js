jQuery(document).ready(function($) {
    $(".post_status").click(function() {
        var _this = $(this);
        var value = $(this).attr('data-value');
        var id = $(this).attr('data-id');
        
        var data = {"action" : 'change_status', 'id' : id, 'value' : value};
        
        $.post(ajaxurl, data, function(response) {
            result = eval(response);
            if (result[1] == "publish") {
                _this.html("Deactivate");
                _this.attr("data-value", "publish");
            } else {
                _this.html("Activate");
                _this.attr("data-value", "pending");
            }
            
        }).fail(function() {
            alert( "error" );
          });
    });
    
    $('input[name="headline"]').keyup(function() {
        var text_length = $(this).val().length;
        $(this).next().find("b").html(text_length);
    });
    $('input[name="source_url"]').keyup(function() {
        var text_length = $(this).val().length;        
        $(this).next().find("b").html(text_length);
    });
});

function arrayInArray(needle, haystack) {
    var i=0, len=haystack.length, target=JSON.stringify(needle);
    for(; i<len; i++) {
        if (JSON.stringify(haystack[i]) == target) {
            return i;
        }
    }
    return -1;
}