<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    public    $timestamps   = false;
    protected $table        = 'follow';
    protected $fillable     = ['userid', 'bookid',  'createdate', 'status'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    public $incrementing = false;
}
