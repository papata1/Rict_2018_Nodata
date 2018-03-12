<?php

namespace App\Http\Controllers;
use App\Http\Requests\DeRequest;
use App\Develop_language;
use PDO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BusRequest;
use App\Application_layer;
use App\Business_layer;
use App\Data_layer;
use App\Technology_layer;
use App\Department;
use App\Type_process;
use App\Business_relation;
use app\Bus_depart;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('roles');
    }

    public function index()
    {
          
        //$bus = Business_layer::all();
        //$path=Storage::get('images/bus/');
        $buss = DB::table('business_layer')
            ->leftJoin('type_process', 'type_process.id', '=', 'business_layer.type')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer.*','type_process.name as type1'
            ,'business_layer.remark as remark'
            ,'business_layer_lv2.short as lv2','business_layer_lv1.short as lv1','business_layer_lv3.short as lv3'
            ,'business_layer_lv2.name as n2','business_layer_lv1.name as n1','business_layer_lv3.name as n3')
            ->get()
            ->toArray();
            //$lastElement = end($buss);
            //ddd($lastElement->id);
        $des = DB::table('business_layer')
            ->leftJoin('business_relation','business_relation.business_layer_id', '=', 'business_layer.id')
            ->leftJoin('department','department.id', '=', 'business_relation.comp_id')
            ->select('business_layer.id','department.name as department_id')
            ->where('frag', 'dp')
            ->get();
        $list = Department::pluck('name', 'id');
        $a = DB::table('business_relation')
            ->join('application_layer', 'application_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.business_layer_id', 'application_layer.name')
            ->where('frag', 'a')
            ->get();
        $b = DB::table('business_relation')
            ->join('business_layer', 'business_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.business_layer_id', 'business_layer.name')
            ->where('frag', 'b')
            ->get();
        $d = DB::table('business_relation')
            ->join('data_layer', 'data_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.business_layer_id', 'data_layer.name')
            ->where('frag', 'd')
            ->get();
        $t = DB::table('business_relation')
            ->join('technology_layer', 'technology_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.business_layer_id', 'technology_layer.name')
            ->where('frag', 't')
            ->get();
            $de = DB::table('business_relation')
            ->join('department', 'department.id', '=', 'business_relation.comp_id')
            ->select('business_relation.business_layer_id', 'department.name')
            ->where('frag', 'dp')
            ->get();

                $tp = DB::table('type_process_relation')
                    ->join('application_layer','application_layer.id', '=', 'type_process_relation.type_process_id')
                    ->join('type_process','type_process.id', '=', 'type_process_relation.comp_id')
                    ->select('type_process_relation.type_process_id','type_process.name','type_process.remark')
                    ->where('frag','b')
                    ->get();

        //$buss = DB::table('business_layer')->get();

        return view('bus.index', compact('buss', 'a', 'b', 'd', 't', 'des', 'de', 'tp'));
    }

    public function create()
    {
        $items = Department::pluck('name', 'id')->toArray();
        $items = Department::all();
        $list = Type_process::pluck('name', 'id')->toArray();
       // $list = Type_process::all();
        $app456 = Application_layer::pluck('name', 'id')->toArray();
        $app456 = Application_layer::all();
        $data456 = Data_layer::pluck('name', 'id')->toArray();
        $data456 = Data_layer::all();

        $lvtest = DB::table('business_layer_lv3')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->where('business_layer_lv1.select_lv','0')
            ->select('business_layer_lv3.id as idv3','business_layer_lv3.name as lv3','business_layer_lv2.name as lv2','business_layer_lv1.name as lv1')
            ->get();

      //ddd($lvtest);
	if ($lvtest->isEmpty()) {
          return view('errors.503');
      }
      foreach($lvtest as $key => $value){

      $lv[$value->idv3] = $value->lv1."-".$value->lv2."-".$value->lv3;

      }

        //return view('app.create', compact('id', 'items'));
        return view('bus.create', compact('items','list','app456','data456','lv'));
    }

    public function store(BusRequest $request)
    {
        //Business_layer::create($request->all());
      //  $len = sizeof($des); 
       $bus = new business_layer(array(
            'name' => $request->get('name'),
            'remark' => $request->get('remark'),
            //'type' => $request->get('type'),
            'lv3_id' => $request->get('lv3_id'),
           // 'department_id' => $request->get('department_id') 
        ));
        // $bus = DB::table('business_layer')->insert([
        //     'name' => $request->get('name'),
        //     'remark' => $request->get('remark'),
        //     'type' => $request->get('type'),
        //     'lv3_id' => $request->get('lv3_id'),
        //     ]);
        $bus->save();

               $model = DB::table('business_layer')
            ->leftJoin('type_process', 'type_process.id', '=', 'business_layer.type')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer.*','business_layer.type as bltype','business_layer.remark as blremark','business_layer.name as blname','business_layer.id as blid','business_layer.id as blids',
            'type_process.name as typee','type_process.remark as pfix'
            ,'business_layer_lv2.short as lv2','business_layer_lv2.name as n2','business_layer_lv2.id as id2'
            ,'business_layer_lv1.short as lv1','business_layer_lv1.name as n1','business_layer_lv1.id as id1'
            ,'business_layer_lv3.short as lv3','business_layer_lv3.name as n3','business_layer_lv3.id as id3'
            )
            ->get();
            //ddd($model);
            $a=1;
            $w ="";


            foreach($model as $model1){
            
                if ($model1->blids == $bus->id) {
                    if ($model1->ids == null) {
                       DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['short_name' => $model1->lv1.$model1->lv2.$model1->lv3]);
                    }
                }
            }
            $model2 = DB::table('business_layer')
            ->leftJoin('type_process', 'type_process.id', '=', 'business_layer.type')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer.*','business_layer.type as bltype','business_layer.remark as blremark','business_layer.name as blname','business_layer.id as blid','business_layer.id as blids',
            'type_process.name as typee','type_process.remark as pfix'
            ,'business_layer_lv2.short as lv2','business_layer_lv2.name as n2','business_layer_lv2.id as id2'
            ,'business_layer_lv1.short as lv1','business_layer_lv1.name as n1','business_layer_lv1.id as id1'
            ,'business_layer_lv3.short as lv3','business_layer_lv3.name as n3','business_layer_lv3.id as id3')
            ->where('business_layer.id',$bus->id)
            ->first();
            // //ddd($model2->short_name);
            //  foreach($model as $model3){
            //     if ($model2->short_name == $model3->lv1.$model3->lv2.$model3->lv3) {
            //        $a++;
            //     }
            // }
            //       //ddd($a);
            //  DB::table('business_layer')
            //     ->where('id', $bus->id)
            //     ->update(['id_s' => $a]);

        $max = DB::table('business_layer')
            ->where('short_name',$model2->short_name)
            ->select('ids')
            ->max('ids');
        $max++;
        //ddd($max);
        DB::table('business_layer')
            ->where('id', $bus->id)
            ->update(['ids' => $max]);
        /* $bus2 = new Bus_depart(array(
             'id_bus' =>$bus->id,
             'department_id' => $request->get('remark'),
             // 'department_id' => $request->get('department_id')
         ));
        $bus2->save();*/
       // ddd($des);
      /*  for ($i=0;$i<$len;$i++){
            DB::table('bus_depart')->insert(
                ['id_bus' => $bus->id,'department_id' => $des[$i]]
            );
        }
  */
        $des = $request->get('department') ;
        $dess = json_decode($des, TRUE);
        $apps = $request->get('app2') ;
        $appss = json_decode($apps, TRUE);
        $datas = $request->get('data2') ;
        $datass = json_decode($datas, TRUE);
       // ddd($dess,$appss,$datass,$bus->id);
        foreach ((array) $dess as $de) {
            DB::table('bus_depart')->insert(
                ['id_bus' => $bus->id,'department_id' => $de]
            );
        }
        foreach ((array) $dess as $de) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $de, 'frag' => 'dp']
            );
        }
        foreach ((array) $appss as $ap) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $ap, 'frag' => 'a']
            );
        }
        foreach ((array) $datass as $da) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $da, 'frag' => 'd']
            );
        }


            if ($request->hasFile('file')) {
            $fileName = $bus->id . '.' .
                $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                base_path() . '/public/images/bus/', $fileName

            );
            $busfile = DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['workflow_path' => $fileName]);
        }
          if ($request->hasFile('dic')) {
            $fileName1 = 'dic'.$bus->id . '.' .
                $request->file('dic')->getClientOriginalExtension();

            $request->file('dic')->move(
                base_path() . '/public/images/bus/', $fileName1

            );
            $busfile = DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['workflow_file' => $fileName1]);
        }

        //Business_layer::create($request->all());
        return redirect()->route('bus.index')->with('message', 'item has been added successfully');

    }

    public function show($id)
    {

    }

    public function relation($app)
    {
         $apps = application_layer::all();
     // DB::setFetchMode(PDO::FETCH_ASSOC);
        $aq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('business_layer_id', $app)
            ->get();/*
       $buss = Business_layer::all();
        $bq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'b')
            ->where('business_layer_id', $app)
            ->get();*/
        $dats = Data_layer::all();
        $dq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('business_layer_id', $app)
            ->get();
       /* $techs = Technology_layer::all();
        $tq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 't')
            ->where('business_layer_id', $app)
            ->get();*/
      /* $tps = type_process::all();
       $tp1 = DB::table('type_process_relation')
                ->select('comp_id')
                ->where('frag', 'b')
                ->where('type_process_id', $app)
                ->get();*/
        $des = department::all();
        $de1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'dp')
            ->where('business_layer_id', $app)
            ->get();
       // return redirect()->route('bus.index')->with('message',$bq1);
         return view('bus.addrelation', compact('app'), compact('aqe','dats','apps','dq1','aq1','tps','tp1','des','de1'));
    }

    public function addrelation()
    {

        $id = $_POST['id'];
        $ar = json_decode($_POST['ar'], true);
        foreach ($ar as $app) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $id, 'comp_id' => $app, 'frag' => 'a']
            );
        }/*
        $br = json_decode($_POST['br'], true);
        foreach ($br as $bus) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $id, 'comp_id' => $bus, 'frag' => 'b']
            );
        }*/
        $dr = json_decode($_POST['dr'], true);
        foreach ($dr as $dat) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $id, 'comp_id' => $dat, 'frag' => 'd']
            );
        }
       /* $tr = json_decode($_POST['tr'], true);
        foreach ($tr as $tech) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $id, 'comp_id' => $tech, 'frag' => 't']
            );
        }*/
        /*$tpr = json_decode($_POST['tpr'], true);
        foreach($tpr as  $tpr2){
            DB::table('type_process_relation')->insert(
                ['type_process_id' =>$id,'comp_id' => $tpr2 ,'frag' => 'b']
            );
        }*/
        $der = json_decode($_POST['der'], true);
       /* foreach($der as  $der2){
            DB::table('department_relation')->insert(
                ['department_id' =>$id,'comp_id' => $der2 ,'frag' => 'b']
            );
        }*/
        foreach($der as  $der3){
            DB::table('business_relation')->insert(
                ['business_layer_id' =>$id,'comp_id' => $der3 ,'frag' => 'dp']
            );
        }
        //$a = $str[1];
        return redirect()->route('bus.index')->with('message', 'relation has been create successfully');
    }

    public function moveb()
    {
                $asd = $_POST['a'];
                $b = $_POST['b'];
                //$id1q = $_POST['bus'];
                $num1 = json_decode($_POST['json'], true);
                if ($num1[0] != null) {
                    $num = $num1[0];
                    if($num<$asd){
                    //$num2 = $num++;
                    DB::table('business_layer')
                        ->where('attr_id', $asd)
                        ->update(['attr_id' => $num]);
                    DB::table('business_layer')
                        ->where('attr_id','>', $num)
                        ->increment('attr_id');
                     $n = DB::table('business_layer')
                            ->where('attr_id', $num)
                            ->where('id','<>', $b)
                            ->first();
                            $num2 = $num1[0];
                            $num2++;
                            DB::table('business_layer')
                                ->where('id', $n->id)
                                ->update(['attr_id' => $num2]);
              }else{
                      DB::table('business_layer')
                          ->where('attr_id', $asd)
                          ->update(['attr_id' => $num]);
                      DB::table('business_layer')
                          ->where('attr_id','<', $num)
                          ->decrement('attr_id');
                       $n = DB::table('business_layer')
                              ->where('attr_id', $num)
                              ->where('id','<>', $b)
                              ->first();
                              $num3 = $num1[0];
                              $num3--;
                              DB::table('business_layer')
                                  ->where('id', $n->id)
                                  ->update(['attr_id' => $num3]);
          }

            return redirect()->route('bus.index')->with('message', 'item has been move successfully');
        }
    }
    public function edit(Business_layer $bus)
    {
        



        $aps = DB::table('business_relation')
            ->join( 'application_layer','application_layer.id', '=', 'business_relation.comp_id')
            ->where('business_layer_id', $bus->id)
            ->where('frag', 'a')
            ->select('application_layer.name','business_relation.*')
            ->get();
        $dats = Data_layer::all();
        $dq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'd')
            ->where('business_layer_id', $bus->id)
            ->get();
        $apps = application_layer::all();
        // DB::setFetchMode(PDO::FETCH_ASSOC);
        $aq1 = DB::table('business_relation')
            ->select('comp_id')
            ->where('frag', 'a')
            ->where('business_layer_id', $bus->id)
            ->get();
       // ddd($aq1);
        $ds = DB::table('business_relation')
            ->join('data_layer', 'data_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'data_layer.name')
            ->where('frag', 'd')
            ->where('business_layer_id', $bus->id)
            ->get();

        //----------------------------relation------------------------------------//
        $list = Type_process::pluck('name', 'id')->toArray();
        $items = DB::table('department')
            ->get();
        $its = DB::table('business_relation')
             ->join( 'department','department.id', '=', 'business_relation.comp_id')
            ->where('business_layer_id', $bus->id)
            ->where('frag', 'dp')
            ->select('department.name','business_relation.*')
            ->get();


        $lvtest = DB::table('business_layer_lv3')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->where('business_layer_lv1.select_lv','0')
            ->select('business_layer_lv3.id as idv3','business_layer_lv3.name as lv3','business_layer_lv2.name as lv2','business_layer_lv1.name as lv1')
            ->get();
            $buss = DB::table('business_layer')
            ->leftJoin('type_process', 'type_process.id', '=', 'business_layer.type')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->where('business_layer.id', $bus->id)
            ->select('business_layer.*','type_process.name as type1','type_process.remark as remark'
            ,'business_layer_lv2.short as lv2','business_layer_lv1.short as lv1','business_layer_lv3.short as lv3'
            ,'business_layer_lv2.name as n2','business_layer_lv1.name as n1','business_layer_lv3.name as n3')
            ->first();

      
      foreach($lvtest as $key => $value){

      $lv[$value->idv3] = $value->lv1."-".$value->lv2."-".$value->lv3;

      }
        return view('bus.edit', compact('lv','bus', 'items', 'its', 'id', 'apps', 'aps', 'b', 'ds','t','list', 'aq1', 'dats','dq1','buss'));
    }

    public function update(DeRequest $request, Business_layer $bus)
    {


        
      $i = mt_rand(0,100);

        $bus1 = DB::table('business_layer')
            ->where('id', $bus->id)
            ->update(['name' => $request->get('name'), 'remark' => $request->get('remark'), 'lv3_id' => $request->get('lv3_id')]);
        $bus2 = DB::table('business_layer')
            ->where('id', $bus->id)
            ->get();
        $des = $request->get('department') ;
        $dess = json_decode($des, TRUE);
        $apps = $request->get('app2') ;
        $appss = json_decode($apps, TRUE);
        $datas = $request->get('data2') ;
        $datass = json_decode($datas, TRUE);
        foreach ((array) $dess as $de) {
            DB::table('bus_depart')->insert(
                ['id_bus' => $bus->id,'department_id' => $de]
            );
        }
        foreach ((array) $dess as $de) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $de, 'frag' => 'dp']
            );
        }
        foreach ((array) $appss as $ap) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $ap, 'frag' => 'a']
            );
        }
        foreach ((array) $datass as $da) {
            DB::table('business_relation')->insert(
                ['business_layer_id' => $bus->id, 'comp_id' => $da, 'frag' => 'd']
            );
        }
       

        if ($request->hasFile('file')) {
            $fileName = 'edit'.$bus->id.'-'.$i. '.' .
                $request->file('file')->getClientOriginalExtension();
            $fileName1 = $bus->id . '.' .
                $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                base_path() . '/public/images/bus/', $fileName

            );

            $busfile1 = DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['workflow_path' => $fileName]);
        }
        
        if ($request->hasFile('dic')) {
            $fileName = 'dic_edit'.$bus->id.'-'.$i. '.' .
                $request->file('dic')->getClientOriginalExtension();
            $fileName1 = $bus->id . '.' .
                $request->file('dic')->getClientOriginalExtension();

            $request->file('dic')->move(
                base_path() . '/public/images/bus/', $fileName

            );

            $busfile1 = DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['workflow_file' => $fileName]);
        }

          $b =  $request->get('short');
        $model1 = DB::table('business_layer')
            ->leftJoin('type_process', 'type_process.id', '=', 'business_layer.type')
            ->leftJoin('business_layer_lv3','business_layer_lv3.id', '=', 'business_layer.lv3_id')
            ->leftJoin('business_layer_lv2','business_layer_lv2.id', '=', 'business_layer_lv3.lv2_id')
            ->leftJoin('business_layer_lv1','business_layer_lv1.id', '=', 'business_layer_lv2.lv1_id')
            ->select('business_layer.*','business_layer.type as bltype','business_layer.remark as blremark','business_layer.name as blname','business_layer.id as blid','business_layer.id as blids',
            'type_process.name as typee','type_process.remark as pfix'
            ,'business_layer_lv2.short as lv2','business_layer_lv2.name as n2','business_layer_lv2.id as id2'
            ,'business_layer_lv1.short as lv1','business_layer_lv1.name as n1','business_layer_lv1.id as id1'
            ,'business_layer_lv3.short as lv3','business_layer_lv3.name as n3','business_layer_lv3.id as id3')
            ->where('business_layer.id',$bus->id)
            ->first();
            $newname = $model1->lv1.$model1->lv2.$model1->lv3;
            if ($b != $newname) {
               
            $max = DB::table('business_layer')
            ->where('short_name',$newname)
            ->select('ids')
            ->max('ids');
            $max++;
            //ddd($max);
            DB::table('business_layer')
            ->where('id', $bus->id)
            ->update(['ids' => $max]);

            DB::table('business_layer')
                ->where('id', $bus->id)
                ->update(['short_name' => $newname]);
                
            }
            //ddd($b,$oldname);
            // //ddd($model2->short_name);
            //  foreach($model as $model3){
            //     if ($model2->short_name == $model3->lv1.$model3->lv2.$model3->lv3) {
            //        $a++;
            //     }
            // }
            //       //ddd($a);
             

        
DB::table('business_relation')->where('id', $request->get('q'))->delete();
      if ($request->get('q')) {
           return redirect()->route('bus.edit',$bus->id);
      }
        //$bus->update($request->all());
        return redirect()->route('bus.index')->with('message', 'item has been updated successfully');
    }

    public function destroy(Business_layer $bus)
    {
        $bus->delete();
        return redirect()->route('bus.index')->with('message', 'item has been deleted successfully');
    }

    public function delete(Business_layer $bus, $q)
    {
        DB::table('business_relation')->where('id', $q)->delete();
        $a = DB::table('business_relation')
            ->join('application_layer', 'application_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'application_layer.name')
            ->where('frag', 'a')
            ->where('business_layer_id', $bus->id)
            ->get();
        $b = DB::table('business_relation')
            ->join('business_layer', 'business_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'business_layer.name')
            ->where('frag', 'b')
            ->where('business_layer_id', $bus->id)
            ->get();
        $d = DB::table('business_relation')
            ->join('data_layer', 'data_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'data_layer.name')
            ->where('frag', 'd')
            ->where('business_layer_id', $bus->id)
            ->get();
        $t = DB::table('business_relation')
            ->join('technology_layer', 'technology_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'technology_layer.name')
            ->where('frag', 't')
            ->where('business_layer_id', $bus->id)
            ->get();

        $items = Department::pluck('name', 'id');
        return view('bus.edit', compact('bus', 'items', 'id', 'a', 'b', 'd', 't'));
    }

    public function delb($bus, $q = null)
    {
        
        DB::table('business_relation')->where('id', $q)->delete();
        $a = DB::table('business_relation')
            ->join('application_layer', 'application_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'application_layer.name')
            ->where('frag', 'a')
            ->where('business_layer_id', $bus)
            ->get();
        $b = DB::table('business_relation')
            ->join('business_layer', 'business_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'business_layer.name')
            ->where('frag', 'b')
            ->where('business_layer_id', $bus)
            ->get();
        $d = DB::table('business_relation')
            ->join('data_layer', 'data_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'data_layer.name')
            ->where('frag', 'd')
            ->where('business_layer_id', $bus)
            ->get();
        $t = DB::table('business_relation')
            ->join('technology_layer', 'technology_layer.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'technology_layer.name')
            ->where('frag', 't')
            ->where('business_layer_id', $bus)
            ->get();
        $de = DB::table('business_relation')
            ->join('department', 'department.id', '=', 'business_relation.comp_id')
            ->select('business_relation.*', 'department.name')
            ->where('frag', 'dp')
            ->where('business_layer_id', $bus)
            ->get();
       /*$de = DB::table('department_relation')
            ->join('application_layer','application_layer.id', '=', 'department_relation.department_id')
            ->join('department','department.id', '=', 'department_relation.comp_id')
            ->select('department_relation.*','department.name')
            ->where('frag','a')
            ->where('department_relation.department_id',$bus)
            ->get();*/
        return view('bus.rela', compact('bus', 'a', 'b', 'd', 't', 'de'));
        //return redirect()->route('app.index');


    }
    public function dep(Business_layer $bus,$q = null,$b = null,$d = null)
    {
        DB::table('business_relation')->where('id', $q)->delete();
return redirect()->route('bus.edit',$bus->id)->with('message', 'item has been move successfully');
    }
         public function download($bus)
    {
        $filePath = public_path('images/bus/'.$bus);

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
