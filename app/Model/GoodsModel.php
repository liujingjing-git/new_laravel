<?php

namespace App\Model;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{

     protected $table = 'p_goods';
     protected $primaryKey = "goods_id";
     public $timestamps = false;
     protected $guarded = [];


   


}
