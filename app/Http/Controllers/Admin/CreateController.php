<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
	public function index()
	{
        $create = (new Content())->tree();
        return view('tables.datatable')->with('data', $create);


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
	
	
	//post.admin/create 添加分类提交
	public function store(Request $request)
	{
		$input = $request->except('_token');
		//写入限制规则
		$rule = [
			'_type' => 'required',
			'_title' => 'required',
			''
		];
		//自定义输出信息
		$message = [
			'_type.required' => '分类名称不能为空',
			'_title.required' => '分类标题不能为空'
		
		];
		$validator = \Illuminate\Support\Facades\Validator::make($input, $rule, $message);
		if ($validator->passes()) {
			$re = Content::create($input);
			if ($re) {
				
				return back()->with('errors', '新增成功!');
			} else {
				
				return back()->with('errors', '新增失败!');
			}
			
		} else {
			return back()->withErrors($validator);
			
		}
	}


    //get.admin/create/create   添加分类
	public function create()
	{
		
		$_name = Content::where('_pid', '0')->get();
		return view('admin.contents.add', compact('_name'));
	}
	
	//get.admin/create/{create}/edit  编辑分类
	public function edit($_id)
	{
		$content = Content::find($_id);
		$_name = Content::where('_pid', '0')->get();
		return view('admin.contents.edit', compact('content', '_name'));
	}
	
	//put.admin/create/{create}    更新分类
	public function update(Request $request, $_id)
	{
		$input = $request->except('_token', '_method');
		dd($input);
		$re = Content::where('_id', $_id)->update($input);
		if ($re) {
			return back()->with('errors', '更新成功!');
		} else {
			return back()->with('errors', '更新数据失败！');
		}
	}
	
	//delete.admin/create/{create}   删除单个分类
	public function destroy(Request $request, $_id)

    {

        $re = Content::where('_id', $_id)->delete();
		$data = [
			'_type' => '',
			'_pid' => '0',
			'_title' => '请分配该分类下的子分类'
		];
		$_data = Content::where('_id', $_id)->create($data);
		Content::where('_pid', $_id)->update(['_pid' => $_data->_id]);
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
	
	
	//get.admin/create/{create}  显示单个分类信息
	public function show()
	{
	
	}
	
	
}
