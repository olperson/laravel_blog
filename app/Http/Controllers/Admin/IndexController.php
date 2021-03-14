<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function dashindex()
    {
        return view('dashboard.index');
    }
    public function index()
    {
        return view('dashboard.campaign');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function cryptocurrency()
    {
        return view('dashboard.cryptocurrency');
    }

    public function ecommerce()
    {
        return view('dashboard.ecommerce');

    }
}
