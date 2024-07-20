@extends('template.master')

@section('content')
    <div class="card">
        <h1>Form Edit Data</h1>
        <form action="{{ route('mobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_mobil">Nama Mobil</label><br>
                <input type="text" id="nama_mobil" name="nama_mobil" value="{{ $mobil->nama_mobil }}" required><br>
            </div>
            <div>
                <label for="merk_id">Merk Mobil</label><br>
                <select name="merk_id" id="merk_id" required>
                    <option value="">Pilih Merk Mobil</option>
                    @foreach ($merks as $merk)
                        <option value="{{ $merk->id }}" {{ $merk->id == $mobil->merk_id ? 'selected' : '' }}>{{ $merk->merk }}</option>
                    @endforeach
                </select><br>
            </div>
            <div>
                <label for="tipe_id">Tipe Mobil</label><br>
                <select name="tipe_id" id="tipe_id" required>
                    <option value="">Pilih Tipe Mobil</option>
                    @foreach ($tipemobils as $tipe)
                        <option value="{{ $tipe->id }}" {{ $tipe->id == $mobil->tipe_mobil_id ? 'selected' : '' }}>{{ $tipe->tipe }}</option>
                    @endforeach
                </select><br>
            </div>
            <div>
                <label for="cc">CC</label><br>
                <input type="text" id="cc" name="cc" value="{{ $mobil->cc }}" required><br>
            </div>
            <div>
                <label for="nomor_polisi">Nomor Polisi</label><br>
                <input type="text" id="nomor_polisi" name="nomor_polisi" value="{{ $mobil->nomor_polisi }}" required><br>
            </div>
            <div>
                <label for="warna">Warna</label><br>
                <input type="text" id="warna" name="warna" value="{{ $mobil->warna }}" required><br>
            </div>
            <div>
                <label for="tahun_mobil">Tahun Mobil</label><br>
                <input type="text" id="tahun_mobil" name="tahun_mobil" value="{{ $mobil->tahun_mobil }}" required><br>
            </div>
            <div>
                <label for="foto">Foto Mobil</label><br>
                <input type="file" id="foto" name="foto"><br>
                @if($mobil->foto)
                    <img src="{{ asset('images/' . $mobil->foto) }}" alt="" width="100">
                @endif
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
