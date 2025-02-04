@extends('layouts.master')

@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
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
        <form action="/guru/{{$guru->id}}/update" method="POST">
            <h4><i class="nav-icon fas fa-graduation-cap my-1 btn-sm-1"></i> Edit Data Guru</h4>
            <hr>
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="nama">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control bg-light" id="nama" placeholder="Nama Lengkap" value="{{$guru->nama}}" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="nip">NIP</label>
                    <input name="nip" type="text" class="form-control bg-light" id="nama" placeholder="nomor NIP" value="{{$guru->nama}}" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jenis_kelamin" class="form-control bg-light" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                        <option value="1" @if ($guru->jenis_kelamin == '1') selected @endif>-</option>
                        <option value="2" @if ($guru->jenis_kelamin == '2') selected @endif>-</option>
                    </select>
                    <label for="departemen">departemen</label>
                    <input name="departemen" type="date" class="form-control bg-light" id="departemen" placeholder="departemen" value="{{$guru->tanggal_lahir}}" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                </div>
                <div class="col-md-6">
                    <label for="gaji">gaji</label>
                    <textarea name="Gaji" class="form-control bg-light" id="alamat" rows="2" placeholder="gaji" value="{{$guru->alamat}}" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">{{$guru->alamat}}</textarea>
                    <label for="join_date">tanggal bergabung</label>
                    <input name="join_date" type="number" class="form-control bg-light" id="no_hp" placeholder="tanggal bergabung" value="{{$guru->no_hp}}" required oninvalid="this.setCustomValidity('Isian ini tidak boleh kosong !')" oninput="setCustomValidity('')">
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-sm "><i class="fas fa-save"></i> SIMPAN</button>
            <a class="btn btn-danger btn-sm" href="/guru/index" role="button"><i class="fas fa-undo"></i>
                BATAL</a>
        </form>
    </div>
</section>
@endsection