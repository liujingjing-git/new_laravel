<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CollectModel extends Model
{
    protected $table = 'p_collection';
    protected $guarded = []; 
    protected $primaryKey = "id";
    public $timestamps = false;
}
