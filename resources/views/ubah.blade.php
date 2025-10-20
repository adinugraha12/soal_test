@extends('template')

@section('content')
<div class="container mt-4">
    <h3 class="text-center mb-4">Halaman Edit Kependudukan</h3>
    <a href="/kependudukan" class="btn btn-warning mb-4">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $kependudukan)
            <form action="/kependudukan/edit" method="post">
                {{ csrf_field() }}

                <div class="form-group mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" value="{{ $kependudukan->nik }}" readonly required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $kependudukan->nama }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $kependudukan->alamat }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tmpt_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmpt_lahir" value="{{ $kependudukan->tmpt_lahir }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="{{ $kependudukan->tgl_lahir }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="Jenis_Kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="Jenis_Kelamin"
                            id="jk_l"
                            value="L"
                            {{ $kependudukan->Jenis_Kelamin == 'L' ? 'checked' : '' }}
                            required
                        >
                        <label class="form-check-label" for="jk_l">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="Jenis_Kelamin"
                            id="jk_p"
                            value="P"
                            {{ $kependudukan->Jenis_Kelamin == 'P' ? 'checked' : '' }}
                            required
                        >
                        <label class="form-check-label" for="jk_p">Perempuan</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="Sts_Kawin">Status Kawin</label>
                    <select class="form-control" name="Sts_Kawin" required>
                        <option value="">-- Pilih Status Kawin --</option>
                        <option value="Kawin" {{ $kependudukan->Sts_Kawin == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Belum Kawin" {{ $kependudukan->Sts_Kawin == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Cerai" {{ $kependudukan->Sts_Kawin == 'Cerai' ? 'selected' : '' }}>Mati Cerai</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="Jumlah_Saudara">Jumlah Saudara</label>
                    <input type="number" class="form-control" name="Jumlah_Saudara" value="{{ $kependudukan->Jumlah_Saudara }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="agama">Agama</label>
                    <select class="form-control" name="agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam" {{ $kependudukan->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ $kependudukan->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ $kependudukan->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ $kependudukan->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $kependudukan->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Kong Hu Cu" {{ $kependudukan->agama == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="pendidikan">Pendidikan</label>
                    <select class="form-control" name="pendidikan" required>
                        <option value="">-- Pilih Pendidikan --</option>
                        <option value="SD" {{ $kependudukan->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="SMP" {{ $kependudukan->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                        <option value="SMA/SMK" {{ $kependudukan->pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                        <option value="S1/D3" {{ $kependudukan->pendidikan == 'S1/D3' ? 'selected' : '' }}>S1/D3</option>
                    </select>
                </div>

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan Data
                    </button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
