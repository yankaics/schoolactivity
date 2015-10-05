<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;
use Org\Webcatconfig;
class TeacherController extends  BaseController {
    //教师管理
    public function  index(){
        $m=M();
        $sql="select wx_teacher.teacherId  from wx_teacher where boolDel=0";
        $result=$m->query($sql);
        $totals=count($result);//总条数
        $totalPage=ceil($totals/20);//总页数
        $this->assign("totalPage",$totalPage);
        $this->display();

    }
    //分布查询f教师信息
    public function getTeacherList($page=1,$rows=20){
        $m=M();
        $sql="SELECT wx_teacher.teacherId,wx_teacher.openid,wx_teacher.jingdu,wx_teacher.weidu,wx_teacher.booladmin,wx_teacher.phone,wx_teacher.userAcount,wx_teacher.userPassword,wx_teacher.image,wx_teacher.boolPass FROM wx_teacher
 where boolDel=0 LIMIT ".(($page - 1)*$rows).",".$rows;
        $result=$m->query($sql);


        $curl=new \Org\Curl();
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".Webcatconfig::APPID."&secret=".Webcatconfig::APPSECRET;
        $data=$curl->get_by_curl($url);
        $data = json_decode($data);
        $content = array();

        //echo json_encode($result);
        foreach($result as $item){

         // echo  $item["teacherid"];
           $url1="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$data->access_token."&openid=".$item["openid"];
            $data1=$curl->get_by_curl($url1);
            $data1 = json_decode($data1);
            $content[] = array("nickname"=>$data1->nickname, "openid"=>$item["openid"], "city"=>$data1->province.$data1->city,"teacherid"=>$item["teacherid"],"useracount"=>$item["useracount"],"userpassword"=>$item["userpassword"],"image"=>$item["image"],"boolpass"=>$item["boolpass"],"phone"=>$item["phone"],"booladmin"=>$item["booladmin"],"jingdu"=>$item["jingdu"],"weidu"=>$item["weidu"]);
            // echo $data1;
        }


        echo json_encode($content);
    }
    //审核通过
    public  function  pass($teacherid){
        $teacher = M("Teacher"); // 实例化学校活动对象
        $data['boolPass' ] = true ;
        $result=$teacher->where("teacherId=".$teacherid)->save($data);
        if($result==1){
            echo "OK";
        } else{
            echo "FAIL";
        }

    }
    //设为管理员
    public  function  setadmin($teacherid){
        $teacher = M("Teacher"); // 实例化学校活动对象
        $data['booladmin' ] = true ;
        $result=$teacher->where("teacherId=".$teacherid)->save($data);
        if($result==1){
            echo "OK";
        } else{
            echo "FAIL";
        }

    }


}