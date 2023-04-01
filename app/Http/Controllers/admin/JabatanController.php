<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Absensis;
use App\Models\Cutis;
use App\Models\Jabatan;
use App\Models\Lamarans;
use App\Models\Mundurs;
use App\Models\Pelanggarans;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
  public function jabatan()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Master Jabatan"]];

    $kar = User::join('lamarans','lamarans.id_users','=','users.id')->where('users.role','=','karyawan')->orderBy('name')->get();


    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/jabatan', ['val'=>$val,'kars'=>$kar,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function jabatan_add(Request $request){
    $validator = Validator::make($request->all(), [
      'bagian' => 'required',
      'jabatan' => 'required',
      'pokok' => 'required',
      'ttetap' => 'required',
      'tinsentif' => 'required',
      'tjabatan' => 'required',
      'ttransport' => 'required',
      'lembur' => 'required',
      'masa' => 'required',
      'kode' => 'required',
    ]);
    if ($validator->fails()) {
      dd($validator);
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('jabatan-admin')->withErrors($validator)
      ->withInput();;
    }
    $nn = explode('&&',$request->id_users);
    $user = Jabatan::updateOrCreate([
        'id' => $request->id
    ], [
        'bagian' => $request->bagian,
        'jabatan' => $request->jabatan,
        'pokok' => $request->pokok,
        'tinsentif' => $request->tinsentif,
        'tjabatan' => $request->tjabatan,
        'ttetap' => $request->ttetap,
        'ttransport' => $request->ttransport,
        'lembur' => $request->lembur,
        'masa' => $request->masa,
        'kode' => $request->kode
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('jabatan-admin');
  }
  public function jabatan_data()
  {
    $user=Jabatan::get();
    return ['data' => $user];
  }
  public function jabatan_data_single(Request $request)
  {
    $user=Jabatan::where('id','=',$request->id)->first();
    return ['data' => $user];
  }
  public function jabatan_delete(Request $request){
    $user = Jabatan::where('id','=',$request->id)->delete();
    if($user){
        session()->flash('success', 'Data Berhasil dihapus.');
        //redirect
    }
    return redirect()->route('jabatan-admin');
  }
}
