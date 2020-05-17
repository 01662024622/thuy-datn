<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chap extends Model
{
    public    $timestamps   = false;
    protected $table        = 'chap';
    protected $fillable     = ['idbook', 'chapnumber', 'filename', 'description', 'createdate', 'active'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    public $incrementing = false;
}
