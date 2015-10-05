<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;

class AttentionController extends  Controller {
    //我的关注
    public  function  index($openid){
        $m=M();
        $sql="SELECT wx_attention.attentionId, wx_attention.activityId, wx_activity.activityTitle,wx_activity.activityImage FROM wx_attention INNER JOIN wx_activity ON wx_activity.activityId = wx_attention.activityId WHERE weixin='".$openid."'";
       // echo $sql;

        $result=$m->query($sql);
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
       //echo urldecode(json_encode($result));
       /* $code = json_encode($result);
        $code = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $code);
        print_r(mb_convert_encoding(stripslashes($code), "GBK", "UTF-8") );*/

    }

}