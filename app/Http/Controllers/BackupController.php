<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backup;
use App\ConfigBKP;
use DataTables;
use App\Log;
use Auth;


class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('Administrador de tablas paramétricas');
        $this->insertlog(Auth::user()->id, 'Acceso a módulo backup');

        //$host = config('database.connections.mysql.host');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');

        $fecha = date("Y-m-d");
        $nombrearchivo = 'backups/backup_'.$fecha.'_'.time().'.bkp';

        $config = ConfigBKP::all()->take(1);


        return view('parametros.backups.index',compact('host', 'username','database', 'password', 'nombrearchivo', 'config'));
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
        $model = Backup::find($id);
        //return $model;
        return view('parametros.backups.show', compact('model'));

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

    public function getbackups()
    {

        //return DataTables::of(User::query())->make(true);
        //$model = Sector::orderBy('nombre', 'ASC');
        $model = Backup::query();

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.backups._action', [
                    'model' => $model,
                    'url_show' => route('backups.show', $model->id),
                ]);
                 })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }

    public function insertlog($user_id, $log)
    {

        $logs = new Log();
        $logs->user_id = $user_id;
        $logs->descripcion = $log;
        $logs->save();

    }



}
