<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology_other extends Model
{
    public $timestamps = false;
    protected $table="technology_other";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
