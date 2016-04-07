<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $art = D('article')->getArticle();
        //p($art);
        $this->assign('art',$art)->display();
    }
}