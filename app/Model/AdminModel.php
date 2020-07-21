<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
		protected $table = 'p_users';
		     protected $primaryKey = "user_id";
		     public $timestamps = false;
}
