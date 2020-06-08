<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     protected $fillable = [
        'id','user_id', 'content', 'bank', 'transaction_no','amount'
    ];
}
