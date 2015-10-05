<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>关注学校</title>
   <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <style type="text/css">
        *{font-family: "Helvetica Neue";color: #404040;-webkit-tap-highlight-color:#000}
    </style>
<style type="text/css">

    input[type="checkbox"] {
        margin: 5px 3px 3px 4px;
    }
    /* .squaredOne */
    .squaredOne {
        width: 28px;
        height: 28px;
        position: relative;
        border: 1px solid #080808;
        background: transparent;
       /* background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
        background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
        background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);*/
      /*  -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
        box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);*/
    }
    .squaredOne label {
        width: 20px;
        height: 20px;
        position: absolute;
        top: 3px;
        left: 3px;
        cursor: pointer;
        background: -moz-linear-gradient(top, transparent 0%, transparent 100%);
        background: -webkit-linear-gradient(top, transparent 0%,transparent 100%);
        background: linear-gradient(to bottom,transparent 0%, transparent 100%);

    }
    .squaredOne label:after {
        content: '';
        width: 16px;
        height: 16px;
        position: absolute;
        top: 2px;
        left: 2px;
        background: #404040;
        background: -moz-linear-gradient(top, #404040 0%, #404040 100%);
        background: -webkit-linear-gradient(top, #404040 0%, #404040 100%);
        background: linear-gradient(to bottom, #404040 0%, #404040 100%);
      /*  -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
        box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);*/
        opacity: 0;
    }
    .squaredOne label:after {
      /*  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=30);
        opacity: 0.3;*/
    }
    .squaredOne input[type=checkbox] {
        visibility: hidden;
    }
    .squaredOne input[type=checkbox]:checked + label:after {
        filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
        opacity: 1;
    }

    /* end .squaredOne */


    * {
        box-sizing: border-box;
    }

    body {
        background: #333;
        font-family: 'Open Sans', sans-serif;
        font-weight: 300;
    }
    body h1, body h2 {
        color: #eee;
        font-size: 30px;
        text-align: center;
        margin: 60px 0 50px 0;
        -webkit-font-smoothing: antialiased;
    }
    body .ondisplay {
        text-align: center;
        /*border-bottom: 1px solid gray;*/

    }


</style>
</head>
<body style="background-color:RGB(182,216,144);">
<input id="openid" hidden="hidden" type="text" value="<?php echo ($openid); ?>"/>
<!--<ul id="listview" style="list-style:none;padding: 0;margin-bottom: 2em;margin-top: 1em">

  <li  style="height:4em;border-bottom: 2px solid rgba(0, 0, 0, .1);position: relative;padding: 5px 0 0 0">
  <input  type="checkbox" style="width: 1.5em;height: 1.5em;margin-top: 0.6em;margin-left: 1em;"/>
   <span style="width: 2em;height: 2em  ;position: absolute;left: 3.6em;top: 0.8em" >
        <img src="/wx_shool/Public/SchoolIcon/1.JPG" width="100%" height="100%" />
   </span>

    <span style="font-size: 1.8em;line-height: 1.6em;margin-left: 2.0em;">麻省学院</span>
</li>
</ul>-->
<div class="ondisplay" id="listview">


        <!-- .squaredOne -->
   <!-- <div style="display: block;height: 70px;border-bottom: 1px solid #080808">
        <div class="squaredOne"  style="display:inline-block;float: left;margin-left: 2em;margin-top: 1.3em">
            <input type="checkbox" value="None" id="squaredOne" name="check"  />
            <label for="squaredOne"></label>

        </div>
        &lt;!&ndash; end .squaredOne &ndash;&gt;
       <span style="float: left;width: 2.5em;height: 2.5em  ;margin-left: 1em;margin-top: 0.8em">
         <img src="/wx_shool/Public/SchoolIcon/dalian-icon.png" width="100%" height="100%" />
       </span>
        <span style="float: left ;margin-left: 0.5em;font-size: 1.8em;line-height: 2.2em;">中央音乐学院</span>
    </div>

    <div  style="display: block;height: 70px;border-bottom: 1px solid #080808">
        <div class="squaredOne"  style="display:inline-block;float: left;margin-left: 2em;margin-top: 1.3em">
            <input type="checkbox" value="None" id="squaredOne1" name="check"  />
            <label for="squaredOne1"></label>

        </div>
        &lt;!&ndash; end .squaredOne &ndash;&gt;
       <span style="float: left;width: 2.5em;height: 2.5em  ;margin-left: 1em;margin-top: 0.8em">
         <img src="/wx_shool/Public/SchoolIcon/guangxi-icon.png" width="100%" height="100%" />
       </span>
        <span style="float: left ;margin-left: 0.5em;font-size: 1.8em;line-height: 2.2em;">中央音乐学院</span>
    </div>
    <div  style="display: block;height: 70px;border-bottom: 1px solid #080808">
        <div class="squaredOne"  style="display:inline-block;float: left;margin-left: 2em;margin-top: 1.3em">
            <input type="checkbox" value="None" id="squaredOne2" name="check"  />
            <label for="squaredOne2"></label>

        </div>
        &lt;!&ndash; end .squaredOne &ndash;&gt;
       <span style="float: left;width: 2.5em;height: 2.5em  ;margin-left: 1em;margin-top: 0.8em">
         <img src="/wx_shool/Public/SchoolIcon/jiefangjun-icon.png" width="100%" height="100%" />
       </span>
        <span style="float: left ;margin-left: 0.5em;font-size: 1.8em;line-height: 2.2em;">中央音乐学院</span>
    </div>
-->

    </div>




<button style="background-color: transparent;border: 1px solid #404040;color: #404040;width: 80%;margin-left: 10%;height: 3em;font-size: 1.1em;padding:0;margin-top:15px" class="block"  data-icon="checkmark" data-target="closePopup" onclick="guanzhu()">关注学校</button>
<div style="height: 100px;width: 100%"></div>

</body>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>
<script type="text/javascript">

    var boolfag=0;
    $(function(){
       $.ajax({
            url:'/wx_shool/index.php/home/school/getAllSchollList',
            type:'get',
            async:false,
            success:function(data){
                if(data.length>0){
                    data=JSON.parse(data);
                    var str = "";
                   // console.log( data.length);
                    for (var i=0; i < data.length; i++) {

                        str+=' <div style="display: block;height: 60px;border-bottom: 1px solid #404040;overflow: hidden">'+
                        ' <div class="squaredOne"  style="display:inline-block;float: left;margin-left: 2em;margin-top: 0.9em">'+
                        ' <input type="checkbox" id='+data[i]["shoolid"]+' value="None" name="check"  />'+
                        '<label for='+data[i]["shoolid"]+'></label>'+

                        '  </div>'+

                        '<span style="float: left;width: 2.1em;height: 2.1em  ;margin-left: 1em;margin-top: 0.8em">'+
                        '  <img src="/wx_shool/Public/SchoolIcon/'+data[i]["schoolicon"]+'" width="100%" height="100%" />'+
                        '  </span>'+
                        '  <span style="float: left ;margin-left: 0.5em;font-size: 1.1em;line-height: 3.4em;">'+data[i]["shoolname"]+'</span>'+
                        '  </div>';






                    }
                 //   console.log(str);
                    $("#listview").append(str);
                }
                else{
                    J.popup({
                        html: '没有学校选择',
                        pos : 'center',
                        showCloseBtn : false
                    });

                }


            }
        });



     //如果已关注过则绑定
        $.ajax({
            url:'/wx_shool/index.php/home/school/bingGuanZhu',
            type:'get',
            async:false,
            data:{openid:$("#openid").val()},
            success:function(data){
               // data=JSON.parse(data);
              // console.log(data.length);
                //>2  说明有数据  []
                if(data.length>2){
                  //  console.log("11")
                    data=JSON.parse(data);
                    var str=data[0]["shoolid"].split("-");
                    for(var i=0;i<str.length;i++){
                       $("#listview").find("input[type=checkbox]").each(function(index,element) {
                           // console.log(element);
                           if ($(this).attr("id") == str[i]) {
                               // console.log($(this).attr("id"));
                               $(this).attr("checked", true)


                           }



                       });
                   }
                    boolfag=1;



                }
                else{


                }


            }
        });




        $("#listview").find("input[type=checkbox]").click(function(){
           // console.log($(this));
         //  console.log($(this).attr("checked"));
            if($(this).attr("checked")=="true"){
                $(this).attr("checked",false);
                //alert("11");
            }else{
                $(this).attr("checked",true);
               // alert("22");
            }
        })
    });

    //关注
    function guanzhu(){



            var temp = [];
           $("#listview").find("input[type=checkbox]").each(function(index,element){
              // console.log(element);


               if($(this).attr("checked")=="true"){
                   temp.push($(this).attr("id"));


               }
              // console.log(temp);




           });

            if(temp.length==0){
                //alert("你未关注任何学校，请重新选择");
                /* J.popup({
                 html: '你未关注任何学校，请重新选择',
                 pos : 'center',
                 showCloseBtn : true
                 });*/
               // location.reload();
               // return false;
                temp.push(0);
            }
           // console.log(temp);
          //  alert("111");
            $.ajax({
                url:'/wx_shool/index.php/home/School/guanZhu/',
                type:'post',
                async:false,
                data:{list:temp,openid:$("#openid").val(),boolfag:boolfag},
                success:function(result){
                    //alert("OK");
                    //console.log(result);
                    if(result=="OK"){
                     location.href="/wx_shool/index.php/home/School/guzhusuccess"  ;
                        //alert("关注成功");

                    }
                    else{
                        alert("关注失败");
                        location.reload();

                    }


                },
                error:function(result){
                    //console.log(result);
                //    alert("22")

                }
            })




    }

   /* function modifystatus(){
        console.log(Event.srcElement);
        if($(this).attr("checked")){
            $(this).attr("checked",false);
            alert("11");
        }else{
            $(this).attr("checked",true);
            alert("22");
        }
       // alert("11");
    }*/
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
            'checkJsApi',
            'openLocation',
            'getLocation'


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


        wx.checkJsApi({
            jsApiList: [
                'getLocation'
            ],
            success: function (res) {
                // alert(JSON.stringify(res));
                // alert(JSON.stringify(res.checkResult.getLocation));
                if (res.checkResult.getLocation == false) {
                    alert('你的微信版本太低，请升级到最新的微信版本！');
                    return;
                }
            }
        });

        wx.getLocation({
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                // var speed = res.speed; // 速度，以米/每秒计
                //  var accuracy = res.accuracy; // 位置精度


                $.ajax({
                    url:"/wx_shool/index.php/home/index/updateLocation/",
                    type:'post',
                    async:false,
                    data:{jingdu:latitude,weidu:longitude,openid:$("#openid").val()},
                    success:function(result){
                        // alert(result);




                        //location.href="/wx_shool/index.php/home/index/teacherSelect";

                    }
                })



            },
            cancel: function (res) {
                alert('用户拒绝授权获取地理位置');
            }
        });




    });










    wx.error(function(res){
        //alert(res);

        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

    });
</script>

</html>