<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartgoryModel extends Model
{
		protected $table = 'p_category';
		protected $primaryKey = "cat_id";
		public $timestamps = false;

}
