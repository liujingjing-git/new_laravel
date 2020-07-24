<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Model\UserModel;

class Controller extends BaseController
{
    public function json($errorNo = 0, $errorMsg = '', $data= '')
    {
        $return = array('error_no' => $errorNo, 'error_msg' => $errorMsg, 'data' => $data);
        return json_encode($return);
    }

    public function userId(){
        $user_name = session('user_name');
        $user_id = UserModel::where(['user_name'=>$user_name])->value('user_id');
        return $user_id;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
