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

    @include('cookieConsent::index')
    @mainNav
    @endmainNav
    @yield('main')

</body>
@scripts
@slot('sup-scripts')
@endslot
@endscripts

</html>