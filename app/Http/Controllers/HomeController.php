<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function __construct()
    {
        $this->SiswaModel = new SiswaModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'siswa' => $this->SiswaModel->getAllData()
        ];

        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Request()->validate([
            'nama_siswa'=> 'required|min:3',
            'kelas'=>'required',
            'no_induk'=>'required|unique:tb_siswa,no_induk',
            'foto'=> 'required|mimes:png,jpg,jpeg|max:3200'
        ],[
            'nama_siswa.required'=> 'Nama Siswa harus diisi',
            'nama_siswa.min'=> 'Nama Siswa diisi minimal 3 karakter',

            'kelas.required'=>'Kelas harus diisi !',
            'no_induk.required'=>'Nomer Induk harus diisi !',
            'no_induk.unique'=> 'Nomer Induk telah terdaftar, silahkan gunakan Nomer Induk Lainnya !',
            'foto.required'=>'Foto harus Diisi',
            'foto.mimes'=>'Foto harus bertipe .png/.jpg',
            'foto.max'=>'Foto harus dibawah 3mb.'
        ]);

        $file = Request()->foto;
        $namefoto = Request()->no_induk . '.'. $file->extension();
        $file->move(public_path('img'), $namefoto);

        $dataStore = [
            'nama_siswa'=> Request()->nama_siswa,
            'kelas'=> Request()->kelas,
            'no_induk'=> Request()->no_induk,
            'foto'=> $namefoto
        ];

        $this->SiswaModel->storeData($dataStore);

        return redirect(url()->previous())->with('berhasil', ' Data Tersimpan !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_siswa)
    {
        if(!$this->SiswaModel->getDetailData($id_siswa)){
            abort(404);
        }
        $data = [
            'siswa'=> $this->SiswaModel->getDetailData($id_siswa)
        ];

        return view('detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_siswa)
    {
        Request()->validate([
            'nama_siswa'=> 'required|min:3',
            'kelas'=>'required',
            'no_induk'=>'required',
            'foto'=> 'mimes:png,jpg,jpeg|max:3200'
        ],[
            'nama_siswa.required'=> 'Nama Siswa harus diisi',
            'nama_siswa.min'=> 'Nama Siswa diisi minimal 3 karakter',

            'kelas.required'=>'Kelas harus diisi !',
            'no_induk.required'=>'Nomer Induk harus diisi !',
            
            
            'foto.mimes'=>'Foto harus bertipe .png/.jpg',
            'foto.max'=>'Foto harus dibawah 3mb.'
        ]);

        if(!empty(Request()->foto)){
            $file = Request()->foto;
            $namefoto = Request()->no_induk . '.'. $file->extension();
            $file->move(public_path('img'), $namefoto);
    
            $dataStore = [
                'nama_siswa'=> Request()->nama_siswa,
                'kelas'=> Request()->kelas,
                'no_induk'=> Request()->no_induk,
                'foto'=> $namefoto
            ];
    
            $this->SiswaModel->updateData($dataStore, $id_siswa);
    
        }else{
            $dataStore = [
                'nama_siswa'=> Request()->nama_siswa,
                'kelas'=> Request()->kelas,
                'no_induk'=> Request()->no_induk,
            ];
    
            $this->SiswaModel->updateData($dataStore, $id_siswa);
        }
        
        return redirect(url()->previous())->with('berhasil', ' Data Ter-update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = $this->SiswaModel->getDetailData($id);
        if(!empty($siswa->foto)){
            unlink(public_path('img/'.$siswa->foto));
        }

        $this->SiswaModel->deleteData($id);
        return redirect(url()->previous())->with('berhasil', ' Data Ter-hapus !');
    }
}
