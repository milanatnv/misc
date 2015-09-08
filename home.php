<?php
    if(!defined('RESTRICTED'))exit('No direct script access allowed!');
    
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
jQuery(document).ready(function($) {

     vm_init();
     
     function vm_init() {
        $("#ajaxloader").show();
        var apiPath = "https://laudsocialdev.azurewebsites.net/Test/GetBrands";
        $.ajax({
            url: apiPath,
            type: "GET",
            contentType: "application/json; charset=utf-8",

            success: function (result) {
                console.log(result);
                
                $html = "";
                $.each(result, function(_index, _value) {                
                    if (_index % 3 == 0) $html += '<div class="row">';
                    $html += '<div class="col-sm-4"> \
                                <a class="vm_link" href="javascript:void(0)" data-id="' + _value['Id'] + '"> \
                                    <img class="img-responsive" src="' + _value['Logo'] + '"> \
                                    <h3 class="vm_title">' + _value['Name'] + '</h3> \
                                </a> \
                              </div>';
                             
                    if (_index % 3 == 2) $html += '</div>';
                    
                });
                
                $('#main_content').html($html);            
                $("#ajaxloader").fadeOut();            
            },
            error: function (error) {
                alert('Something went wrong when communicating with the server. Please try again later.');
            }
        });
     }
    
     $(document).on("click", ".vm_link", function (e) {
        id = $(this).attr("data-id");
        $("#ajaxloader").show();
        var apiPath = "https://laudsocialdev.azurewebsites.net/Test/GetPosts?brandId=" + id;
        $.ajax({
            url: apiPath,
            type: "GET",
            contentType: "application/json; charset=utf-8",

            success: function (result) {
                console.log(result);
                
                $html = "";
                $.each(result, function(_index, _value) {
                    if (_value['Description'].length > 100)
                        desc = _value['Description'].substr(0, 100) + "...";
                    else
                        desc = _value['Description'].substr(0, 100);
                        
                    if (_index % 3 == 0) $html += '<div class="row">';
                    $html += '<div class="col-sm-4"> \
                                <a class="vm_link2" href="' + _value['Link'] + '"> \
                                    <h4 class="vm_title">' + _value['Title'] + '</h4> \
                                    <img class="img-responsive" src="' + _value['Image'] + '"> \
                                    <div class="vm_description">' + desc + '</div> \
                                </a> \
                              </div>';
                             
                    if (_index % 3 == 2) $html += '</div>';
                    
                });
                
                $('#main_content').html($html);            
                $("#ajaxloader").fadeOut();            
            },
            error: function (error) {
                alert('Something went wrong when communicating with the server. Please try again later.');
            }
        });        
    });
    
});    
</script>
  
<div id="list_page">
    <div class="buttons">
        <a href="index.php?p=home">Back to Home</a>        
    </div>    
    <div class="panel search_result" id="main_content"></div>
</div>