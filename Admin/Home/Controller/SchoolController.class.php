<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;
use Think\Model;

class SchoolController extends BaseController {
   public function  index(){
       $m=M();
       $sql="select shoolId  from wx_school where boolDel=0";
       $result=$m->query($sql);
       $totals=count($result);//总条数
      $totalPage=ceil($totals/20);//总页数
       $this->assign("totalPage",$totalPage);

       $this->display();
   }
    //分布查询学校信息
    public function getSchollList($page=1,$rows=20){
        $m=M();
        $sql="select wx_school.shoolId,wx_school.code,wx_school.shoolName,wx_school.shoolAdd,wx_school.schoolIcon  from wx_school where boolDel=0 "."ORDER BY code ASC LIMIT ".(($page - 1)*$rows).",".$rows;
        $result=$m->query($sql);
        echo json_encode($result);
    }
    //新增学校
    public function addSchool($shoolName,$shoolAdd,$schoolIcon,$code){
        $m=M();
        $sql="INSERT wx_school(shoolName,shoolAdd,schoolIcon,boolDel,code) VALUES ('".$shoolName."','"."$shoolAdd"."','".$schoolIcon."',"."0,'".$code."')";
       //echo $sql;
       $result=$m->execute($sql);
        if($result==1){
            echo "OK";
        }
        else{
            echo "FALSE";
        }
    }
    //绑定修改
    public function modifyBing($id){
        $m=M();
        $sql="select wx_school.shoolId,wx_school.shoolName,wx_school.shoolAdd,wx_school.schoolIcon,wx_school.code from wx_school where shoolId= ".$id;
        $result=$m->query($sql);
        echo json_encode($result);

    }
    //确定修改
    public  function confirmModify($id,$shoolName,$shoolAdd,$schoolIcon,$code){
        $m=M();
        $sql="UPDATE wx_school SET shoolName='"."$shoolName"."',shoolAdd='"."$shoolAdd'".",schoolIcon='".$schoolIcon."'".",code='".$code."'"." where shoolId=".$id ;
       // echo $sql;
        //where shoolId=".$id;
        $result=$m->execute($sql);
       if($result==1){
            echo "OK";
        }
        else{
            echo "FALSE";
        }
    }
    public function  DeleteSchool($id){
        $m=M();
        $sql="UPDATE wx_school SET boolDel=1 where shoolId=".$id;
        //echo $sql;
        $result=$m->execute($sql);
        if($result==1){
            echo "OK";
        }
        else{
            echo "FALSE";
        }

    }
}