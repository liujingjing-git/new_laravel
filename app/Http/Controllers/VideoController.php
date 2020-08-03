<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\VideoModel;

class VideoController extends Controller
{
    public function codec()
    {
        $data = VideoModel::where(['status'=>0])->orderBy('id','desc')->get()->toArray();
        if($data){
            foreach($data as $k=>$v){
                $goods_id = $v['goods_id'];
               
                VideoModel::where(['goods_id'=>$goods_id])->update(['status'=>1]);  //开始转码  status=1
                
                // 此函数冲刷(flush)所有响应的数据给客户端并结束请求。 这使得客户端结束连接后，需要大量时间运行的任务能够继续运行。
                fastcgi_finish_request();   

                $path = $v['video_path'];
                $new_path = 'new_video/';  //转码后的视频路径
                $m3u8_video = $new_path . $goods_id . '.m3u8';
                $m3u8_ts = $new_path . $goods_id . '_%03d.ts';
                // echo $m3u8_ts;echo "</br>";
                $ts_second = 5;
                
                $cmd = "cd storage && ffmpeg -i {$path} -codec:v libx264 -codec:a mp3 -map 0 -f ssegment -segment_format mpegts -segment_list {$m3u8_video} -segment_time {$ts_second} {$m3u8_ts}";
                shell_exec($cmd);


                VideoModel::where(['goods_id'=>$goods_id])->update(['status'=>2,'m3u8'=>$m3u8_video]);  //开始转码  status=1
            }
        }
    }
}
