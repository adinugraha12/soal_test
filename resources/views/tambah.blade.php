@extends('template')

@section('content')
    <div class="container">
        <h3>Halaman Tambah Data Kependudukan</h3>
        <hr>

        <a href="/kependudukan" class="btn btn-warning mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/kependudukan/store" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmpt_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
    <label for="Jenis_Kelamin">Jenis Kelamin</label>
    <select class="form-control" name="Jenis_Kelamin" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>

<div class="form-group">
    <label for="Sts_Kawin">Status Kawin</label>
    <select class="form-control" name="Sts_Kawin" required>
        <option value="">-- Pilih Status Kawin --</option>
        <option value="Kawin">Kawin</option>
        <option value="Belum Kawin">Belum Kawin</option>
        <option value="Cerai">Mati Cerai</option>
    </select>
</div>

<div class="form-group">
    <label for="Jumlah_Saudara">Jumlah Saudara</label>
    <input type="number" class="form-control" name="Jumlah_Saudara" required>
</div>



                    <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" name="agama" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                   </select>
                  </div>

                   <div class="form-group">
                   <label for="pendidikan">Pendidikan</label>
                   <select class="form-control" name="pendidikan" required>
                   <option value="">-- Pilih Pendidikan --</option>
                   <option value="SD">SD</option>
                   <option value="SMP">SMP</option>
                   <option value="SMA/SMK">SMA/SMK</option>
                   <option value="S1/D3">S1/D3</option>
                  </select>
                </div>


                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
