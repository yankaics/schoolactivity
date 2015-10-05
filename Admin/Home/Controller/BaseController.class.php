<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;

class BaseController extends Controller {
    public function _initialize(){
        if( $_SESSION["user"]==true){
            //$this->display();
        }
        else{
            $this->redirect('/home/index/login');
        }
    }


}