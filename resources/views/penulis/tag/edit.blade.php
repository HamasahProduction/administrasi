@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Tag Artikel
        @endslot
        @slot('li_1')
            Tag
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <form action="{{ route('app.penulis.tag.update',[$tag->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label">Nama Tag<span class="text-danger">*</span></label>
                                <div class="col-lg-7">
                                    <input type="text" name="nama" maxlength="255" minlength="5"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $tag->nama) }}">
                                    <div class="invalid-feedback">
                                        @error('nama')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <span class="text-muted float-start">
                            <strong class="text-danger">*</strong> Harus diisi
                        </span>
                        <a class="btn btn-secondary" href="{{ route('app.penulis.tag.tag') }}">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
@endpush
