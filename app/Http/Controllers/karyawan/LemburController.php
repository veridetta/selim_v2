<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\lemburs;
use App\Models\Cutis;
use App\Models\Jabatan;
use App\Models\Lamarans;
use App\Models\Lembur;
use App\Models\Mundurs;
use App\Models\Pelanggarans;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

class LemburController extends Controller
{

  public function lembur()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Lembur Karyawan"]];

    $data=Lamarans::select('lamarans.*','jabatans.jabatan as jabatan_jabatan')->where('lamarans.id_karyawan','=',auth()->user()->id_karyawan)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/lembur', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function lembur_add(Request $request){
    $validator = Validator::make($request->all(), [
      'tanggal' => 'required',
      'jabatan' => 'required',
      'lama' => 'required',
      
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('lembur-karyawan')->withErrors($validator)
      ->withInput();;
    }
    $jadwalAbsen = Carbon::createFromTime(8, 0, 0);
    $waktuAbsen = Carbon::now();
    $selisihWaktu = $waktuAbsen->diffInMinutes($jadwalAbsen);
    if($selisihWaktu>0){
      $status = 'late';
    }else{
      $status='ontime';
    }
    $user = Lembur::updateOrCreate([
        'id' => $request->id,
    ], [
        'id_users'=> auth()->user()->id,
        'id_karyawan' => auth()->user()->id_karyawan,
        'nama' => auth()->user()->name,
        'jabatan' => $request->jabatan,
        'tanggal' => $request->tanggal,
        'lama' => $request->lama,
      
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('lembur-karyawan');
  }
  
  public function lembur_data()
  {
    $user=Lembur::select('lemburs.*','jabatans.jabatan as jabatan_jabatan')->where('lemburs.id_users','=',auth()->user()->id)->join('jabatans','jabatans.id','=','lemburs.jabatan')->get();
    return ['data' => $user];
  }

}
