@foreach ($menuler as $menu)
    <tr>
        <td>{{ str_repeat('--', $depth) }} {{ $menu->name }}</td>
        <td>{{ $menu->url }}</td>
        <td class="text-center">
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#menuModal"
                data-id="{{ $menu->id }}" data-name="{{ $menu->name }}"
                data-url="{{ $menu->url }}" data-parent_id="{{ $menu->parent_id }}">Düzenle</button>
            <form method="POST" action="{{ route('menuler.destroy', $menu->id) }}" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
            </form>
        </td>
    </tr>
    @if ($menu->altMenuler->count())
        @include('alt_menuler', ['menuler' => $menu->altMenuler, 'depth' => $depth + 1])
    @endif
@endforeach
