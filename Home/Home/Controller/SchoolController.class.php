<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;

class SchoolController extends Controller{
    public  function  index($openid){



        $m=M();
        $sql="select teacherId  from wx_teacher where openid='".$openid."'";
        $result=$m->query($sql);
        if(count($result)>0){
            $this->assign("openid",$openid);
            $this->display();
        }
        else{

            $this->redirect('/Home/Index/login1/openid/'.$openid);
        }





        //echo $openid;

    }
    //分页学校
    public function getSchollList($page=1,$rows=10){
        $m=M();
        $sql="select wx_school.shoolId,wx_school.shoolName,wx_school.schoolIcon from wx_school where boolDel=0 ".
            "ORDER BY shoolId ASC LIMIT ".(($page - 1)*$rows).",".$rows;
        $result=$m->query($sql);
        echo json_encode($result);
    }
    //所有学校
    public function getAllSchollList(){
        $m=M();
        $sql="select wx_school.shoolId,wx_school.shoolName,wx_school.schoolIcon from wx_school where boolDel=0 ".
            "ORDER BY code ASC ";
        $result=$m->query($sql);
        echo json_encode($result);
    }
   //写入数据库  新增或者更新数据 $boolfag =1  更新  =0 新增
   public  function guanZhu($list,$openid,$boolfag){
       //echo $boolfag;
       if($boolfag==0){
           $str="'";
           foreach($list as $iteam){
               $str.=$iteam."-";
           }
           $str= substr($str,0,strlen($str)-1);//去掉最后一个"-"   保存格式 5-7-4
           $str.="'";

           $m=M();
           $sql="INSERT wx_guanzhu(weixin,shoolId,boolDel) VALUES ( '".$openid."',".$str.","."0".")";


           $result=$m->execute($sql);
           if($result==1){
               echo "OK";
           }
           else{
               echo "FALSE";
           }
       }
       else{
           $str="";
           foreach($list as $iteam){
               $str.=$iteam."-";
           }
           $str= substr($str,0,strlen($str)-1);//去掉最后一个"-"   保存格式 5-7-4
           $str.="";
         /*  $guanzhu = M("Guanzhu"); //
           $data['shoolId' ] = $str ;
         //  echo $str;
           $result=$guanzhu->where("weixin=".$openid)->save($data);*/

           $m=M();
           $sql="UPDATE wx_guanzhu set shoolId='".$str."'"." WHERE weixin='".$openid."'" ;
           $result=$m->execute($sql);
           echo "OK";


       }


     //echo $sql;
   }

    public function  bingGuanZhu($openid){
        $m=M();
        $sql="SELECT wx_guanzhu.shoolId,wx_guanzhu.guanZhuiID FROM wx_guanzhu where  weixin='".$openid."'";
        //echo $sql;
        $result=$m->query($sql);
        echo json_encode($result);

    }
    //关注学校成功
    public  function guzhusuccess(){
        $this->display();

    }





}