<?php

namespace App\Http\Controllers;

use App\Models\Absensis;
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

class PenggunaController extends Controller
{
    public function dashboard()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Dahsboard"]];

    $data=Lamarans::where('id_karyawan','=',auth()->user()->id_karyawan)->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/dashboard', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }

  public function data()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Profil Karyawan"]];
    $jabatan = Jabatan::get();
    $data=Lamarans::where('id_karyawan','=',auth()->user()->id_karyawan)->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/data', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'jabatans'=>$jabatan]);
  }

  public function data_add(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'tpl' => 'required',
      'tgl' => 'required',
      'jk' => 'required',
      'kota' => 'required',
      'mulai' => 'required',
      'email' => 'required',
      'jabatan' => 'required',
      //'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('profil-karyawan')->withErrors($validator)
      ->withInput();;
    }
    $user = Lamarans::updateOrCreate([
        'id' => $request->id
    ], [
        'id_karyawan' => Auth::user()->id_karyawan,
        'id_users' => Auth::user()->id_users,
        'nama' => $request->name,
        'tpl' => $request->tpl,
        'tgl' => $request->tgl,
        'jk' => $request->jk,
        'kota' => $request->kota,
        'mulai' => $request->mulai,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('profil-karyawan');
  }

  public function absensi()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Absensi Karyawan"]];

    $data=Lamarans::select('lamarans.*','jabatans.jabatan as jabatan_jabatan')->where('lamarans.id_karyawan','=',auth()->user()->id_karyawan)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/absensi', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function absensi_add(Request $request){
    $validator = Validator::make($request->all(), [
      'tanggal' => 'required',
      'jabatan' => 'required',
      
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('absensi-karyawan')->withErrors($validator)
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
    $user = Absensis::updateOrCreate([
        'id' => $request->id,
    ], [
        'id_users'=> auth()->user()->id,
        'id_karyawan' => auth()->user()->id_karyawan,
        'nama' => auth()->user()->name,
        'jabatan' => $request->jabatan,
        'tanggal' => $request->tanggal,
        'in' => $waktuAbsen->format('H:i'),
        'out' => '',
        'status' => $status
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('absensi-karyawan');
  }
  public function out(Request $request){
  
    $waktuAbsen = Carbon::now();
    $user = Absensis::updateOrCreate([
        'id' => $request->id,
    ], [
        'out' => $waktuAbsen->format('H:i')
    ]);
    if($user){
        session()->flash('success', 'Berhasil Cek Out.');
        //redirect
    }
    return redirect()->route('absensi-karyawan');
  }
  public function absensi_data()
  {
    $user=Absensis::select('absenses.*','jabatans.jabatan as jabatan_jabatan')->where('absenses.id_users','=',auth()->user()->id)->join('jabatans','jabatans.id','=','absenses.jabatan')->get();
    return ['data' => $user];
  }

  public function cuti()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Izin Absen"]];

    $data=Lamarans::select('lamarans.*','jabatans.jabatan as jabatan_jabatan')->where('lamarans.id_karyawan','=',auth()->user()->id_karyawan)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
    
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/cuti', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function cuti_add(Request $request){
    $validator = Validator::make($request->all(), [
      'tanggal' => 'required',
      'jabatan' => 'required',
      'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ]);
    if ($validator->fails()) {
      dd($validator);
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('cuti-karyawan')->withErrors($validator)
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
    $user = Cutis::updateOrCreate([
        'id' => $request->id
    ], [
      'id_users'=> auth()->user()->id,
      'id_karyawan' => auth()->user()->id_karyawan,
      'nama' => auth()->user()->name,
      'jabatan' => $request->jabatan,
      'tanggal' => $request->tanggal,
      'ket' => $request->ket,
      'foto' => $path_foto
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('cuti-karyawan');
  }
  public function cuti_data()
  {
    $user=Cutis::select('cutis.*','jabatans.jabatan as jabatan_jabatan')->where('cutis.id_users','=',auth()->user()->id)->join('jabatans','jabatans.id','=','cutis.jabatan')->get();
    return ['data' => $user];
  }

  public function gaji(Request $request)
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Slip Gaji"]];
    $months = Absensis::get()->groupBy(function($d) {return Carbon::parse($d->created_at)->format('m');});
    if($request->bulan){
      
    }else{
      //$dates=NULL;
    }
    $data=Lamarans::select('lamarans.*','jabatans.jabatan as j_jabatan','jabatans.bagian as j_bagian')->where('lamarans.id_karyawan','=',auth()->user()->id_karyawan)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/gaji', ['val'=>$val,'data'=>$data,'months'=>$months,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function slip(Request $request)
  { 
    $bulan=$request->bulan;
    $tahun = $request->tahun;
    $user=Lamarans::select('lamarans.*','jabatans.jabatan as j_jabatan','jabatans.bagian as j_bagian')->where('lamarans.id_karyawan','=',auth()->user()->id_karyawan)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
    $jabatan = Jabatan::where('id','=',$user->jabatan)->first();
    $gaji_pokok=$jabatan->pokok;
    $ttetap = $jabatan->ttetap;
    $tjabatan = $jabatan->tjabatan;
    $tinsentif = $jabatan->tinsentif;
    $ttransport=$jabatan->ttransport;
    $jumlahLembur = DB::table('lemburs')
                ->whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan)
                ->sum('lama');

    $gaji_lembur = $jabatan->lembur * $jumlahLembur;
    $masuk = Absensis::whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $izin = Cutis::where('ket','=','Izin')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $sakit = Cutis::where('ket','=','Sakit')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $sekarang=Carbon::now()->format('d-m-Y');
    $gaji_bersih = $gaji_pokok+$ttetap+$tjabatan+$tinsentif+$ttransport+$gaji_lembur;
    $arr= array(
      "nama"=>$user->nama,
      "j_bagian"=>$user->j_bagian,
      "j_jabatan"=>$user->j_jabatan,
      "id_karyawan"=>$user->id_karyawan,
      "bulan"=>$bulan,
      "tahun"=>$tahun,
      "gaji_pokok"=>$gaji_pokok,
      "ttetap"=>$ttetap,
      "tjabatan" => $tjabatan,
      "tinsentif"=>$tinsentif,
      "ttransport"=>$ttransport,
      "gaji_lembur"=>$gaji_lembur,
      "lembur"=>$jabatan->lembur,
      "total_lembur"=>$jumlahLembur,
      "masuk"=>$masuk,
      "izin"=>$izin,
      "sakit"=>$sakit,
      "sekarang"=>$sekarang,
      "gaji_bersih"=>$gaji_bersih
    );
    if($request->download=="download"){
      $pdf = Pdf::loadView('layouts/users/karyawan/slip', ['data'=>$arr])->setPaper('a4', 'landscape');;
      return $pdf->download('Gaji-Karyawan.pdf');
    }else{
      return view('layouts/users/karyawan/slip',['data'=>$arr]);
    }
    
  }
  public function mundur(Request $request)
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Pengunduran Diri"]];
    $mundur = Mundurs::where('id_users','=',auth()->user()->id)->first();
    $data=Lamarans::where('id_users','=',auth()->user()->id)->first();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/users/karyawan/pengunduran', ['val'=>$val,'data'=>$data,'mundur'=>$mundur,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function mundur_add(Request $request){
    $validator = Validator::make($request->all(), [
      'nip' => 'required',
      'id_users' => 'required',
      'name' => 'required',
      'cv' => "required|mimes:pdf|max:10000"
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('mundur-karyawan')->withErrors($validator)
      ->withInput();;
    }
    if($request->cv){
      $path_cv = 'cv/'.time().'.cv.'.$request->cv->extension();
      // Public Folder
      $request->cv->storeAs('files', $path_cv,'public');
    }else{
      $path_cv='';
      session()->flash('danger', 'Cek upload cv.');
    return redirect()->route('mundur-pelamar');
    }
    $user = Mundurs::updateOrCreate([
        'id' => $request->id
    ], [
        'id_users' => $request->id_users,
        'nip' => $request->nip,
        'nama' => $request->name,
        'file' => $path_cv,
        'status' => 'Pengajuan'
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('mundur-karyawan');
  }

  public function mundur_download(Request $request)
    {
      $mundur = Mundurs::where('id_users','=',auth()->user()->id)->first();
        $path = public_path("storage/files/$mundur->file");
        $fileName = 'Pengunduran-diri.pdf';

        return Response::download($path, $fileName, ['Content-Type: application/pdf']);
    }
  
    public function pelanggaran_data()
    {
      $user=Pelanggarans::where('id_users','=',auth()->user()->id)->get();
      return ['data' => $user];
    }
    public function pelanggaran()
    {
      $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
      $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Cuti"]];
      $langgar=Pelanggarans::where('id_users','=',auth()->user()->id)->first();
      $data=Lamarans::where('id_users','=',auth()->user()->id)->first();
      $val = array('primary','secondary','warning','danger','info');
      return view('layouts/users/karyawan/pelanggaran', ['val'=>$val,'data'=>$data,'langgar'=>$langgar,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
    }
}
