<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $art = D('article')->getArticle();
        //p($art);
        $this->assign('art',$art)->display();
    }
    
    public function getArticle(){
        $cid = I('cid',0,'intval');
        $cate = M('cate')->where(array('id'=>$cid))->find();
        $this->assign('cate',$cate);
        
        $art = D('article')->getCateArticle($cid);
        $this->assign('art',$art);
        
        $this->display();
    }
}