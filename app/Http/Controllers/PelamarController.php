<?php

namespace App\Http\Controllers;

use App\Models\Lamarans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelamarController extends Controller
{
    public function data()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Beranda"]];

    $data=Lamarans::where('id_users','=',auth()->user()->id)->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/pelamar/data', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function data_add(Request $request){
    $validator = Validator::make($request->all(), [
      'nip' => 'required',
      'id_users' => 'required',
      'name' => 'required',
      'tpl' => 'required',
      'tgl' => 'required',
      'jk' => 'required',
      'alamat' => 'required',
      'telp' => 'required',
      'email' => 'required',
      'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      'cv' => "required|mimes:pdf|max:10000",
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('data-pelamar')->withErrors($validator)
      ->withInput();;
    }
    if($request->foto){
      $path_foto = 'foto/'.time().'.foto.'.$request->foto->extension();
      // Public Folder
      $request->foto->storeAs('images', $path_foto,'public');
    }else{
      $path_foto='';
      session()->flash('danger', 'Cek upload foto.');
      return redirect()->route('data-pelamar');
    }
    if($request->cv){
        $path_cv = 'cv/'.time().'.cv.'.$request->cv->extension();
        // Public Folder
        $request->cv->storeAs('files', $path_cv,'public');
      }else{
        $path_cv='';
        session()->flash('danger', 'Cek upload cv.');
      return redirect()->route('data-pelamar');
      }
    $user = Lamarans::updateOrCreate([
        'id' => $request->id
    ], [
        'id_users' => $request->id_users,
        'nip' => $request->nip,
        'nama' => $request->name,
        'tpl' => $request->tpl,
        'tgl' => $request->tgl,
        'jk' => $request->jk,
        'alamat' => $request->alamat,
        'telp' => $request->telp,
        'email' => $request->email,
        'foto' => $path_foto,
        'cv' => $path_cv,
        'posisi' => 'belum'
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('data-pelamar');
  }
  public function posisi_add(Request $request){
    $user = Lamarans::updateOrCreate([
        'id' => $request->id
    ], [
        'posisi' => $request->posisi
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('dashboard-user');
  }
}
