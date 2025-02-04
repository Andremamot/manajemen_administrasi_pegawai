@extends('layouts.master')
@section('content')
@if(session('warning'))
<div class="callout callout-warning alert alert-warning alert-dismissible fade show" role="alert">
  <h5><i class="fas fa-info"></i> Peringatan :</h5>
  {{session('warning')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">

  @if (auth()->user()->role == 'admin' || auth()->user()->role == 'PetugasAdministrasiKeuangan')
  <div class="col-md-9">
    <section class="content card" style="padding: 15px 15px 40px 15px ">
      <div class="box">
        <div class="row">
          <div class="col">
            <h4><i class="nav-icon fas fa-warehouse my-0 btn-sm-1"></i> Rekap Data</h4>
            <hr>
          </div>
        </div>
        <div class="card-body">
          <!-- Small boxes (Stat box) -->
          <div class="filter-container p-0 row d-flex justify-content-center">
            <div class="col-lg-3 col-md-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{DB::table('guru')->count()}}</h3>
                  <p>pegawai</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                </div>
                <p class="small-box-footer">Jumlah Pegawai</p>
              </div>
            </div>
  @endif
  </div>
  <div class="col-md-3">
    <section class="content card" style="padding: 10px 10px 10px 10px ">
      <div class="box">
        
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach($data_admin as $admin)
            <li class="item">
              <div class="product-img">
                <img src="/adminLTE/img/support.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{$admin->name}}
                  <span class="badge badge-warning float-right">Administrator</span></a>
                <span class="product-description">
                  Email : {{$admin->email}}
                </span>
              </div>
            </li>
            @endforeach
            @foreach($data_petugas as $petugas)
            <li class="item">
              <div class="product-img">
                <img src="/adminLTE/img/support.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{$petugas->nama}}
                  <span class="badge badge-warning float-right">{{$petugas->tugas}}</span></a>
                <span class="product-description">
                  Email : {{$petugas->email}}
                </span>
                <span class="product-description text-info">
                  HP : {{$petugas->no_hp}}
                </span>
              </div>
            </li>
            @endforeach
            <!-- /.item -->
          </ul>
        </div>
      </div>
    </section>
  </div>
  <div class="col-md-3">
    <section class="content card" style="padding: 10px 10px 10px 10px ">
      <div class="box">
        <div class="row">
          <div class="col">
            <h4><i class="nav-icon fas fa-user-tag my-0 btn-sm-1"></i> Riwayat Login</h4>
            <hr>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach($data_login as $user_login)
            <li class="item">
              <div class="product-img">
                <img src="/adminLTE/img/user.png" alt="Product Image" class="img-size-50">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">{{$user_login->name}}
                  <span class="badge float-right"><i class="far fa-clock"></i> {{$user_login->created_at->diffForHumans()}}</span></a>

                <span class="product-description">
                  {{$user_login->email}}
                </span>
              </div>
            </li>
            @endforeach
            <!-- /.item -->
          </ul>
        </div>
      </div>
    </section>
  </div>
  @endsection