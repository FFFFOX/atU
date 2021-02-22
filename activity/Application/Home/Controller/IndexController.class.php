<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	public function getType(){
		$m=M('type');        //M方法实例化模型
		$rs=$m->field('name')->select();	//查询
		echo json_encode($rs); 
	}
	public function getClub(){
		$m=M('');        //M方法实例化模型
		$rs=$m->query('select loc,name from club order by CONVERT(loc USING gbk)');	//查询
		echo json_encode($rs); 
	}
	public function login(){
		$nickname = I('nickname');
		$tel = I('tel');
		$m = M('users');
		$res = $m -> where('nickname="'.$nickname.'"') ->count();
		if ($res){
			$res = $m -> where('nickname="'.$nickname.'" and tel="'.$tel.'"')->field('clubname,tel')->select() ;
			if (!$res){
				echo('您的手机号码输入错误！');			
			} else{
				echo json_encode($res); 
			}
		} else { echo('1');	}    //提示注册账号
	}
	public function queryUser(){             //register使用
		$nickname = I('nickname');
		$m = M('users');
		$res = $m -> where('nickname="'.$nickname.'"') -> count();
		if ($res){
			echo('您的微信号已经注册过！');			
		} 
	}
	public function queryUserInfo(){                 //my使用
		$nickname = I('nickname');
		$m = M('users');
		$res = $m -> where('nickname="'.$nickname.'"') -> select();
		echo json_encode($res);  
	}
	public function modifyUser(){                    //my使用
		$nickname = I('nickname');
		$gender = I('gender');
		$birth = I('birth');
		$tel = I('tel');
		$profession = I('profession');	
		$type = I('type');		
		$carnumber = I('carnumber');
		$clubname = I('clubname');	
		$m = M('users');
	
		$data['gender'] = $gender;
		$data['birth'] = $birth;
		$data['tel'] = $tel;
		$data['profession'] = $profession;
		$data['type'] = $type;
		$data['carnumber'] = $carnumber;
		$data['clubname'] = $clubname;
		$sql2 = $m ->where('nickname="'.$nickname.'"') ->save($data);
	}
	public function setUser(){                    //register使用
		$nickname = I('nickname');
		$gender = I('gender');
		$birth = I('birth');
		$tel = I('tel');
		$profession = I('profession');	
		$type = I('type');		
		$carnumber = I('carnumber');
		$clubname = I('clubname');	
		$m = M('users');
		$data['nickname'] = $nickname;
		$data['gender'] = $gender;
		$data['birth'] = $birth;
		$data['tel'] = $tel;
		$data['profession'] = $profession;
		$data['type'] = $type;
		$data['carnumber'] = $carnumber;
		$data['clubname'] = $clubname;
		$sql2 = $m -> add($data);
	}
	public function getList(){                    //index使用
		$m=M('activity');        //M方法实例化模型
		$rs=$m->select();	//查询
		echo json_encode($rs); 
	}
	public function getActivity(){              //详情页使用
		$aid = I('aid');
		$d = D('activity');
		$activity = $d ->relation('Allow') -> where('aid="'.$aid.'"') -> select();

		$m = M('userenrol');
		$nickname = I('nickname');
		$now = $m -> where('aid='.$aid)-> count();
		$result = $m -> where('nickname="'.$nickname.'" and aid='.$aid)-> count();
		echo '{"Activity":'.json_encode($activity).',"enroll":'.$result.',"now":'.$now.'}';		
		
	}
	public function setUserEnrol(){                  //详情页使用,添加报名信息
		$data['nickname']=I('nickname');
		$data['tel'] = I('tel');
		$data['act'] = I('act');
		$data['aid'] = I('aid');
		$data['clubname'] = I('clubname');
		$data['date']=date('Y-m-d H:i:s',time());
		$m = M('userenrol');
		$result = $m -> add($data);
		$res = $m ->count();
		echo json_encode($res); 
	}
	public function cancelUserEnrol(){                  //详情页使用,取消报名信息
		$nickname=I('nickname');
		$act = I('act');
		$m = M('userenrol');
		$result = $m -> where('nickname="'.$nickname.'" and act="'.$act.'"' )-> delete();
		$res = $m ->count();
		echo json_encode($res); 
	}
}