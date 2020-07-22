<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;


class IndexController extends Controller
{
    public function index(){
        $list=GoodsModel::get();
        //dd($list);
        return view('index');
    }
}
