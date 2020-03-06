<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use DB;

class DBAccessController extends Controller
{

    public function get_tables($db_name)
    {
        $tables = DB::connection($db_name)->select('show TABLES');
        return view('databases.tables_list', compact('tables','db_name'));
    }

    public function get_records($db_name,$table_name)
    {
        $records = DB::connection($db_name)->table($table_name)->get();
        $columns =  DB::connection($db_name)->getSchemaBuilder()->getColumnListing($table_name);
        return view('databases.records_list', compact('table_name','db_name','columns','records'));
    }

    public function edit_records($db_name,$table_name,$record_id)
    {
        $record = DB::connection($db_name)->table($table_name)->get()->where('id',$record_id);
        return view('databases.records_list', compact('table_name','db_name','columns','records'));

    }

}
