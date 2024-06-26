<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Session;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = pegawai::where('nama', 'like', "%$katakunci%") 
                  ->orWhere('alamat','like', "%$katakunci%")
                  ->orderBy('nama','desc')
                  ->paginate($jumlahbaris);
        }else{
          $data = pegawai::orderBy('nama','desc')->paginate($jumlahbaris);  
        }
        return view('pegawai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,pegawai $pegawai)
    {

        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nama'=>'required|unique:pegawai,nama',
            'alamat'=>'required',
        ],
        [
            'nama.required'=>'nama wajib di isi',
            'nama.unique'=>'nama sudah ada' ,
            'alamat.required'=>'alamat wajib di isi'
        ]);
        $data = [
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            // 'absensi'=>$request-> ,
        ];
        // pegawai::where('nama', $id)->update($data);
        $pegawai->create($data);
       
        return redirect()->to('pegawai')->with('success', 'Berhasil merubah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pegawai::where('nama', $id)->first();
        return view('pegawai.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$pegawai)
    {   
        $data = [
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        ];

        $pegawai = Pegawai::where('nama',$pegawai)->update($data);
       
        return redirect()->to('pegawai')->with('success', 'Berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pegawai $pegawai)
    {   
      
        $pegawai = pegawai::find($id);
      
        $pegawai->delete();
    //     return redirect()->to('pegawai')->with('success', 'Berhasil menghapus data');
    }

    public function delete($nama){
        pegawai::where('nama',$nama)->delete();

        return redirect()->to('pegawai')->with('success', 'Berhasil menghapus data');
    }
}
