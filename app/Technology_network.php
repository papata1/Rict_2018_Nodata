<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology_network extends Model
{
    public $timestamps = false;
    protected $table="technology_network";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
