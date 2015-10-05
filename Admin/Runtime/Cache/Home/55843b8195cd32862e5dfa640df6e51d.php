<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html />

<html>
<head>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/default/easyui.css" />
 <!--   <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/demo.css" />-->
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/icon.css" />
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/admin/css/index.css" />
    <link  rel="stylesheet" type="text/css" href="/wx_shool/Public/Common/themes/abc.css" />
    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
</head>
<script type="text/javascript" >
    history.forward();
    var MingCheng = "";
    var ZhangHaoID="";
    $(document).ready(function () {

        YinChangTree();
    });

    function YinChangTree() {
        $('#menuTree').tree('collapseAll');
    }
    //学校管理
    function xuexiaoguanli() {
        addTab('学校管理');
        $('#学校管理').attr('src', '/wx_shool/admin.php/home/school/index');
    }
    //
    //学校活动管理
    function huodongguanli() {
        addTab('活动管理');
        $('#活动管理').attr('src', '/wx_shool/admin.php/home/activity/index');
    }

    //教师审核
    function jiaoshiguanli() {
        addTab('教师审核');
        $('#教师审核').attr('src', '/wx_shool/admin.php/home/teacher/index');
    }
    //用户管理
    function yonghuguanli() {
        addTab('用户管理');
        $('#用户管理').attr('src', '/wx_shool/admin.php/home/user/index');
    }

    //信息管理
    function xixiguanli() {
        addTab('信息管理');
        $('#信息管理').attr('src', '/wx_shool/admin.php/home/attention/index');
    }


</script>
<script type="text/javascript" >
    function addTab(title) {

        if (!$('#tabs').tabs('exists', title)) {
            $('#tabs').tabs('add', {
                title: title,
                content: "<iframe  id=" + title + " style='width:99.5%;height:100%' scrolling=yes></iframe >",
                closable: true
            });
        }
        else {
            $('#tabs').tabs('select', title);
        }
    }
</script>
<body style="background-color:#CCFFFF;">
<img src="/wx_shool/Public/admin/images/tubiao/biaoti4.png" />


<div id="Main" class="easyui-layout" style="width:100%;height:950px" >
    <div data-options="region:'west',split:true,fit:false"  style="width:250px;height:820px;"  title="工作平台" >
        <ul id="menuTree" class="easyui-tree" data-options="animate:true,split:true" >
            <li data-options="iconCls:'icon-ZhuYe'">
                <span>校园活动系统</span>
            </li>
            <li data-options="iconCls:'icon-WenJian'">
                <span>学校列表管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'" >
                        <a onclick="xuexiaoguanli()">学校管理</a>
                    </li>

                </ul>
            </li>
           <!-- <li data-options="iconCls:'icon-WenJian'">
                <span>关注信息管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'"><a onclick="">信息管理</a></li>


                </ul>
            </li>-->
            <li data-options="iconCls:'icon-WenJian'">
                <span>活动管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'" ><a onclick="huodongguanli()">活动管理</a></li>
                  <!--  <li data-options="iconCls:'icon-ZiYe'"><a onclick="">活动详细信息</a></li>-->
                </ul>
            </li>
            <li data-options="iconCls:'icon-WenJian'">
                <span>用户管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'"  ><a onclick="jiaoshiguanli()">用户审核</a></li>

                </ul>
            </li>
            <li data-options="iconCls:'icon-WenJian'">
                <span>接口管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'">接口管理</li>

                </ul>
            </li>
           <!-- <li data-options="iconCls:'icon-WenJian'">
                <span data-options="iconCls:'icon-WenJian'">用户管理</span>
                <ul>
                    <li data-options="iconCls:'icon-ZiYe'" ><a  onclick="yonghuguanli()">用户管理</a></li>


                </ul>
            </li>-->
        </ul>
    </div>
    <div data-options="region:'center'" >
        <div id="tabs" class="easyui-tabs" data-options="maximized:true" >
            <div id="ShouYe" title="首页">

                <iframe  src="" style='width:99.5%;height:100%' scrolling=yes></iframe >
            </div>

        </div>
    </div>
</div>







<style type="text/css" dir="rtl">
    .qqbox a:link {
        color: #000;
        text-decoration: none;
    }
    .qqbox a:visited {
        color: #000;
        text-decoration: none;
    }
    .qqbox a:hover {
        color: #f80000;
        text-decoration: underline;
    }
    .qqbox a:active {
        color: #f80000;
        text-decoration: underline;
    }

    .qqbox{

        height:auto;
        overflow:hidden;
        position:absolute;
        right:0;
        top:100px;

    }
    .QJM{
        width:28px;
        height:54px;
        overflow:hidden;
        position:relative;
        float:right;
        z-index:50px;

    background-image:url("/wx_shool/Public/admin/images/icon/biaoti-2.png")

    }/*第一次显示*/

      .qqkf{
          width:55px;
          height:54px;

          overflow:hidden;
          right:0;
          top:0;
          z-index:99;
          background-image:url("/wx_shool/Public/admin/images/icon/biaoti-2.png")

      }
    .qqkfbt{
        heught:50px;
        overflow:hidden;
        position:relative;
        cursor:pointer;


    }
    .qqkfhm{
        width:130px;
        height:30px;
        overflow:hidden;
        line-height:30px;
        padding-right:8px;
        position:relative;
        margin:3px 0;
    }

    .tel{ font-size:14px; font-weight:bold; color:red;}
    #K1{text-align:center; margin-bottom:50px;}
    .qqkfdb{ height:64px; }
    .k1nr{ width:50px; height:50px;}
</style>

<div class="qqbox" id="divQQbox" style="top: 44.5px;"><!--可在条左侧和接近显示显示-->
    <div class="QJM" id="meumid" onmouseover="show()">账号：</div>
    <div class="qqkf" style="display:none;" id="contentid" onmouseout="hideMsgBox(event)">
        <div class="qqkfbt" id="qq-1" onfocus="this.blur();"> <!--@*可在条外接近显示显示*@--></div>
        <div id="K1">

            <div class="k1nr">
              <!--  @*可在条中接近显示显示*@-->
                <a href="/wx_shool/admin.php/home/index/login" style="font-family: 华文新魏; font-size: x-large; font-style: inherit; font-variant: normal; text-transform: lowercase; color: #FFFF00" >注销 </a></p>


            </div>
        </div>

    </div>
</div>

<script language="javascript">
    function showandhide(h_id, hon_class, hout_class, c_id, totalnumber, activeno) {
        var h_id, hon_id, hout_id, c_id, totalnumber, activeno;
        for (var i = 1; i <= totalnumber; i++) {
            document.getElementById(c_id + i).style.display = 'none';
            document.getElementById(h_id + i).className = hout_class;
        }
        document.getElementById(c_id + activeno).style.display = 'block';
        document.getElementById(h_id + activeno).className = hon_class;
    }
    var tips;
    var theTop = 40;
    var old = theTop;
    function initFloatTips() {
        tips = document.getElementById('divQQbox');
        moveTips();
    }
    function moveTips() {
        var tt = 50;
        if (window.innerHeight) {
            pos = window.pageYOffset
        } else if (document.documentElement && document.documentElement.scrollTop) {
            pos = document.documentElement.scrollTop
        } else if (document.body) {
            pos = document.body.scrollTop;
        }
        pos = pos - tips.offsetTop + theTop;
        pos = tips.offsetTop + pos / 10;
        if (pos < theTop) {
            pos = theTop;
        }
        if (pos != old) {
            tips.style.top = pos + "px";
            tt = 10;  //alert(tips.style.top); 
        }
        old = pos;
        setTimeout(moveTips, tt);
    }
    initFloatTips();
    if (typeof (HTMLElement) != "undefined")    //firefox定义contains()方法，ie下不起作用
    {
        HTMLElement.prototype.contains = function (obj) {
            while (obj != null && typeof (obj.tagName) != "undefind") {
                if (obj == this) return true;
                obj = obj.parentNode;
            }
            return false;
        }
    }
    function show() {
        document.getElementById("meumid").style.display = "none";
        document.getElementById("contentid").style.display = "block"
    }
    function hideMsgBox(theEvent) {
        if (theEvent) {
            var browser = navigator.userAgent;
            if (browser.indexOf("Firefox") > 0) {  //如果是Firefox
                if (document.getElementById("contentid").contains(theEvent.relatedTarget)) {
                    return
                }
            }
            if (browser.indexOf("MSIE") > 0 || browser.indexOf("Presto") >= 0) {
                if (document.getElementById('contentid').contains(event.toElement)) {
                    return;
                }
            }
        }
        document.getElementById("meumid").style.display = "block";
        document.getElementById("contentid").style.display = "none";
    }
</script>
</body>
</html>