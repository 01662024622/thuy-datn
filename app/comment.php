<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public    $timestamps   = false;
    protected $table        = 'comment';
    protected $fillable     = ['userid', 'bookid', 'content', 'createdate', 'active'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    public $incrementing = false;
}
