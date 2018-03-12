<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/downloadBus/{bus}','BusController@download');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/downloadApp/{app}','AppController@download');
Route::get('/downloadTech/{tech}','TechController@download');
Route::get('/download', function () {
    // Fetch the file info.
    $filePath = public_path('images/excel/template.xlsx');

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
    //return view('welcome');
});
    Route::get('/master', function () {
        return view('master');
    });

    Route::get('/test/{t}','TechController@test');
    Route::get('/delete/{bus}/{q}','BusController@delete');
    Route::get('/editerela/{app}','AppController@editrela');
    Route::get('/del/{app}/{q?}','AppController@del');
    Route::get('/deld/{dat}/{q?}','DatController@deld');
    Route::get('/delt/{tech}/{q?}','TechController@delt');
    Route::get('/delb/{bus}/{q?}','BusController@delb');
    Route::get('/dep/{bus}/{q?}/{b?}/{d?}','BusController@dep');
    Route::get('/dea/{app}/{q?}}','AppController@dep');
    Route::get('/ded/{dat}/{q?}','DatController@dep');
    Route::get('/det/{tech}/{q?}}','TechController@dep');
    Route::get('/deleted/{bus}/{q}','DatController@delete');
    Route::get('/deletet/{bus}/{q}','TechController@delete');
    Route::get('/indexapp','TestController@app');
    Route::post('/appImport','ExcelController@appImport');
    Route::post('/deImport','ExcelController@deImport');
    Route::get('/movedown/{app}','AppController@movedown');
    Route::get('/moveup/{app}','AppController@moveup');
    Route::post('/movea','AppController@movea');
    Route::get('/movedowntech/{tech}','TechController@movedown');
    Route::get('/moveuptech/{tech}','TechController@moveup');
    Route::post('/movet','TechController@movet');
    Route::post('/moveb','BusController@moveb');
    Route::get('/movedownbus/{bus}','BusController@movedown');
    Route::get('/moveupbus/{bus}','BusController@moveup');
    Route::get('/movedowndat/{dat}','DatController@movedown');
    Route::get('/moveupdat/{dat}','DatController@moveup');
    Route::post('/moved','DatController@moved');
    Route::get('/relation/{app}','AppController@relation');
    Route::post('/relation/addrelation','AppController@addrelation');
    Route::get('/relationbus/{app}','BusController@relation');
    Route::post('/relationbus/addrelation','BusController@addrelation');
    Route::get('/relationdat/{app}','DatController@relation');
    Route::post('/relationdat/addrelation','DatController@addrelation');
    Route::get('/relationtech/{app}','TechController@relation');
    Route::post('/relationtech/addrelation','TechController@addrelation');
    Route::resource('/bus','BusController');
    Route::resource('/de','DeController');
    Route::resource('/lv1','Bus_lv1Controller');
    Route::resource('/lv2','Bus_lv2Controller');
    Route::resource('/lv3','Bus_lv3Controller');
    Route::get('/buslvall','Bus_lv1Controller@all');
    Route::resource('/app','AppController');
    Route::resource('/dat','DatController');
    Route::resource('/tech','TechController');
    Route::resource('/brand','BrandController');
    Route::resource('/coll','CollController');
    Route::resource('/invol','InvolController');
    Route::resource('/lang','LangController');
    Route::resource('/place','PlaceController');
  
    Route::resource('/proc','ProcController');
    Route::resource('/ud','UdController');
    Route::resource('/state','StateController');
    Route::resource('/devg','DevgController');
    Route::get('/InApp','InController@indexApp');
    Route::get('/editApp','InController@editApp');
    Route::post('/updateApp','InController@updateApp');

    Route::get('/InDat','InController@indexDat');
    Route::get('/editDat','InController@editDat');
    Route::post('/updateDat','InController@updateDat');


//           other Artifacts
      Route::resource('/oapp','OappController');
    Route::resource('/obus','ObusController');
    Route::resource('/odata','OdataController');
    Route::resource('/otech','OtechController');
    Route::resource('/bulid','Technology_bulidController');
    Route::resource('/network','Technology_networkController');


Route::post('/brandImport','ExcelController@brandImport');
Route::post('/collImport','ExcelController@collImport');
Route::post('/involImport','ExcelController@involImport');
Route::post('/langImport','ExcelController@langImport');
Route::post('/placeImport','ExcelController@placeImport');
Route::post('/procImport','ExcelController@deImport');
Route::post('/udImport','ExcelController@udImport');
Route::post('/devgImport','ExcelController@devgImport');
Route::post('/stateImport','ExcelController@stateImport');

Route::get('/downloadotech/{app}','OtechController@download');
Route::get('/downloadoapp/{app}','OappController@download');
Route::get('/downloadodata/{app}','OdataController@download');
Route::get('/downloadobus/{app}','ObusController@download');

Route::get('/downloadbulid/{app}','Technology_bulidController@download');
Route::get('/downloadnet/{app}','Technology_networkController@download');




Route::resource('/user','UserController');

/*
Route::group( [ 'middleware' => ['web'] ], function ()
{
    //this route will use the middleware of the 'web' group, so session and auth will work here
    Route::roles();
    Route::resource('/user','UserController');

});
*/
//frontend
//Route::get('shwtst','PageController@shwtst');

/*
Route::get('/', function () {
    return view('welcome');
});*/
//frontend
//Route::get('shwtst','PageController@shwtst');

Route::get('/','frontendController@viewBus');
Route::get('/main/Bus','frontendController@viewBus');
Route::get('/main/App','frontendController@viewApp');
Route::get('/main/Dat','frontendController@viewDat');
Route::get('/main/Tec','frontendController@viewTec');

Route::get('/main/lv/{lv}/{id}','frontendController@lv');
Route::get('/main/BusDetail/{id}','frontendController@viewBusdetail');
Route::get('/main/AppDetail/{id}','frontendController@viewAppdetail');
Route::get('/main/DatDetail/{id}','frontendController@viewDatdetail');
Route::get('/main/TecDetail/{id}','frontendController@viewTecdetail');
Route::get('/downloadbus/{file}', 'frontendController@downloadbus');
Route::get('/downloaddat/{file}', 'frontendController@downloaddat');
Route::get('/downloadtec/{file}', 'frontendController@downloadtec');

Route::get('/menurelation', 'frontendController@menurelation');
Route::post('/viewrelation', 'frontendController@viewrelation');

Route::get('/Bustype/{type}','frontendController@viewBusType');
Route::get('/Dattype/{type}','frontendController@viewDatType');
Route::get('/Tectype/{type}','frontendController@viewTecType');
Route::get('/Apptype/{type}','frontendController@viewAppType');

Route::get('/Busother','frontendController@viewBusOther');
Route::get('/Appother','frontendController@viewAppOther');
Route::get('/Datother','frontendController@viewDatOther');
Route::get('/Datexcel','frontendController@viewDatExcel');
Route::get('/Tecother','frontendController@viewTecOther');
Route::get('/net','frontendController@viewnet');
Route::get('/bui','frontendController@viewbui');
Route::get('/testdrop', function () {
    return view('front.testdrop');
});
Route::get('/testsearch', function () {
    return view('front.testsearch');
});
Route::get('/testexport','frontendController@exportexcel');
/*
Route::get('/', function () {
    // Fetch the file info.
    $filePath = public_path('images/bus/3.txt');

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
    //return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index');
