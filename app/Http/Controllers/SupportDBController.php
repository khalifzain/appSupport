<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;
use DB;
use database;

class SupportDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = DB::connection('support')->select('show TABLES');
        return view('databases.support.index', compact('tables'));
        // return $tables;
    }


    public function show($value)
    {
        //
        $records = DB::connection('support')->table($value)->get();
        $columns =  DB::connection('support')->getSchemaBuilder()->getColumnListing($value);
        return view('databases.support.table_data', compact('columns','records','value'));
    }

    // public function records($value,$id)
    // {
    //     $records = DB::connection('support')->table($value)->where('id', '=', $id)->get();
    //     $columns =  DB::connection('support')->getSchemaBuilder()->getColumnListing($value);
    //     return view('databases.support.edit', compact('columns','records','value'));
    //     // return $records;
    // }

     public function records($value,$id)
    {
        $records = DB::connection('support')->table($value)->where('id', '=', $id)->first();
        $columns =  DB::connection('support')->getSchemaBuilder()->getColumnListing($value);
        return view('databases.support.edit', compact('columns','records','value'));
    }

    public function recordsupdate($value)
    {
        // $records = DB::connection('support')->table($value)->where('id', '=', $id)->first();
        // $columns =  DB::connection('support')->getSchemaBuilder()->getColumnListing($value);
        // return view('databases.support.edit', compact('columns','records','value'));
        return $request;
    }

}
