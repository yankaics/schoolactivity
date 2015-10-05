<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\Http;
use Org\Webcatconfig;
class IndexController extends Controller {
    public function index(){



    }
    //登录页面
    public function login($openid){
        $this->assign("openid",$openid);//openid

        $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);
        //  $Test->sayHello();
        /* $jssdk = new \JSSDK\JSSDK("wx647733b7b63769ea", "445dfd26395571dd376798c9b35a3026");*/
        $signPackage = $jssdk->GetSignPackage();
        //$data=json_encode($signPackage);
        $this->assign("appId",$signPackage["appId"]);
        $this->assign("timestamp",$signPackage["timestamp"]);
        $this->assign("nonceStr",$signPackage["nonceStr"]);
        $this->assign("signature",$signPackage["signature"]);


        $this->display();
    }
    //登录页面
    public function login1($openid){
        $this->assign("openid",$openid);//openid
        $this->display();
    }
    //登录页面
    public function login2($openid){
        $this->assign("openid",$openid);//openid
        $this->display();
    }

    //登陆 普通用户
    public function checklogin($userAcount,$userPassword,$openid){
        $m=M();
        $sql="SELECT teacherId,boolPass,shoolId FROM wx_teacher WHERE   userAcount='%s' and userPassword='%s' and boolDel=0";
        $sql_str=sprintf($sql,$userAcount,md5($userPassword));
        // echo $sql_str;
        $result=$m->query($sql_str);
        // echo $result[0][1];
        //echo $result[0]["teacherid"];


        if(count($result)>0){
            $Teacher = M("Teacher"); // 实例化活动对象
            $data['openid' ] = $openid ;

            $result1=$Teacher->where("teacherId=".$result[0]["teacherid"])->save($data);




            $_SESSION["user"]=true;
            echo json_encode($result);


        }
        else{
            echo "FALSE";
        }
    }
    //登陆 教师
    public function checklogin1($userAcount,$userPassword,$openid){
        $m=M();
        $sql="SELECT teacherId,boolPass,shoolId FROM wx_teacher WHERE  userAcount='%s' and userPassword='%s' and boolDel=0";
        $sql_str=sprintf($sql,$userAcount,md5($userPassword));
        // echo $sql_str;
        $result=$m->query($sql_str);
       // echo $result[0][1];
        //echo $result[0]["teacherid"];


        if(count($result)>0){
            $Teacher = M("Teacher"); // 实例化活动对象
            $data['openid' ] = $openid ;

            $result1=$Teacher->where("teacherId=".$result[0]["teacherid"])->save($data);




            $_SESSION["user"]=true;
            echo json_encode($result);


        }
        else{
            echo "FALSE";
        }
    }
    //注册页面
    public function register($openid){
        $this->assign("openid",$openid);//openid
        $this->display();
    }
    //注册
     public  function  doRegister($userAcount,$userPassword,$validate,$phone,$openid){



         if($validate== $_SESSION["validate"]){
             $Teacher = M("Teacher"); // 实例化活动对象
             $data['userAcount' ] = $userAcount ;
             $data['userPassword' ] =md5($userPassword)  ;
            // $data['openid' ] = $openid ;
             $data['phone' ] = $phone ;
             $data['boolDel' ] = false ;
             $data['boolPass' ] = false ;
             $data['booladmin' ] = false ;
             $id=$Teacher->add($data);


             /*  $m=M();
               $sql="INSERT wx_teacher(userAcount,userPassword,boolDel,boolPass) VALUES ('%s','%s',0,0)";
               $sql_str=sprintf($sql,$userAcount,md5($userPassword));
               // echo $sql_str;
               $result=$m->execute($sql_str);*/
             //echo $id;
             if($id>0){
                 echo "OK";
             }
             else{
                 echo "FALSE";
             }
         }
         else{
             echo "error";
         }



     }
    //没有权限视图

    public function noPermission($teacherId,$openid){


        $this->assign("openid",$openid);//openid

        $jssdk = new \Org\JSSDK(Webcatconfig::APPID,Webcatconfig::APPSECRET);
      //  $Test->sayHello();
       /* $jssdk = new \JSSDK\JSSDK("wx647733b7b63769ea", "445dfd26395571dd376798c9b35a3026");*/
        $signPackage = $jssdk->GetSignPackage();
        //$data=json_encode($signPackage);
        $this->assign("appId",$signPackage["appId"]);
        $this->assign("timestamp",$signPackage["timestamp"]);
        $this->assign("nonceStr",$signPackage["nonceStr"]);
        $this->assign("signature",$signPackage["signature"]);

        $this->assign("teacherId",$teacherId);

        $this->display();
        //echo  $signPackage["appId"];

    }
    //老师查看学校活动视图
    public function  teacherSelect($openid){


        $m3=M();
        $sql3="select shoolId  from wx_guanzhu where weixin='".$openid."'";
        $result3=$m3->query($sql3);
        $str="0";
        if(count($result3)>0){
            $str= strtr($result3[0]["shoolid"],"-",",");

        }
        $str1="(".$str.")";





        $m=M();
        $sql="SELECT DISTINCT wx_school.shoolName,wx_shoolactivity.shoolId,wx_school.schoolIcon,str_to_date(wx_activity.activityTime,'%Y%m%d') as activityTime FROM wx_school INNER JOIN wx_shoolactivity ON wx_shoolactivity.shoolId = wx_school.shoolId INNER JOIN wx_activity ON wx_activity.activityId = wx_shoolactivity.activityId where activityTime >NOW() and wx_shoolactivity.boolDel=0 and wx_shoolactivity.shoolId in ".$str1;

        $result=$m->query($sql);
        $this->assign("data",$result);



        //所有学校的大于当前时间活动
        $m1=M();
        $sql="SELECT wx_shoolactivity.activityId,wx_activity.activitySubTitle, wx_activity.activityTitle,wx_activity.activityTime,wx_activity.attentNum,wx_activity.activityCagetory,wx_shoolactivity.shoolId,str_to_date(wx_activity.activityTime,'%Y%m%d') as activityTime,wx_activity.activityTime
FROM wx_shoolactivity INNER JOIN wx_activity ON wx_activity.activityId = wx_shoolactivity.activityId
where wx_shoolactivity.boolDel=0 AND activityTime >NOW()";
        // echo $sql;
        // $sql_str=sprintf($sql,$activityId);
        $result1=$m1->query($sql);
        $this->assign("data1",$result1);



      //  $this->assign("openid",$openid);//openid
        $this->display();











    }
    //老师修改学校活动视图
    public function  teacherModify($activityId){
        $this->assign("activityId",$activityId);
        $this->display();

    }




    //下载从微信服务器到本地
    public function  download($serverId,$teacherId,$openid){

        //curl方法
        function get_by_curl($c_url,$post = false){
            $curl = curl_init(); // 启动一个CURL会话
            curl_setopt($curl, CURLOPT_URL, $c_url); // 要访问的地址
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
            curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
//    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
            curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
            $tmpInfo = curl_exec($curl); // 执行操作
            if (curl_errno($curl)) {
                echo 'Errno'.curl_error($curl);//捕抓异常
            }
            curl_close($curl); // 关闭CURL会话
            return $tmpInfo; // 返回数据

        }



        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".Webcatconfig::APPID."&secret=".Webcatconfig::APPSECRET;
        $data=get_by_curl($url);
        $data = json_decode($data);
        $access_token = $data->access_token;
      //  echo $access_token;

        try{
            $remoteUrl="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$serverId;
            $filename=date('YmdHis');
            $localUrl = "Public/File/".$filename.".jpg";
            $localUrl1="/File/".$filename.".jpg";//保存到数据库中
           // $Http = new \Org\Net\Http;
            Http::curlDownload($remoteUrl,$localUrl);

            //把图片路径写入到数据库
            $m=M();
            $sql="UPDATE wx_teacher set image='".$localUrl1."' WHERE teacherId=".$teacherId  ;
            // echo $sql_str;
            $result=$m->execute($sql);
            if($result==1){
                $this->redirect("Home/index/Login/openid/".$openid);
               // echo "OK";
            }
            else{
               // echo "FALSE";
                echo "上传失败，请重新上传";
            }




            $this->redirect("Home/index/Login/");

        }catch (Exception $e) {
            echo "上传失败，请重新上传";
        }



    }

    //保存教师修改的页面
    public  function  saveModify($activitytime,$activityadd,$activitytetailed,$activityId){
        $m=M();
        $sql="UPDATE wx_activity set activityTime='%s',activityAdd='%s',activityTetailed='%s' WHERE  activityId=%s" ;
        // echo $sql_str;
        $sql_str=sprintf($sql,$activitytime,$activityadd,$activitytetailed,$activityId);
       // echo $sql_str;
         $result=$m->execute($sql_str);
         if($result==1){

             echo "OK";
         }
         else{
             // echo "FALSE";
             echo "Fail";
         }

    }
    //短信验证码
    public function  validate($phone){
        $randStr = str_shuffle('1234567890');
        $rand = substr($randStr,0,6);
        $_SESSION["validate"]=$rand;
        $sms= new \Org\Sms();

        $sms->tpl_send_sms("01490c5e234d21c7ce7cb73800e8795c",826877,"#code#=".$rand,$phone);


    }
   //更新经度 纬度
    public function updateLocation($jingdu,$weidu,$openid){
        $Teacher = M("Teacher"); // 实例化活动对象
        $data['jingdu' ] = $jingdu ;
        $data['weidu' ] = $weidu ;

        $result1=$Teacher->where("openid='".$openid."'")->save($data);
        echo "OK";
    }




    public function  test(){

        $value="#title#="."22"."&#time#="."33"."&#add#="."44"."&#subtitle#="."555";

        $sms= new \Org\Sms();
       $sms->tpl_send_sms("01490c5e234d21c7ce7cb73800e8795c",824825,$value,"18381334402");
        var_dump($sms);
       //echo

    }



}

class JSSDK {
    private $appId;
    private $appSecret;

    public function __construct($appId, $appSecret) {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        //echo $appId;
    }

    public function getSignPackage() {
        //echo "22";
        $jsapiTicket = $this->getJsApiTicket();

        // 注意 URL 一定要动态获取，不能 hardcode.
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "appId"     => $this->appId,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }

    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function getJsApiTicket() {
        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        //echo 11;
        $data = json_decode(file_get_contents("jsapi_ticket.json"));
      //  echo $data;
        if ($data->expire_time < time()) {
            $accessToken = $this->getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket
            //$url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode($this->httpGet($url));
            $ticket = $res->ticket;
           // echo $ticket;
            if ($ticket) {
                $data->expire_time = time() + 7000;
                $data->jsapi_ticket = $ticket;
                $fp = fopen("jsapi_ticket.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        } else {
            $ticket = $data->jsapi_ticket;
        }

        return $ticket;
    }

    private function getAccessToken() {
        // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = json_decode(file_get_contents("access_token.json"));
        if ($data->expire_time < time()) {
            // 如果是企业号用以下URL获取access_token
            //$url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
            $res = json_decode($this->httpGet($url));
            $access_token = $res->access_token;
            if ($access_token) {
                $data->expire_time = time() + 7000;
                $data->access_token = $access_token;
                $fp = fopen("access_token.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        } else {
            $access_token = $data->access_token;
        }
       // echo $access_token;
        return $access_token;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }
}