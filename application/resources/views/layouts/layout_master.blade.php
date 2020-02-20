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
        <div id="div-document-container" class="container-fluid m-5">
                {{-- Uses Spatie/Cooke --}}
                @include('cookieConsent::index')
                <div class="container mx-auto">
                    <h1 class="display-3">{{$title}}</h1>
                </div>           
                        {{menu('main_nav','partials.partial_main_nav')}}
                <main>
                    @yield('main')
                </main>
            {{-- footer --}}
                @include('partials.partial_footer')
            </div>
        @scripts
        @endscripts
    </body>
</html>