
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error!</title>
    
    <!-- default stylesheet -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">

</head>
<body>
    
    <div class="container">
    
    
    @component('laravel_components.component_main_nav')
        
    @endcomponent

    <h1>Error!</h1>



    @if (session('alert'))
        <div class="alert alert-warning" role="alert">
            {{ session('alert') }}
        </div>
    @endif

    </div>

    
    <script src='/js/app.js' type="text/javascript"></script>
</body>
</html>



