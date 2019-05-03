<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;

class DosenController extends Controller
{

    function __construct()
    {
        $this->path = storage_path('app/public/images');
        $this->dimensions = ['245','300','500'];
        $this->folder = 'images';
    }

    public function indexandroid(){
        $data = json_encode(\DB::table('dosen')->get());
        echo "{\"data\":".$data."}";
    }

    public function index(){
        //! mengambil data dari table dosen
        //! select * from dosen
        $dosen = \DB::table('dosen')->get();
        //! membuat data array dengan nama datadosen yang akan dikirimkan ke view
        $datadosen=array(
            'judul' => 'Data Dosen',
            'dosen' => $dosen
        );
        //! mengirim array datadosen ke view index
        return view('dosen.index', $datadosen);
    }

    public function tambah(){
        $datadosen=array(
            'judul' => "Tambah Data Dosen"
        );

        return view('dosen.tambah', $datadosen);
    }

    public function simpandata(Request $request){

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //! Jika Foldernya belum ada
        if (!File::isDirectory($this->path)){
            File::makeDirectory($this->path);
        }

        $file = $request->file('image');
        $fileName = Carbon::now()->timestamp.'_'.uniqid().'.'.$file->getClientOriginalExtension();
        Image::make($file)->save($this->path.'/'.$fileName);
        foreach ($this->dimensions as $row){
            $canvas = Image::canvas($row, $row);
            $resizeImage=Image::make($file)->resize($row,$row,function($constraint){
                $constraint->aspectRatio();
            });
            if (!File::isDirectory($this->path.'/'.$row)) {
                # code...
                File::makeDirectory($this->path.'/'.$row);
            }

            $canvas->insert($resizeImage,'center');
            $canvas->save($this->path.'/'.$row.'/'.$fileName);
        }

        //!mengecek data nidn
        $datanidn = \DB::table('dosen')->where('nidn', $request->nidn)->get();
        if (count($datanidn) > 0) {
            # code...
            echo "<script>alert('Data NIDN Sudah Ada');history.go(-1);</script>";
        } else {
            # code...
            \DB::table('dosen')->insert([
                'namadosen' => $request->namadosen,
                'nidn' => $request->nidn,
                'alamat' => $request->alamat,
                'nama_foto' => $fileName,
                'folder' =>$this->folder,
                '_token' => $request->_token,
                'created_at' => date("Y/m/d H:i:s")
            ]);
        }
        //! mengalihakn ke halaman dosen

        // echo 'File Real Path: '.$file->getRealPath();

        return redirect("/dosen");
    }

    public function edit($id){
        //! mengambil data dosen berdasarkan id yang dipilih
        $dosen = \DB::table('dosen')->where('id',$id)->get();
        $datadosen=array(
            'dosen' => $dosen,
            'judul' => 'Edit Data Dosen'
        );

        //!passing data ke edit.blade.php
        return view('dosen.edit', $datadosen);
    }

    public function ubahdata(Request $request){
        \DB::table('dosen')->where('id', $request->id)->update([
            'namadosen' => $request->namadosen,
            'nidn' => $request->nidn,
            'alamat' => $request->alamat
        ]);

        return redirect('/dosen');
    }

    public function hapusdata($id){
        \DB::table('dosen')->where('id', $id)->delete();
        return redirect('/dosen');
    }

    public function tampildata(Request $request){
        // menangkap data pencarian
        $cari = $request->cari;

        //! mengambil data dari table dosen sesuai pencarian data
		$dosen = \DB::table('dosen')
		->where('nidn',$cari)
        ->get();

        /*
        *! mengambil data awalan tertentu
        $dosen= \DB::table('dosen')
        ->where('namadosen', 'like', 'A%')
        ->get();

        *! mengambil data pasti
        $dosen= \DB::table('dosen')
		->where('alamat','Jakarta')
        ->get();

        *! mengambil data beberapa kondisi
        $dosen= \DB::table('dosen')->where([
            ['alamat', '=', 'Bandung'],
            ['namadosen', 'like', 'B%'],
        ])->get();

        */

        $datadosen=array(
            'judul' => 'Data Dosen',
            'dosen' => $dosen
        );

    		// mengirim data pegawai ke view index
		return view('dosen.satu', $datadosen);
    }

}
