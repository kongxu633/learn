<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $art = D('article')->getArticle();
        $pic = [
            ['name'=>'http://img.alicdn.com/tps/i3/TB1kt4wHVXXXXb_XVXX0HY8HXXX-1024-1024.jpeg'],
            ['name'=>'http://img.alicdn.com/tps/i1/TB1SKhUHVXXXXb7XXXX0HY8HXXX-1024-1024.jpeg'],
            ['name'=>'http://img.alicdn.com/tps/i4/TB1AdxNHVXXXXasXpXX0HY8HXXX-1024-1024.jpeg'],
        ];
        $this->assign('pic',$pic);
        $this->assign('art',$art);
        $this->display();
    }
    
    public function getArticle(){
        $cid = I('cid',0,'intval');
        $cate = M('cate')->where(array('id'=>$cid))->find();
        $this->assign('cate',$cate);
        
        $pic = [
            ['name'=>'http://img.alicdn.com/tps/i3/TB1kt4wHVXXXXb_XVXX0HY8HXXX-1024-1024.jpeg'],
            ['name'=>'http://img.alicdn.com/tps/i1/TB1SKhUHVXXXXb7XXXX0HY8HXXX-1024-1024.jpeg'],
            ['name'=>'http://img.alicdn.com/tps/i4/TB1AdxNHVXXXXasXpXX0HY8HXXX-1024-1024.jpeg'],
        ];
        $this->assign('pic',$pic);
        
        $art = D('article')->getCateArticle($cid);
        $this->assign('art',$art);
        
        $this->display();
    }
}