<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 4 Todo App</title>

        <!-- Bootstrap 4 CSS (CDN) -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <!-- Custom Style untuk variasi kreatif -->
        <style>
            body {
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100 screen;
            }
            .todo-card {
                border: none;
                border-radius: 15px;
                transition: transform 0.2s, box-shadow 0.2s;
            }
            .todo-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
            }
            .line-through-text {
                text-decoration: line-through;
                color: #6c757d;
            }
        </style>
    </head>
    
    <body class="py-5">
        <div class="container">
            <!-- Header Dashboard (a) -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center bg-white p-4 rounded-lg shadow-sm mb-4">
                <div>
                    <h1 class="h3 font-weight-bold text-dark mb-1">📋 My Todo Dashboard</h1>
                    <p class="text-muted small mb-0">Atur tugas dan produktivitas harian Anda dengan mudah.</p>
                </div>
                <!-- Tombol Pembuat ToDo Baru yang memicu Modal Bootstrap (a) -->
                <button type="button" class="btn btn-primary font-weight-bold shadow-sm px-4 py-2 mt-3 mt-md-0" data-toggle="modal" data-target="#createTodoModal">
                    + Buat ToDo Baru
                </button>
            </div>

            <!-- Alert Notifikasi Sukses -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Grid Daftar ToDo (a) -->
            <div class="row">
                @forelse($todos as $todo)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm todo-card {{ $todo->is_completed ? 'bg-light' : '' }}">
                            <div class="card-body d-flex flex-column justify-content-between">
                                
                                <!-- Bagian Atas Card -->
                                <div>
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <!-- Judul ToDo -->
                                        <h5 class="card-title font-weight-bold mb-0 {{ $todo->is_completed ? 'line-through-text' : 'text-dark' }}">
                                            {{ $todo->title }}
                                        </h5>
                                        
                                        <!-- Checkbox Cepat di Home -->
                                        <form action="{{ route('todos.updateStatus', $todo->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm p-0 text-decoration-none" title="Ubah status">
                                                @if($todo->is_completed)
                                                    <span class="badge badge-success px-2 py-1">✓ Selesai</span>
                                                @else
                                                    <span class="badge badge-warning px-2 py-1 text-dark">⏳ Berjalan</span>
                                                @endif
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Keterangan ToDo -->
                                    <p class="card-text text-secondary small text-justify {{ $todo->is_completed ? 'line-through-text' : '' }}">
                                        {{ $todo->description ?? 'Tidak ada keterangan tambahan.' }}
                                    </p>
                                </div>

                                <!-- Bagian Bawah Card (Footer Status & Aksi) -->
                                <div class="border-top pt-3 mt-3 d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        @if($todo->is_completed && $todo->completed_at)
                                            <span class="text-success font-weight-bold">Selesai: {{ $todo->completed_at->translatedFormat('d M Y, H:i') }}</span>
                                        @else
                                            <span class="text-muted">Dibuat: {{ $todo->created_at->format('d/m/Y') }}</span>
                                        @endif
                                    </small>
                                    
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Hapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm text-danger font-weight-bold p-0 text-decoration-none">Hapus</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="bg-white p-5 rounded-lg text-center shadow-sm border">
                            <p class="text-muted mb-0">Belum ada daftar ToDo. Silakan klik tombol di atas untuk menambah tugas baru.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Jendela / Modal untuk Membuat ToDo Baru (b) -->
        <div class="modal fade" id="createTodoModal" tabindex="-1" aria-labelledby="createTodoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 15px;">
                    <div class="modal-header bg-light" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        <h5 class="modal-title font-weight-bold text-dark" id="createTodoModalLabel">Tambah Tugas Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form action="{{ route('todos.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Input Judul ToDo -->
                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Judul ToDo <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-group form-control rounded-lg" placeholder="Contoh: Revisi modul program" required>
                            </div>

                            <!-- Input Keterangan ToDo -->
                            <div class="form-group">
                                <label class="font-weight-bold text-secondary">Keterangan</label>
                                <textarea name="description" class="form-control rounded-lg" rows="4" placeholder="Tulis rincian atau catatan tugas di sini..."></textarea>
                            </div>

                            <!-- Checkbox Selesai -->
                            <div class="form-group form-check custom-control custom-checkbox ml-1">
                                <input type="checkbox" name="is_completed" value="1" class="custom-control-input" id="modalCompletedCheckbox">
                                <label class="custom-control-label font-weight-bold text-secondary" for="modalCompletedCheckbox">
                                    Tandai langsung sebagai 'Selesai'
                                </label>
                            </div>
                        </div>
                        
                        <div class="modal-footer bg-light" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <button type="button" class="btn btn-secondary rounded-lg font-weight-bold px-4" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary rounded-lg font-weight-bold px-4 shadow-sm">Simpan ToDo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>
