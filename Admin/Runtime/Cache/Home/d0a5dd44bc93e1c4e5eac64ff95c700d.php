<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>新增</title>
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/default/easyui.css" />
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/jquery-easyui-1.4.2/themes/icon.css" />
    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.min.js"></script>

    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/bootstrap-paginator/src/bootstrap-paginator.js"></script>
    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/locale/easyui-lang-zh_CN.js"></script>
    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/pagination.css" />







    <script type="text/javascript" charset="utf-8" src="/wx_shool/Public/Common/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/wx_shool/Public/Common/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/wx_shool/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
    <link rel="stylesheet" href="/wx_shool/Public/Common/ueditor/themes/default/css/ueditor.css"/>
    <!--   <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/ueditor/themes/default/css/ueditor.css" />
       <script type="text/javascript" charset="utf-8" src="/wx_shool/Public/Common/ueditor//third-party/codemirror/codemirror.js"></script>
       <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/ueditor/third-party/codemirror/codemirror.css" />
       <script type="text/javascript" charset="utf-8" src="/wx_shool/Public/Common/ueditor/third-party/zeroclipboard/ZeroClipboard.js"></script>-->

</head>
<body>
<div class="easyui-panel" title="新增活动" style="width:auto;">

<form  id="addff" action="">
    <div style="width: 100%;margin: 20px auto;text-align: center"> 活动标题:<input  class="easyui-textbox"  data-options="" type="text" id="activityTitle" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 副标题:<input  class="easyui-textbox"  data-options="" type="text" id="activitySubTitle" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">活动时间:<input class="easyui-datetimebox"  type="text" id="activityTime" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">举办学校:<input class="easyui-combobox" data-options="valueField:'shoolid',textField:'shoolname',url:'/wx_shool/admin.php/home/activity/getSelectedSchool'"  type="text" id="shoolId" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 活动地点:<input  class="easyui-textbox"  data-options=""   type="text" id="activityAdd" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">主办方:<input class="easyui-textbox"  data-options="" type="text" id="activitySponsor" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">活动类型:<input class="easyui-textbox"  data-options="" type="text" id="activityCagetory" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 类型图片:<input class="easyui-textbox"  data-options=""  type="text" id="activityImage" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center;">活动详情:
        <!--  <textarea   class="easyui-textbox" data-options="multiline:true"    name="activityTetailed"  style="height: 200px;">&ndash;&gt;
       </textarea>-->
        <!-- 加载编辑器的容器 -->

           <!-- <h1>活动详情</h1>-->
            <script id="editoradd" type="text/plain" style="width:600px;height:500px;margin: 20px auto;"></script>

        <!-- 配置文件 -->

        <script type="text/javascript">
            var ue = UE.getEditor('editoradd');



            function getContent() {


               // alert($("#activityTime").datetimebox("getValue"));
                var arr = [];

                arr.push(UE.getEditor('editoradd').getContent());
               // alert(arr.join("\n"));


                 if(confirm("确定新增")){
                 $.ajax({
                 url: "/wx_shool/admin.php/home/activity/addActivity",
                 type: 'post',
                 /*data:$('#addff').serialize(),*/
                     data:{activityTitle:$("#activityTitle").val(),activityTime:$("#activityTime").datetimebox("getValue"),shoolId:$("#shoolId").combobox("getValue"),activityAdd:$("#activityAdd").val(),activitySponsor:$("#activitySponsor").val(),
                         activityCagetory:$("#activityCagetory").val(),activityImage:$("#activityImage").val(),activityTetailed:arr.join("\n"),activitySubTitle:$("#activitySubTitle").val()},
                 success: function (data) {

                 //console.log(data);
                 if(data=="OK"){
                 alert("新增成功")
                 }else{
                 alert("新增失败，请重新添加")
                 }
                 location.reload();

                 }
                 });

                 }
            }
        </script>



    </div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="getContent()">新增</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#add').window('close')">取消</a>
    </div>
</form>
    </div>
</body>
</html>

<script>

    //新增
    function addActivity(){
        // alert("11");
        /* if($(this).form('enableValidation').form('validate')){
         alert("11");
         }*/

        alert(UE.getEditor('editor').getContent());


        /* if(confirm("确定新增")){
         $.ajax({
         url: "/wx_shool/admin.php/home/activity/addActivity",
         type: 'post',
         data:$('#addff').serialize(),
         success: function (data) {

         //console.log(data);
         if(data=="OK"){
         alert("新增成功")
         }else{
         alert("新增失败，请重新添加")
         }
         location.reload();

         }
         });

         }*/



    }
</script>