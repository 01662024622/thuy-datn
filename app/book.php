<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public    $timestamps   = false;
    protected $table        = 'book';
    protected $fillable     = ['code', 'author', 'uploadby', 'name', 'chaptotal', 'description', 'image', 'viewcount', 'followcount', 'uploaddate', 'active'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';
    
}
