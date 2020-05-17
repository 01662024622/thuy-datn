<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public    $timestamps   = false;
    protected $table        = 'tag';
    protected $fillable     = ['idbook', 'categoryid', 'status'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
}
