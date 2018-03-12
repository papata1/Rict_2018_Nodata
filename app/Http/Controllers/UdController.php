<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Http\Requests\UdRequest;
use App\Use_data;
use Illuminate\Support\Facades\DB;

class UdController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
      $ud1 = DB::table('use_data')->get();
      return view('ud.index', compact('ud1'));
    }
    public function create(){
    return view('/ud.create');
    }
    public function store(UdRequest $request)
     {
         Use_data::create($request->all());

        return redirect()->route('ud.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit(Use_data $ud)
    {
        return view('ud.edit',compact('ud'));
    }

    public function update(DeRequest $request,Use_data $ud)
   {
       $ud->update($request->all());
       return redirect()->route('ud.index')->with('message','item has been updated successfully');
   }

     public function destroy(Use_data $ud)
     {
         $ud->delete();
        return redirect()->route('ud.index')->with('message','item has been deleted successfully');
     }
}
