<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #016495;">


          <a class="btn btn-outline-info" href="{{ route('home') }}" style="padding: 4px; margin-top: 2px; margin-left: 15px;margin-right: 10px;" title="Página de inicio"><i class="fas fa-home"></i></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto">
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-clipboard-list"></i>Pedidos</a> 
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Creación de pedidos de trabajo</a>
                  <a class="dropdown-item" href="#">Asociar presupuesto</a>
                  <a class="dropdown-item" href="#">Pedidos de trabajo interno</a>
                  <a class="dropdown-item" href="#">Derivaciones internas</a>
                  <a class="dropdown-item" href="#">Derivaciones externas</a>
                  <a class="dropdown-item" href="#">Cierre y generación de informe</a>
                </div> 
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-dollar-sign"></i>Presupuestos</a> 
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                  <a class="dropdown-item" href="#">Creación de presupuesto</a>
                  <a class="dropdown-item" href="#">Listas de precios</a>
                  <a class="dropdown-item" href="#">Asociación de listas de precio</a>
                </div> 
              </li>

              <li class="nav-item dropdown">             
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-address-book"></i>Clientes</a> 
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                  <a class="dropdown-item" href="#">Clientes particulares</a>
                  <a class="dropdown-item" href="#">Empresas</a>
                </div> 
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-chart-line"></i>Informes</a> 
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="#">Presupuestos</a>
                  <a class="dropdown-item" href="#">Informes de ensayos</a>
                  <a class="dropdown-item" href="#">Listas de precios</a>
                   <a class="dropdown-item" href="#">Pedidos de trabajo</a>
                    <a class="dropdown-item" href="#">Derivaciones</a>
                </div> 
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cogs"></i>Parámetros</a> 
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="#">Parámetros iniciales de arranque</a>
                  <a class="dropdown-item" href="#">Sectores</a>
                  <a class="dropdown-item" href="#">Tipos de Muestras</a>
                   <a class="dropdown-item" href="#">Tipos de Ensayos</a>
                    <a class="dropdown-item" href="#">Backup de base de datos</a>
                </div>     
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-lock"></i>Usuarios</a>
                <div class="dropdown-menu" aria-labelledby="dropdown06">
                  <a class="dropdown-item" href="{{route('users.index')}}">Administración de usuarios</a>     
                  <a class="dropdown-item" href="{{route('logs.users')}}">Registro de Log</a>
                </div>
              </li>
            <!--   <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
            </ul>



            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
              {{ csrf_field() }}
              
              <span class="navbar-text" style="=margin-right: 5px;">Usuario: {{ auth()->user()->name }}</span>

                <button class="btn btn-outline-info btn-cambiarpassword" style="padding: 4px; margin-top: 2px; margin-left: 15px;" title="Cambiar contraseña de acceso"><i class="fas fa-key"></i></button>                

                <button class="btn btn-outline-info" style="padding: 4px; margin-top: 2px; margin-left: 15px;" title="Salir del Sistema"><i class="fas fa-door-open"></i>Salir</button>
                                          
            </form>

          </div>
        </nav>