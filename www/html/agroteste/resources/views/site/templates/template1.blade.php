<!DOCTYPE html>
<html>
    <head>
        <title>{{$titulo or 'Agroteste'}}</title>
    </head>
    <body>
        
        @yield('content')
        
        
        @stack('scripts')
        
    </body>
</html>