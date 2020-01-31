<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#div-main-nav-collapsible"
        aria-controls="div-main-nav-collapsible" aria-expanded="false" aria-label="Toggle main navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container" id="div-main-nav-container">
        <div class="collapse navbar-collapse">
                <div class="collapse navbar-collapse"  id="div-main-nav-collapsible">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        {{-- Voyager $items prepopulated on basis of voyager menu referenced in call  --}}
                        @foreach($items as $menu_item)
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
</nav>
</div>