<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>演出查询</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">-->
    <script type="text/javascript" src="/wx_shool/Public/Common/weixin.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>
   <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

    /*    body {
            background: #2d2c41;
            font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
        }*/

        ul {
            list-style-type: none;
        }

        a {
            color: #b63b4d;
            text-decoration: none;
        }

        /** =======================
         * Contenedor Principal
         ===========================*/
        h1 {
            color: #FFF;
            font-size: 24px;
            font-weight: 400;
            text-align: center;
            margin-top: 80px;
        }

        h1 a {
            color: #c12c42;
            font-size: 16px;
        }

        .accordion {
            width: 100%;
           /* max-width: 360px;*/
          /*  margin: 30px auto 20px;*/
            background: #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .accordion .link {
            cursor: pointer;
            height:60px ;
            background-color:RGB(182,216,144);
            display: block;
            padding: 15px 15px 15px 42px;
            color: #4D4D4D;
            font-size: 14px;
            font-weight: 700;
            border-bottom: 1px solid #CCC;
            position: relative;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li:last-child .link {
            border-bottom: 0;
        }

        .accordion li i {
            position: absolute;
            top: 13px;
            left: 12px;
            font-size: 18px;
            color: #595959;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li i.fa-chevron-down {
            right: 12px;
            left: auto;
            font-size: 16px;
        }

        .accordion li.open .link {
            color: #b63b4d;
        }

        .accordion li.open i {
            color: #b63b4d;
        }
        .accordion li.open i.fa-chevron-down {
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        /**
         * Submenu
         -----------------------------*/
        .submenu {
            display: none;
            background:RGB(228,240,216);
            font-size: 14px;
        }

        .submenu li {
          /*  border-bottom: 1px solid #4b4a5e;*/
        }

        .submenu a {
            display: block;
            text-decoration: none;
            color: #d9d9d9;
            padding: 12px;
            padding-left: 42px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .submenu a:hover {
            background: #808080;
            color: #FFF;
        }


    </style>
</head>
<style type="text/css">
    *{font-family: "Helvetica Neue";color: #404040}
</style>
<body style="background-color:RGB(182,216,144);">
<input id="openid" hidden="hidden" type="text" value="<?php echo ($openid); ?>"/>


<ul id="accordion" class="accordion">
    <li id="listview">
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div  onclick="getChild(<?php echo ($vo["shoolid"]); ?>)" class="link" style="border-bottom: 1px solid #000"><i class="" style="width: 1.5em;height: 1.5em ;background: transparent;margin-left: 0.2em">
            <img src="/wx_shool/Public/SchoolIcon/<?php echo ($vo["schoolicon"]); ?>" style="background: transparent" width="100%" height="100%" />
        </i><span style="margin-left: 0.5em;font-size: 1.0em;line-height: 1.7em"><?php echo ($vo["shoolname"]); ?></span><i class="fa fa-chevron-down" style="top: 1.3em"></i></div>
        <ul class="submenu" style="overflow: hidden; border-color: #808080;" id="<?php echo ($vo["shoolid"]); ?>">
            <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if(($vo['shoolid']) == $vo1['shoolid']): ?><li  style="color:#808080;border-color: #808080;height: auto;overflow: hidden;display: box; display: -moz-box;display: -webkit-box;">
                        <div style=" border-bottom: 1px solid #808080;height:100%;text-align: center;font-size: 1.2em;;line-height:5.4em;" onclick="location.href='/wx_shool/index.php/home/activity/activitydetail/activityId/<?php echo ($vo1["activityid"]); ?>/openid/<?php echo ($openid); ?>'">&nbsp;&nbsp;&nbsp;<?php echo ($vo1["activitycagetory"]); ?></div>
                    <div style="border-bottom: 1px solid #808080;flex:1;height:100%;text-align: left;overflow:hidden;font-size: 1.1em;line-height:2em;-moz-box-flex: 1;-webkit-box-flex: 1;box-flex: 1;" onclick="location.href='/wx_shool/index.php/home/activity/activitydetail/activityId/<?php echo ($vo1["activityid"]); ?>/openid/<?php echo ($openid); ?>'" >
                        <p style="margin-left: 1.3em;font-size: 1.2em;overflow: hidden;height: 30px"><?php echo ($vo1["activitytitle"]); ?></p>
                        <p style="margin-left: 1.6em;font-size: 1.0em;overflow: hidden;height: 30px"><?php echo ($vo1["activitysubtitle"]); ?></p>
                        <p style="margin-left: 1.6em;font-size: 1.0em;overflow: hidden;height: 30px" ><?php echo ($vo1["activitytime2"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo ($vo1["attentnum"]); ?>人想去</p>
                    </div>
                    <div style="border-bottom: 1px solid #808080;text-align: center;"   >
                        <img src="/wx_shool/Public/Home/images/3.png" onclick="attent(<?php echo ($vo1["activityid"]); ?>)" style="width:50px;height:50px;margin-top: 1.2em;border: 0px;margin-right: 1em" alt=""/>
                    </div>

                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>

</li>








</ul>


<button style="background-color: transparent;border: 1px solid #404040;color: #404040;width: 80%;margin-left: 10%;height: 3em;font-size: 1.1em;padding:0;margin-top:15px;display: none" id="guanzhuxuexiao" onclick="location.href='/wx_shool/index.php/home/school/index/openid/<?php echo ($openid); ?>'">选择关注学校</button>

</body>
<script>
    $(function(){
       // alert("333");
        if(<?php echo ($data); ?>=="1"){
           // alert("您还未关注任何学校，请点击『关注学校』勾选您想要关注的学校后，再进入此页面查询相关演出活动。");
            $("#guanzhuxuexiao").css("display","block")

        }


    });


</script>
<script type="text/javascript">
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);




        };

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this);
                    $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        };

        var accordion = new Accordion($('#accordion'), false);

      //  $("#<?php echo ($data[0]['shoolid']); ?>").css({"display":"block"});//展开第一个

      /*  $(".time2").each(function(){
            $(this).text(week($(this).text()));
           // alert($(this).text())
            //week()
        })*/




    });



    function  getChild(shoolId){
      //  console.log(shoolId);
        /* $.ajax({
         url:"/work/wx_shool/index.php/home/activity/getChildActiviry/shoolid/"+shoolId,
         type:'type',
             async:false,
         success:function(result){
         console.log(result);
         if(result.length>0){
         result=JSON.parse(result);
         console.log(result);
         var str="";
         $.each(result,function(index,content){
             str+='   <li style="height: 8em"><div style="float: left;width:20%;height:100%;text-align: center;font-size: 1.5em;;line-height:4em">类型</div><div style="float: left;width:70%;height:100%;text-align: center;overflow:hidden;font-size: 1.1em;line-height:3em"><p>1111111111111111111标题</p><p style="">2015-04-03 &nbsp;   198人参与</p></div><div style="float: left;width:10%;height:100%;text-align: center;font-size: 2em;line-height:4em">去</div></li>'



         });
         console.log(str);
         $("#shoolId").append(str);



         }else{

         }



         }
         })*/


    }


    function attent(activityId){
        //  alert(activityId+")))"+openid);

            $.ajax({
                url:'/wx_shool/index.php/home/activity/attent/',
                type:'post',
                async:false,
                data:{activityId:activityId,openid:$("#openid").val()},
                success:function(result){
                    //alert("OK");
                    // console.log(result);
                    if(result=="1"){
                        alert("已关注");

                      //  location.reload();
                    }
                    if(result=="OK"){
                      //  alert("11");
                        location.href="/wx_shool/index.php/home/activity/successful/activityId/"+activityId;

                    }
                   /* else{
                      //  alert("参加失败");
                        location.reload();

                    }*/


                },
                error:function(result){
                    //console.log(result);
                    //    alert("22")

                }
            })



    }

/*function week(date){

    return date.substring(0,10);



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
<!--<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>-->
</html>