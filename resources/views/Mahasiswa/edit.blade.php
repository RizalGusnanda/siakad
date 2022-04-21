@extends('mahasiswa.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
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
                <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="{{ $mahasiswa->nim }}" aria-describedby="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $mahasiswa->nama }}" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control">
                            @foreach ($kelas as $kls)
                            <option value="{{$kls->id}}" {{ $mahasiswa->kelas_id == $kls->id ? 'selected' : '' }}>{{$kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $mahasiswa->jurusan }}" aria-describedby="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto</label> 
                        <input type="file" name="image" class="form-control" id="image" value="{{ $mahasiswa->image }}" aria-describedby="image" >
                        <img style="width:100%" src="{{ asset('storage/'. $mahasiswa->image) }}" alt="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="Jenis_Kelamin">Jenis Kelamin</label>
                        <input type="Jenis_Kelamin" name="Jenis_Kelamin" class="form-control" id="Jenis_Kelamin" value="{{ $mahasiswa->jenis_kelamin }}" aria-describedby="Jenis_Kelamin">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="Email" name="Email" class="form-control" id="Email" value="{{ $mahasiswa->email }}" aria-describedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="Alamat" name="Alamat" class="form-control" id="Alamat" value="{{ $mahasiswa->alamat }}" aria-describedby="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="Tanggal_Lahir" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir" value="{{ $mahasiswa->tanggal_lahir }}" aria-describedby="Tanggal_Lahir">
                    </div> -->

                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection