<?php
namespace Home\Controller;

use Think\Controller;

class TeslaMSController extends Controller
{

	public function index() {
	    $admin_id = session('admin_id');
	    if(!empty($admin_id)) {
	        $this -> display('');
	    } else {
	        $this ->  redirect('Login/index');
	    }
		
    }
	
///登录--未完成--仅仅实现登录，无管理员信息表
//     public function login() {

// 		if(IS_POST){
// 			$username = I('post.username');
// 			$pwd = I('password');
// 			if($username == 'admin' && $pwd == '123456'){
// 				$this -> redirect('index');
// 			} else {
// 				$this -> assign('errorLogin','用户名或密码不正确');
// 			}
// 		}
		
//         $this -> display('login');
//     }
    public function logout() {
        session('admin_id',null);
		session('admin_pwd',null);
        $this -> redirect('Login/index');
    }
	
	
///首页
    public function home() {
		
        $this -> display('');
    }
		
///车型管理
	//车型列表
	public function cartypemanage(){ 		
		//D方法实例化activity数据库中的表type
		$type = D('type');	
		$info = $type -> select();
		$this -> assign('info',$info);
		$info1 = $type -> count();
		$this -> assign('info1',$info1);
        $this->display();
    }
	//编辑
    public function cartypemanage_update() {
		$type = D('type');
		//根据get方法传递过来的type表中的tid信息，查询被修改车型的内容，展示给模板做修改提示
		$tid = I('get.tid');
		if(IS_POST) {

			$shuju = I('post.');
			$num = $type -> save($shuju);
			if($num){
				$this -> success('修改成功',U('cartypemanage'));
			} else {
				$this -> error('修改失败',U('cartypemanage'));
			}
		} else {		
			//通过一维数组形式返回记录内容
			$info = $type -> find($tid);
			$this -> assign('info',$info);
			$this -> display('cartypemanage_update');
		}
    }
	//添加
	public function cartypemanage_add() {
		$type = D('type');
		
		//两个业务逻辑：展示form表单、收集信息入库
		if(IS_POST) {
			//收集信息入库
			//通过I函数收集form表单信息，I()可以过滤非法信息，在没有非法信息情况下，返回的信息与传递的信息安全一致
			$shuju = I('post.');
			if(!empty($shuju['name'])) {

				$newid = $type -> add($shuju);
				if($newid) {
					//添加成功，页面跳转到管理列表
					$this -> success('添加成功',U('cartypemanage_add'));
				} else {
					//添加失败，给本身页面跳转
					$this -> error('添加失败',U('cartypemanage_add'));
				}
			} else {
				$this -> error('添加失败，请输入需要添加的车型名称！',U('cartypemanage_add'));
			}
		} else {
			//展示form表单
			$this -> display('');
		}
    }
	//删除
	public function cartypemanage_delete() {
        $cartype = D('type');
		$tid = I('get.tid');
        $num = $cartype -> delete($tid);
	    if($num){
			//修改成功则返回cartypemanage页面
			$this -> success('删除成功',U('cartypemanage'));
		} else {
			$this -> error('删除失败',U('cartypemanage'));
		}
    }


	
///俱乐部管理
	//查询
	public function clubmanage() {
		$club = D('club');
		if(IS_POST) {
			//收集信息入库
			$shuju = I('post.');
			if(!empty($shuju)){
				$where['name'] =['like','%'.$shuju['name'].'%'];
				$where['loc'] = ['like','%'.$shuju['loc'].'%'];
				//封装模糊查询 赋值到数组 
				$needclub = $club->where( $where)->select();
				$num = $club->where( $where)->count();
			}
			$this -> assign('info1',$num);
			$this -> assign('info',$needclub);
		} else {
			$info = $club -> select();
			$num = $club->count();
			$this -> assign('info1',$num);
			$this -> assign('info',$info);
			
		}
		$this->display();
    }
	//添加
	public function clubmanage_add() {
		$club = D('club');
		if(IS_POST) {
			//收集信息入库
			$shuju= I('post.');
			if(!empty($shuju['loc']) && !empty($shuju['name'])) {
				$newid = $club -> add($shuju);
				if($newid) {
					//添加成功，页面跳转到查询列表
					$this -> success('添加成功',U('clubmanage_add'));
				} else {
					//添加失败，给本身页面跳转
					$this -> error('添加失败',U('clubmanage_add'));
				}
			} else {
				$this -> error('添加失败，请输入需要添加的俱乐部地点和名称！',U('clubmanage_add'));
			}
		} else {
			//展示form表单
			$this -> display('clubmanage_add');
		}
	}
	//删除
	public function clubmanage_delete() {
        $club = D('club');
		$cid = I('get.cid');
        $num = $club -> delete($cid);
	    if($num){
			//修改成功则返回clubmanage页面
			$this -> success('删除成功',U('clubmanage'));
		} else {
			$this -> error('删除失败',U('clubmanage'));
		}
	}
	//修改
	public function clubmanage_update() {
		$club = D('club');
		$cid = I('get.cid');
		if(IS_POST) {
			$shuju = I('post.');
			$num = $club -> save($shuju);
			if($num){
				//修改成功则返回select页面
				$this -> success('修改成功',U('clubmanage'));
			} else {
				//修改失败则返回update页面，同时传入参数 显示该字段的内容
				$this -> error('修改失败',U('clubmanage'),array('cid'=>$cid));
			}
		} else {
			//通过一维数组形式返回记录内容
			$info = $club-> find($cid);
			$this -> assign('info',$info);
			$this -> display();
		}
	}
///活动管理
	//活动查询
	public function actmanage() {
		$activity = D('activity');
		$info = $activity -> select();
		$this -> assign('info',$info);
		$num = $activity -> count();
		$this -> assign('info1',$num);
		$this -> display();
	}
	//详情页
	public function actmanage_more() {
		$activity = D('activity');
		$aid = I('get.aid');
		$info = $activity -> relation('Allow') -> find($aid);
		$this -> assign('info',$info);
		$this -> display();
	}
	//活动修改--未完成--关联修改
	public function act_update() {
		$activity = D('activity');
		$aid = I('get.aid');
		$actclub = D('actclub');
			/********获取actclub表中cid********/
			
			$actClubCid = $actclub -> field('cid') -> where('aid="'.$aid.'"') -> select();
			$this -> assign('actClubCid',$actClubCid);
			/********获取actclub表中cid********/
		if(IS_POST) {
			$shuju = I('post.');

			
			/********处理附件图片********/
			$cfg = array(
				'rootPath'     => './Public/Imgs/', //保存根路径
			);
			$up = new \Think\Upload($cfg);
			//upload方法返回整个附件数组的'存储目录'和'名字信息'
			$z = $up -> upload($_FILES);

			//把附件存储到数据库（附件路径名存储给数据表记录）
			//./Public/Upload/2020-12-23/xxxx.xxx
			if($_FILES['img']['error']==0){
				$shuju['img'] = $up -> rootPath.$z['img']['savepath'].$z['img']['savename'];
			}
			if($_FILES['backgroundimg']['error']==0){
				$shuju['backgroundimg'] = $up -> rootPath.$z['backgroundimg']['savepath'].$z['backgroundimg']['savename'];
			}
			/********处理附件图片********/
			/********关联添加限制条件********/
			$shuju2['clubs'] = I('post.clubs');
			foreach ($shuju2['clubs'] as $key => $value) {
				$shuju['limits'][]=['cid'=>$value];
			}
			// dump($shuju1);    //输出变量$shuju1
			if(!empty($shuju['name'])){
			    if(!empty($actClubCid)) {
			        $delete = $actclub -> where('aid="'.$aid.'"') -> delete($id);
			    }
		    	$edit = $activity -> relation('limits') -> save($shuju);
			    $this -> success('修改成功',U('actmanage'));
			} else {

                $this -> error('修改失败，活动名称不能为空',U('actmanage'));

			    
			}
			/********关联添加限制条件********/

		} else {
			$info = $activity -> relation('Allow') -> where('aid="'.$aid.'"') -> find();
			$this -> assign('info',$info);
			/********获取club表中loc和name********/
			$club = D('club');
			$clubName = $club -> field('cid,loc,name') -> select();
			$this -> assign('clubName',$clubName);
			/********获取club表中loc和name********/

			$this -> display();
		}
	}
	//活动添加
	public function act_add() {
		//对activity表操作
		$activity = D('activity');
		
		//点击添加判断是否post
		if(IS_POST) {

			$shuju1['name'] = I('post.name');
			$shuju1['loc'] = I('post.loc');
			$shuju1['site'] = I('post.site');
			$shuju1['date'] = I('post.date');
			$shuju1['begin'] = I('post.begin');
			$shuju1['end'] = I('post.end');
			$shuju1['total'] = I('post.total');
			$shuju1['deadline'] = I('post.deadline');
			
			if(!empty($shuju1['name'])) {
				/********处理附件图片********/
				$cfg = array(
					'rootPath'     => './Public/Imgs/', //保存根路径
				);
				
				$up = new \Think\Upload($cfg);
				//upload方法返回整个附件数组的'存储目录'和'名字信息'
				$z = $up -> upload($_FILES);
				// dump($_FILES);
				//把附件存储到数据库（附件路径名存储给数据表记录）
				//./Public/Upload/2020-12-23/xxxx.xxx
				if($_FILES['img']['error']==0){
					$shuju1['img'] = I('post.img');
					$shuju1['img'] = $up -> rootPath.$z['img']['savepath'].$z['img']['savename'];
				// 	dump($shuju1);
					//
				}
				if($_FILES['backgroundimg']['error']==0){
					$shuju1['backgroundimg'] = I('post.backgroundimg');
					$shuju1['backgroundimg'] = $up -> rootPath.$z['backgroundimg']['savepath'].$z['backgroundimg']['savename'];
				}
				/********处理附件图片********/
				
				
				/********关联添加限制条件********/
				$shuju2['clubs'] = I('post.clubs');
				foreach ($shuju2['clubs'] as $key => $value) {
					$shuju1['limits'][]=['cid'=>$value];
				}
                /*
				$tmp=htmlspecialchars_decode(I('post.clubs'));
			    dump($tmp);
			    
				//  htmlspecialchars_decode: 
				// 在传递JSON数据时，字符会被HTML化，双引号被转成 ‘&quot;’
				// 可以使用htmlspecialchars_decode()函数将其处理回所需的JSON字符串，
				// htmlspecialchars()函数是htmlspecialchars_decode()的反函数：将字符转换为HTML实体
				
				// $clubs = json_decode($tmp,TRUE);
				// dump($clubs);
				
				// json_decode($tmp,TRUE);
				// 第二个参数是转换为数组，否则转换为对象
        
				//以数组的形式赋值给变量$shuju1['limits']
				$shuju1['clubs'] = array();
				
				for($i=0;$i<count($clubs);$i++){
					$temp=array();
					$temp['cid']=$clubs[$i];
					//$temp['num']=$limits[$i]['num'];
					array_push($shuju1['clubs'],$temp);		
				}
                */
				// dump($shuju1);    //输出变量$shuju1
				$result = $activity -> relation('limits') -> add($shuju1);
				if($result) {
					$this -> success('添加成功',U('actmanage'),999);
				} else {
					$this -> error('添加失败',U(''),999);
				}
				/********关联添加限制条件********/
			} else {
				$this -> error('添加失败，请输入需要添加的活动名称！',U(''),999);
			}
		} else {
			/********获取actclub表中loc和name********/
			$club = D('club');
			$clubLoc = $club -> distinct(true) -> field('loc') -> select();
			$this -> assign('clubLoc',$clubLoc);
			
			$clubName = $club -> field('cid,loc,name') -> select();
			
			$this -> assign('clubName',$clubName);
			//dump($clubInfo);
			/********获取actclub表中loc和name********/
			
			$this -> display();
		}
		
	}
	//活动删除--未完成--只删除活动，未删除限制条件
	public function act_delete() {
		$activity = D('activity');
		$aid = I('get.aid');
		$num = $activity -> delete($aid);
		if($num){
			//修改成功则返回select页面
			$this -> success('删除成功',U('actmanage'));
		} else {
			$this -> error('删除失败',U('actmanage'));
		}
	}
	//活动报名限制
	public function act_limit() {
		$enroll = D('enroll');
		if(IS_POST) {
			$chaxun = I('post.activity');
			if(!empty($chaxun)) {
				$map['activity'] = array('like','%'.$chaxun.'%');
				$info = $enroll -> where($map) -> select();
				$this -> assign('info',$info);
				$num = $enroll->where($map)->count();
				$this -> assign('info1',$num);	
			} else {
				$info = $enroll -> select();
				$this -> assign('info',$info);
				$num = $enroll->count();
				$this -> assign('info1',$num);
			}

		} else {
			$info = $enroll -> select();
			$this -> assign('info',$info);
			$num = $enroll->count();
			$this -> assign('info1',$num);
			
		}
		$this -> display('');
	}
	
	
	
///用户管理
	//用户查询
	public function usermanage() {
		$user= D('users');
		if(IS_POST) {
			$shuju = I('post.');
			if(empty($shuju['nickname']) && empty($shuju['type']) && empty($shuju['clubname'])){
				$users = $user->select();
				$num = $user -> count();
			} else {
				//模糊查询
				if(!empty($shuju['nickname'])){
					$where['nickname'] =['like','%'.$shuju['nickname'].'%'];
				}
				if(!empty($shuju['type'])){
					$where['type'] =['like','%'.$shuju['type'].'%'];
				}
				if(!empty($shuju['clubname'])){
					$where['clubname'] =['like','%'.$shuju['clubname'].'%'];
				}
				$users = $user->where($where)->select();
				$num = $user->where($where)-> count();
			}
		} else {
			$users = $user->select();
			$num = $user -> count();
		}
		$this -> assign('info',$users);
		$this -> assign('info1',$num);
		$this->display();
	}	
	//用户统计
	public function usermanage_total() {
		$user= D('users');
		$users = $user->select();
		$count= $user->count();
		if(IS_POST) {
			$shuju = I('post.');
			if(empty($shuju['clubname']) && empty($shuju['type'])){
				
			} else {
				if(!empty($shuju['clubname'])){
					//$where['clubname']=$shuju['clubname'];
					$where['clubname'] =['like','%'.$shuju['clubname'].'%'];
				}
				if(!empty($shuju['type'])){
					//$where['type']=$shuju['type'];
					$where['type'] =['like','%'.$shuju['type'].'%'];
				}
				$users = $user->where($where)->select();
				$count= $user->where($where)->count();
			}
		}
		$this -> assign('info',$users);
		$this -> assign('info1',$count);
		$this->display();
	}

	
	///报名情况
	//报名情况查询
	public function applymanage(){
		$userenrol = D('userenrol');
		$userInfo = $userenrol->select();
		$count= $userenrol->count();
		if(IS_POST) {
            $shuju = I ('post.');
			if(empty($shuju['nickname']) && empty($shuju['act']) && empty($shuju['clubname'])){
				
			} else {
				if(!empty($shuju['nickname'])){
					$where['nickname'] =['like','%'.$shuju['nickname'].'%'];
				}
				if(!empty($shuju['act'])){
					$where['act'] =['like','%'.$shuju['act'].'%'];
				}
				if(!empty($shuju['clubname'])){
					$where['clubname'] =['like','%'.$shuju['clubname'].'%'];
				}
				$userInfo = $userenrol -> where($where) -> select();
				$count= $userenrol -> where($where) -> count();
			}
	    }
		$this -> assign('info',$userInfo);
		$this -> assign('info1',$count);
	    $this -> display();   
	}
	
	

	
	
	
	
	
	
	
	
}



