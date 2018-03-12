<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application_other extends Model
{
    public $timestamps = false;
    protected $table="application_other";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
