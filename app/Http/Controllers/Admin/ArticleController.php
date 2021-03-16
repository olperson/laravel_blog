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
	public function index(Request $request)
	{
		$arts = DB::table('article')->orderBy('art_id', 'desc')->get();
		$input = $request->art_title;
		$result = DB::table('article')->where('art_title', 'like', "%{$input}%")->get();
		return view('apps.inbox', compact('result', 'arts'));
	}
	
	//添加文章分类
	public function create()
	{
		
		$_name = Content::all();
		$content = Content::where('_pid', '>', '0')->get();
		return view('admin.article.add', compact('content', '_name'));
		
		
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
	
	public function search(Request $request)
	{
		$input = $request->art_title;
		$result = DB::table('article')->where('art_title', 'like', "%{$input}%")->get();
		return view('apps.inbox', compact('result'));
	}
	
	//修改文章
	public function edit($art_id)
	{
		$_name = Content::all();
		$content = Content::where('_pid', '>', '0')->get();
		$_content = Article::find($art_id);
		return view('admin.article.edit', compact('content', '_content', '_name'));
	}
	
	public function update(Request $request, $art_id)
	{
		$input = $request->except('_token', '_method');
		$re = Article::where('art_id', $art_id)->update($input);
		if ($re) {
			return back()->with('errors', '更新成功!');
		} else {
			return back()->with('errors', '更新数据失败！');
		}
	}
	
	public function upload()
	{
		return view('admin.markdown');
	}
	
	public function test()
	{
		$data = Article::where('art_id', '21')->first();
		$re = $data['editormd_id-html-code'];
		return view('pages.blank', compact('re'));
	}
}
