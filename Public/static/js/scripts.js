/**
 * author: oliverxyy
 * date: 2015-8-22
 *
 * */

$(document).ready(function(){
    /** footer 微信平台点击显示 **/
    $("#footer_item_icon").click(function(){
        if($("#footer_item_microPlatform").is(":hidden")){
            $("#footer_item_icon img:eq(0)").hide();
            $("#footer_item_icon img:eq(1)").show();

            $("#footer_item_microPlatform").show();
            $("#footer_item_copyright").hide();
        }
        else{
            $("#footer_item_icon img:eq(1)").hide();
            $("#footer_item_icon img:eq(0)").show();

            $("#footer_item_copyright").show();
            $("#footer_item_microPlatform").hide();
        }
    });


});
