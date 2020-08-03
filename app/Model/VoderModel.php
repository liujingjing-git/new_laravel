<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VoderModel extends Model
{
    protected $table = 'p_voder';
    protected $primaryKey = "id";
    public $timestamps = false;
}
