<?php
/**
 * User: Administrator
 */

namespace Home\Controller;


use Think\Controller;
use Org\Webcatconfig;
class ActivityController extends Controller {

    //活动视图
   public  function  index($openid){






       $m=M();
       $sql="select teacherId  from wx_teacher where openid='".$openid."'";
       $result=$m->query($sql);
       if(count($result)>0){

           $m3=M();
           $sql3="select shoolId  from wx_guanzhu where weixin='".$openid."' and shoolId<>0";
           $result3=$m3->query($sql3);
           $str="0";
           if(count($result3)>0){
               $str= strtr($result3[0]["shoolid"],"-",",");

               $str1="(".$str.")";





               $m=M();
               $sql="SELECT DISTINCT wx_school.shoolName,wx_shoolactivity.shoolId,wx_school.schoolIcon,str_to_date(wx_activity.activityTime,'%Y%m%d') as activityTime FROM wx_school INNER JOIN wx_shoolactivity ON wx_shoolactivity.shoolId = wx_school.shoolId INNER JOIN wx_activity ON wx_activity.activityId = wx_shoolactivity.activityId where activityTime >NOW() and wx_shoolactivity.boolDel=0 and wx_shoolactivity.shoolId in ".$str1;

               $result=$m->query($sql);
               $this->assign("data",$result);



               //所有学校的大于当前时间活动
               $m1=M();
               $sql="SELECT wx_shoolactivity.activityId,wx_activity.activitySubTitle, wx_activity.activityTitle,wx_activity.activityTime,wx_activity.attentNum,wx_activity.activityCagetory,wx_shoolactivity.shoolId,str_to_date(wx_activity.activityTime,'%Y%m%d') as activityTime,left(wx_activity.activityTime,10) as activityTime2
FROM wx_shoolactivity INNER JOIN wx_activity ON wx_activity.activityId = wx_shoolactivity.activityId
where wx_shoolactivity.boolDel=0 AND activityTime >NOW()";
               // echo $sql;
               // $sql_str=sprintf($sql,$activityId);
               $result1=$m1->query($sql);
               $this->assign("data1",$result1);



               $this->assign("openid",$openid);//openid
               $this->display();

           }



           else{
               $this->assign("data","1");

               $this->assign("openid",$openid);//openid
               $this->display();
           }



       }
       else{
           $this->redirect('/Home/Index/login2/openid/'.$openid);
       }

       //所有有活动的学校

   }
    //活动详情
    public function  activityDetail($activityId,$openid){

        //时间地点
        $m5=M();
        $sql5="SELECT wx_activity.activityTitle,wx_activity.activitySubTitle,wx_activity.activityImage FROM wx_activity where wx_activity.activityId=".$activityId;
        $result5=$m5->query($sql5);

        $this->assign("activitytitle",$result5[0]["activitytitle"]);
        $this->assign("activitysubtitle",$result5[0]["activitysubtitle"]);
        $this->assign("activityimage",$result5[0]["activityimage"]);






        $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);

        $signPackage = $jssdk->GetSignPackage();

        $this->assign("appId",$signPackage["appId"]);
        $this->assign("timestamp",$signPackage["timestamp"]);
        $this->assign("nonceStr",$signPackage["nonceStr"]);
        $this->assign("signature",$signPackage["signature"]);



        $this->assign("activityId",$activityId);
        $this->assign("openid",$openid);//openid
        $this->display();
       // echo $openid;
    }

    //活动详情1
    public function  activityDetail1($activityId,$openid){



        //时间地点
        $m5=M();
        $sql5="SELECT wx_activity.activityTitle,wx_activity.activitySubTitle,wx_activity.activityImage FROM wx_activity where wx_activity.activityId=".$activityId;
        $result5=$m5->query($sql5);

        $this->assign("activitytitle",$result5[0]["activitytitle"]);
        $this->assign("activitysubtitle",$result5[0]["activitysubtitle"]);
        $this->assign("activityimage",$result5[0]["activityimage"]);






        $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);

        $signPackage = $jssdk->GetSignPackage();

        $this->assign("appId",$signPackage["appId"]);
        $this->assign("timestamp",$signPackage["timestamp"]);
        $this->assign("nonceStr",$signPackage["nonceStr"]);
        $this->assign("signature",$signPackage["signature"]);




        $this->assign("activityId",$activityId);
        $this->assign("openid",$openid);//openid
        $this->display();
        // echo $openid;
    }
    //活动详情2
    public function  activityDetail2($activityId){


        //时间地点
        $m5=M();
        $sql5="SELECT wx_activity.activityTitle,wx_activity.activitySubTitle,wx_activity.activityImage FROM wx_activity where wx_activity.activityId=".$activityId;
        $result5=$m5->query($sql5);

        $this->assign("activitytitle",$result5[0]["activitytitle"]);
        $this->assign("activitysubtitle",$result5[0]["activitysubtitle"]);
        $this->assign("activityimage",$result5[0]["activityimage"]);


      //  $this->assign("activityId",$activityId);



        $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);

        $signPackage = $jssdk->GetSignPackage();

        $this->assign("appId",$signPackage["appId"]);
        $this->assign("timestamp",$signPackage["timestamp"]);
        $this->assign("nonceStr",$signPackage["nonceStr"]);
        $this->assign("signature",$signPackage["signature"]);




        $this->assign("activityId",$activityId);

        $this->display();
        // echo $openid;
    }



    //活动详情
    public function getActiviryById($activityId){
        $m=M();
        $sql="SELECT  wx_activity.activityTitle,wx_activity.activitySubTitle, wx_activity.activityTime, wx_activity.activityAdd,wx_activity.activitySponsor,wx_activity.activityTetailed,wx_activity.activityId FROM wx_activity where wx_activity.activityId=".$activityId;
       // $sql_str=sprintf($sql,$activityId);
        //echo $activityId;

        $result=$m->query($sql);
        echo json_encode($result);

    }
    //学校活动
    public function getChildActiviry($shoolid){

       // echo $shoolid;
        $m=M();
        $sql="SELECT wx_shoolactivity.activityId, wx_activity.activityTitle,wx_activity.activityTime,wx_activity.attentNum,wx_activity.activityCagetory FROM wx_shoolactivity INNER JOIN wx_activity ON wx_activity.activityId = wx_shoolactivity.activityId where wx_shoolactivity.boolDel=0 and wx_shoolactivity.shoolId=".$shoolid;
       // echo $sql;
       // $sql_str=sprintf($sql,$activityId);
        $result=$m->query($sql);
         echo json_encode($result);
    }
    //参加活动
    public function  attent($activityId,$openid){






        $m1=M();
        $sql1="SELECT wx_attention.attentionId FROM wx_attention where weixin='".$openid."' and activityId=".$activityId." and boolDel=0";
        $result=$m1->query($sql1);
        if(count($result)>0){
            echo "1";//1 表示已经参与
        }else{
            try{
                $m=M();
                $sql=" set autocommit=0 ; INSERT wx_attention(weixin,activityId,boolDel,boolSms) VALUES ('".$openid."',"."$activityId".","."0,0);";
                $sql.=" update wx_activity set attentNum=attentNum+1 WHERE activityId=".$activityId."; commit";
                $result=$m->execute($sql);

                //电话
                $m4=M();
                $sql4="SELECT phone FROM wx_teacher where openid='".$openid."'";
                $result4=$m4->query($sql4);



                //时间地点
                $m5=M();
                $sql5="SELECT wx_activity.activityTitle,wx_activity.activitySubTitle,wx_activity.activityTime,wx_activity.activityAdd FROM wx_activity where wx_activity.activityId=".$activityId;
                $result5=$m5->query($sql5);


                //发送短信验证
                ;

                $phone=$result4[0]["phone"];
              //  echo $phone;
                //  $sms->send_sms("01490c5e234d21c7ce7cb73800e8795c","1235",$phone);
                $value="#title#=".$result5[0]["activitytitle"]."&#time#=".$result5[0]["activitytime"]."&#add#=".$result5[0]["activityadd"]."&#subtitle#=".$result5[0]["activitysubtitle"];
               // echo $value;
                $sms= new \Org\Sms();
                $sms->tpl_send_sms("01490c5e234d21c7ce7cb73800e8795c",824825,$value,$phone);
               // var_dump($sms) ;


                    echo "OK";

            }
            catch(\Exception $e)
            {
                echo "Fail";
            }



           /* $m=M();
            $sql="INSERT wx_attention(weixin,activityId,boolDel) VALUES ('".$openid."',"."$activityId".","."0)";
            $result=$m->execute($sql);
            if($result==1){
                echo "OK";
            }
            else{
                echo "FALSE";
            }*/
        }







       // echo $sql;

    }

    //参加成功
    public  function  successful($activityId){
        //echo $activityId;

        //时间地点
        $m5=M();
        $sql5="SELECT wx_activity.activityTitle,wx_activity.activitySubTitle,wx_activity.activityImage FROM wx_activity where wx_activity.activityId=".$activityId;
        $result5=$m5->query($sql5);

        $this->assign("activitytitle",$result5[0]["activitytitle"]);
        $this->assign("activitysubtitle",$result5[0]["activitysubtitle"]);
        $this->assign("activityimage",$result5[0]["activityimage"]);


           $this->assign("activityId",$activityId);



            $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);

            $signPackage = $jssdk->GetSignPackage();

            $this->assign("appId",$signPackage["appId"]);
            $this->assign("timestamp",$signPackage["timestamp"]);
            $this->assign("nonceStr",$signPackage["nonceStr"]);
            $this->assign("signature",$signPackage["signature"]);


        $this->display();
    }
 //检查是否参加
    public function  checkactivity($openid,$activityid){
        $m=M();
       $result=$m->query("SELECT wx_attention.attentionId FROM wx_attention WHERE weixin='".$openid."' and activityId=".$activityid."  and boolDel=0");
        if(count($result)>0){
            echo json_encode($result);
        }
        else{
            echo "false";
        }

    }

    //取消关注

    public function  cancle($attentionId){
        $m=M();
       $sql="UPDATE  wx_attention set boolDel=1 where attentionId=".$attentionId;
        $result=$m->execute($sql);
        if($result==1){
            echo "OK";
        }
        else{
            echo "false";
        }

    }



}