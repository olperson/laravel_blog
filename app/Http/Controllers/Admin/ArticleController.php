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
		$data = [];
		$_name = [];
		return view('admin.article.add', compact('data', '_name'));
		
		
	}
}
