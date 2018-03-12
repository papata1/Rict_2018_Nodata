<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\State;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');  
  }
    public function index(){
      //$app = application_layer::all();
      $place1 = DB::table('state')->get();
      return view('state.index', compact('place1'));
    }
    public function create(){
    return view('/state.create');
    }
    public function store(DeRequest $request)
     {
         State::create($request->all());
        return redirect()->route('state.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit($place)
    {
      //ddd($place);
      $place = State::findOrFail($place);
        return view('state.edit',compact('place'));
    }

    public function update(DeRequest $request,$place)
   {

       //$place->update($request->all());
        $candidate = State::findOrFail($place);
        $input = $request->all();
        $candidate->update($input);
       return redirect()->route('state.index')->with('message','item has been updated successfully');
   }

     public function destroy($place)
     {
        $del = State::findOrFail($place);
        $del->delete();
        return redirect()->route('state.index')->with('message','item has been deleted successfully');
     }
}
