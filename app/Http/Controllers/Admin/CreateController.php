<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class CreateController extends Controller
{
	public function index()
	{
		$create = (new Content())->tree();
		return view('admin.contents.index')->with('data', $create);
	}
	
	public function order(Request $request)
	{
		
		$input = $request->all();
		$order = Content::find($input['_id']);
		$order->_order = $input['_order'];
		$re = $order->update();
		if ($re) {
			$data = [
				'status' => '0',
				'msg' => '成功'
			];
		} else {
			$data = [
				'status' => '1',
				'msg' => '失败'
			];
		}
		
		return $data;
	}
	
	
	//post.admin/category
	public function store()
	{
	
	}
	
	
	//get.admin/category/create   添加分类
	public function create()
	{
	
	}
	
	//get.admin/category/{category}  显示单个分类信息
	public function show()
	{
	
	}
	
	//delete.admin/category/{category}   删除单个分类
	public function destroy()
	{
	
	}
	
	//put.admin/category/{category}    更新分类
	public function update()
	{
	
	}
	
	//get.admin/category/{category}/edit  编辑分类
	public function edit()
	{
	
	}
}
