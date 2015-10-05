<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;

class UserController extends BaseController{
    //用户管理
    public  function  index(){
        $m=M();
        $sql="select *  from wx_admin where boolDel=0";
        $result=$m->query($sql);
        $totals=count($result);//总条数
        $totalPage=ceil($totals/20);//总页数
        $this->assign("totalPage",$totalPage);
        $this->display();
    }
    //分布查询用户信息
    public function getUserList($page=1,$rows=20){
        $m=M();
        $sql="select *  from wx_admin where boolDel=0 ".
            "ORDER BY adminid desc LIMIT ".(($page - 1)*$rows).",".$rows;
        $result=$m->query($sql);
        echo json_encode($result);
    }
    //新增
    public function  addUser($userName,$userPassword){
        $admin = M("Admin"); // 实例化活动对象

        $data['userName' ] = $userName ;
        $data['userPassword' ] = $userPassword ;
        $data['addtime' ] = date("y-m-d h:i:s",time());
        $data['boolDel' ] = false ;
        $result=$admin->add($data);


            if($result>0){
                echo "OK";
            } else {
                echo "FAIL";
            }



    }
    //绑定修改
    public function modifyBing($id){
        $m=M();
        $sql="select *  from wx_admin where adminid= ".$id;
        $result=$m->query($sql);
        echo json_encode($result);

    }
    //确定修改
    public  function confirmModify($id,$userName,$userPassword){
        $admin = M("Admin"); // 实例化活动对象

        $data['userName' ] = $userName ;
        $data['userPassword' ] = $userPassword ;
        $result=$admin->where("adminid=".$id)->save($data);


        if($result>0){
            echo "OK";
        } else {
            echo "FAIL";
        }
    }
    //删除学校活动
    public  function  deleteUser($id){
        $admin = M("Admin"); // 实例化活动对象

        $data['boolDel' ] = true ;
        $result=$admin->where("adminid=".$id)->save($data);


        if($result>0){
            echo "OK";
        } else {
            echo "FAIL";
        }

    }

}