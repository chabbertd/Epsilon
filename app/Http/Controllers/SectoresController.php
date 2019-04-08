<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sector;
use App\Log;
use DataTables;

class SectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('Administrador de tablas paramétricas');

        $this->insertlog(Auth::user()->id, 'Acceso a módulo sectores');

        return view('parametros.sectores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Sector();
        return view('parametros.sectores.create', compact('model'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required'            
            ]);

        //$model = User::create($request->all());
        $model = new Sector($request->all());
        $model->save();

        return $model;
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
        $model = Sector::find($id);
        //return $model;
        return view('parametros.sectores.edit', compact('model'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required'            
            ]);
              
        $sector = Sector::find($id);
        $sector->fill($request->all());

        $sector->save();
        Return $sector;
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
        Sector::Destroy($id);
    }


    public function getsectores()
    {

        //return DataTables::of(User::query())->make(true);
        //$model = Sector::orderBy('nombre', 'ASC');
        $model = Sector::query();

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.sectores._action', [
                    'model' => $model,
                    'url_edit' => route('sectores.edit', $model->id),
                    'url_destroy' => route('sectores.destroy', $model->id)
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
