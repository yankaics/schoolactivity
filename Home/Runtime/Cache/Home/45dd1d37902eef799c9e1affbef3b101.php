<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>审核</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>


</head>
<body style="background: #fafafa;width: 100%">
<input id="teacherId" type="text" hidden="hidden" value="<?php echo ($teacherId); ?>"/>
<div style="text-align: center;padding: 10px;width: 100%;margin-top: 2em">
    <label>你未获得教师权限!</label>
</div>
<div style="text-align: center;padding: 10px;width: 100%;margin-top: 0.5em">
    <div id="chooseImage" style="width: 80px;height: 80px;border: 1px solid #008000;margin: 0 auto; line-height:80px;" >
        上传照片
    </div>
    <div style="margin-top: 1em">上传照片等待审核</div>
</div>
<button style="background-color:transparent;border: 1px solid #000;color: #000;margin-top: 10px;width: 80%;margin-left: 10%" class="block" data-icon="checkmark" data-target="closePopup" onclick="location.href='/wx_shool/index.php/home/index/login'">完成</button>
</body>
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
            'checkJsApi',
            'uploadImage',
            'chooseImage'

        ]
    });
    wx.ready(function () {
        // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
      /*  document.querySelector('#checkJsApi').onclick = function () {
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

        var images = {
            localId: [],
            serverId: []
        };
        document.querySelector('#chooseImage').onclick = function () {
            // alert("123");
            wx.chooseImage({
                success: function (res) {
                   // var serverId = res.serverId;
                    images.localId =  res.localIds;
                  //  images.serverId=res.serverId;
                 //   alert(images.serverId);
                   if (images.localId.length == 0) {
                        alert('请先选择图片');
                        return;
                    }
                    if(images.localId.length > 1) {
                        alert('目前仅支持单张图片上传,请重新上传');
                        images.localId = [];
                        return;
                    }
                   // alert(res.localIds);
                    wx.uploadImage({
                        localId: images.localId[0], // 需要上传的图片的本地ID，由chooseImage接口获得
                        isShowProgressTips: 1, // 默认为1，显示进度提示
                        success: function (res) {

                           // var serverId = res.serverId; // 返回图片的服务器端ID
                           // alert(serverId);
                           location.href="/wx_shool/index.php/home/index/download/serverId/"+res.serverId+"/teacherId/"+$("#teacherId").val();
                          /* $.ajax({
                                url:"/wx_shool/index.php/home/index/download/serverId/"+res.serverId,
                                type:'get',
                               asycn:false,
                             //   data:{serverId:res.serverId},
                                success:function(result){
                                    //console.log(result);
                                    if(result=="OK"){
                                        alert("上传成功,请等候管理员审核");
                                    }
                                    else{
                                        alert("上传失败,请重新上传");
                                    }
                                    location.reload();





                                }
                            })*/
                        }
                    });
                   // alert('已选择 ' + res.localIds.length + ' 张图片');
                }
            });
        };




    });










    wx.error(function(res){
        //alert(res);

        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

    });
</script>

</html>