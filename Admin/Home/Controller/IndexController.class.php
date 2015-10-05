<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //主页视图
    public function index(){

        if( $_SESSION["user"]==true){
            $this->display();
        }
        else{
            $this->redirect('login');
        }

    }
    //登陆视图
    public function  login(){
        $this->display();
    }
    //检查登陆
    public function checklogin($userName,$userPassword){
        $m=M();
        $sql="select *  from wx_teacher where  booladmin=1 and userAcount='".$userName."'"." and userPassword='".md5($userPassword)."'";
        //echo $sql;
        $result=$m->query($sql);
        if(count($result)>0){
            $_SESSION["user"]=true;
            echo "OK";
        }
        else{
            echo "FAIL";
        }


    }
}