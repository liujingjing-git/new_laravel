<?php

namespace App\Http\Controllers;

use App\Model\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TextController extends Controller
{
//    public function text(Request $request){
//       $id =  $request->get('id');
//        $key = 'h:goods_info:'.$id;
//       $goods_info = Redis::hgetall($key);
//       if($goods_info){
//           echo "有缓存";
//       }else{
//           echo "无缓存";
//           $g = GoodsModel::find($id);
//           $arr = $g->toArray();
//           print_r($arr);
//           Redis::hMset($key,$arr);
//           Redis::expire($key,60);
//       }


//       echo $key;die;
//}

    public function vedor(){
        return view('voder.voder');
    }

    public function vedors(Request $request){
        $post = $request->except('_token');
        if($request->hasFile('voder_image')){
            $img = $this->upload('voder_image');
            dd($img);
        }
    }


    public function upload($img){
        if(request()->file($img)->isValid()){
            $file = request()->file($img);
            $result = $file->store('uploads');
            return $result;
        }
        exit('未发现文件或文件上传错误');
    }

}
