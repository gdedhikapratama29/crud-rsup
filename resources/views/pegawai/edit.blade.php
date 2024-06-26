@extends('layout.template')


@section('konten')
<!-- START FORM -->
    

<form action='{{ url('pegawai/'.$data->nama) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{url('pegawai')}}" class="btn btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                {{-- <label for="nim" class="col-sm-2 col-form-label">NO</label> --}}
                {{-- <div class="col-sm-10">
                    <input type="number" class="form-control" name='no' id="no">
                </div> --}}
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}" id="alamat">
                </div>
            </div>
           
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->
@endsection