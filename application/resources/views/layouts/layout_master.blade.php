


<!DOCTYPE html>
<html lang="en-GB">

<head>
    @head
        @slot('title')
            {{title}}
        @endslot
        @slot('keywords')
            {{$keywords}}
        @endslot
        @slot('meta_description')
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
            <div id="div-cookie-container" class="container bg-secondary text-light my-5 p-4">
                    @include('cookieConsent::index')
            </div>
            
            <nav>
                @include('partials.partial_main_nav')
            </nav>
            <main>
                @yield('main')
            </main>
            <footer>
                @include('partials.partial_footer')
            </footer>
        </div>
    </div>

    @scripts
    @slot('sup-scripts')
    @endslot
    @endscripts
</body>


</html>