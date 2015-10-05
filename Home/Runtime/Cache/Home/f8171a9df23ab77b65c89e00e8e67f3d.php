<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>活动详情</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>





</head>
<style type="text/css">
    *{font-family: "Helvetica Neue";color: #404040;border-color: #404040 !important;font-size: 1em !important;}
</style>
<body style="background:RGB(228,240,216)">
<input id="openid" hidden="hidden" type="text" value="<?php echo ($openid); ?>"/>
<div style="text-align: left;padding: 10px 10px 15px 10px;border-bottom: 1px solid #404040;width: 100%;height: 80px;background-color:RGB(182,216,144);">
   <!-- <label>活动标题：</label>-->
    <label id="activitytitle" style="font-size: 1.4em !important;"></label><br>
    <div style="height: 0.5em;width: 100%"></div>
  <!--  <label style="line-height: 0.6em">副标题：</label>-->
    <label id="activitysubtitle" style="line-height: 0.5em;"></label>
</div>
<div style="text-align: left;padding: 15px 10px 10px 10px;border-bottom: 1px solid #404040;width: 100%;height: 50px;background-color:RGB(182,216,144);">
    <label>时间：</label>
    <label id="activitytime"></label>
</div>
<div style="text-align: left;padding: 15px 10px 10px 10px;border-bottom: 1px solid #404040;width: 100%;height: 50px;background-color:RGB(182,216,144);">
    <label>地点：</label>
    <label id="activityadd"></label>
</div>
<div style="text-align: left;padding: 15px 10px 10px 10px;border-bottom: 1px solid #404040;width: 100%;height: 50px;background-color:RGB(182,216,144);">
    <label>主办：</label>
    <label id="activitysponsor"></label>
</div>
<div style="text-align: left;padding: 15px;border-bottom: 1px solid #404040;width: 100%;background:RGB(228,240,216)">
    <label>详细介绍：</label>
    <p id="activitytetailed" style="word-wrap: break-word;margin-top: 0.5em;"></p>
</div>
<button id="" style="background-color: RGB(228,240,216);border: 1px solid #404040;color: #404040;margin-top: 10px;width: 80%;margin-left: 10%;height: 3em" class="block" data-icon="checkmark" data-target="closePopup" onclick="attent(<?php echo ($activityId); ?>)">我想去</button>
<!--<button style="background-color: RGB(228,240,216);border: 1px solid #000;color: #000;margin-top: 10px;width: 80%;margin-left: 10%;height: 3em" class="block"  data-icon="checkmark" data-target="closePopup" onclick="back()">不想去</button>-->
</body>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>
<script type="text/javascript">

    var attentionId=0;
    $(function(){
        $.ajax({
         url:"/wx_shool/index.php/home/activity/getActiviryById/activityId/"+<?php echo ($activityId); ?>,
         type:'get',
         async:false,
         success:function(result){
         console.log(result);
         if(result.length>0){
         result=JSON.parse(result);

           // console.log(result);
             $("#activitytitle").text(result[0]["activitytitle"]);
             $("#activitytime").text(week(result[0]["activitytime"]));
             $("#activityadd").text(result[0]["activityadd"]);
             $("#activitysponsor").text(result[0]["activitysponsor"]);
            // $("#activitytetailed").text(result[0]["activitytetailed"]);
             $("#activitysubtitle").text(result[0]["activitysubtitle"]);
             $("#activitytetailed").append(result[0]["activitytetailed"]);


         }else{

         }


         }
         });


        $.ajax({
            url:"/wx_shool/index.php/home/activity/checkactivity/openid/<?php echo ($openid); ?>/activityid/<?php echo ($activityId); ?>",
            type:'get',
            async:false,
            success:function(result){
                //alert(result);
               // console.log(result);
                if(result!="false"){
                    result=JSON.parse(result);

                    $(".block").text("取消关注");
                    attentionId=result[0]["attentionid"];
                    //alert(attentionId);


                }else{

                }


            }
        });






    });

    function attent(activityId){
      //  alert(activityId+")))"+openid);
        if($(".block").text()=="我想去"){
            $.ajax({
                url:'/wx_shool/index.php/home/activity/attent/',
                type:'post',
                async:false,
                data:{activityId:activityId,openid:$("#openid").val()},
                success:function(result){
                    //alert("OK");
                    // console.log(result);
                    if(result=="1"){
                        alert("你已参加，请不要重复参与");

                        location.reload();
                    }
                    if(result=="OK"){
                        // alert("11");
                        location.href="/wx_shool/index.php/home/activity/successful/activityId/"+activityId;

                    }
                    else{
                        //  alert("参加失败");
                        location.reload();

                    }

                },
                error:function(result){
                    //console.log(result);
                    //    alert("22")

                }
            })
        }
        else{
            $.ajax({
                url:'/wx_shool/index.php/home/activity/cancle/',
                type:'post',
                async:false,
                data:{attentionId:attentionId},
                success:function(result){
                    //alert("OK");
                    // console.log(result);
                    if(result=="OK"){
                        alert("取消成功");

                        location.reload();
                    }

                    else{
                        alert("取消成功");
                        location.reload();

                    }

                },
                error:function(result){
                    //console.log(result);
                    //    alert("22")

                }
            })
        }





    }

    function back()
    {
        history.go(-1);
    }


    function week(date){
         //alert(date.substring(0,4));
       // alert(date.substring(5,7));
      //  alert(date.substring(8,10));
        var date1 = new Date(date.substring(0,4),date.substring(5,7),date.substring(8,10));
        var week = date1.getDay();
        // alert(date1);
         var str;
          if (week == 0) {
         str = "星期日";
         } else if (week == 1) {
         str = "星期一";
         } else if (week == 2) {
         str = "星期二";
         } else if (week == 3) {
         str = "星期三";
         } else if (week == 4) {
         str = "星期四";
         } else if (week == 5) {
         str = "星期五";
         } else if (week == 6) {
         str = "星期六";
         }
          return date.substring(0,10)+" （"+str+"）"+date.substring(11,16);

       // return date1.getFullYear()+"-"+(date1.getMonth()+1)+"-"+date1.getDate();


    }
</script>
<script>
    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: false,
        appId: '<?php echo ($appId); ?>',
        timestamp: <?php echo ($timestamp); ?>,
        nonceStr: '<?php echo ($nonceStr); ?>',
        signature: '<?php echo ($signature); ?>',
        jsApiList: [
            //  'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'


        ]
    });
    wx.ready(function () {
        // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
        /* document.querySelector('#checkJsApi').onclick = function () {
         wx.checkJsApi({
         jsApiList: [
         'getNetworkType',
         'previewImage'
         ],
         success: function (res) {
         alert(JSON.stringify(res));
         }
         });
         };*/

        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: '<?php echo ($activitytitle); ?>-<?php echo ($activitysubtitle); ?>',
            link: 'http://zxcasdmko.gotoip3.com/wx_shool/index.php/home/activity/activitydetail1/activityId/'+<?php echo ($activityId); ?>+"/openid/1",
            imgUrl: 'http://zxcasdmko.gotoip3.com/wx_shool/Public/SchoolIcon/<?php echo ($activityimage); ?>',
            trigger: function (res) {
                // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                // alert('用户点击分享到朋友圈');


            },
            success: function (res) {

                alert('分享成功');

            },
            cancel: function (res) {
                alert('已取消分享');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

//分享到朋友
        wx.onMenuShareAppMessage({
            title: '给你看看这个',
            desc:  '<?php echo ($activitytitle); ?>-<?php echo ($activitysubtitle); ?>',
            link: 'http://zxcasdmko.gotoip3.com/wx_shool/index.php/home/activity/activitydetail1/activityId/'+<?php echo ($activityId); ?>+"/openid/1",
            imgUrl: 'http://zxcasdmko.gotoip3.com/wx_shool/Public/SchoolIcon/<?php echo ($activityimage); ?>',
            trigger: function (res) {
                // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                // alert('用户点击发送给朋友');

            },
            success: function (res) {



                alert('分享成功');
                //  location.href="/chongzhi/index.php/home/index/"
            },
            cancel: function (res) {
                alert('分享失败，请重新分享');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });



    /*    document.querySelector('#onMenuShareTimeline').onclick = function (){
            $(".tishi").css("display","block");
            wx.onMenuShareTimeline({
                title: '<?php echo ($activitytitle); ?>-<?php echo ($activitysubtitle); ?>',
                link: 'http://zxcasdmko.gotoip3.com/wx_shool/index.php/home/activity/activitydetail1/activityId/'+<?php echo ($activityId); ?>+"/openid/1",
                imgUrl: 'http://zxcasdmko.gotoip3.com/wx_shool/Public/SchoolIcon/<?php echo ($activityimage); ?>',
                trigger: function (res) {
                    // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                    // alert('用户点击分享到朋友圈');


                },
                success: function (res) {

                    alert('分享成功');

                },
                cancel: function (res) {
                    alert('已取消分享');
                },
                fail: function (res) {
                    alert(JSON.stringify(res));
                }
            });

        };*/







    });















    wx.error(function(res){
        alert(res);

        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

    });


</script>
</html>