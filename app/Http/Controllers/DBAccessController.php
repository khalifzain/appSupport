<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use DB;

class DBAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function db_connect_pdo($id)
    {

    $db = Database::findOrFail($id);
    $dsn = $db->driver . ':host=' . $db->host . ';' .'dbname=' . $db->connection;
    $dbuser = $db->username;
    $dbpass = $db->password;
    $connection = new PDO($dsn,$dbuser,$dbpass);

    }

    public function table_list_pdo($id, $connection)
    {
        $sql = 'SHOW TABLES';
        $statement = $connection->prepare($sql)->execute();
        $tables = $statement->fetchAll(PDO::FETCH_NUM);
    }

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
        $records = DB::connection($db_name)->table($table_name)->get()->toArray();
        $columns =  DB::connection($db_name)->getSchemaBuilder()->getColumnListing($table_name);
        return view('databases.records_list', compact('table_name','db_name','columns','records'));

    }


}
