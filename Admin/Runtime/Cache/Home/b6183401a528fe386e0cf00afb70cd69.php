<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
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
<body style="margin-left: 50px">
<h2>>>学校活动管理</h2>
<div style="margin:20px 0;"></div>
<table id="xxgl" class="easyui-datagrid" title="学校活动管理" style="width:910px;height:700px"
       data-options="rownumbers:true,singleSelect:true,url:'/wx_shool/admin.php/home/activity/getActivityList',method:'get',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'id',width:80,align:'center',hidden:true,">学校活动ID</th>
        <th data-options="field:'shoolid',width:80,align:'center',hidden:true,">学校ID</th>
        <th data-options="field:'activityid',width:80,align:'center',hidden:true,">活动ID</th>
        <th data-options="field:'activitytitle',width:100,align:'center'">活动标题</th>
        <th data-options="field:'activitysubtitle',width:100,align:'center'">副标题</th>
        <th data-options="field:'activitytime',width:80,align:'center'">活动时间</th>
        <th data-options="field:'shoolname',width:80,align:'center'">举办学校</th>
        <th data-options="field:'activityadd',width:80,align:'center'">活动地点</th>
        <th data-options="field:'activitysponsor',width:80,align:'center'">主办方</th>
        <th data-options="field:'activitycagetory',width:80,align:'center'">活动类型</th>
        <th data-options="field:'activityimage',width:80,align:'center',formatter:formatter,">类型图片</th>
        <th data-options="field:'1',width:120,align:'center',formatter:formatter1,">活动详情</th>

    </tr>
    </thead>
</table>
<div  id="paginator"></div>
<div id="add" class="easyui-window" title="新增活动" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:450px;padding:10px;top: 300px">
    <form id="addff" action="">
        <div style="width: 100%;margin: 20px auto;text-align: center"> 活动标题:<input  class="easyui-textbox"  data-options="" type="text" name="activityTitle" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center"> 副标题:<input  class="easyui-textbox"  data-options="" type="text" name="activitySubTitle" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center">活动时间:<input class="easyui-datetimebox"  type="text" name="activityTime" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center">举办学校:<input class="easyui-combobox" data-options="valueField:'shoolid',textField:'shoolname',url:'/wx_shool/admin.php/home/activity/getSelectedSchool'"  type="text" name="shoolId" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center"> 活动地点:<input  class="easyui-textbox"  data-options=""   type="text" name="activityAdd" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center">主办方:<input class="easyui-textbox"  data-options="" type="text" name="activitySponsor" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center">活动类型:<input class="easyui-textbox"  data-options="" type="text" name="activityCagetory" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center"> 类型图片:<input class="easyui-textbox"  data-options=""  type="text" name="activityImage" /></div>
        <div style="width: 100%;margin: 20px auto;text-align: center">活动详情:
         <!--  <textarea   class="easyui-textbox" data-options="multiline:true"    name="activityTetailed"  style="height: 200px;">&ndash;&gt;
        </textarea>-->
            <!-- 加载编辑器的容器 -->
            <script id="editoradd" type="text/plain" style="width:400px;height:300px;"></script>
            <!-- 配置文件 -->

            <script type="text/javascript">
                var ue = UE.getEditor('editoradd');
            </script>



        </div>
        <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="addActivity()">新增</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#add').window('close')">取消</a>
        </div>
    </form>
</div>



<div id="modify" class="easyui-window" title="修改活动" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:450px;padding:10px;top: 300px">
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
        <div style="width: 100%;margin: 20px auto;text-align: center">活动详情:<textarea   class="easyui-textbox" data-options="multiline:true"    name="activityTetailed"  id="activityTetailed"  style="height: 200px;"></textarea></div>
        <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="modifyActivity()">保存</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#modify').window('close')">取消</a>
        </div>
    </form>
</div>

</body>
</html>
<script type="text/javascript">
    //类型图片
    function formatter(value,rowData,rowIndex){
        // var str=
        return '<img src="/wx_shool/Public/SchoolIcon/'+rowData.activityimage+'" width="20px" height="20px" alt="logo+"/>';

    }
    //查看详情
    function formatter1(value,rowData,rowIndex){
        // var str=
        return '<span>请点击修改查看详情</span>';

    }



    $(function(){
        $('#paginator').bootstrapPaginator(options);//加载分页配置
        $('#add').window('close');//关闭新增界面
        $('#modify').window('close');//关闭新增界面
    });
    //分页参数
    var options = {
        currentPage: 1,
        //numberOfPages: 5,
        // size: "large",
        totalPages: <?php echo ($totalPage); ?>,
        itemTexts: function (type, page, current) {
            switch (type) {
                case "first":
                    return "第一页";
                case "prev":
                    return "上一页";
                case "next":
                    return "下一页";
                case "last":
                    return "最后一页";
                case "page":
                    return "" + page;
            }
            return null;
        },
        onPageClicked: function (event, originalEvent, type, page) {


            $.ajax({
                url: "/wx_shool/admin.php/home/activity/getActivityList",
                type: 'get',
                data:{page:page},
                success: function (data) {
                    if (data.length != 0) {
                        data = JSON.parse(data);//转换成json对象，必须的！！！不然有异常！！！
                        $('#xxgl').datagrid("loadData",data);
                    }

                }
            });


        }
    };




    //工具栏
    var toolbar = [{
        text:'新增',
        iconCls:'icon-add',
        handler:function(){
            //$('#add').window('open');

            window.open("/wx_shool/admin.php/home/activity/add/");
        }
    },{
        text:'修改',
        iconCls:'icon-cut',
        handler:function(){




            //console.log()  ;
            if($("#xxgl").datagrid("getSelected")==null){
                alert("请选择要修改的行");
                return false;
            }


            window.open("/wx_shool/admin.php/home/activity/modify/id/"+$("#xxgl").datagrid("getSelected").id);
          /*  //绑定修改
            $.ajax({
                url: "/wx_shool/admin.php/home/activity/modifyBing/",
                type: 'get',
                data:{id:$("#xxgl").datagrid("getSelected").id},
                success: function (data) {
                  //  data = JSON.parse(data);

                    if (data.length != 0) {
                        data = JSON.parse(data);
                        console.log(data[0]["activitytime"]);
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

                      *//*  $("#activityid").val(data[0]["activityid"]);
                        $("#activityTitle").val(data[0]["activitytitle"]);
                        $("#activityTime").val(data[0]["activityTime"]);
                        $("#shoolId").val(data[0]["shoolid"]);
                        $("#activityAdd").val(data[0]["activityadd"]);
                        $("#activitySponsor").val(data[0]["activitysponsor"]);
                        $("#activityCagetory").val(data[0]["activitycagetory"]);
                        $("#activityImage").val(data[0]["activityimage"]);
                        $("#activityTetailed").val(data[0]["activitytetailed"]);*//*


                    }

                }
            });*/

            //$('#modify').window('open');


        }
    },'-',{
        text:'删除',
        iconCls:'icon-save',
        handler:function(){
            if($("#xxgl").datagrid("getSelected")==null){
                alert("请选择要删除的行");
                return false;
            }
            if(confirm("是否删除")){
                //删除
                $.ajax({
                    url: "/wx_shool/admin.php/home/activity/deleteActivity/",
                    type: 'post',
                    data:{id:$("#xxgl").datagrid("getSelected").id},
                    success: function (data) {
                        console.log(data);
                        if(data=="OK"){
                            alert("删除成功")
                        }else{
                            alert("删除失败，请重新删除")
                        }
                        location.reload();
                    },
                    error:function(){
                        alert("请求错误");
                    }
                });
            }


        }
    }];

  //时间格式
    function myformatter(date){
        var y = date.getFullYear();
        var m = date.getMonth()+1;
        var d = date.getDate();
        return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    }
    function myparser(s){
        if (!s) return new Date();
        var ss = (s.split('-'));
        var y = parseInt(ss[0],10);
        var m = parseInt(ss[1],10);
        var d = parseInt(ss[2],10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
            return new Date(y,m-1,d);
        } else {
            return new Date();
        }
    }

    //新增
    function addActivity(){
       // alert("11");
       /* if($(this).form('enableValidation').form('validate')){
            alert("11");
        }*/

       // alert(UE.getEditor('editor').getContent());
     ///   window.open("/wx_shool/admin.php/home/activity/modify/");

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
    //修改
    function modifyActivity(){
        if(confirm("确定修改")){
            $.ajax({
                url: "/wx_shool/admin.php/home/activity/confirmModify",
                type: 'post',
                data:$('#modifyff').serialize(),
                success: function (data) {

                    //console.log(data);
                    if(data=="OK"){
                        alert("修改成功")
                    }else{
                        alert("修改失败，请重新修改")
                    }
                    location.reload();

                }
            });

        }


    }

</script>