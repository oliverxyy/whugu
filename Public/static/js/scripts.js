/**
 * author: oliverxyy
 * date: 2015-8-22
 *
 * */
var PROJECT_NAME = "/whugu/";
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
    $(".delete_user").click(function(){
        var p = this;
        $.ajax({
            type:"POST",//请求方式
            url:$(p).attr("val"),
            cache: false,
            dataType:'json',//返回值类型
            async:true,
            data:{
            },
            //请求成功后的回调函数有两个参数
            success:function(){
                $(p).parent().parent().remove();
                alert("删除成功！");
            },
            error:function(){
                alert("请查看网络连接，删除操作失败！");
            }
        });

    });
    $("#addArticle #type-choose").on("click","a",function(){
        $(this).parent().find("input[name=cid]").val($(this).attr("cid"));
        $(this).addClass("clickBlue").siblings().removeClass("clickBlue");
    });

    $(".article .verify").click(function(){
        var p = this;
        $.ajax({
            type:"POST",//请求方式
            url:$(p).attr("val"),//发送请求地址
            cache: false,
            dataType:'json',//返回值类型
            async:true,
            data:{
            },
            //请求成功后的回调函数有两个参数
            success:function(data){
                if(data['state']==1){
                    $(p).parent().parent().find(".articleTable_state").text("已审核");
                    alert("操作成功！");
                }
                else{
                    alert("操作失败！");
                }
            },
            error:function(){
                alert("请查看网络连接，删除操作失败！");
            }
        });
    });
    $(".delete_article").click(function(){
        var p = this;
        $.ajax({
            type:"POST",//请求方式
            url:$(p).attr("val"),//发送请求地址
            cache: false,
            dataType:'json',//返回值类型
            async:true,
            data:{
            },
            //请求成功后的回调函数有两个参数
            success:function(){
                $(p).parent().parent().remove();
                alert("删除成功！");
            },
            error:function(){
                alert("请查看网络连接，删除操作失败！");
            }
        });
    });
    $(".pic_enable").click(function(){
        var p = this;
        $.ajax({
            type:"POST",//请求方式
            url:$(p).attr("val"),//发送请求地址
            cache: false,
            dataType:'json',//返回值类型
            async:true,
            data:{
            },
            //请求成功后的回调函数有两个参数
            success:function($data){
                $data['state'] == 1 ? $(p).text("禁用") : $(p).text('启用');
                alert("操作成功！");
            },
            error:function(){
                alert("请查看网络连接，删除操作失败！");
            }
        });
    });
    $(".page .verify").click(function(){
        var p = this;
        $.ajax({
            type:"POST",//请求方式
            url:$(p).attr("val"),//发送请求地址
            cache: false,
            dataType:'json',//返回值类型
            async:true,
            data:{
            },
            //请求成功后的回调函数有两个参数
            success:function(data){
                if(data['state']==1){
                    $(p).parent().parent().find(".articleTable_state").text("已审核");
                    alert("操作成功！");
                }
                else{
                    alert("操作失败！");
                }
            },
            error:function(){
                alert("请查看网络连接，删除操作失败！");
            }
        });
    });

});
