@extends('mahasiswa.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name='kelas'>
                        @foreach ($kelas as $kls)
                        <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="jurusan" name="jurusan" class="form-control" id="jurusan"aria-describedby="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto </label>         
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <!-- <div class="form-group">
                        <label for="Foto">Jurusan</label> 
                        <input type="file" name="Foto" class="form-control" id="Foto" aria-describedby="Foto" > 
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="Jenis_Kelamin">Jenis Kelamin</label>
                        <input type="Jenis_Kelamin" name="Jenis_Kelamin" class="form-control" id="Jenis_Kelamin"aria-describedby="Jenis_Kelamin">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="Email" name="Email" class="form-control" id="Email"aria-describedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="Alamat" name="Alamat" class="form-control" id="Alamat"aria-describedby="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="Tanggal_Lahir" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir"aria-describedby="Tanggal_Lahir">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection