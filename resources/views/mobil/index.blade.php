@extends('template.master')

@section('content') 
<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Mobil</h1>
    <div class="d-flex justify-content-between mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Data Mobil</li>
        </ol>
        <a href="/mobil/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No.</th>
                            <th class="px-4 py-2">Nama Mobil</th>
                            <th class="px-4 py-2">CC</th>
                            <th class="px-4 py-2">Nomor Polisi</th>
                            <th class="px-4 py-2">Warna</th>
                            <th class="px-4 py-2">Tahun Mobil</th>
                            <th class="px-4 py-2">Merk</th>
                            <th class="px-4 py-2">Tipe Mobil</th>
                            <th class="px-4 py-2">Foto</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataMobil as $mobil)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $mobil->nama_mobil }}</td>
                                <td class="border px-4 py-2">{{ $mobil->cc }}</td>
                                <td class="border px-4 py-2">{{ $mobil->nomor_polisi }}</td>
                                <td class="border px-4 py-2">{{ $mobil->warna }}</td>
                                <td class="border px-4 py-2">{{ $mobil->tahun_mobil }}</td>
                                <td class="border px-4 py-2">{{ $mobil->nama_merk }}</td>
                                <td class="border px-4 py-2">{{ $mobil->nama_tipe }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('images/' . $mobil->foto) }}" alt="" width="100">    
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('mobil.destroy', $mobil->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
