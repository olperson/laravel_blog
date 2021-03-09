<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        $create = content::all();
        return view('admin.contents.index')->with('data',$create);
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
