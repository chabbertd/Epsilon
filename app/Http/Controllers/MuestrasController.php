<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\Muestra;
use DataTables;
use App\Log;
use Auth;


class MuestrasController extends Controller
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
        $this->insertlog(Auth::user()->id, 'Acceso a módulo muestras');
        
        return view('parametros.muestras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Muestra();
        $sectores = Sector::all();
        return view('parametros.muestras.create', compact('model','sectores'));
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



        $sector = Sector::find($request->input('sector')); 

        $model = new Muestra();
        $model->nombre = $request->input('nombre');
        $model->descripcion = $request->input('descripcion');

        $sector->muestras()->save($model);

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
        $model = Muestra::find($id);
        $sectores = Sector::all();
        //return $model;
        return view('parametros.muestras.edit', compact('model','sectores'));
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


     //   $sector = Sector::find($request->input('sector')); 
        $muestra = Muestra::find($id);
        $muestra->nombre = $request->input('nombre');
        $muestra->descripcion = $request->input('descripcion');
        $muestra->sector_id = $request->input('sector');
        $muestra->save();

        return $muestra;
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
        Muestra::Destroy($id);
    }


    public function getmuestras()
    {

        //return DataTables::of(User::query())->make(true);
        //$model = User::orderBy('name', 'ASC');
        //$model = User::query();

        $model = Muestra::join('sectors', 'sectors.id', '=', 'muestras.sector_id')                      
                    ->select(['muestras.id', 'muestras.nombre', 'muestras.descripcion', 'sectors.nombre as sector']);               
            

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.muestras._action', [
                    'model' => $model,
                    'url_edit' => route('muestras.edit', $model->id),
                    'url_destroy' => route('muestras.destroy', $model->id)
                ]);

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }


    public function getmuestrasporsector(Request $request)
    {

      $id = $request->input('id');  
      $muestras = Muestra::where('sector_id', '=', $id)->get();

      return response()->json($muestras);
      //return $muestras;

    }

    public function insertlog($user_id, $log)
    {

        $logs = new Log();
        $logs->user_id = $user_id;
        $logs->descripcion = $log;
        $logs->save();

    }

}
