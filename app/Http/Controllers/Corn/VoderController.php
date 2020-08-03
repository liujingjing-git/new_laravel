<?php

namespace App\Http\Controllers\Corn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VoderModel;

class VoderController extends Controller
{
    public function codec(){

//        获取状态码为0的视频
        $list = VoderModel::where(['status'=>0])->orderBy("id","desc")->get();
        echo "开始转码 ：". date("Y-m-d H:i:s");echo '</br>';

        if($list){
            foreach ($list as $k=>$v) {
                $goods_id = $v->goods_id;  //获取商品id

                //开始转码
                VoderModel::where(['goods_id'=>$goods_id])->update(['status'=>1]);
//
                fastcgi_finish_request();

                //转码：
                //原视频文件
                $video_file = $v->path;     //原视频文件
                //转码后文件路径
                $video_out_path = 'video_out/';
                //m3u8文件名
                $m3u8_file = $video_out_path.$goods_id.'.m3u8';
                //分片文件名
                $ts_file = $video_out_path.$goods_id.'_%03d.ts';
                //分段视频长度
                $ts_second = 20;

                $cmd = "cd storage && ffmpeg -i {$video_file} -codec:v libx264 -codec:a mp3 -map 0 -f ssegment -segment_format mpegts -segment_list {$m3u8_file} -segment_time {$ts_second} {$ts_file}";
                shell_exec($cmd);
                //更新转码状态为完成
                VoderModel::where(['goods_id'=>$goods_id])->update(['status'=>2,'m3u8'=>$m3u8_file]);

				$str = "fiinsh \n";
				file_put_contents("/tmp/11.log",$str,FILE_APPEND);

            }
        }
    }
}
