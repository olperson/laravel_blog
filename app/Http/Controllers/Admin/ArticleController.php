<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
	//全部文章列表
	public function index()
	{
		$arts = DB::table('article')->orderBy('art_id', 'desc')->get();
		return view('apps.inbox', compact('arts'));
	}
	
	//添加文章分类
	public function create()
	{
		
		$_name = (new Content())->tree();
		return view('admin.article.add', compact('_name'));
		
		
	}

//添加文章
	public function store(Request $request)
	{
		$input = $request->except('_token');
		
		if (empty($input['art_thumb'])) {
			$input['art_thumb'] = 'http://blog.com/imgs?type=img';
		}
		$input['art_time'] = time();
		$re = Article::create($input);
		if ($re) {
			return back()->with('errors', '发布文章成功');
		} else {
			return back()->with('errors', '出现了未知错误');
		}
		
	}
	
	public function getList()
	{
		$arts = Article::all()->orderBy('art_id', 'desc')->paginate(5);
		return $arts;
	}
	
	//.$ajax异步修改文章tags
	public function changeTags(Request $request)
	{
		
		$input = $request->all();
		$tag = Article::find($input['art_id']);
		$tag->art_tag = $input['art_tag'];
		$re = $tag->update();
	}
	
	/*
	 * 删除操作
	 */
	public function destroy(Request $request, $art_id)
	{
		
		$re = Article::where('art_id', $art_id)->delete();
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
}
