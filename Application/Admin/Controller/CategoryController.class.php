<?php
namespace Admin\Controller;
use Common\Org\Util\Category;
class CategoryController extends CommonController {
    public function index(){
        
        $data = M('cate')->order('pid ASC,sort ASC')->select();
        $list = Category::tree($data);
        //p($list);
        $this->assign('list', $list);
        $this->display();
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

    public function sortCate(){
        //p(I('post.'));
        
        $arr = I('post.');
        $db = M('cate');
        foreach ($arr as $k=>$v){
            $db->where(['id'=>$k])->setField(['sort'=>$v]);
        }
        $this->redirect(MODULE_NAME.'/Category/index');
        
    }
}