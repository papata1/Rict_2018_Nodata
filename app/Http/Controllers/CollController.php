<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\CollRequest;
use App\Type_collection;
use Illuminate\Support\Facades\DB;

class CollController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
      $coll1 = DB::table('type_collection')->get();
      return view('coll.index', compact('coll1'));
    }
    public function create(){
    return view('/coll.create');
    }
    public function store(CollRequest $request)
     {
         Type_collection::create($request->all());
        return redirect()->route('coll.index')->with('message','item has been added successfully');
     }
     public function edit(Type_collection $coll)
    {
        return view('coll.edit',compact('coll'));
    }

    public function update(DeRequest $request,Type_collection $coll)
   {
       $coll->update($request->all());
       return redirect()->route('coll.index')->with('message','item has been updated successfully');
   }

     public function destroy(Type_collection $coll)
     {
        $coll->delete();
        return redirect()->route('coll.index')->with('message','item has been deleted successfully');
     }
}
