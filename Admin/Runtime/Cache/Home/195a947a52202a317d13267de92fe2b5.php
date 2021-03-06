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
<h2>>>用户管理</h2>
<div style="margin:20px 0;"></div>
<table id="xxgl" class="easyui-datagrid" title="用户管理" style="width:800px;height:700px"
       data-options="rownumbers:true,singleSelect:true,url:'/wx_shool/admin.php/home/user/getUserList',method:'get',toolbar:toolbar">
    <thead>
    <tr>
        <th data-options="field:'adminid',width:80,align:'center'">ID</th>
        <th data-options="field:'username',width:100,align:'center'">用户名</th>
        <th data-options="field:'userpassword',width:80,align:'center'">密码</th>
        <th data-options="field:'addtime',width:150,align:'center'">添加时间</th>

    </tr>
    </thead>
</table>
<div  id="paginator"></div>
<div id="add" class="easyui-window" title="新增用户" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:300px;padding:10px;top: 300px">
    <div style="width: 100%;margin: 20px auto;text-align: center"> 用户名:<input  type="text" name="" id="userName"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">密码:<input type="text" name="" id="userPassword"/></div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="addUser()">新增</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#add').window('close')">取消</a>
    </div>
</div>

<div id="modify" class="easyui-window" title="修改用户" data-options="iconCls:'icon-save',minimizable:false,tools:'#tt'" style="width:500px;height:300px;padding:10px;top: 300px">
    <div style="width: 100%;margin: 20px auto;text-align: center;" hidden="hidden" > id:<input type="text" name="" id="adminid"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center"> 用户名:<input type="text" name="" id="muserName"/></div>
    <div style="width: 100%;margin: 20px auto;text-align: center">密码:<input type="text" name="" id="muserPassword"/></div>
    <div style="width: 100%;text-align: center"><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="modifySxhool()">修改</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="$('#modify').window('close')">取消</a>
    </div>
</div>

</body>
</html>
<script type="text/javascript">



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
                url: "/wx_shool/admin.php/home/user/getUserList",
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
                url: "/wx_shool/admin.php/home/user/modifyBing/",
                type: 'get',
                data:{id:$("#xxgl").datagrid("getSelected").adminid},
                success: function (data) {

                    // console.log(data[0]["shooladd"]);
                    if (data.length != 0) {
                        data = JSON.parse(data);

                        $("#adminid").val(data[0]["adminid"]);
                        $("#muserName").val(data[0]["username"]);
                        $("#muserPassword").val(data[0]["userpassword"]);

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
                    url: "/wx_shool/admin.php/home/user/deleteUser/",
                    type: 'post',
                    data:{id:$("#xxgl").datagrid("getSelected").adminid},
                    success: function (data) {
                       // console.log(data);
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
    function addUser(){
        if($("#userName").val()==""||$("#userPassword").val()==""){
            alert("请输入用户名或者密码");
            return false;
        }
        if(confirm("确定新增")){
            $.ajax({
                url: "/wx_shool/admin.php/home/user/addUser/",
                type: 'post',
                data:{userName:$("#userName").val(),userPassword:$("#userPassword").val()},
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


    //修改
    function modifySxhool(){
        if($("#muserName").val()==""||$("#muserPassword").val()==""){
            alert("请输入用户名或者密码");
            return false;
        }
        //   console.log($("#schoolid").val());
        if(confirm("确定修改")){
            $.ajax({
                url: "/wx_shool/admin.php/home/user/confirmModify/",
                type: 'post',
                data:{id:$("#adminid").val(),userName:$("#muserName").val(),userPassword:$("#muserPassword").val()},
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