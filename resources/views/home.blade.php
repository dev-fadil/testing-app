{{-- {{ dd($siswa) }} --}}

@extends('layouts.app')

@section('title', 'Home | SMP 1 Wringin')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->

            <div class="container-fluid">

                <div class="jumbotron">
                    <h1 class="display-3">Welcome to SMP 1 Wringin Website</h1>
                    @if (session('berhasil'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Selamat !</strong> {{ session('berhasil') }}
                        </div>
                    @endif
                    <p class="lead">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                            Add Data
                        </button>

                        <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/add/save" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama Siswa : </label>
                                            <input type="text" name="nama_siswa"
                                                class="form-control @error('nama_siswa') is-invalid @enderror"
                                                placeholder="" aria-describedby="helpId" value="{{ old('nama_siswa') }}">
                                            @error('nama_siswa')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Kelas : </label>
                                            <input type="text" name="kelas"
                                                class="form-control @error('kelas') is-invalid @enderror" placeholder=""
                                                aria-describedby="helpId" value="{{ old('kelas') }}">
                                            @error('kelas')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomer Induk Siswa : </label>
                                            <input type="number" name="no_induk"
                                                class="form-control @error('no_induk') is-invalid @enderror" placeholder=""
                                                aria-describedby="helpId" value="{{ old('no_induk') }}">
                                            @error('no_induk')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Siswa : </label>
                                            <input type="file" name="foto"
                                                class="form-control @error('foto') is-invalid @enderror" placeholder=""
                                                aria-describedby="helpId" value="{{ old('foto') }}">
                                            @error('foto')
                                                <small id="helpId" class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                    <hr class="my-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Nomer Induk</th>
                                <th>Mata Pelajaran</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->no_induk }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <img src="{{ asset('img/' . $item->foto) }}"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                            alt="" width="100">
                                    </td>
                                    <td>
                                        <a href="/detail/{{ $item->id }}" class="btn btn-sm btn-primary">Detail</a>


                                        {{-- modal hapus --}}


                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapus{{ $item->id }}">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Apakah anda yaqin ingin menghapus data ini ?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="/hapus/{{ $item->id }}" type="button"
                                                            class="btn btn-danger btn-sm">Delete <i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- modal akhir hapus --}}



                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $item->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/update/{{ $item->id }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Nama Siswa : </label>
                                                                <input type="text" name="nama_siswa"
                                                                    class="form-control @error('nama_siswa') is-invalid @enderror"
                                                                    placeholder="" aria-describedby="helpId"
                                                                    value="{{ old('nama_siswa') ? old('nama_siswa') : $item->nama_siswa }}">
                                                                @error('nama_siswa')
                                                                    <small id="helpId"
                                                                        class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Kelas : </label>
                                                                <input type="text" name="kelas"
                                                                    class="form-control @error('kelas') is-invalid @enderror"
                                                                    placeholder="" aria-describedby="helpId"
                                                                    value="{{ old('kelas') ? old('kelas') : $item->kelas }}">
                                                                @error('kelas')
                                                                    <small id="helpId"
                                                                        class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Nomer Induk Siswa : </label>
                                                                <input type="number" readonly name="no_induk"
                                                                    class="form-control @error('no_induk') is-invalid @enderror"
                                                                    placeholder="" aria-describedby="helpId"
                                                                    value="{{ old('no_induk') ? old('no_induk') : $item->no_induk }}">
                                                                @error('no_induk')
                                                                    <small id="helpId"
                                                                        class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <img src="{{ asset('img/' . $item->foto) }}"
                                                                    class="img-fluid" alt="">
                                                                <br>
                                                                <label for=""> Ganti Foto Siswa : </label>
                                                                <input type="file" name="foto"
                                                                    class="form-control @error('foto') is-invalid @enderror"
                                                                    placeholder="" aria-describedby="helpId"
                                                                    value="{{ old('foto') }}">
                                                                @error('foto')
                                                                    <small id="helpId"
                                                                        class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- modal --}}
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>


        <!-- /.content -->
    </div>

@endsection
