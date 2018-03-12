<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Place;
use App\Http\Requests\TechRequest;
use App\Application_layer;
use App\Business_layer;
use App\Data_layer;
use App\Technology_layer;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DeRequest;

class TechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('roles');
    }

    public function test($t)
    {
        $dd = Brand::pluck('name', 'id')->toArray();
        $tt = Place::pluck('name', 'id')->toArray();
        $tech456 = Brand::pluck('name', 'id')->toArray();
        $bus456  = Place::pluck('name')->toArray();
        $app456 = Application_layer::pluck('name', 'id')->toArray();
        $tech456 = Brand::all();
        $bus456 = Place::all();
        $app456= Application_layer::all();
        return view('tech.create', compact('t','dd','tt', 'app456', 'bus456', 'tech456'));

    }

    public function select($select)
    {
        //$app = application_layer::all();
        $techs = DB::table('technology_layer')->get();
        return view('tech.index', compact('techs'));
    }

    public function index()
    {
        //$app = application_layer::all();
        //$techs = DB::table('technology_layer')->get();
        $techs = DB::table('technology_layer')
            ->leftJoin('brand', 'brand.id', '=', 'technology_layer.brand')
            ->leftJoin('place', 'place.id', '=', 'technology_layer.tech_location')
            ->select('technology_layer.*','brand.name as brand','place.name as tech_location')
            ->get();
        $a = DB::table('technology_relation')
            ->join('application_layer', 'application_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'application_layer.name')
            ->where('frag', 'a')
            ->get();
        $b = DB::table('technology_relation')
            ->join('business_layer', 'business_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'business_layer.name')
            ->where('frag', 'b')
            ->get();
        $d = DB::table('technology_relation')
            ->join('data_layer', 'data_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'data_layer.name')
            ->where('frag', 'd')
            ->get();
        $t = DB::table('technology_relation')
            ->join('technology_layer', 'technology_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'technology_layer.name')
            ->where('frag', 't')
            ->get();
        $p = DB::table('technology_relation')
            ->join('place', 'place.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'place.name')
            ->where('frag', 'lo')
            ->get();
        $br = DB::table('technology_relation')
            ->join('brand', 'brand.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'brand.name')
            ->where('frag', 'br')
            ->get();
        $bs = DB::table('technology_layer')
            ->leftJoin('technology_relation','technology_relation.Technology_layer_id', '=', 'technology_layer.id')
            ->leftJoin('brand','brand.id', '=', 'technology_relation.comp_id')
            ->select('technology_layer.id','brand.name as brand')
            ->where('frag', 'br')
            ->get();
  
        return view('tech.index', compact('techs', 'a', 'b', 'd', 't', 'p', 'br', 'bs'));
    }

    public function create()
    {
        //noooooooooooooooo
        $dd = Brand::pluck('name', 'id');
        $tt = Place::pluck('name', 'id');
        return view('tech.create', compact('dd', 'tt'));


    }

    public function store(TechRequest $request)
    {
        // $tech = new Technology_layer(array(
        //     'name' => $request->get('name'),
        //     'brand' => $request->get('brand'),
        //     'model' => $request->get('model'),
        //     'tech_spec' => $request->get('tech_spec'),
        //     'amount' => $request->get('amount'),
        //     'operating_system' => $request->get('operating_system'),
        //     'cpu_use' => $request->get('cpu_use'),
        //     'memory_total' => $request->get('memory_total'),
        //     'memory_used' => $request->get('memory_used'),
        //     'hardisk_total' => $request->get('hardisk_total'),
        //     'hardisk_used' => $request->get('hardisk_used'),
        //     'utility_app' => $request->get('utility_app'),
        //     'tech_location' => $request->get('tech_location'),
        //     'ma_cost' => $request->get('ma_cost'),
        //     'remark' => $request->get('remark'),
        //     'owner' => $request->get('onwer'),
        //     'type' => $request->get('type'),

        // ));
        // $tech->save(); 
         $tech = Technology_layer::create($request->all());
        $brand =  $request->get('brand');
        $tech_location =  $request->get('tech_location');
        if ($tech_location != null){
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $tech_location, 'frag' => 'lo']
            );}
        if ($brand != null){
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $brand, 'frag' => 'br']
            );}
        //  Technology_layer::create($request->all());

        $bus = $request->get('bus2') ;
        $buss = json_decode($bus, TRUE);
        $techs = $request->get('tech2') ;
        $techss = json_decode($techs, TRUE);
        $apps = $request->get('app2') ;
        $appss = json_decode($apps, TRUE);
        foreach ((array) $appss as $ap) {
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $ap, 'frag' => 'a']
            );
        }
        DB::table('technology_layer')
            ->where('id', $tech->id)
            ->update(['attr_id' => $tech->id]);
        if ($request->hasFile('file')) {
            $fileName = $tech->id . '.' .
                $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                base_path() . '/public/images/tech/', $fileName

            );
            $appfile = DB::table('technology_layer')
                ->where('id', $tech->id)
                ->update(['file' => $fileName,]);



        $type = DB::table('technology_layer')
            ->where('id', $tech->id)
            ->update(['type' => $request->get('type')]);
        }

        //Technology_layer::create($request->all());
        return redirect()->route('tech.index')->with('message', 'item has been added successfully');

    }

    public function show($id)
    {

    }

    public function relation($app)
    {
        $apps = application_layer::all();
        // DB::setFetchMode(PDO::FETCH_ASSOC);
        $aq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('technology_layer_id', $app)
            ->get();
        /*$buss = Business_layer::all();
        $bq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('technology_layer_id', $app)
            ->get();
        $dats = Data_layer::all();
        $dq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('technology_layer_id', $app)
            ->get();
        $techs = Technology_layer::all();
        $tq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('technology_layer_id', $app)
            ->get();*/

            $tps = Brand::all();
            $tp1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'br')
            ->where('technology_layer_id', $app)
            ->get();
             $des = Place::all();
             $de1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $app)
            ->get();
        return view('tech.addrelation', compact('app'), compact('apps','aq1','tps','tp1','des','de1'));
    }

    public function addrelation()
    {
        $id = $_POST['id'];
        $ar = json_decode($_POST['ar'], true);
        foreach ($ar as $app) {
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $id, 'comp_id' => $app, 'frag' => 'a']
            );
        }
        $tpr = json_decode($_POST['tpr'], true);
      
        foreach($tpr as  $tpr3){
            DB::table('technology_relation')->insert(
                ['technology_layer_id' =>$id,'comp_id' => $tpr3 ,'frag' => 'br']
            );
        }
        $der = json_decode($_POST['der'], true);

        foreach($der as  $der3){
            DB::table('technology_relation')->insert(
                ['technology_layer_id' =>$id,'comp_id' => $der3 ,'frag' => 'lo']
            );
        }


        //$a = $str[1];
        return redirect()->route('tech.index')->with('message', 'relation has been create successfully');
    }
    public function movet()
    {
        /*$asd = $_POST['a'];
        //$id1q = $_POST['bus'];
        $num1 = json_decode($_POST['json'], true);
        if ($num1[0] != null) {
            $num = $num1[0];
            DB::table('technology_layer')
                ->where('attr_id', $asd)
                ->update(['attr_id' => $num]);
            DB::table('technology_layer')
                ->where('attr_id','>', $num)
                ->increment('attr_id');
            /*DB::table('technology_layer')
                ->where('id', $num)
                ->update(['id' => 9999]);
            DB::table('technology_layer')
                ->where('id', $asd)
                ->update(['id' => $num]);
            DB::table('technology_layer')
                ->where('id', 9999)
                ->update(['id' => $asd]);*/
                $asd = $_POST['a'];
                $b = $_POST['b'];
                //$id1q = $_POST['bus'];
                $num1 = json_decode($_POST['json'], true);
                if ($num1[0] != null) {
                    $num = $num1[0];
                    if($num<$asd){
                    //$num2 = $num++;
                    DB::table('technology_layer')
                        ->where('attr_id', $asd)
                        ->update(['attr_id' => $num]);
                    DB::table('technology_layer')
                        ->where('attr_id','>', $num)
                        ->increment('attr_id');
                     $n = DB::table('technology_layer')
                            ->where('attr_id', $num)
                            ->where('id','<>', $b)
                            ->first();
                            $num2 = $num1[0];
                            $num2++;
                            DB::table('technology_layer')
                                ->where('id', $n->id)
                                ->update(['attr_id' => $num2]);
              }else{
                      DB::table('technology_layer')
                          ->where('attr_id', $asd)
                          ->update(['attr_id' => $num]);
                      DB::table('technology_layer')
                          ->where('attr_id','<', $num)
                          ->decrement('attr_id');
                       $n = DB::table('technology_layer')
                              ->where('attr_id', $num)
                              ->where('id','<>', $b)
                              ->first();
                              $num3 = $num1[0];
                              $num3--;
                              DB::table('technology_layer')
                                  ->where('id', $n->id)
                                  ->update(['attr_id' => $num3]);
          }
            return redirect()->route('tech.index')->with('message', 'item has been move successfully');
        }
    }
    public function moveup($tech)
    {
        $idapp = $tech;
        $idapp--;
        DB::table('technology_layer')
            ->where('attr_id', $tech)
            ->update(['attr_id' => 9999]);
        DB::table('technology_layer')
            ->where('attr_id', $idapp)
            ->update(['attr_id' => $tech]);
        DB::table('technology_layer')
            ->where('attr_id', 9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('tech.index')->with('message', 'item has been move successfully');
    }

    public function movedown($tech)
    {
        $idapp = $tech;
        $idapp++;
        DB::table('technology_layer')
            ->where('attr_id', $tech)
            ->update(['attr_id' => 9999]);
        DB::table('technology_layer')
            ->where('attr_id', $idapp)
            ->update(['attr_id' => $tech]);
        DB::table('technology_layer')
            ->where('attr_id', 9999)
            ->update(['attr_id' => $idapp]);
        return redirect()->route('tech.index')->with('message', 'item has been move successfully');
    }

    public function edit(Technology_layer $tech)
    {
        $aps = DB::table('technology_relation')
            ->join( 'application_layer','application_layer.id', '=', 'technology_relation.comp_id')
            ->where('technology_layer_id', $tech->id)
            ->where('frag', 'a')
            ->select('application_layer.name','technology_relation.*')
            ->get();
        $ts = DB::table('technology_relation')
            ->join('brand', 'brand.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'brand.name')
            ->where('frag', 'br')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $bs = DB::table('technology_relation')
            ->join('place', 'place.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'place.name')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $tech->id)
            ->get();
        // ddd($ts);
        $apps = Application_layer::all();
        $aq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $techs = Brand::all();
        $tq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'br')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $buss = Place::all();
        $bq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $tech->id)
            ->get();
       // ddd($aq1);
        $dd = Brand::pluck('name', 'id')->toArray();
        $tt = Place::pluck('name', 'id')->toArray();

        return view('tech.edit', compact('tech','dd','tt','aps','ts','bs','apps','aq1','techs','tq1','buss','bq1','techs'));
    }

    public function update(DeRequest $request, Technology_layer $tech)
    {
        $i = mt_rand(0,100);
        $tech1 = DB::table('technology_layer')
            ->where('id', $tech->id)
            ->update([
                'name' => $request->get('name'),
                'brand' => $request->get('brand'),
            'model' => $request->get('model'),
            'tech_spec' => $request->get('tech_spec'),
            'amount' => $request->get('amount'),
            'operating_system' => $request->get('operating_system'),
            'cpu_use' => $request->get('cpu_use'),
            'memory_total' => $request->get('memory_total'),
            'memory_used' => $request->get('memory_used'),
            'hardisk_total' => $request->get('hardisk_total'),
            'hardisk_used' => $request->get('hardisk_used'),
            'utility_app' => $request->get('utility_app'),
            'tech_location' => $request->get('tech_location'),
            'ma_cost' => $request->get('ma_cost'),
            'remark' => $request->get('remark'),
            'owner' => $request->get('owner'),
            ]);
        $brand =  $request->get('brand');
        $tech_location =  $request->get('tech_location');
        if ($tech_location != null && $tech->tech_location !=$tech_location){
            DB::table('technology_relation')->where(['technology_layer_id' => $tech->id,'frag' => 'lo'])->delete();
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $tech_location, 'frag' => 'lo']
            );}
        if ($brand != null&& $tech->brand !=$brand){
            DB::table('technology_relation')->where(['technology_layer_id'=>$tech->id,'frag' => 'br'])->delete();
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $brand, 'frag' => 'br']
            );}
        $bus = $request->get('bus2') ;
        $buss = json_decode($bus, TRUE);
        $techs = $request->get('tech2') ;
        $techss = json_decode($techs, TRUE);
        $apps = $request->get('app2') ;
        $appss = json_decode($apps, TRUE);
        foreach ((array) $appss as $ap) {
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $ap, 'frag' => 'a']
            );
        }
        foreach ((array) $buss as $bus) {
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $bus, 'frag' => 'lo']
            );
        }
        foreach ((array) $techss as $techs) {
            DB::table('technology_relation')->insert(
                ['technology_layer_id' => $tech->id, 'comp_id' => $techs, 'frag' => 'br']
            );
        }
        //  $tech->update($request->all());
        if ($request->hasFile('file')) {
            $fileName = 'edit'.$tech->id.'-'.$i. '.' .
                $request->file('file')->getClientOriginalExtension();
            $fileName1 = $tech->id . '.' .
                $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                base_path() . '/public/images/tech/', $fileName

            );
            $techfile1 = DB::table('technology_layer')
                ->where('id', $tech->id)
                ->update(['file' => $fileName]);

        }
        //$app->update($request->all());

        // $tech->update($request->all());
 DB::table('technology_relation')->where('id',$request->get('q'))->delete();
        if ($request->get('q')) {
           return redirect()->route('tech.edit',$tech->id);
      }
        return redirect()->route('tech.index')->with('message', 'item has been updated successfully');
    }

    public function destroy(Technology_layer $tech)
    {
        $tech->delete();
        return redirect()->route('tech.index')->with('message', 'item has been deleted successfully');
    }

    public function delt($tech,$q = null)
    {
       
        DB::table('technology_relation')->where('id', $q)->delete();
        $techs = DB::table('technology_layer')->get();
        $a = DB::table('technology_relation')
            ->join('application_layer', 'application_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'application_layer.name')
            ->where('frag', 'a')
            ->where('technology_layer_id', $tech)
            ->get();
        $b = DB::table('technology_relation')
            ->join('business_layer', 'business_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'business_layer.name')
            ->where('frag', 'b')
            ->where('technology_layer_id', $tech)
            ->get();
        $d = DB::table('technology_relation')
            ->join('data_layer', 'data_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'data_layer.name')
            ->where('frag', 'd')
            ->where('technology_layer_id', $tech)
            ->get();
        $t = DB::table('technology_relation')
            ->join('technology_layer', 'technology_layer.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'technology_layer.name')
            ->where('frag', 't')
            ->where('technology_layer_id', $tech)
            ->get();
             $p = DB::table('technology_relation')
            ->join('place', 'place.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'place.name')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $tech)
            ->get();

            $br = DB::table('technology_relation')
            ->join('brand', 'brand.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'brand.name')
            ->where('frag', 'br')
            ->where('technology_layer_id', $tech)
            ->get();

        return view('tech.rela', compact('tech', 'a', 'b', 'd', 't', 'p', 'br'));
        //return redirect()->route('app.index');

    }
    public function dep(Technology_layer $tech,$q=null)
    {
        DB::table('technology_relation')->where('id', $q)->delete();
        $aps = DB::table('technology_relation')
            ->join( 'application_layer','application_layer.id', '=', 'technology_relation.comp_id')
            ->where('technology_layer_id', $tech->id)
            ->where('frag', 'a')
            ->select('application_layer.name','technology_relation.*')
            ->get();
        $ts = DB::table('technology_relation')
            ->join('brand', 'brand.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'brand.name')
            ->where('frag', 'br')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $bs = DB::table('technology_relation')
            ->join('place', 'place.id', '=', 'technology_relation.comp_id')
            ->select('technology_relation.*', 'place.name')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $tech->id)
            ->get();
        // ddd($ts);
        $apps = Application_layer::all();
        $aq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $techs = Brand::all();
        $tq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'br')
            ->where('technology_layer_id', $tech->id)
            ->get();
        $buss = Place::all();
        $bq1 = DB::table('technology_relation')
            ->select('comp_id')
            ->where('frag', 'lo')
            ->where('technology_layer_id', $tech->id)
            ->get();
        // ddd($aq1);
        $dd = Brand::pluck('name', 'id')->toArray();
        $tt = Place::pluck('name', 'id')->toArray();

        return view('tech.edit', compact('tech','dd','tt','aps','ts','bs','apps','aq1','techs','tq1','buss','bq1','techs'));
    }
    public function download($tech)
    {
        $filePath = public_path('images/tech/'.$tech);

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
