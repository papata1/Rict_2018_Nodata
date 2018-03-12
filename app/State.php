<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;
    protected $table="state";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
} 
