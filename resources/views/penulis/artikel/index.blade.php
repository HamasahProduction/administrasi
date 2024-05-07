@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Artikel
        @endslot
        @slot('li_1')
            Artikel
        @endslot
        @slot('li_2')
            Daftar
        @endslot
        @slot('action_button')
            <a href="{{ route('app.penulis.artikel.create') }}" class="btn btn-primary btn-md">
                <i class="fa fa-plus"></i> Tambah Artikel
            </a>
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table no-footer mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%">Thumbnail</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tgl Post</th>
                                            <th>Status</th>
                                            <th>Preview</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->thumbnail == null ? 'assets/img/placeholder.jpg' : 'storage/' . $item->thumbnail) }}"
                                                        alt="Thumbnail" style="width: 150px">
                                                </td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->kategori->nama }}</td>
                                                <td>{{ $item->tgl_posting }}</td>
                                                <td>{{ $item->status_posting }}</td>
                                                <td>
                                                    <a href="{{ route('lp.landing-page.artikel.artikel', ['category'=>str_replace(' ', '-', $item->kategori->nama),'slug'=>$item->slug]) }}"
                                                        class="btn btn-sm btn-warning" target="__blank">Lihat
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($item->status_posting == false)
                                                        <button type="button"
                                                            data-action="{{ route('app.penulis.artikel.publish', $item->id) }}"
                                                            data-id="{{ $item->id }}"
                                                            class="btn btn-primary btn-sm btn-posting">
                                                            Posting
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                scrollX: true,
            });
            $('.select2').select2();
        });
        $(function() {

            $('.btn-delete').on('click', function() {
                var action = $(this).data('action');
                var id = $(this).data('id');
                swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda yakin menghapus data ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonText: "Hapus!",
                    cancelButtonText: "Batal!",
                    // reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: action,
                            type: 'DELETE',
                            cache: false,
                            dataType: 'json',
                            data: {
                                id: id,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: true,
                                    timer: 6000
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }
                        });
                    }
                });
            });

            $('.btn-posting').on('click', function() {
            var action = $(this).data('action');
            var id = $(this).data('id');
            swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Anda yakin akan posting artikel ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Saya yakin",
                cancelButtonText: "Batalkan",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'PUT',
                        cache: false,
                        dataType: 'json',
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: true,
                                timer: 6000
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });
        });

        });
    </script>
@endpush
