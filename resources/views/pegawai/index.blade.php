@extends('layouts.master')
@section('content')
    @if(session('sukses'))
        <div class="callout callout-success alert alert-success alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-check"></i> Sukses :</h5>
            {{session('sukses')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('warning'))
        <div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-info"></i> Informasi :</h5>
            {{session('warning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="callout callout-danger alert alert-danger alert-dismissible fade show">
            <h5><i class="fas fa-exclamation-triangle"></i> Peringatan :</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
<section class="content card" style="padding: 10px 10px 20px 20px  ">
    <div class="box">
        <div class="row">
            <div class="col">
                <h4><i class="nav-icon fas fa-graduation-cap my-0 btn-sm-1"></i> Data Pegawai</h4>
                <hr>
            </div>
        </div>
        <div>
            <div class="col">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahGuru"><i class="fas fa-plus"></i>
                    Tambah Data
                </button>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="row table-responsive">
                <div class="col-12">
                    <table class="table table-hover table-head-fixed" id='tabelAgendaMasuk'>
                        <thead>
                            <tr class="bg-light">
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>departemen</th>
                                <th>Gaji</th>
                                <th>Tanggal Bergabung</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($data_guru as $guru)
                            <?php $no++; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$guru->nama}}</td>
                                <td>{{$guru->jenis_kelamin}}</td>
                                <td>{{$guru->tempat_lahir}}</td>
                                <td>{{$guru->tanggal_lahir}}</td>
                                <td>{{$guru->alamat}}</td>
                                <td>
                                    <a href="/guru/{{$guru->id}}/edit" class="btn btn-primary btn-sm my-1 mr-sm-1"><i class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                    @if (auth()->user()->role == 'admin')
                                    <a href="/guru/{{$guru->id}}/delete" class="btn btn-danger btn-sm my-1 mr-sm-1" onclick="return confirm('Hapus Data ?')"><i class="nav-icon fas fa-trash"></i>
                                        Hapus</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-graduation-cap my-1 btn-sm-1"></i> Tambah Data Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/guru/tambah" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <label for="nama">NIP</label>
                                    <input value="{{old('nama')}}" name="nama" type="text" class="form-control bg-light" id="nama" placeholder="NIP" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                    <label for="nama">Nama Lengkap</label>
                                    <input value="{{old('nama')}}" name="nama" type="text" class="form-control bg-light" id="nama" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                    <label for="kode">Jabatan</label>
                                    <select name="jk" class="form-control my-1 mr-sm-2 bg-light" id="jk" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                        <option value="">-- Jabatan --</option>
                                        <option value="Laki-Laki">-</option>
                                        <option value="Perempuan">-</option>
                                    </select>
                                    <label for="tempatlahir">Departemen</label>
                                    <input value="{{old('tempatlahir')}}" name="tempatlahir" type="text" class="form-control bg-light" id="tempatlahir" placeholder="Departemen" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                    <label for="tgllahir">Gaji</label>
                                    <input value="{{old('tgllahir')}}" name="tgllahir" type="number" class="form-control bg-light" id="tgllahir" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                                    <label for="alamat">Tanggal Bergabung</label>
                                    <textarea name="alamat" class="form-control bg-light" id="alamat" rows="2" type="date" placeholder="Tanggal bergabung" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">{{old('alamat')}}</textarea>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                    SIMPAN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection