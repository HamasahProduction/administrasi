@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Kategori
        @endslot
        @slot('li_1')
            Kategori Artikel
        @endslot
        @slot('li_2')
            Form Tambah Baru
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('app.penulis.artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">Kategori <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select required name="kategori_id" id="kategori_id"
                                                    class="select2 form-control @error('kategori_id') is-invalid @enderror"
                                                    value="{{ old('kategori_id') }}">
                                                    <option value="" selected>== Pilih Kategori ==</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    @error('kategori_id')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">Tanggal Post<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="date" name="tgl_posting" maxlength="255" minlength="5"
                                                    class="form-control @error('tgl_posting') is-invalid @enderror"
                                                    value="{{ old('tgl_posting') }}">
                                                <div class="invalid-feedback">
                                                    @error('tgl_posting')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">Judul Artikel<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" name="judul" maxlength="255" minlength="5"
                                                    class="form-control @error('judul') is-invalid @enderror"
                                                    value="{{ old('judul') }}">
                                                <div class="invalid-feedback">
                                                    @error('judul')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-5 col-form-label">Thumbnail<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="file" name="thumbnail" maxlength="255" minlength="5" accept="image/png, image/jpg, image/jpeg"
                                                    class="form-control @error('thumbnail') is-invalid @enderror"
                                                    value="{{ old('thumbnail') }}">
                                                <div class="invalid-feedback">
                                                    @error('thumbnail')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <textarea name="content" cols="30" rows="30" id="content"
                                            class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}"></textarea>
                                        <div class="invalid-feedback">
                                            @error('content')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('app.penulis.artikel.artikel') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            ClassicEditor.create(document.querySelector('#content'), {
                    alignment: {
                        options: ['left', 'right','justify']
                    },
                    // toolbar: [
                    //     'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
                    // ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
