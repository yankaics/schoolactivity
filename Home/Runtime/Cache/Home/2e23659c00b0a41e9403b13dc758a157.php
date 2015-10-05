<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>演出查询</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
        <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
        <script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.js"></script>-->
    <script type="text/javascript" src="/wx_shool/Public/Common/jquery-easyui-1.4.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/Jingle.css">
    <link rel="stylesheet" href="/wx_shool/Public/Common/Jingle/demo/css/app.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        *{font-family: "Helvetica Neue";color: #404040}
    </style>
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
<body style="background-color:RGB(182,216,144);">
<ul id="accordion" class="accordion">
    <li id="listview">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div  onclick="getChild(<?php echo ($vo["shoolid"]); ?>)" class="link" style="border-bottom: 1px solid #000"><i class="" style="width: 1.5em;height: 1.5em ;background: transparent;margin-left: 0.2em">
                <img src="/wx_shool/Public/SchoolIcon/<?php echo ($vo["schoolicon"]); ?>" style="background: transparent" width="100%" height="100%" />
            </i><span style="margin-left: 0.5em;font-size: 1.0em;line-height: 1.7em"><?php echo ($vo["shoolname"]); ?></span><i class="fa fa-chevron-down" style="top: 1.3em"></i></div>
            <ul class="submenu" style="overflow: hidden; border-color: #808080;" id="<?php echo ($vo["shoolid"]); ?>">
                <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if(($vo['shoolid']) == $vo1['shoolid']): ?><li  style="color:#808080;border-color: #808080;height: auto;overflow: hidden;display: box; display: -moz-box;display: -webkit-box;">
                            <div style=" border-bottom: 1px solid #808080;height:100%;text-align: center;font-size: 1.2em;;line-height:5.4em;" >&nbsp;&nbsp;&nbsp;<?php echo ($vo1["activitycagetory"]); ?></div>
                            <div style="-moz-box-flex: 1;-webkit-box-flex: 1;box-flex: 1;border-bottom: 1px solid #4b4a5e;height:100%;text-align: left;overflow:hidden;font-size: 1.1em;line-height:2em"  >
                                <p style="margin-left: 1.3em;font-size: 1.2em;overflow: hidden;height: 30px"><?php echo ($vo1["activitytitle"]); ?></p>
                                <p style="margin-left: 1.6em;font-size: 1.0em;;overflow: hidden;height: 30px"><?php echo ($vo1["activitysubtitle"]); ?></p>
                                <p style="margin-left: 1.6em;font-size: 1.0em;;overflow: hidden;height: 30px"><?php echo ($vo1["activitytime"]); ?> &nbsp;   <?php echo ($vo1["attentnum"]); ?>人参与</p>
                            </div>
                            <div style="border-bottom: 1px solid #808080;;text-align: center;"  >
                                <img src="/wx_shool/Public/Home/images/4.png" onclick="location.href='/wx_shool/index.php/home/index/teacherModify/activityId/<?php echo ($vo1["activityid"]); ?>'" style="width:70px;height:35px;margin-top: 30px;border: 0px;margin-right: 25px" alt=""/>
                            </div>

                        </li><?php endif; ?>






                   <!-- <?php if(($vo['shoolid']) == $vo1['shoolid']): ?><li  style="height: 8em"><div style="float: left;width:20%;height:100%;text-align: center;font-size: 1.5em;;line-height:4em"><?php echo ($vo1["activitycagetory"]); ?></div>
                            <div style="float: left;width:60%;height:100%;text-align: left;overflow:hidden;font-size: 1.1em;line-height:3em">
                                <p><?php echo ($vo1["activitytitle"]); ?></p>
                                <p style=""><?php echo ($vo1["activitytime"]); ?> &nbsp;   <?php echo ($vo1["attentnum"]); ?>人参与</p>
                            </div>
                            <div style="float: left;width:20%;height:100%;text-align: center;font-size: 1.5em;line-height:4em" >
                                <img src="/wx_shool/Public/Home/images/4.png" onclick="location.href='/wx_shool/index.php/home/index/teacherModify/activityId/<?php echo ($vo1["activityid"]); ?>'" style="margin-top: 1.7em;border: 0px" alt=""/>
                            </div>
                        </li><?php endif; ?>-->
                    <!-- <?php if($vo.['shoolid'] == $vo1.['shoolid']): echo ($vo1["shoolid"]); endif; ?>--><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>

    </li>



    <!--    <li id="listview">
            <div class="link"><i class="fa fa-globe"></i>中央音乐学院<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu" style="overflow: hidden">

            &lt;!&ndash;  &lt;!&ndash;  <li><a href="#">HTML</a></li>&ndash;&gt;
                <li style="height: 8em"><div style="float: left;width:20%;height:100%;text-align: center;font-size: 1.5em;;line-height:4em">类型</div>
                    <div style="float: left;width:70%;height:100%;text-align: center;overflow:hidden;font-size: 1.1em;line-height:3em">
                        <p>1111111111111111111标题</p>
                        <p style="">2015-04-03 &nbsp;   198人参与</p>
                    </div>
                    <div style="float: left;width:10%;height:100%;text-align: center;font-size: 2em;line-height:4em">去
                           </div>
                </li>

                <li style="height: 8em"><div style="float: left;width:20%;height:100%;text-align: center;font-size: 1.5em;line-height:4em">类型</div>
                    <div style="float: left;width:70%;height:100%;text-align: center;overflow:hidden;font-size: 1.1em;line-height:3em">
                        <p>1111111111111111111标题</p>
                        <p style="">2015-04-03 &nbsp;   198人参与</p>
                    </div>
                    <div style="float: left;width:10%;height:100%;text-align: center;font-size: 2em;line-height:4em">去
                    </div>
                </li>

            </ul>




        </li>-->

</ul>
</body>
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
       // $("#<?php echo ($data[0]['shoolid']); ?>").css({"display":"block"});//展开第一个
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







</script>
<!--<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/Jingle.debug.js"></script>
<script type="text/javascript" src="/wx_shool/Public/Common/Jingle/demo/js/lib/zepto.touch2mouse.js"></script>-->
</html>