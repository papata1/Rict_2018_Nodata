<?php

namespace App\Http\Controllers;

use App\Develop_language;
use App\Devlopment_group;
use App\Involved;
use App\Type_collection;
use App\Type_process;
use App\Use_data;
use Illuminate\Http\Request;
use App\Application_layer;
use App\Technology_layer;
use App\Dat_layer;
use App\Business_layer;
use App\Department;
use App\Brand;
use App\State;
use App\Place;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
Use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function appImport()
    {
        Excel::load(input::file('appImport'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Application_layer::Create($sheet->toArray());
                }
            });
        });
     return redirect()->route('app.index')->with('message','item has been added successfully');
    }

    public function deImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Department::Create($sheet->toArray());
                }
            });
        });
     return redirect()->route('de.index')->with('message','item has been added successfully');
    }
    public function brandImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Brand::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('brand.index')->with('message','item has been added successfully');
    }
    public function collImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Type_collection::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('coll.index')->with('message','item has been added successfully');
    }
    public function involImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Involved::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('invol.index')->with('message','item has been added successfully');
    }
    public function langImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Develop_language::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('lang.index')->with('message','item has been added successfully');
    }
    public function placeImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Place::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('place.index')->with('message','item has been added successfully');
    }
    public function procImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Type_process::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('proc.index')->with('message','item has been added successfully');
    }
    public function devgImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Devlopment_group::Create($sheet->toArray());
                }
            });
        });
        return redirect()->route('proc.index')->with('message','item has been added successfully');
    }
    public function udImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                Use_data::Create($sheet->toArray());
                }
            });
        });

        return redirect()->route('ud.index')->with('message','item has been added successfully');
    }
     public function stateImport()
    {
        Excel::load(input::file('file'),function ($reader){
            $reader->each(function ($sheet){
                if ($sheet->name != null) {
                State::Create($sheet->toArray());
                }
            });
        });
     return redirect()->route('state.index')->with('message','item has been added successfully');
    }
}
