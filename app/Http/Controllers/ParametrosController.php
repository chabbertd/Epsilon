<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametro;
use DataTables;
use Illuminate\Validation\Rule;
use App\Log;
use Auth;


class ParametrosController extends Controller
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
        $this->insertlog(Auth::user()->id, 'Acceso a módulo parámetros');

        return view('parametros.inicio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Parametro();
        return view('parametros.inicio.create', compact('model'));
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
            'nombre' => 'required|unique:parametros,nombre',
            'valor' => 'required',
            'descripcion' => 'required'            
            ]);

        $model = new Parametro();
        $model->nombre = $request->input('nombre');
        $model->valor = $request->input('valor');
        $model->prefijo = $request->input('prefijo');
        $model->sufijo = $request->input('sufijo');
        $model->descripcion = $request->input('descripcion');

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
        $model = Parametro::find($id);
        //return $model;
        return view('parametros.inicio.edit', compact('model'));
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
        // $this->validate($request, [
        //     'nombre' => 'required|unique:parametros,nombre',
        //     'valor' => 'required',
        //     'descripcion' => 'required'            
        //     ]);

        $request->validate(['nombre' => ['required', Rule::unique('parametros')->ignore($id)],
                            'valor' => ['required'],
                            'descripcion' => ['required']
                        ]);

        $model = Parametro::find($id);
        $model->nombre = $request->input('nombre');
        $model->valor = $request->input('valor');
        $model->prefijo = $request->input('prefijo');
        $model->sufijo = $request->input('sufijo');
        $model->descripcion = $request->input('descripcion');

        $model->save();
        Return $model;
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
        Parametro::Destroy($id);
    }

    public function getparametros()
    {

        //return DataTables::of(User::query())->make(true);
        //$model = Sector::orderBy('nombre', 'ASC');
        $model = Parametro::query();

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.inicio._action', [
                    'model' => $model,
                    'url_edit' => route('parametros.edit', $model->id),
                    'url_destroy' => route('parametros.destroy', $model->id)
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
