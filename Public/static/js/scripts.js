/**
 * author: oliverxyy
 * date: 2015-8-22
 *
 * */
$(document).ready(function(){
    /** footer 微信平台点击显示 **//*
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
    });*/
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
            success:function(data){
                switch(data['state']){
                    case -1:
                        alert("权限不足，删除失败！");
                        break;
                    case 0:
                        alert("删除操作失败！");
                        break;
                    case 1:
                        $(p).parent().parent().remove();
                        alert("删除成功！");
                        break;
                    default:
                        alert("服务器权限处理错误！");
                        break;
                }
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
                switch(data['state']){
                    case -1:
                        alert("权限不足，删除失败！");
                        break;
                    case 0:
                        alert("删除操作失败！");
                        break;
                    case 1:
                        $(p).parent().parent().find(".articleTable_state").text("已审核");
                        alert("操作成功！");
                        break;
                    default:
                        alert("服务器权限处理错误！");
                        break;
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
            success:function(data){
                switch(data['state']){
                    case -1:
                        alert("权限不足，删除失败！");
                        break;
                    case 0:
                        alert("删除操作失败！");
                        break;
                    case 1:
                        $(p).parent().parent().remove();
                        alert("删除成功！");
                        break;
                    default:
                        alert("服务器权限处理错误！");
                        break;
                }
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
/**
 * 修改密码 验证
 * @returns {boolean}
 */
function checkPd(){
    if($("input[name=password]").val()==""){
        alert("密码不能为空，请重新输入！");
        return false;
    }
    else if($("input[name=password]").val()!=$("input[name=confirmPwd]").val()){
        alert("两次密码不一致，请重新输入！");
        return false;
    }
    else{
        return true;
    }
}
/**
 * 添加用户 验证
 * @returns {boolean}
 */
function checkUser(){
    if($("input[name=name]").val()==""){
        alert("用户名不能为空！");
        return false;
    }
    if($("input[name=password]").val()==""){
        alert("密码不能为空，请重新输入！");
        return false;
    }
    if($("input[name=organization]").val()==""){
        alert("社团/组织不能为空！");
        return false;
    }
    if($("input[name=password]").val()!=$("input[name=confirmPwd]").val()){
        alert("两次密码不一致，请重新输入！");
        return false;
    }
    return true;
}
/**
 * 添加文章 验证
 * @returns {boolean}
 */
function checkArticle(){
    if($("input[name=title]").val()==""){
        alert("标题不能为空！");
        return false;
    }
    if($("input[name=author]").val()==""){
        alert("作者不能为空，请重新输入！");
        return false;
    }
    if($("input[name=publisher]").val()==""){
        alert("发布者不能为空！");
        return false;
    }
    if($("input[name=cid]").val()==""){
        alert("类别不能为空！");
        return false;
    }
    return true;
}