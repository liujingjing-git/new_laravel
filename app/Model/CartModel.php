<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'p_cart';
    protected $primaryKey = "cart_id";
    public $timestamps = false;
    protected $guarded = [];
}
