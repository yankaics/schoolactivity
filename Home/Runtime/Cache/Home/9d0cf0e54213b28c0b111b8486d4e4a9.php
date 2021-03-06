<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>活动详情</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
 <!--   <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>-->



    <script src="/wx_shool/Public/Common/time/js/jquery.1.7.2.min.js"></script>
    <script src="/wx_shool/Public/Common/time/js/mobiscroll_002.js" type="text/javascript"></script>
    <script src="/wx_shool/Public/Common/time/js/mobiscroll_004.js" type="text/javascript"></script>
    <link href="/wx_shool/Public/Common/time/css/mobiscroll_002.css" rel="stylesheet" type="text/css">
    <link href="/wx_shool/Public/Common/time/css/mobiscroll.css" rel="stylesheet" type="text/css">
    <script src="/wx_shool/Public/Common/time/js/mobiscroll.js" type="text/javascript"></script>
    <script src="/wx_shool/Public/Common/time/js/mobiscroll_003.js" type="text/javascript"></script>
    <script src="/wx_shool/Public/Common/time/js/mobiscroll_005.js" type="text/javascript"></script>
    <link href="/wx_shool/Public/Common/time/css/mobiscroll_003.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    *{font-family: "Helvetica Neue";color: #404040}
</style>
<body style="background-color:RGB(182,216,144);">
<div style="text-align: left;padding: 10px;border-bottom: 1px solid #000;width: 100%">
    <label>活动标题：</label>
    <label id="activitytitle"></label><br>
    <label >副标题：</label>
    <label id="activitysubtitle"></label>
</div>
<div style="text-align: left;padding: 10px;border-bottom: 1px solid #000;width: 100%" class="input-row">
    <label>时间：</label>
    <input id="activitytime"  type="text"  />
  <!--  <button style="margin-left: 2em" >修改</button>-->
</div>
<div style="text-align: left;padding: 10px;border-bottom: 1px solid #000;width: 100%" class="input-row">
    <label>地点：</label>
    <input type="text" id="activityadd" />

</div>
<div style="text-align: left;padding: 10px;border-bottom: 1px solid #000;width: 100%">
    <label>主办方：</label>
    <label id="activitysponsor"></label>
</div>
<div style="text-align: left;padding: 10px;border-bottom: 1px solid #000;width: 100%;background:RGB(228,240,216)">
    <label>详细介绍：</label>
    <textarea id="activitytetailed" style="word-wrap: break-word;margin-top: 0.5em;" ></textarea>

</div>
<button style="background-color: RGB(228,240,216);height:3.5em;border: 1px solid #000;color: #000;margin-top: 10px;width: 80%;margin-left: 10%" class="block" data-icon="checkmark" data-target="closePopup" onclick="Save()">保存</button>

</body>
<!--<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>-->
<script type="text/javascript">
    $(function(){
        $.ajax({
            url:"/wx_shool/index.php/home/activity/getActiviryById/activityId/"+<?php echo ($activityId); ?>,
            type:'get',
            async:false,
            success:function(result){
                //console.log(result);
                if(result.length>0){
                    result=JSON.parse(result);
                    // console.log(result);
                    $("#activitytitle").text(result[0]["activitytitle"]);
                    $("#activitytime").val(result[0]["activitytime"]);
                    $("#activityadd").val(result[0]["activityadd"]);
                    $("#activitysponsor").text(result[0]["activitysponsor"]);
                    $("#activitytetailed").val(result[0]["activitytetailed"]);
                    $("#activitysubtitle").text(result[0]["activitysubtitle"]);


                }else{

                }



            }
        })


        var currYear = (new Date()).getFullYear();
        var opt={};
        opt.date = {preset : 'date'};
        opt.datetime = {preset : 'datetime'};
        opt.time = {preset : 'time'};
        opt.default = {
            theme: 'android-ics light', //皮肤样式
            display: 'modal', //显示方式
            mode: 'scroller', //日期选择模式
            dateFormat: 'yyyy-mm-dd',
            lang: 'zh',
            showNow: true,
            nowText: "今天",
            startYear: currYear , //开始年份
            endYear: currYear+20 //结束年份
        };

        var optDateTime = $.extend(opt['datetime'], opt['default']);

        $("#activitytime").mobiscroll(optDateTime).datetime(optDateTime);

    });

   /* //修改时间
    $('#activitytime').tap(function(){
        J.popup({
            html : '<div id="popup_calendar"></div>',
            pos : 'center',
            backgroundOpacity : 0.4,
            showCloseBtn : false,
            onShow : function(){
                new J.Calendar('#popup_calendar',{
                    date : new Date(),
                    onSelect:function(date){
                        $('#activitytime').text(date);
                        J.closePopup();
                    }
                });
            }
        });
    });*/

    //修改到数据库
    function Save()
    {
        if($("#activitytetailed").val()==""||$("#activityadd").val()==""){
            alert("填写内容不能为空");
            return false;
        }


            $.ajax({
                url:'/wx_shool/index.php/home/index/saveModify',
                type:'post',
                data:{activitytime:$("#activitytime").val(),activityadd:$("#activityadd").val(),activitytetailed:$("#activitytetailed").val(),activityId:<?php echo ($activityId); ?>},
                success:function(result){
                  //  console.log(result);
                    if(result=="OK"){
                        alert("修改成功");

                    }
                    else{
                        alert("修改失败");

                    }
                    location.reload();

                }
            })




    }


</script>
</html>