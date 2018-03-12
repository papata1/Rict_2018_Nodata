<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\DeRequest;
use App\Application_other;
use Illuminate\Support\Facades\DB;

class OappController extends Controller
{
  public function __construct()
  {
$this->middleware('auth', ['except' => ['download']]);
  }
    public function index(){
      //$app = application_layer::all();
      $place1 = DB::table('application_other')->get();
      return view('oapp.index', compact('place1'));
    }
    public function create(){
    return view('/oapp.create');
    }
    public function store(DeRequest $request)
     {
       $app =  Application_other::create($request->all());

         if($request->hasFile('data')) {
      $fileName = 'data'.$app->id . '.' .
        $request->file('data')->getClientOriginalExtension();

        $request->file('data')->move(
        base_path() . '/public/images/oapp/', $fileName  );
              $busfile =  DB::table('application_other')
                ->where('id', $app->id)
                  ->update(['data' => $fileName]);
    }
    if($request->hasFile('pic')) {
      $fileName = 'pic'.$app->id . '.' .
        $request->file('pic')->getClientOriginalExtension();

        $request->file('pic')->move(
        base_path() . '/public/images/oapp/', $fileName  );
              $busfile =  DB::table('application_other')
                ->where('id', $app->id)
                  ->update(['pic' => $fileName]);
    }
        return redirect()->route('oapp.index')->with('message','item has been added successfully');
     }

     public function show($id)
     {

     }

     public function edit($place)
    {
      //ddd($place);
      $place = Application_other::findOrFail($place);
        return view('oapp.edit',compact('place'));
    }

    public function update(DeRequest $request,$place)
   {

       //$place->update($request->all());
        $candidate = Application_other::findOrFail($place);
        $input = $request->all();
        $candidate->update($input);

         $i = mt_rand(0,100);
       if($request->hasFile('file')) {

      $fileName = 'edit data'.$place.'-'.$i. '.' .
          $request->file('file')->getClientOriginalExtension();

        $request->file('file')->move(
        base_path() . '/public/images/oapp/', $fileName  );
              $busfile =  DB::table('application_other')
                ->where('id', $place)
                  ->update(['data' => $fileName]);
    }
    if($request->hasFile('pic')) {
      $fileName2 = 'edit pic'.$place.'-'.$i. '.' .
          $request->file('pic')->getClientOriginalExtension();

        $request->file('pic')->move(
        base_path() . '/public/images/oapp/', $fileName2);
           $busfile =  DB::table('application_other')
                ->where('id', $place)
               ->update(['pic' => $fileName2]);
      }
       return redirect()->route('oapp.index')->with('message','item has been updated successfully');
   }

     public function destroy($place)
     {
        $del = Application_other::findOrFail($place);
        $del->delete();
        return redirect()->route('oapp.index')->with('message','item has been deleted successfully');
     }

     public function download($app)
    {
        $filePath = public_path('images/oapp/'.$app);

        if(file_exists($filePath)) {
            $fileName = basename($filePath);
            $fileSize = filesize($filePath);

            // Output headers.
            header("Cache-Control: private");
            header("Content-Type: application/stream");
            header("Content-Disposition: attachment; filename=".$fileName);

            // Output file.
            readfile ($filePath);
            exit();
        }
        else {
            die('The provided file path is not valid.');
        }
    }

}
