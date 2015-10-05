<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>登陆</title>
    <link href="/wx_shool/Public/admin/css/login.css" rel="stylesheet" />
    <script src="/wx_shool/Public/admin/js/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/wx_shool/Public/admin/images/ico/3.ico">
</head>
<body>
<form action="">
    <div class="boxLogin">
        <dl>
            <dd> <div class="s1">
                账&nbsp;号:
            </div> <div class="s2">
                <input type="text" class="text" id="userName">
                <span class="errorMsg"></span>
            </div></dd>
            <dd ><div class="s3">
                密&nbsp;码:
            </div> <div class="s4">
                <input type="password" class="text" id="userPassword">
                <span class="errorMsg1"></span>
            </div>
            </dd>
       <!--     <dd> <div class="s5">
                验证码:
            </div><div class="s6">
                <input type="text" class="text" maxlength="4" >
                <img src="/wx_shool/Public/admin/images/Verify_code.png" alt="点击切换验证码">
                <span class="errorMsg"></span>
            </div></dd>-->
            <dd> <div class="load">
                <img src="/wx_shool/Public/admin/images/loading.gif" alt="">
            </div></dd>
            <dd></dd>
        </dl>
        <div class="s8">
            <input type="button" value="" class="sign" onclick="login()" >
        </div>
    </div>
    <div class="copyright">
        <p>最佳浏览环境：chrome.firebox等，1280×800显示分辨率。</p>
    </div>
</form>
</body>
</html>
<script type="text/javascript">
        //登陆
        function login(){
            if($("#userName").val()==""||$("#userPassword").val()==""){
                alert("请输入用户名或者密码");
                return false;
            }
            $.ajax({
                url: "/wx_shool/admin.php/home/index/checklogin/",
                type: 'post',
                data:{userName:$("#userName").val(),userPassword:$("#userPassword").val()},
                success: function (data) {

                    //console.log(data);
                    if(data=="OK"){
                       location.href="/wx_shool/admin.php/home/index/index"
                    }else{
                        location.reload();
                    }


                }
            });

        }
</script>