<html>
    <head>
      <title>@yield('title')</title>
        
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        
      <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/all.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
           
    </head>

    <body>

        @include('layouts.partials.nav')


        <div class="container">

                @yield('content')

        </div>
            
    
   <i class="fa fa-lock" style="font-size: 25px;color: #fff"></i>

    <script src="{{asset('js/jquery/jquery-slim.min.js')}}"></script>
   
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>


    </body>
</html>
