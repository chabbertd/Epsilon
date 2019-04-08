<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Log;
use DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index(Request $request)
    {
     
        $request->user()->authorizeRoles('Administrador de usuarios');

        $this->insertlog(Auth::user()->id, 'Acceso a administracion de usuarios');

        // $log = new Log();
        // $log->user_id = Auth::user()->id;
        // $log->descripcion = 'Acceso a administracion de usuarios';
        // $log->save();
        
    	return view('admin.users.index');
    }

    
    public function log(Request $request){

        $request->user()->authorizeRoles('Visualizador Registro de Logs');

        $this->insertlog(Auth::user()->id, 'Acceso al registro de logs');

        // $log = new Log();
        // $log->user_id = Auth::user()->id;
        // $log->descripcion = 'Acceso al registro de logs';
        // $log->save();

        return view('admin.users.log');

    }


    public function getlogs()
    {      

        $logs = User::join('logs', 'users.id', '=', 'logs.user_id')                      
                    ->select(['logs.id', 'users.name', 'logs.descripcion', 'logs.created_at as fecha']);               
                   
       
        return DataTables::of($logs)   
            ->editColumn('fecha', function ($log) {
                return date('d/m/Y H:i', strtotime($log->fecha));
              })
            ->addIndexColumn()
            ->make(true);

    }


    public function getusers()
    {

    	//return DataTables::of(User::query())->make(true);
        $model = User::orderBy('name', 'ASC');
        //$model = User::query();

        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('admin.users._action', [
                    'model' => $model,
                    'url_rol' => route('rol.user', $model->id),
                    'url_edit' => route('users.edit', $model->id),
                    'url_destroy' => route('users.destroy', $model->id),
                    'url_suspender' => route('suspend.user', $model->id),
                    'url_resetpassword' => route('reset.user', $model->id)
                ]);

            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }
    
    public function suspenduser(Request $request)
    {
        $var = $request->all();
        $tipo = $var['tipo'];
        $id = $var['id'];

        $user = User::find($id);

        if ($tipo == 'Suspensión') {$user->suspendido = true;}
         else {$user->suspendido = false;}
        
        $user->save();
       

    }

    public function resetusr(Request $request)
    {
        $var = $request->all();
        $id = $var['id'];

        $user = User::find($id);
        $user->password = bcrypt('123456');

        $user->save();
       
    }


    public function changepass(Request $request)
    {
       
      $userid = Auth::user()->id;
      $user = User::find($userid);

      $passold = $request->input('passold');
      $passnew = $request->input('passnew');

      if (Hash::check($passold, Auth::user()->password))
          {$passoldvalido = 'ok';
          $user->password = bcrypt($passnew);
          $user->save();
          }
      else
          {$passoldvalido = 'error';}

       return $passoldvalido;
       
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
            'username' => 'required|max:15|unique:users,username'
            ]);

        //$model = User::create($request->all());
        $model = new User($request->all());
        $model->password = bcrypt('123456');
        $model->save();

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
    
    public function edit($id) 
    {
      
        $model = User::find($id);
        //return $model;
        return view('admin.users.frmedituser', compact('model'));
      
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
        

        $request->validate(['name' => ['required', Rule::unique('users')->ignore($id)],
                            'email' => ['required','email', Rule::unique('users')->ignore($id)],
                            'username' => ['required','max:15', Rule::unique('users')->ignore($id)]
                        ]);

              
     	$user = User::find($id);
        $user->fill($request->all());

        $user->save();
        Return $user;
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;

        User::Destroy($id);
     
    }

    
    public function rol($id) 
    {
      
        $user = User::find($id);
        $roles = Role::all();
        
        return view('admin.users.frmroles', compact('user','roles'));
      
    }



    public function getrolesall(Request $request)
    {
        
        $id = $request->input('id');

        $roles = User::join('role_user', 'users.id', '=', 'role_user.user_id')  
                    ->join('roles', 'role_user.role_id', '=', 'roles.id')                  
                    ->select(['role_user.role_id', 'roles.nombre', 'users.id', 'users.name'])
                    ->where('users.id',$id)
                    ->orderBy('users.id', 'ASC');
       
        return DataTables::of($roles)

            ->addColumn('action', function($roles){

                return view('admin.users._actionroles', [
                    'model' => $roles,                    
                    'url_deleterol' => route('delete.rol', $roles->role_id)                
                ]);

            })

            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

    }

    public function insertrol(Request $request)
    {
        $idrol = $request->input('idrol');
        $iduser = $request->input('iduser');

        $user = User::find($iduser);
        $user->roles()->attach($idrol);

        //return ($idrol);
       
    }


    public function deleterol(Request $request)
    {
        $idrol = $request->input('idrol');
        $iduser = $request->input('iduser');

        $user = User::find($iduser);
        $user->roles()->detach($idrol);

        //return ($idrol);
       
    }


    public function insertlog($user_id, $log)
    {

        $logs = new Log();
        $logs->user_id = $user_id;
        $logs->descripcion = $log;
        $logs->save();

    }


}

