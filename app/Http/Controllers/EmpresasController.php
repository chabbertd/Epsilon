<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use DataTables;
use App\Log;
use Auth;


class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles('Administrador de empresas');
        $this->insertlog(Auth::user()->id, 'Acceso a módulo empresas');
        
        return view('clientes.empresas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Cliente();
        return view('clientes.empresas.create', compact('model'));
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
            'razonsocial' => 'required',
            'cuit' => 'required',            
            'email' => 'required|email',
            'condicioniva' => 'required'              
            ]);
       

        $model = new Cliente();

        $model->tipocliente = 1;
        $model->razonsocial = $request->input('razonsocial');
        $model->condicioniva = $request->input('condicioniva');
        $model->cuit = $request->input('cuit');
        $model->email = $request->input('email');
        $model->direccion = $request->input('direccion');
        $model->localidad = $request->input('localidad');
        $model->codigopostal = $request->input('codigopostal');
        $model->telefono = $request->input('telefono');
        $model->observaciones = $request->input('observaciones');

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
        $model = Cliente::find($id);        
        //return $model;
        return view('clientes.empresas.edit', compact('model'));
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
            'razonsocial' => 'required',
            'cuit' => 'required',            
            'email' => 'required|email',
            'condicioniva' => 'required'              
            ]);
       

        $model = Cliente::find($id);

        $model->razonsocial = $request->input('razonsocial');
        $model->condicioniva = $request->input('condicioniva');
        $model->cuit = $request->input('cuit');
        $model->email = $request->input('email');
        $model->direccion = $request->input('direccion');
        $model->localidad = $request->input('localidad');
        $model->codigopostal = $request->input('codigopostal');
        $model->telefono = $request->input('telefono');
        $model->observaciones = $request->input('observaciones');

        $model->save();

        return $model;
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
         Cliente::Destroy($id);
    }


    public function getempresas()
    {

        //return DataTables::of(User::query())->make(true);
        //$model = User::orderBy('name', 'ASC');
        //$model = User::query();

        $model = Cliente::where('tipocliente', '=', 1);   
        //$model = Cliente::all();
     //$muestras = Muestra::where('sector_id', '=', $id)->get();                                
            

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.muestras._action', [
                    'model' => $model,
                    'url_edit' => route('empresas.edit', $model->id),
                    'url_destroy' => route('empresas.destroy', $model->id)
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
