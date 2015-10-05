<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;

class ActivityController extends BaseController {
    //学校活动
    public function  index(){

        $m=M();
        $sql="select id  from wx_shoolactivity where boolDel=0";
        $result=$m->query($sql);
        $totals=count($result);//总条数
        $totalPage=ceil($totals/20);//总页数
        $this->assign("totalPage",$totalPage);

        $this->display();

    }
    //分页查询学校活动信息
    public function getActivityList($page=1,$rows=20){
        $m=M();
        $sql="SELECT wx_shoolactivity.id,wx_shoolactivity.activityId,wx_shoolactivity.shoolId,wx_school.shoolName,wx_activity.activityTitle,wx_activity.activityCagetory,wx_activity.activitySubTitle,wx_activity.activityImage,wx_activity.activityTime,wx_activity.activityAdd,wx_activity.activitySponsor FROM (wx_activity ,wx_school) INNER JOIN wx_shoolactivity ON wx_school.shoolId = wx_shoolactivity.shoolId AND wx_activity.activityId = wx_shoolactivity.activityId WHERE wx_shoolactivity.boolDel=0 ORDER BY wx_activity.activityAdd DESC LIMIT ".(($page - 1)*$rows).",".$rows;
        $result=$m->query($sql);
        echo json_encode($result);
    }

    //举办学校下拉数据
    public function  getSelectedSchool(){
        $m=M();
        $sql="select wx_school.shoolId,wx_school.shoolName from wx_school where boolDel=0 ";
        $result=$m->query($sql);
        echo json_encode($result);

    }

    //添加活动
    public function  addActivity($activityTitle,$activityTime,$shoolId,$activityAdd,$activitySponsor,
$activityCagetory,$activityImage,$activityTetailed,$activitySubTitle){
        $Activity = M("Activity"); // 实例化活动对象
        $data['activityTitle' ] = $activityTitle ;
        $data['activitySubTitle' ] = $activitySubTitle ;
        $data['activityTime' ] = $activityTime ;
        $data['activityAdd' ] = $activityAdd ;
        $data['activitySponsor' ] = $activitySponsor ;
        $data['activityCagetory' ] = $activityCagetory ;
        $data['activityImage' ] = $activityImage ;
        $data['activityTetailed' ] = $activityTetailed ;
        $data['attentNum' ] = 0 ;
        $result=$Activity->add($data);

        if($result>0){
            $Shoolactivity = M("Shoolactivity"); // 实例化学校活动对象
            $data1['shoolId' ] = $shoolId ;
            $data1['activityId' ] = $result ;
            $data1['boolDel' ] = false ;
            $result1=$Shoolactivity->add($data1);
            if($result1>0){
                echo "OK";
            } else{
                echo "FAIL";
            }
        }
        else{
            echo "FAIL";
        }



    }
    //查询修改的数据绑定
    public function modifyBing($id){
        $m=M();
        $sql="SELECT wx_shoolactivity.id,wx_shoolactivity.activityId,wx_shoolactivity.shoolId,wx_school.shoolName,wx_activity.activityTitle,wx_activity.activityCagetory,wx_activity.activitySubTitle,wx_activity.activityImage,wx_activity.activityTime,wx_activity.activityAdd,wx_activity.activitySponsor,wx_activity.activityTetailed FROM (wx_activity ,wx_school) INNER JOIN wx_shoolactivity ON wx_school.shoolId = wx_shoolactivity.shoolId AND wx_activity.activityId = wx_shoolactivity.activityId WHERE wx_shoolactivity.boolDel=0 and  wx_shoolactivity.id=".$id;
        $result=$m->query($sql);
        echo json_encode($result);
    }
    //修改到数据库
    public  function  confirmModify($activityTitle,$activityTime,$shoolId,$activityAdd,$activitySponsor,
                                    $activityCagetory,$activityImage,$activityTetailed,$id,$activityId,$activitySubTitle)
    {
        $Activity = M("Activity"); // 实例化活动对象
        $data['activityTitle' ] = $activityTitle ;
        $data['activityTime' ] = $activityTime ;
        $data['activitySubTitle' ] = $activitySubTitle ;
        $data['activityAdd' ] = $activityAdd ;
        $data['activitySponsor' ] = $activitySponsor ;
        $data['activityCagetory' ] = $activityCagetory ;
        $data['activityImage' ] = $activityImage ;
        $data['activityTetailed' ] = $activityTetailed ;
        $data['attentNum' ] = 0 ;
        $result=$Activity->where("activityId=".$activityId)->save($data);

        $Shoolactivity = M("Shoolactivity"); // 实例化学校活动对象
        $data1['shoolId' ] = $shoolId ;
        $result1=$Shoolactivity->where("id=".$id)->save($data1);
        echo "OK";
       /* if($result==1){
            $Shoolactivity = M("Shoolactivity"); // 实例化学校活动对象
            $data1['shoolId' ] = $shoolId ;
            $result1=$Shoolactivity->where("id=".$id)->save($data1);
            if($result1==1){
                echo "OK";
            } else{
                echo "FAIL";
            }
        }
        else{
            echo "FAIL";
        }*/


    }
    //删除学校活动
    public  function  deleteActivity($id){
        $Shoolactivity = M("Shoolactivity"); // 实例化学校活动对象
        $data['boolDel' ] = true ;
        $result=$Shoolactivity->where("id=".$id)->save($data);
        if($result==1){
            echo "OK";
        } else{
            echo "FAIL";
        }

    }
        //新增
    public function add(){
        $this->display();

    }
    //修改
    public function modify($id){

        $this->assign("id",$id);

        $this->display();

    }


    public function test(){
        $this->display();

    }

}