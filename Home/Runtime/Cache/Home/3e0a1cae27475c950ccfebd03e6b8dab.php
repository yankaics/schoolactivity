<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/metro/easyui.css">

    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
</head>
<style type="text/css">
    *{font-family: "Helvetica Neue";color: #404040}
</style>
<body>
<div style="padding:10px 20px;margin-top: 30px">
    <div style="text-align:center;font-size:20px;color:#3498DB;font-weight:600;margin:5px 0;"></div>
   <!-- <input type="text" id="userAcount" placeholder="用户名">-->


    <input type="text"  id="phone" placeholder="输入手机">
    <p style="color: #008800;font-size: 14px;letter-spacing:1px;line-height: 17px">你可通过此号码接收到您所关注的演出活动的提醒及变更信息。我们不会泄露号码或向此号码发送广告及垃圾信息</p>

    <button style="margin-top: 20px" id="btnSendCode" onclick="sendsms()"> 发送验证码</button>

    <input type="text" id="validate" style="margin-top: 10px" placeholder="验证码" >



    <input type="password" id="userPassword" placeholder="输入密码">
    <input type="password" id="reuserPassword" placeholder="确认密码" onblur="checkPassword()">
    <!--<select id="schoollist" style="background-image: linear-gradient(to bottom, #fff 0%, #fff 100%);">
        <option value="0">请选择学校</option>

    </select>-->


    <button class="block" data-icon="checkmark" data-target="closePopup" onclick="register()">注册</button>
   <!-- <a href="/wx_shool/index.php/home/index/login/openid/<?php echo ($openid); ?>" style="color:#3498DB;font-size: 14px">已有帐号/登录</a>-->
    <input id="openid" hidden="hidden" type="text" value="<?php echo ($openid); ?>"/>
</div>

</body>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>
<script type="text/javascript">
    $(function(){

        //绑定所有学校
       /* $.ajax({
            url:"/wx_shool/index.php/home/school/getAllSchollList",
            type:'get',
            success:function(result){
                if(result.length>0){
                    result=JSON.parse(result);
                    var str="";
                    $.each(result,function(index,content){

                       str+=' <option value='+content["shoolid"]+'>'+content["shoolname"]+'</option>'
                    });
                   // console.log(str);
                    $("#schoollist").append(str);

                }
               // console.log(result);
            }
        })*/
    });
    //检查前后密码是否一致
    function checkPassword(){
       // alert()
        if($("#userPassword").val()!=$("#reuserPassword").val()){
            J.popup({
                html: '密码不一致,请重新输入',
                pos : 'center',
                showCloseBtn : true
            });
            $("#reuserPassword").val("");
            return false;
        }

    }
    //注册
    function register(){
      /*  console.log($("#schoollist").val());
        if($("#schoollist").val()==0){
            J.popup({
                html: '请选择所属学校',
                pos : 'center',
                showCloseBtn : true
            });

            return false;
        }*/
       if($("#phone").val()==""||$("#userPassword").val()==""){
           J.popup({
               html: '手机或密码不能为空',
               pos : 'center',
               showCloseBtn : true
           });
           return false;

       }





        var phone=$("#phone").val();
        var PATTERN_CHINAMOBILE = /1[3458]{1}\d{9}$/;
        if(PATTERN_CHINAMOBILE.exec(phone)==null){

            alert("请输入正确手机号码");
            return false;

        }


        checkPassword();

       // if()

        //注册
        $.ajax({
            url:"/wx_shool/index.php/home/index/doRegister/",
            type:'post',
            data:{userAcount:$("#phone").val(),userPassword:$("#userPassword").val(),validate:$("#validate").val(),phone:phone,openid:$("#openid").val()},
            success:function(result){
               if(result=="OK"){
                   alert("注册成功");
                  /* J.popup({
                       html: '注册成功',
                       pos : 'center',
                       showCloseBtn : true
                   });//*/
                  // window.open("/work/wx_shool/index.php/home/index/login");
                   WeixinJSBridge.call('closeWindow');
                   //location.href="/wx_shool/index.php/home/index/login/openid/"+$("#openid").val();
               }
                else if(result=="FALSE"){
                   alert("注册失败,请重新注册");
                   /*J.popup({
                       html: '注册失败,请重新注册',
                       pos : 'center',
                       showCloseBtn : true
                   });*/
                   location.reload();

               }

                else{
                   alert("验证码错误");
               }

            }
        })
    }

    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数

    //发送短信
    function sendsms(){

        var phone=$("#phone").val();
        var PATTERN_CHINAMOBILE = /1[3458]{1}\d{9}$/;
        if(PATTERN_CHINAMOBILE.exec(phone)==null){

            alert("请输入正确手机号码");
            return false;

        }

        curCount = count;
     //设置button效果，开始计时
        $("#btnSendCode").attr("disabled", "true");
        $("#btnSendCode").text("请在" + curCount + "秒内输入验证码");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次




        $.ajax({
            url:"/wx_shool/index.php/home/index/validate/",
            type:'post',
            data:{phone:$("#phone").val()},
            success:function(result){
            }
        })




    }

    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode").text("重新发送验证码");
        }
        else {
            curCount--;
            $("#btnSendCode").text("请在" + curCount + "秒内输入验证码");
        }
    }

</script>
</html>