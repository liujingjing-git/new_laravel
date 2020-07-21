<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
        protected $table = 'order_info';
        protected $primaryKey = "order_id";
        public $timestamps = false;
        protected $guarded = [];
}
