<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology_bulid extends Model
{
    public $timestamps = false;
    protected $table="technology_bulid";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
