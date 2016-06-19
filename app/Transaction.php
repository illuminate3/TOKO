<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['product_id', 'formid', 'qty', 'total_price', 'status'];

    public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
