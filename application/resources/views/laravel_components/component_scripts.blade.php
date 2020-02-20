{{-- components\component_scripts.blade.php --}}
<noscript>This page uses javascript to provide an interactive browsing experience &#46; Please enable javascript to
    experience the site in its intended form &#46;</noscript>
<script src="/js/app.js" type="text/javascript"></script>

{{-- Stacks

Blade allows you to push to named stacks which can be rendered somewhere else in another view or layout. This can be particularly useful for specifying any JavaScript libraries required by your child  --}}
@stack('supplementary_scripts')


