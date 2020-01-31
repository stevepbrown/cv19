


<!DOCTYPE html>
<html lang="en-GB">

<head>
    @head
        @slot('title')
            {{$title}}
        @endslot
        @slot('keywords')
            {{$keywords}}
        @endslot
        @slot('description')
            {{$description}}
        @endslot
    @endhead


    @foreach ($links as $link)
    
        <link id="{{$link['attr_id']}}" type="{{$link['link_type']}}" rel="{{$link['rel']}}"  href="{{$link['href']}}" media="{{$link['media']}}">

    @endforeach
  

</head>

<body>
    <div id="div-document-container" class="container-fluid px-5">
        <div id="div-document-container" class="container-fluid">
            
            {{-- Uses Spatie/Cooke --}}
            @include('cookieConsent::index')

            <div class="container mx-auto">
                <h1 class="display-3">{{$title}}</h1>
            </div>           
            {{-- Main navigation --}}
            {{-- Voyager menu , "you can even specify your own view and stylize your menu however you would like. Say for instance that we had a file located at resources/views/my_menu.blade.php ... Then anywhere you wanted to display your menu you can now call:

            menu('main', 'my_menu')""
            
            --}}
            {{menu('main_nav','partials.partial_main_nav')}}


   

            <main>
                @yield('main')
            </main>
           {{-- footer --}}
            @include('partials.partial_footer')
            
        </div>
    </div>

    @scripts
    @slot('sup-scripts')
    @endslot
    @endscripts
</body>


</html>