<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MaxMind\Db\Reader;

class LoginController extends Controller
{
	//后台登录界面
	public function login(Request $request)
	{
		//判断session是否有用户数组
		if (session('user') !== null) {
			return redirect('admin/index');
		}
		if ($request->isMethod('post') != '') {
			
			//获取验证码的正确输入
			$code = strtolower($request->session()->get('captchaSession'));
			//获取用户输入的uid
			$uid = $request->input("uid");
			//获取用户输入的密码
			$passwd = $request->input("passwd");
			//获取用户输入的验证码字符串并转换为小写
			$captcha = strtolower($request->input("captcha"));
			//判断用户是否输入
			/*
			 * 条件判断用户是否输入有效内容
			 */
			if ($uid == '') {
				return back()->with("error", "请输入用户名");
			}
			if ($passwd == '') {
				return back()->with("error", "请输入用户名密码");
			}
			if ($captcha == '') {
				return back()->with("error", "请输入不存在验证码");
			}
			//从数据表中获取单一数列
			$user = DB::table('user')->where('uid', $uid)->first();
			// 验证验证码是否与存在session值一样
			if ($captcha == $code) {
				//获取用户id、uid、密码
				$_uid = $user->uid;
				$_passwd = $user->passwd;
				// 验证是否有该用户并且有效
				if ($uid == $_uid && $passwd == Crypt::decrypt($_passwd)) {
//                    向网站中存储登录数据
					session(['user' => $user]);
//                    $request->session()->put('adminUserInfo', ['name'=>$_uid, 'id'=>$user->id]);
					return redirect('admin/index');
				} else {
					return back()->with("error", "好像登录失败了，重新登陆一下吧");
				}
			} else {
				return back()->with("error", "验证码输入不正确");
			}
			
		}
		
		return view('admin.login');
	}
	
	public function logout()
	{
		session(['user' => null]);
		return redirect('/admin/login');
	}
	
	//验证码调用Gregwar/captcha
	public function captcha(Request $request)
	{
		
		$builder = new CaptchaBuilder;
		$builder->build(150, 47);
		//获取验证码字符串并转换为小写
		$phrase = strtolower($builder->getPhrase());
		//把内容存入session 存储验证码
		$request->session()->flash('captchaSession', $phrase);
		//清除缓存
		ob_clean();
		//把验证码数据以jpeg图片的格式输出
		return response($builder->output())->header('Content-type', 'image/jpeg');
	}
	
	
	//获取用户真实IP
	public function crypt1()
	{
		//$ip = $request->getClientIp();
		$ip = '88.198.116.215';
		$reader = new Reader(public_path('lib/GeoLite2-City.mmdb'));
		try {
			$record = $reader->get($ip);

//            print($record->city->name . "\n");
			$local = $record['city']['names']['zh-CN'];
			echo($local);
			//假如要获取时区：
			//$timeZone = $record['location']['time_zone'];
		} catch (Reader\InvalidDatabaseException $e) {
		}
	}
	
	//重置密码
	public function passwdreset(Request $request)
	{
//        $passwd = session('user')->passwd;
//        $passwd=Crypt::decrypt($passwd);
//        dd($passwd);
		$o_passwd = $request->input("passwd_o");
		$_passwd = $request->input("passwd");
		$c_passwd = $request->input("passwd_confirmation");
		if ($input = $request->input()) {
			//写入限制规则
			$rule = [
				'passwd' => 'required|between:1,15|regex:/[a-zA-Z0-9]+/|confirmed'
			];
			//自定义输出信息
			$message = [
				'passwd.required' => '新密码不能为空',
				'passwd.between' => '新密码应为8-15个字符',
				'passwd.regex' => '非法字符',
				'passwd.confirmed' => '两次输入不一致'
			
			];
			if ($c_passwd == $o_passwd && $_passwd !== null) {
				return back()->withErrors('新旧密码不能相同');
			}
			//判断规则输出信息
			$validator = Validator::make($input, $rule, $message);
			//判断两次输入是否一致
			if ($validator->passes()) {
				
				$uid = session('user')->uid;
				//匹配sql中相同uid数据
				$user = DB::table('user')->where('uid', $uid)->first();
				//解密passwd
				$passwd = $user->passwd;
				if ($o_passwd == Crypt::decrypt($passwd)) {
					$passwd = Crypt::encrypt($_passwd);
//                    dd($passwd);
					DB::table('user')->where('uid', $uid)->update(['passwd' => $passwd]);
					return back()->withErrors('修改成功，密码为：' . $_passwd);
				} else {
					return back()->withErrors('密码输入错误');
				}
			} else {
				return back()->withErrors($validator);
			}
		}
		return view('/admin.pass');
		
		
	}
	
	public function test()
	{
		
		$c = DB::table('user')->where('uid', 'admin')->first();
		dd($c);
		$d = $c->passwd;
		$d = Crypt::decrypt($d);
		echo $d;
	}
	
	
}
