<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requestbook extends Model
{
    public    $timestamps   = false;
    protected $table        = 'request';
    protected $fillable     = ['userid', 'content', 'categoryid', 'bookname', 'status', 'createdate'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    public $incrementing = false;
}
