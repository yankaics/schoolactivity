<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>修改</title>
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
<form id="modifyff" action="">
    <div hidden="hidden" style="width: 100%;margin: 20px auto;text-align: center"> id:<input  class="easyui-textbox"  data-options="" type="text" name="id" id="id"/></div>
    <div hidden="hidden" style="width: 100%;margin: 20px auto;text-align: center"> activityid:<input  class="easyui-textbox"  data-options="" type="text" name="activityId" id="activityid"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 活动标题:<input  class="easyui-textbox"  data-options="" type="text" name="activityTitle" id="activityTitle"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 副标题:<input  class="easyui-textbox"  data-options="" type="text" name="activitySubTitle" id="activitySubTitle"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">活动时间:<input class="easyui-datetimebox" data-options="" type="text" name="activityTime" id="activityTime" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">举办学校:<input class="easyui-combobox" data-options="valueField:'shoolid',textField:'shoolname',url:'/wx_shool/admin.php/home/activity/getSelectedSchool'"  type="text" name="shoolId" id="shoolId" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 活动地点:<input  class="easyui-textbox"  data-options=""   type="text" name="activityAdd"   id="activityAdd"  /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">主办方:<input class="easyui-textbox"  data-options="" type="text" name="activitySponsor"  id="activitySponsor" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">活动类型:<input class="easyui-textbox"  data-options="" type="text" name="activityCagetory"  id="activityCagetory" /></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 类型图片:<input class="easyui-textbox"  data-options=""  type="text" name="activityImage"   id="activityImage"/></div>
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
               // alert($("#activityid").val());


                // alert($("#activityTime").datetimebox("getValue"));
                var arr = [];

                arr.push(UE.getEditor('editoradd').getContent());
                // alert(arr.join("\n"));


                if(confirm("确定修改")){
                    $.ajax({
                        url: "/wx_shool/admin.php/home/activity/confirmModify",
                        type: 'post',

                        data:{id:$("#id").val(),activityId:$("#activityid").val(),activityTitle:$("#activityTitle").val(),activityTime:$("#activityTime").datetimebox("getValue"),shoolId:$("#shoolId").combobox("getValue"),activityAdd:$("#activityAdd").val(),activitySponsor:$("#activitySponsor").val(),
                            activityCagetory:$("#activityCagetory").val(),activityImage:$("#activityImage").val(),activityTetailed:arr.join("\n"),activitySubTitle:$("#activitySubTitle").val()},
                        success: function (data) {

                            //console.log(data);
                            if(data=="OK"){
                                alert("修改成功")
                            }else{
                                alert("修改失败，请重新添加")
                            }
                             location.reload();

                        }
                    });

                }
            }
        </script>



    </div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="getContent()">保存</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#modify').window('close')">取消</a>
    </div>
</form>
    </div>

</body>
</html>
<script>
    $(function(){
        //绑定修改
        $.ajax({
            url: "/wx_shool/admin.php/home/activity/modifyBing/id/<?php echo ($id); ?>",
            type: 'get',
          //  async:false,
            success: function (data) {
                //  data = JSON.parse(data);
               // console.log(data);
                if (data.length != 0) {
                    data = JSON.parse(data);
                   // console.log(data[0]["activitytime"]);
                    //console.log(data[0]["id"]);
                    $("#id").textbox("setValue",data[0]["id"]);
                    $("#activityid").textbox("setValue",data[0]["activityid"]);
                    $("#activityTitle").textbox("setValue",data[0]["activitytitle"]);
                    $("#activityTime").datetimebox("setValue",data[0]["activitytime"]);
                    $("#shoolId").combobox("setValue",data[0]["shoolid"]);
                    $("#activityAdd").textbox("setValue",data[0]["activityadd"]);
                    $("#activitySponsor").textbox("setValue",data[0]["activitysponsor"]);
                    $("#activityCagetory").textbox("setValue",data[0]["activitycagetory"]);
                    $("#activityImage").textbox("setValue",data[0]["activityimage"]);
                    $("#activityTetailed").textbox("setValue",data[0]["activitytetailed"]);
                    $("#activitySubTitle").textbox("setValue",data[0]["activitysubtitle"]);


                     $("#activityTitle").val(data[0]["activitytitle"]);
                     $("#activityTime").val(data[0]["activityTime"]);
                     $("#shoolId").val(data[0]["shoolid"]);
                     $("#activityAdd").val(data[0]["activityadd"]);
                     $("#activitySponsor").val(data[0]["activitysponsor"]);
                     $("#activityCagetory").val(data[0]["activitycagetory"]);
                     $("#activityImage").val(data[0]["activityimage"]);
                   //  $("#activityTetailed").val(data[0]["activitytetailed"]);
                    ue.setContent(data[0]["activitytetailed"]);
                   //console.log()


                }

            }
        });
    })
</script>