<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GoodsModel;


class IndexController extends Controller
{
    public function index(){
        $menu=GoodsModel::orderby('goods_id','DESC')->limit(3);
        $is_new=GoodsModel::where('is_new','1')->orderBy('goods_id','DESC')->limit(6)->get();

        $best=GoodsModel::where('is_best','1')->orderby('goods_id','DESC')->limit(6)->get();
        return view('index',['menu'=>$menu,'is_new'=>$is_new,'best'=>$best]);
    }








    public function test(){
        $menu=GoodsModel::select('goods_name')->limit(4);
        dd($menu);
    }



}
