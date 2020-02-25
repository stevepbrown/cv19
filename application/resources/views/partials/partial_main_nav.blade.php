
    <nav id="nav-main-nav "class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler collapsed w-75 mx-auto" type="button" data-toggle="collapse" data-target="#div-collapsed-navigation" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="div-collapsed-navigation" class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                {{-- Voyager $items prepopulated on basis of voyager menu referenced in call  --}}
                @foreach($items as $menu_item)
                <li class="nav-item mx-auto px-3">
                    <a class="nav-link" href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>

