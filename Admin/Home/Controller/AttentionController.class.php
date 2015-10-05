<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;
use Org\Webcatconfig;
class AttentionController extends BaseController{

    //关注信息
    public  function  index(){

//        echo $result[0]["weixin"];
        $this->display();

    }

    public function getInformation(){
        $m=M();
        $sql="select *  from wx_guanzhu where boolDel=0 ";
        $result=$m->query($sql);
        $curl=new \Org\Curl();
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".Webcatconfig::APPID."&secret=".Webcatconfig::APPSECRET;
        $data=$curl->get_by_curl($url);
        $data = json_decode($data);
        $content = array();

        foreach($result as $item){


            $url1="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$data->access_token."&openid=".$item["weixin"];
            $data1=$curl->get_by_curl($url1);
            $data1 = json_decode($data1);
            $content[] = array("nickname"=>$data1->nickname, "openid"=>$item["weixin"], "city"=>$data1->province.$data1->city,"shoolId"=>$item["shoolid"]);
            // echo $data1;
        }
        echo json_encode($content);
    }

}