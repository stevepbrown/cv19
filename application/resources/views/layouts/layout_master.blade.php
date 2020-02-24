<html>@head(
            //need to pass the page attributes through
            [
                'title'=>$title,
                'description'=>$description,
                'keywords'=>$keywords,
                'links'=>$links,
            ])
    @endhead
   
    <body>
       
        <div id="div-document-container" class="container-fluid">
                {{-- Uses Spatie/Cooke --}}
                @include('cookieConsent::index')
       
                    <h1 class="display-3 text-center">{{$title}}</h1>
               
       
                @if(env('APP_ENV')!== 'production')
                    @include('laravel_components.component_application_dev_env')
                @endif                
       
                {{menu('main_nav','partials.partial_main_nav')}}
             <main class="container">
                @yield('main')
             </main>
            {{-- footer --}}
                @include('partials.partial_footer')
        </div>
        @scripts
        @endscripts
    </body>
</html>