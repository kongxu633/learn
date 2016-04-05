<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController {
    public function index(){
        $cate = M('cate')->order('sort ASC')->select();
        $this->assign('cate',$cate)->display();
    }
    
    public function addCate(){
        $this->pid = I('pid',0,'intval');
        $this->display();
    }
    
    public function updateCate(){
    
        if(M('cate')->add($_POST)){
            $this->success('添加成功',U(MODULE_NAME.'/Category/index'));
        } else {
            $this->error('添加失败');
        }
    }    
}