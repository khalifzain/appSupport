<?php

namespace App\Http\Controllers;

use App\CodeHacking;
use Illuminate\Http\Request;
use DB;
use database;

class CodehackingDBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = DB::connection('codehacking')->select('show TABLES');
        return view('databases.codehacking.index', compact('tables'));
        // return $tables;
    }


    public function show($value)
    {
        //
        $records = DB::connection('codehacking')->table($value)->get();
        $columns =  DB::connection('codehacking')->getSchemaBuilder()->getColumnListing($value);
        return view('databases.codehacking.table_data', compact('columns','records','value'));
    }

    // public function records($value,$id)
    // {
    //     $records = DB::connection('codehacking')->table($value)->where('id', '=', $id)->get();
    //     $columns =  DB::connection('codehacking')->getSchemaBuilder()->getColumnListing($value);
    //     return view('databases.codehacking.edit', compact('columns','records','value'));
    //     // return $records;
    // }

     public function records($value,$id)
    {
        $records = DB::connection('codehacking')->table($value)->where('id', '=', $id)->first();
        $columns =  DB::connection('codehacking')->getSchemaBuilder()->getColumnListing($value);
        return view('databases.codehacking.edit', compact('columns','records','value'));
    }

    public function recordsupdate($value)
    {
        // $records = DB::connection('codehacking')->table($value)->where('id', '=', $id)->first();
        // $columns =  DB::connection('codehacking')->getSchemaBuilder()->getColumnListing($value);
        // return view('databases.codehacking.edit', compact('columns','records','value'));
        return $request;
    }

}
