<?php

namespace App\Http\Controllers;

use App\Pupuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PupukController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Pupuk';
        $pupuk=Pupuk::paginate(5);
        return view('admin.Pupuk', compact('title','pupuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Pupuk';
        return view('admin.inputPupuk', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=> 'kolom :attribute harus lengkap',
            'date'    => 'kolom :attribute harus tanggal',
            'numeric' => 'kolom :attribute harus angka',
        ];
        $validasi = $request->validate([
            'nama_pupuk'=>'required',
            'jumlah_pupuk'=>'required',
            'harga_pupuk'=>'required',
            'keterangan'=>''
        ],$messages);
        Pupuk::create($validasi);
        return redirect('Pupuk')->with('success','data berhasil di update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Input Pupuk';
        $pupuk=Pupuk::find($id);
        return view('admin.inputPupuk', compact('title','pupuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required'=> 'kolom :attribute harus lengkap',
            'date'    => 'kolom :attribute harus tanggal',
            'numeric' => 'kolom :attribute harus angka',
        ];
        $validasi = $request->validate([
            'nama_pupuk'=>'required',
            'jumlah_pupuk'=>'required',
            'harga_pupuk'=>'required',
            'keterangan'=>''
        ],$messages);
        Pupuk::whereid_pupuk($id)->update($validasi);
        return redirect('Pupuk')->with('success','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pupuk::whereid_pupuk($id)->delete();
        return redirect('Pupuk')->with('success','data berhasil di update');
    }
}
