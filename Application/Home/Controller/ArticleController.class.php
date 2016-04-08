<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function add(){
        $this->display();
    }
    
    public function save(){

        $content = I('content');
        $pics = I('pic');
        
        if(empty($content)){
    
            $this->error('留言内容为空!');
        }
        
        $data = [
            'title' => mb_substr($content , 0 , 10),
            'content' => $content,
            'time' => time(),
            'click' => mt_rand(100,200),
            'cid' => 0,
            'del' =>1,
        ];
        $aid = M('article')->data($data)->add();
 
        if($aid === false){
            $this->error('留言保存失败');
        }
    
        if(!empty($pics)){
            foreach ($pics as $v) {
                $arr = split('/', $v);
                $arr['path'] = $arr[0];
                $arr['name'] = $arr[1];
                $arr['aid'] = $aid;
                M('pic')->data($arr)->add();
            }
        }
    
        $this->display();
    }
    
    public function upload(){
    
        $file_string = I('post.base64_string','','base64_decode');
    
        $savename = date("Ym").'/'.date("Ymd").'_'.uniqid().'.jpg';//localResizeIMG压缩后的图片都是jpeg格式
        $file_path = './Uploads/' . $savename;
    
        $file = new \Think\Storage\Driver\File;
        $info = $file->put($file_path,$file_string);
    
        if($info){
            $result['status'] = 1;
            $result['content'] = "上传成功";
            $result['url'] = $savename;
        } else {
            $result['status'] = 0;
            $result['content'] = "上传失败";
        }
    
        $this->ajaxReturn($result);
    
    }
}