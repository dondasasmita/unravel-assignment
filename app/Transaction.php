<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
		'user_id',
		'stripe_txn_id',
		'amount_paid',
	];
	
}
