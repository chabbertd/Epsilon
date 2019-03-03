<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUserRequest;
use DataTables;


class UsersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  dd('eeodioen');

      // $users = User::orderBy('id', 'ASC');
       //return view('admin.users.index')->with('users', $users);

       //$user = User::findOrFail(1);
       //return $user->roles;

    	//return datatables()
    	//->eloquent(User::orderBy('id', 'ASC'))
    	//->toJson();
    	return view('admin.users.index');
    }

    public function getusers()
    {

    	//return DataTables::of(User::query())->make(true);

        $model = User::query();

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('admin.users._action', [
                    'model' => $model,
                    'url_show' => route('users.show', $model->id),
                    'url_edit' => route('users.edit', $model->id),
                    'url_destroy' => route('users.destroy', $model->id)
                ]);

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      // return view('admin.users.create');
        //$model = User::findOrFail(2);
        $model = new User();
        return view('admin.users.frminsuser', compact('model'));

        //return redirect()->route('admin.users.frminsuser',[$usr])->with('status','acceso a nuevo usuario');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required |email|unique:users,email',
            'username' => 'required|max:15|unique:users,username',
            'password' => 'required'
            ]);

        
        $model = User::create($request->all());
        return $model;

     //   //dd($request);
     //   //return $request->input('name');
    	// $user = new User($request->all());
    	// $user->password = bcrypt($request->password);
    	// //dd($user->password);
    	// $user->save();
     //    //dd('Usuario creado');
     //    return redirect()->route('users.index',[$user])->with('status','Usuario '. $user->name. ' creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    public function edit($id) // le cambiamos el parametro para que funcione con implicit binding, se agregó una funcion en el modelo Trainer
    {
      dd($id); 
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
     	dd($id);
        //return $trainer;
        //return $request;
        
        //$trainer->fill($request->all());
       

       
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
}

