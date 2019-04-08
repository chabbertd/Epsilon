<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Ensayo;
use App\Sector;
use App\Muestra;
use App\Log;
use Auth;

class EnsayosController extends Controller
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
        $this->insertlog(Auth::user()->id, 'Acceso a módulo ensayos');
        
        return view('parametros.ensayos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = new Ensayo();
        $sectores = Sector::all();
        $muestras = Muestra::all();
        return view('parametros.ensayos.create', compact('model','sectores','muestras'));
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



        $muestra = Muestra::find($request->input('muestra')); 

        $ensayo = new Ensayo();
        $ensayo->nombre = $request->input('nombre');
        $ensayo->descripcion = $request->input('descripcion');

        $muestra->ensayos()->save($ensayo);

        return $ensayo;
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
        $model = Ensayo::find($id);
        $muestra = Muestra::find($model->muestra_id);
        $sectorid = $muestra->sector_id;

        $sectores = Sector::all();
        //$muestras = Muestra::all();
        $muestras = Muestra::where('sector_id', '=', $sectorid)->get();

        return view('parametros.ensayos.edit', compact('model','sectores','muestras','sectorid'));
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


        $muestra = Muestra::find($request->input('muestra')); 

        $ensayo = Ensayo::find($id);
        $ensayo->nombre = $request->input('nombre');
        $ensayo->descripcion = $request->input('descripcion');
        $ensayo->muestra_id = $request->input('muestra');

        $ensayo->save();

        return $ensayo;
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
         Ensayo::Destroy($id);
    }


     public function getensayos()
    {

        //return DataTables::of(User::query())->make(true);
        $model = Ensayo::join('muestras', 'ensayos.muestra_id', '=', 'muestras.id')  
                    ->join('sectors', 'muestras.sector_id', '=', 'sectors.id')                  
                    ->select(['ensayos.id', 'ensayos.nombre', 'muestras.nombre as muestra', 'sectors.nombre as sector', 'ensayos.descripcion']);

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('parametros.ensayos._action', [
                    'model' => $model,
                    'url_edit' => route('ensayos.edit', $model->id),
                    'url_destroy' => route('ensayos.destroy', $model->id)
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
