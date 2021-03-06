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

    <link rel="Stylesheet" type="text/css" href="/wx_shool/Public/Common/pagination.css" />



</head>
<body style="margin-left: 50px">
<h2>>>学校管理</h2>
<div style="margin:20px 0;"></div>
<table id="xxgl" class="easyui-datagrid" title="学校管理" style="width:800px;height:700px"
       data-options="rownumbers:true,singleSelect:true,url:'/wx_shool/admin.php/home/school/getSchollList',method:'get',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'shoolid',width:80,align:'center',hidden:true,">ID</th>
        <th data-options="field:'code',width:100,align:'center'">排序</th>
        <th data-options="field:'shoolname',width:100,align:'center'">学校名称</th>
        <th data-options="field:'shooladd',width:80,align:'center'">学校地址</th>
        <th data-options="field:'222',width:80,align:'center',formatter:formatter,">学校Logo</th>

    </tr>
    </thead>
</table>
<div  id="paginator"></div>

<div id="add" class="easyui-window" title="新增学校" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:300px;padding:10px;top: 300px">
    <div style="width: 100%;margin: 20px auto;text-align: center"> 排序:<input  type="text" name="" id="code"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 学校名称:<input  type="text" name="" id="xxmc"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">学校地址:<input type="text" name="" id="xxdz"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">学校LOGO:<input type="text" name="" id="schoolIcon"/></div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="addSchool()">新增</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#add').window('close')">取消</a>
    </div>
</div>

<div id="modify" class="easyui-window" title="修改学校" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:300px;padding:10px;top: 300px">
    <div style="width: 100%;margin: 20px auto;text-align: center;" hidden="hidden" > id:<input type="text" name="" id="schoolid"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 排序:<input type="text" name="" id="mcode"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 学校名称:<input type="text" name="" id="mxxmc"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">学校地址:<input type="text" name="" id="mxxdz"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">学校LOGO:<input type="text" name="" id="mschoolIcon"/></div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="modifySxhool()">修改</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#modify').window('close')">取消</a>
    </div>
</div>



</body>
<script type="text/javascript">
    function formatter(value,rowData,rowIndex){
       // var str=
        return '<img src="/wx_shool/Public/SchoolIcon/'+rowData.schoolicon+'" width="20px" height="20px" alt="logo+"/>';

    }



    $(function(){
        $('#paginator').bootstrapPaginator(options);//加载分页配置
        $('#add').window('close');//关闭新增界面
        $('#modify').window('close');//关闭新增界面
    });


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
                url: "/wx_shool/admin.php/home/school/getSchollList/",
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


    var toolbar = [{
        text:'新增',
        iconCls:'icon-add',
        handler:function(){
            $('#add').window('open');
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

            //绑定修改
            $.ajax({
                url: "/wx_shool/admin.php/home/school/modifyBing/",
                type: 'get',
                data:{id:$("#xxgl").datagrid("getSelected").shoolid},
                success: function (data) {

                 // console.log(data[0]["shooladd"]);
                    if (data.length != 0) {
                        data = JSON.parse(data);

                        $("#schoolid").val(data[0]["shoolid"]);
                        $("#mxxmc").val(data[0]["shoolname"]);
                        $("#mxxdz").val(data[0]["shooladd"]);
                        $("#mschoolIcon").val(data[0]["schoolicon"]);
                        $("#mcode").val(data[0]["code"]);

                    }

                }
            });

            $('#modify').window('open');


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
                     url: "/wx_shool/admin.php/home/school/DeleteSchool/",
                     type: 'post',
                     data:{id:$("#xxgl").datagrid("getSelected").shoolid},
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

    //新增
    function addSchool(){
       if($("#xxmc").val()==""||$("#xxdz").val()==""){
           alert("请输入学校名称或学校地址");
           return false;
       }
        if(confirm("确定新增")){
            $.ajax({
                url: "/wx_shool/admin.php/home/school/addSchool/",
                type: 'post',
                data:{shoolName:$("#xxmc").val(),shoolAdd:$("#xxdz").val(),schoolIcon:$("#schoolIcon").val(),code:$("#code").val()},
                success: function (data) {

                   // console.log(data);
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
    //修改
    function modifySxhool(){
        if($("#mxxmc").val()==""||$("#mxxdz").val()==""){
            alert("学校名称或学校地址不能为空");
            return false;
        }
     //   console.log($("#schoolid").val());
        if(confirm("确定修改")){
            $.ajax({
                url: "/wx_shool/admin.php/home/school/confirmModify/",
                type: 'post',
                data:{id:$("#schoolid").val(),shoolName:$("#mxxmc").val(),shoolAdd:$("#mxxdz").val(),schoolIcon:$("#mschoolIcon").val(),code:$("#mcode").val()},
                success: function (data) {

                   // console.log(data);
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
</html>