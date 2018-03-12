<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application_layer extends Model
{
  public $timestamps = false; 
    protected $table="application_layer";
      protected $fillable=['name','develop_language','app_database','develop_company','getting_start_years','app_relation','remark','ma_cost','department_id','category','state'] ;
        protected $guarded=['id',] ;
}
