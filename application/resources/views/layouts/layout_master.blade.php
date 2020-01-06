<!DOCTYPE html>

<html lang="en-GB">

<head>
    @head
    @slot('title')
    {{$pageProps['title']}}
    @endslot
    @slot('keywords')
        {{$pageProps['keywords']}}
    @endslot
    @slot('description')
    {{$pageProps['description']}}
    @endslot
    @endhead
</head>

<body>
    <div id="div-document-container" class="container-fluid">
        <div id="div-cookie-container" class="container">
                @include('cookieConsent::index')
        </div>
        @mainNav
        @endmainNav
        @yield('main')
    </div>

</body>
@scripts
@slot('sup-scripts')
@endslot
@endscripts

</html>