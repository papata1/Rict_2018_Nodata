<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    

use App\Http\Requests\BrandRequest;
use App\Http\Requests\DeRequest;
use App\initial;
use Illuminate\Support\Facades\DB;
use  Illuminate\Database\Eloquent\Model;

class InController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
    //  $this->middleware('roles');
  }
    public function indexApp(){
        //$app = application_layer::all();
        $brand1 = DB::table('initial')
                    ->where('id',1)
            ->first();
            $brand2 = DB::table('initial')
            ->where('id',2)
            ->first();
        //ddd($brand1);
        return view('initial.inApp', compact('brand1','brand2'));
    }
    public function editApp()
    {
        $brand = DB::table('initial')
                    ->where('id',1)
            ->first();
                
        return view('initial.editApp',compact('brand'));
    }
    public function updateApp()
    {
        $asd = $_POST['initial'];
        DB::table('initial')
            ->where('id',1)
            ->update([
                'initial' => $asd
                    ]);
        $brand1 = DB::table('initial')
            ->where('id',1)
            ->first();
            $brand2 = DB::table('initial')
            ->where('id',2)
            ->first();
        //ddd($brand1);

        return view('initial.inApp',compact('brand1','brand2'))->with('message','item has been updated successfully');
    }
    public function indexDat(){
        //$app = application_layer::all();
        $brand1 = DB::table('initial')
            ->where('id',2)
            ->first();
        //ddd($brand1);
        return view('initial.inDat', compact('brand1'));
    }
    public function editDat()
    {
        $brand1 = DB::table('initial')
            ->where('id',2)
            ->get();
        return view('initial.editDat',compact('brand1'));
    }
    public function updateDat()
    {
        $asd = $_POST['initial'];
        DB::table('initial')
            ->where('id',2)
            ->update([
                'initial' => $asd
            ]);
        $brand1 = DB::table('initial')
            ->where('id',1)
            ->first();
            $brand2 = DB::table('initial')
            ->where('id',2)
            ->first();
        //ddd($brand1);

        return view('initial.inApp',compact('brand1','brand2'))->with('message','item has been updated successfully');
    }

}
