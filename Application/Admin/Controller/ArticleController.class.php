<?php
namespace Admin\Controller;
use Common\Org\Util\Category;
class ArticleController extends CommonController {
    public function index(){
        $where = ['del' => 0];
        $art = D('article');
        $art = $art->where($where)->relation(true)->select();
        $this->art = $art;
        $this->display();
    }
    
    public function addArt(){
        
        $cate = M('cate')->order('pid ASC,sort ASC')->select();
        $cate = Category::tree($cate);
        
        $attr = M('attr')->select();
        
        $this->cate = $cate;
        $this->attr = $attr;
        $this->display();
    }
    
    public function saveArt(){
        //p(I('post.'));
        
        $data = [
            'title' => I('title'),
            'content' => I('content'),
            'time' => time(),
            'click' => I('click',100,'intval'),
            'cid' => I('cid',0,'intval'),
        ];
        
        if(isset($_POST['aid'])){
            foreach ($_POST['aid'] as $v){
                $data['attr'][] = $v;
            }
        }
        
        $result = D('article')->relation(true)->add($data);

        if($result){
            $this->success('添加成功',U(MODULE_NAME.'/Article/index'));
        } else {
            $this->error('添加失败');
        }
    }    
}