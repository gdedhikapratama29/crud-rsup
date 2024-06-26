@extends('layout.template')
        
        <!-- START DATA -->
        @section('konten')
            
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('pegawai') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('pegawai/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Alamat</th>
                            <th class="col-md-2">Absensi</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)     
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>hadir</td>
                            <td>
                                <a href='{{url('pegawai/'.$item->nama.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('yakin hapus data?')" class="d-inline" action="{{ url('pegawai-delete/'.$item->nama) }}" method="post">
                                   @csrf
                                
                                  <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $data->links('pagination::bootstrap-5') }}
                </div>
          </div>
          <!-- AKHIR DATA -->
        @endsection
   