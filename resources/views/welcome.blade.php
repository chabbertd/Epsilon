<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Epsilon S.R.L</title>

        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/login/acceso.css')}}">

    </head>
      
<body>


            <div class="container"> 

                <div class="row align-items-center" style="margin-top: 35px;">
                    <div class="col">
                     
                    </div>
                    <div class="col-6 text-center">
                       <h1><strong>EPSILON S.R.L</strong></h1>
                       <p>Bienvenido al Sistema de Gestión de Servicios de Laboratorio</p>
                      
                    </div>
                    <div class="col">
                      
                    </div>
                </div>                               


                <div class="row">
                    
                    <div class="col-sm-6 col-sm-offset-3 form-box mx-auto">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Acceso al Sistema</h3>
                                    <p>Ingrese su nombre de usuario y contraseña:</p>
                                </div>
                                <div class="form-top-right">
                                    <img src="{{asset('images/LOGO.png')}}"  style="width: 130px;height: 130px;">
                                </div>
                            </div>
                            <div class="form-bottom">

                                <form role="form" action="{{ route('login') }}" method="POST" class="login-form">

                                    {{ csrf_field() }}

                                    <div class="form-group">

                                        <label class="sr-only" for="username">Username</label>
                                        <input type="text" name="username" value="{{ old('username') }}"placeholder="Usuario..." class="username form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username">

                                        {!! $errors->first('username', '<span class="help-block" style="color:red;">:message </span>') !!}
                                    </div>
                                    <div class="form-group">

                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" placeholder="Contraseña..." class="password form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">

                                        {!! $errors->first('password', '<span class="help-block" style="color:red;">:message </span>') !!}

                                    </div>

                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </form>

                            </div>
                        </div>

                </div>


            </div>
          

<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>

</body>

</html>
