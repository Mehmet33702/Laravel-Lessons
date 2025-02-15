<!DOCTYPE html>
<html>

<head>
    <title>Menü Yönetimi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Menü Yönetimi</h1>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#menuModal">Menü Ekle</button>
        <table class="table table-bordered table-sm table-hover">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>Başlık</th>
                    <th>URL</th>
                    <th class="text-center">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuler as $menu)
                    <tr style="background-color: lightyellow;">
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->url }}</td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#menuModal"
                                data-id="{{ $menu->id }}" data-name="{{ $menu->name }}"
                                data-url="{{ $menu->url }}" data-parent_id="{{ $menu->parent_id }}">Düzenle</button>
                            <form method="POST" action="{{ route('menuler.destroy', $menu->id) }}"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Alt Menüleri Göster -->
                    @if ($menu->altMenuler->count())
                        @include('alt_menuler', ['menuler' => $menu->altMenuler, 'depth' => 1])
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModalLabel">Menü Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="menuForm" method="POST" action="{{ route('menuler.store') }}">
                        @csrf
                        <input type="hidden" id="method" name="_method" value="POST">
                        <input type="hidden" id="menu_id" name="menu_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Başlık</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>
                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Üst Menü Seç</label>
                            <select class="form-select" id="parent_id" name="parent_id">
                                <option value="">Üst Menü Yok</option>
                                @foreach ($menuler as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @foreach ($menu->altMenuler as $altMenu)
                                        <option value="{{ $altMenu->id }}">-- {{ $altMenu->name }}</option>
                                        @foreach ($altMenu->altMenuler as $altAltMenu)
                                            <option value="{{ $altAltMenu->id }}">---- {{ $altAltMenu->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menuModal = document.getElementById('menuModal');
            menuModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var name = button.getAttribute('data-name');
                var url = button.getAttribute('data-url');
                var parent_id = button.getAttribute('data-parent_id');
                var modalTitle = menuModal.querySelector('.modal-title');
                var menuForm = document.getElementById('menuForm');
                var methodInput = document.getElementById('method');
                var menuIdInput = document.getElementById('menu_id');
                var nameInput = document.getElementById('name');
                var urlInput = document.getElementById('url');
                var parentIdSelect = document.getElementById('parent_id');

                if (id) {
                    modalTitle.textContent = 'Menü Düzenle';
                    menuForm.action = '/menuler/' + id;
                    methodInput.value = 'PUT';
                    menuIdInput.value = id;
                    nameInput.value = name;
                    urlInput.value = url;
                    parentIdSelect.value = parent_id;
                } else {
                    modalTitle.textContent = 'Menü Ekle';
                    menuForm.action = '{{ route('menuler.store') }}';
                    methodInput.value = 'POST';
                    menuIdInput.value = '';
                    nameInput.value = '';
                    urlInput.value = '';
                    parentIdSelect.value = '';
                }
            });
        });
    </script>
</body>

</html>
