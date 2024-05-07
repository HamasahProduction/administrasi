@extends('layout.mainSurat')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Surat Keterangan Tidak Mampu
        @endslot
        @slot('li_1')
            Surat Keterangan Tidak Mampu
        @endslot
        @slot('li_2')
            Form Edit
        @endslot
    @endcomponent

    <x-alert />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="{{ route('app.admin.surat.sktm.update', $sktm->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <small class="text-muted"> <strong>FORM PENDUDUK TERDAFTAR:</strong></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Masukan NIK Penduduk <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="nik" id="nik"
                                        class="select2 province form-control @error('nik') is-invalid @enderror"
                                        value="{{ old('nik') }}">
                                        <option selected disabled>--Pilih NIK Penduduk--</option>
                                        @foreach ($penduduks as $penduduk)
                                        <option value="{{ $penduduk->nik }}" {{ $penduduk->nik ==$sktm->nik?'selected':'' }}>NIK : {{ $penduduk->nik }} | {{ $penduduk->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('nik')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nama Sekolah<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="nama_sekolah" maxlength="255" minlength="5"
                                        class="form-control @error('nama_sekolah') is-invalid @enderror"
                                        value="{{ old('nama_sekolah',$sktm->nama_sekolah) }}">
                                    <div class="invalid-feedback">
                                        @error('nama_sekolah')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kelas<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="kelas" maxlength="255" minlength="1"
                                        class="form-control @error('kelas') is-invalid @enderror"
                                        value="{{ old('kelas', $sktm->kelas) }}">
                                    <div class="invalid-feedback">
                                        @error('kelas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tanggal Surat<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="date" name="tgl_surat" maxlength="255" minlength="5"
                                        class="form-control @error('tgl_surat') is-invalid @enderror"
                                        value="{{ old('tgl_surat', $sktm->tgl_surat) }}">
                                    <div class="invalid-feedback">
                                        @error('tgl_surat')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <span class="text-muted float-start">
                                <strong class="text-danger">*</strong> Harus diisi
                            </span>
                            <a href="{{ route('app.admin.surat.sktm.index') }}" class="btn btn-secondary me-2">Kembali</a>
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
