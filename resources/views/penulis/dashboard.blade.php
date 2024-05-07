@extends('layout.mainlayout')
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row mb-5">
            <div class="col-sm-12">
                <h3 class="page-title">Selamat datang ...!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Kelembagaan</h4>
                        <div class="statistics">
                            <div class="row">
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Aktif</p>
                                        <h3></h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 text-center">
                                    <div class="stats-box mb-4">
                                        <p>Tidak Aktif</p>
                                        <h3></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p><i class="fa-regular fa-circle-dot text-success me-2"></i>xxxxx<span class="float-end">xxx</span></p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6 d-flex">
                {{-- <div class="card flex-fill">
                    <div class="card-body">
                        <h4 class="card-title">Jumlah Penduduk <span class="badge bg-inverse-warning ms-6">{{ $pendudukCount }}</span></h4>
                        <div class="leave-info-box">
                            <div class="media d-flex align-items-center">
                                <a href="profile.html" class="avatar"><img src="assets/img/user.jpg" alt="User Image"></a>
                                <div class="media-body flex-grow-1">
                                    <div class="text-sm my-0">Penduduk Laki-Laki</div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-12">
                                    <h4 class="mb-0">Jumlah : {{ $pendudukPria }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="leave-info-box">
                            <div class="media d-flex align-items-center">
                                <a href="profile.html" class="avatar"><img src="assets/img/user.jpg" alt="User Image"></a>
                                <div class="media-body flex-grow-1">
                                    <div class="text-sm my-0">Penduduk Perempuan</div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-12">
                                    <h4 class="mb-0">Jumlah : {{ $pendudukWanita }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="leave-info-box">
                            <div class="media d-flex align-items-center">
                                <a href="profile.html" class="avatar"><img src="assets/img/user.jpg" alt="User Image"></a>
                                <div class="media-body flex-grow-1">
                                    <div class="text-sm my-0">Kepala Keluarga</div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-12">
                                    <h4 class="mb-0">Jumlah : {{ $kepalaKeluarga }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    {{-- <div class="card-header">
                        <h3 class="card-title mb-0">Permohonan Surat</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Permohonan </th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permohonanAdministrasi as $permohonan)
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html"><strong>{{ $permohonan->jenis_surat }}</strong></a>
                                            </h2>
                                            <small class="block text-ellipsis">
                                                <span>NIK</span> <span class="text-muted">{{ $permohonan->nik }}, </span>
                                                <span>Pemohon</span> <span class="text-muted">{{ $permohonan->nama_pemohon }}</span>
                                            </small>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">{{ $permohonan->status }}</span>
                                        </td>
                                        <td>
                                           {{ $permohonan->tgl_permohonan }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('app.admin.permohonan_surat.index') }}">Lihat Semua</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    {{-- <div class="card-header">
                        <h3 class="card-title mb-0">Aktivitas Surat</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Kode Surat</th>
                                        <th>Instansi</th>
                                        <th>Tanggal</th>
                                        <th>Perihal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="invoice-view.html">#INV-0002</a></td>
                                        <td>
                                            <h2><a href="admin-dashboard.html#">Delta Infotech</a></h2>
                                        </td>
                                        <td>8 Feb 2019</td>
                                        <td>Permohonan Dana</td>
                                        <td>
                                            <span class="badge bg-inverse-success">Masuk</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="invoice-view.html">#INV-0003</a></td>
                                        <td>
                                            <h2><a href="admin-dashboard.html#">Cream Inc</a></h2>
                                        </td>
                                        <td>23 Jan 2019</td>
                                        <td>SPPD</td>
                                        <td>
                                            <span class="badge bg-inverse-danger">Keluar</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="invoices.html">View all invoices</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
