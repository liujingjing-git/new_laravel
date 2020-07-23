<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table = 'p_comments';
    protected $guarded = []; 
    protected $primaryKey = "cid";
    public $timestamps = false;
}
