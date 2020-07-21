<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * 我的收藏
     */
    public function collection()
    {
        return view('list/collection');
    }
    /**
     * 历史记录
     */
    public function blog()
    {
        return view('blog');
    }
}
