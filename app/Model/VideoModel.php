<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    protected $table = 'p_video';
    protected $guarded = []; 
    protected $primaryKey = "id";
    public $timestamps = false;
}
