@extends('mahasiswa.layout')
@section('content')
    <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2 class="col-12 text-center" >JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="col-12 text-center">
            <h3><strong>KARTU HASIL STUDI (KHS)</strong></h3>
        </div>

      
       <a class="btn btn-success float-right" href="{{route('cetak_pdf', $mahasiswa->first())}}"> Cetak KHS</a>
        <b>Nama:</b> {{ $mahasiswa->mahasiswa->nama }}<br>
        <b>NIM: </b>{{ $mahasiswa->mahasiswa->nim }}<br>
        <b>Kelas: </b> {{ $mahasiswa->mahasiswa->kelas->nama_kelas }}<br><br>
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai Angka</th>
                    <th>Nilai</th>
                </tr>
                @foreach ($mahasiswa as $mk)
                    <tr>
                        <td>{{ $mk->matakuliah->nama_matkul }}</td>
                        <td>{{ $mk->matakuliah->sks }}</td>
                        <td>{{ $mk->matakuliah->semester }}</td>
                        <td>{{ $mk->nilai_angka}}</td>
                        <td>{{ $mk->nilai_huruf }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="row my-3">
        <div class="col">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
    
@endsection