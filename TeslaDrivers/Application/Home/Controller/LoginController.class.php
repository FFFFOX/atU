<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index() {

		if(IS_POST){
			$username = I('post.username');
			$pwd = I('post.password');
			if($username == 'admin' || $username == 'admin123' && $pwd == '123456'){
			 //   $teslaMS = new TeslaMSController();
			    
			    session('admin_id',$username);
			    session('admin_pwd',$pwd);
			    dump(session('admin_id'));
				$this -> redirect('TeslaMS/index');
			} else {
				$this -> assign('errorLogin','用户名或密码不正确');
			}
		} else {
		    
		}
		session('admin_id',null);
		session('admin_pwd',null);
        $this -> display('login');

    }
    

    
}