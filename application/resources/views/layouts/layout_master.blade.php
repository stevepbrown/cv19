<!DOCTYPE html>

<html lang="en-GB">

<head>
    @head
    @slot('title')
    {{$title}}
    @endslot
    @slot('keywords')
    "IMPORTANT - add keywords"
    @endslot
    @slot('description')
    "IMPORTANT - add description"
    @endslot
    @endhead
</head>

<body>

    @include('cookieConsent::index')
    @component('laravel-components.component_cookie_policy')
    @endcomponent
    @yield('main')

</body>
@scripts
@slot('sup-scripts')
@endslot
@endscripts

</html>