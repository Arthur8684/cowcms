<?php
namespace Sys_model\Controller;
use Org\Util\Admin;
class SettingController extends Admin {

   function __construct()  //析构函数
   {  
        parent::__construct();
   }  
    public function setting(){
        $id=I('id');
		if(IS_POST)
		{
		    $post=data_(I('post.'),'__hash__');
			FF("model/model_".$id."_config",$post);
			M('model')->where(array('id'=>$id))->save(array('setting'=>array2string($post)));
		}
        $c=model_config($id);
		$this->assign('id',$id);
		$this->assign('c',$c);
		$this->display();
    }
}