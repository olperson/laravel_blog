<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	//全部文章列表
	public function index()
	{
		echo '123';
	}
	
	//添加文章分类
	public function create()
	{
		
		$_name= (new Content())->tree();
		return view('admin.article.add', compact( '_name'));
		
		
	}
	//引入markdown编辑器
	public function upload()
	{
	return view('layouts.md.md');
	}
}
