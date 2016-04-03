<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
        $info = [
            "u" => 'admin',
            "p" => 'admin',
        ];
        
        $this->assign('info',$info);
        $this->display();
    }
    
    public function Login(){
        if(!IS_POST) E('页面错误');
        //p(I('post.'));
        
        //p(I('session.'));
        $code = I('code','','strtolower');
        
        if( !check_verify($code) ) $this->error('验证码错误');
        
        $username = I('username');
        $password = I('password','','md5');
        
        $db = M('user');
        $user = $db->where(['username'=>$username])->find();
        
        //p($user);
        if(!$user || $user['password'] != $password){
            $this->error('账号或密码错误');
            
        }
        
        // 更新最后一次登录时间和IP
        $data = [
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        ];
        
        $db->save($data);
        
        session('uid',$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);
        
        // 带延迟跳转会乱码
        $this->redirect('Index/index');
        
    }
    public function verify(){
        $config = [
            'fontSize'=>14,
            'length'=>4,
            'useNoise'=>false,
            'useCurve'=>false,
            'codeSet'=>'8'
        ];
        $verify = new \Think\Verify($config);
        $verify->entry();
        
        //
        //array('verify_code'=>'验证码的值','verify_code'=>'验证码生成的时间戳')
    }
}