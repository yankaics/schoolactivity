<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>关注成功</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>
</head>
<style type="text/css">
    *{font-family: "Helvetica Neue";color: #404040}
</style>
<body style="background: RGB(235,235,235)">
<div style="width: 100%;height: 200px;text-align: center;z-index: 1">
    <span style="font-size: 1.7em;line-height: 5em">参加成功，请准时到达</span>
</div>
<div style="width: 100%;height: 100px;text-align: center">
    <span style="font-size: 1.2em;line-height: 2em">可在微信公众号页面点击</span><br>
    <span style="font-size: 1.2em;">『演出信息』-『我的关注』进行查看</span>
</div>
<div style="width: 100%;height: 50px;margin-top: 20px"><button  id="onMenuShareTimeline" style="width: 80%;margin-left:10%;height: 50px;background: transparent;border: 1px solid #404040;font-size: 1.2em" >分享到朋友圈</button></div>
<div class="tishi" onclick="$('.tishi').css('display','none')" style="width: 100%;height: 100%;opacity: 0.8;position:absolute;top: 0;display: none;left: 0">
    <img width="100%" height="100%" src="/wx_shool/Public/Home/images/ex1.png" alt=""/>
</div>
</body>
<!--<script type="text/javascript">
    function  success(){


    }

</script>-->

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
            'onMenuShareTimeline'


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




        document.querySelector('#onMenuShareTimeline').onclick = function (){
            $(".tishi").css("display","block");







            wx.onMenuShareTimeline({
                title: '演出分享',
                link: 'http://zxcasdmko.gotoip3.com/wx_shool/index.php/home/activity/activitydetail1/activityId/'+<?php echo ($activityId); ?>+"/openid/1",
                imgUrl: '',
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

        };







    });















    wx.error(function(res){
        alert(res);

        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

    });


</script>
</html>