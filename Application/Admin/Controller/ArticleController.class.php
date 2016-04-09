<?php
namespace Admin\Controller;
use Common\Org\Util\Category;
class ArticleController extends CommonController {
    
    // 显示全部文章
    public function index(){
        $this->art = D('article')->getArticle();
        $this->display();
    }

    // 显示回收站文章
    public function trach(){
        $this->art = D('article')->getArticle(1);
        $this->display('index');
    }
    
    // 软删除文章
    public function toTrach(){
       $del = I('del',0,'intval');
       $msg = $del ? '移入回收站' : '还原';
       $update = [
           'id' => I('id'),
           'del'=> $del,
       ];
       if(M('article')->save($update)){
           $this->success($msg.'成功');
       } else {
           $this->error($msg.'失败');
       }
    }
    
    public function delete(){
        $id = I('id');
        $result = D('article')->relation('attr')->delete($id);
        if($result){
            $this->success('彻底删除成功',U(MODULE_NAME.'/Article/trach'));
        } else {
            $this->error('彻底删除失败');
        }
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
    
    public function editArt() {
        
        $id = I('id',0,'intval');
        
        if(!$id){
            $this->error('非法操作',U(MODULE_NAME.'/Article/index'));
        }
        
        $cate = M('cate')->order('pid ASC,sort ASC')->select();
        $cate = Category::tree($cate);
        $this->assign('cate',$cate);
        
        
        $result = D('article')->relation(true)->find($id);
        
        //p($result);
        
        $this->assign('result',$result);
        $this->display();
    }
    
    public function update(){
        //p(I('post.'));
        $id = I('id',0,'intval');
        
        if(!$id){
            $this->error('非法操作',U(MODULE_NAME.'/Article/index'));
        }
    
        $data = [
                'title' => I('title'),
                'content' => I('content'),
                'click' => I('click',100,'intval'),
                'cid' => I('cid',0,'intval'),
        ];
    
        if(isset($_POST['aid'])){
            foreach ($_POST['aid'] as $v){
                $data['attr'][] = $v;
            }
        }
        
        $result = D('article')->where(['id' => $id])->relation(true)->save($data);
    
        if($result){
            $this->success('更新成功',U(MODULE_NAME.'/Article/index'));
        } else {
            $this->error('更新失败');
        }
    }
}