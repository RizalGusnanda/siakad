<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Support\Facades\Storage;
use PDF;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (request('search')){
            $paginate = Mahasiswa::where('nim', 'like', '%'.request('search').'%')
                                    ->orwhere('nama', 'like', '%'.request('search').'%')
                                    ->orwhere('kelas', 'like', '%'.request('search').'%')
                                    ->orwhere('jurusan', 'like', '%'.request('search').'%')
                                    ->paginate(3);
            return view('mahasiswa.index', ['paginate'=>$paginate]);
        } else {
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $paginate=Mahasiswa::orderBy('id_mahasiswa','asc')->paginate(3);
            return view('mahasiswa.index',['mahasiswa'=>$mahasiswa,'paginate'=>$paginate]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //melakukan validasi data
        $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
        'image' => 'required',
        ]);

        if($request->file('image')){
        $image_name = $request->file('image')->store('image', 'public');
        }

        //-----------------------//
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim =$request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->image = $image_name;
        
    
        
        // $mahasiswa->save();
        // $mahasiswa->image = $image_name;

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi --> $mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        
        return view('mahasiswa.detail',['Mahasiswa' => $Mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa= Mahasiswa::with('kelas')->where('nim', $nim)->first();
        // dd($mahasiswa);
        // $Mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('mahasiswa','kelas'));
    }

    public function Mahasiswa_MataKuliah($nim)
    {
        $mahasiswa = Mahasiswa_MataKuliah::with('matakuliah')->where('mahasiswa_id', $nim)->get();
        $mahasiswa->mahasiswa = Mahasiswa::with('kelas')->where('id_mahasiswa', $nim)->first();
        return view('mahasiswa.nilai', ['mahasiswa' => $mahasiswa]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
        'image' => '',
        // 'Jenis_Kelamin' => 'required',
        // 'Email' => 'required',
        // 'Alamat' => 'required',
        // 'Tanggal_Lahir' => 'required',
        ]);

        

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim =$request->get('nim');
        $mahasiswa->nama =$request->get('nama');
        $mahasiswa->jurusan =$request->get('jurusan');
        
        if ($mahasiswa->image && file_exists(storage_path('app/public/' . $mahasiswa->image))) {
            Storage::delete('public/' . $mahasiswa->image);  
        }
        $image_name='';
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('image', 'public');
        }
        $mahasiswa->image = $image_name;
        // $mahasiswa->save();
        
        

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');


        //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        // Mahasiswa::where('nim', $nim) ->update([
        // 'nim'=>$request->Nim,
        // 'nama'=>$request->Nama,
        // 'kelas'=>$request->Kelas,
        // 'jurusan'=>$request->Jurusan,
        // // 'jenis_kelamin'=>$request->Jenis_Kelamin,
        // // 'email'=>$request->Email,
        // // 'alamat'=>$request->Alamat,
        // // 'tanggal_lahir'=>$request->Tanggal_Lahir,
        // ]);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }


    public function nilai($nim)
    {
        //
        return view('mahasiswa.nilai');
        //return dd($matkul);
    }

    public function cetak_pdf($nim){
        $mahasiswa = Mahasiswa::with('kelas')->where("nim", $nim)->first();
        $matakuliah = Mahasiswa_Matakuliah::with("matakuliah")->where("mahasiswa_id", ($mahasiswa-> id_mahasiswa))->get();
        dd($matakuliah);
        $pdf = PDF::loadview('mahasiswa.cetak', ['mahasiswa' => $mahasiswa,'matakuliah'=>$matakuliah]);
        return $pdf->stream();
    }
}
