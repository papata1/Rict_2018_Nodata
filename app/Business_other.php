<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_other extends Model
{
    public $timestamps = false;
    protected $table="business_other";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
