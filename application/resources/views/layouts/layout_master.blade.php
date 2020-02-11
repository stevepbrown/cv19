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

    @if($hasForm)

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @else

    <!-- Page not registered as having a form, no CSRF included -->

    @endif


  

</head>

<body>
    <div id="div-document-container" class="container-fluid px-5">
        <div id="div-document-container" class="container-fluid">
            
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
    </div>

    @scripts
    @slot('sup-scripts')
    @endslot
    @endscripts
</body>


</html>