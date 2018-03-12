<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_layer extends Model
{
  public $timestamps = false;
    protected $table="data_layer";
      protected $fillable=['name','type','remark','data','data_dic'] ;
        protected $guarded=['id',] ;
} 
