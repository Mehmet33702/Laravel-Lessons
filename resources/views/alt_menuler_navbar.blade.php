@foreach ($menuler as $menu)
    <li>
        <a class="dropdown-item" href="{{ $menu->url }}">{{ $menu->name }}</a>
        @if ($menu->altMenuler->count())
            <ul class="dropdown-menu">
                @include('alt_menuler_navbar', ['menuler' => $menu->altMenuler])
            </ul>
        @endif
    </li>
@endforeach
