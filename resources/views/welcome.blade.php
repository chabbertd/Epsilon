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
                <div class="row label-top">
                    <div class="mx-auto"><h1><strong>EPSILON S.R.L</strong></h1></div>              
                </div>

                <div class="row">                   
                    <div class="mx-auto">
                            <p>Bienvenido al Sistema de Gestión de Servicios de Laboratorio</p>
                                                    
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
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="form-username" placeholder="Usuario..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="form-password" placeholder="Contraseña..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </form>
                            </div>
                        </div>

                </div>


            </div>
          


</body>

</html>
