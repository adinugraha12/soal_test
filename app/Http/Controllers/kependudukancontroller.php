<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kependudukan;
use PDF;

use App\Exports\kependudukanexport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class kependudukancontroller extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function tampil()
    {
        $data=kependudukan::All();
        return view('kependudukan',['data'=>$data]);
    }
    public function tambah()
    {
        return view('tambah');
    }
    public function home()
    {
        return view('home');
    }

    public function simpan(request $request)
    {
        $data=array(
            "nik"=>$request->nik,
            "nama"=>$request->nama,
            "alamat"=>$request->alamat,
            "tmpt_lahir"=>$request->tmpt_lahir,
            "tgl_lahir"=>$request->tgl_lahir,
            "Sts_Kawin"=>$request->Sts_Kawin,
            "Jumlah_Saudara"=>$request->Jumlah_Saudara,
            "Jenis_Kelamin"=>$request->Jenis_Kelamin,
            "agama"=>$request->agama,
            "pendidikan"=>$request->pendidikan,
        );
        $data=kependudukan:: create($data);
        if($data){
            return redirect('/kependudukan')->with(array('status'=>true, 'berhasil tambah data'));

        }else{
            return json_encode(array('status'=>false,'pesan'=>"gagal tambah data"));
        }
    }
    public function edit(request $request)
    {
        $data= kependudukan::where("nik", $request->nik)->update(array(
            "nama"=>$request->nama,
            "alamat"=>$request->alamat,
            "tmpt_lahir"=>$request->tmpt_lahir,
            "tgl_lahir"=>$request->tgl_lahir,
            "Sts_Kawin"=>$request->Sts_Kawin,
            "Jumlah_Saudara"=>$request->Jumlah_Saudara,
            "Jenis_Kelamin"=>$request->Jenis_Kelamin,
            "pendidikan"=>$request->pendidikan,
            "agama"=>$request->agama,


        ));
        if($data){
            return redirect('/kependudukan')->with(array('status'=>true, 'Berhasil Ubah Data'));
        } else{
            return json_encode(array('status'=>false, 'pesan'=>"Gagal Ubah Data"));
        }
    }
    public function ubah($nik){
        $data=kependudukan::where('nik',$nik)->get();
        return view('ubah', ['data'=>$data]);
    }
    public function hapus($nik): bool|RedirectResponse|string
    {
        $data = kependudukan:: where("nik", $nik)->delete();
        if($data){
            return redirect('/kependudukan')->with(array('status'=>true, 'Berhasil Hapus Data'));
        }else{
            return json_encode(array(
                'status'=>false,
                'pesan'=>"Gagal Hapus",
            ));
        }
    }
    public function cetak_pdf()
    {
        $kependudukan = kependudukan::all();

        $pdf = PDF::loadview('pdf',['kependudukan'=>$kependudukan]);
        return $pdf->download('laporan-kependudukan.pdf');
    }
    public function export_excel()
    {
        return Excel::download(new kependudukanexport, 'kependudukan.xlsx');
    }

}