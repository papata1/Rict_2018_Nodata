<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Involved extends Model
{
    public $timestamps = false;
    protected $table="involved";
    protected $fillable=['name','remark'] ;
    protected $guarded=['id',] ;
} 
