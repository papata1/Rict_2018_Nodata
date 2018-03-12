<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_other extends Model
{
    public $timestamps = false;
    protected $table="data_other";
    protected $fillable=['name','data','pic'] ;
    protected $guarded=['id',] ;
} 
