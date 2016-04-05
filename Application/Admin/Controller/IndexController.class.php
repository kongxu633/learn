<?php
namespace Admin\Controller;

class IndexController extends CommonController {
    public function index(){
        $this->display();
  
    }
    
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect(MODULE_NAME . '/Login/index');
    }
}