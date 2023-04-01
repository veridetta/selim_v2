<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
  public function dashboard()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'','navbarColor'=>'bg-light-danger'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => "Admin"], ['name' => "Beranda"]];

    $data="";
    $val = array('primary','secondary','warning','danger','info');
    
    return view('layouts/admin/dashboard', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function pelamar()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Pelamar"]];


    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/pelamar', ['val'=>$val,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function pelamar_data()
  {
    $user=User::join('lamarans','lamarans.id_users','=','users.id')->where('users.role','=','pelamar')->get();
    return ['data' => $user];
  }
  public function karyawan()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Karyawan"]];
    $jabatan = Jabatan::get();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/karyawan', ['val'=>$val,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'jabatans'=>$jabatan]);
  }
  public function karyawan_data()
  {
    $user=Lamarans::select('lamarans.*','jabatans.bagian as j_jabatan')->join('jabatans','jabatans.id','=','lamarans.jabatan')->get();
    
    return ['data' => $user];
  }
  public function karyawan_data_single(Request $request)
  {
    $user=Lamarans::where('id','=',$request->id)->first();
    return ['data' => $user];
  }
  public function karyawan_add(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'tpl' => 'required',
      'tgl' => 'required',
      'jk' => 'required',
      'kota' => 'required',
      'mulai' => 'required',
      'email' => 'required',
      'jabatan' => 'required',
      'id_karyawan' => 'required',
      //'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);
    if ($validator->fails()) {
      dd($validator);
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('karyawan-admin')->withErrors($validator)
      ->withInput();;
    }
    $user = Lamarans::updateOrCreate([
        'id' => $request->id
    ], [
        'id_karyawan' => $request->id_karyawan,
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
    return redirect()->route('karyawan-admin');
  }
  public function absensi()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Absensi"]];
    $kar = User::join('lamarans','lamarans.id_karyawan','=','users.id_karyawan')->where('users.role','=','karyawan')->orderBy('name')->get();
    $data=Jabatan::get();
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/absensi', ['val'=>$val,'kars'=>$kar,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'data'=>$data]);
  }
  public function absensi_add(Request $request){
    $validator = Validator::make($request->all(), [
      'tanggal' => 'required',
      'in' => 'required',
      'out' => 'required',

    ]);
    
    if ($validator->fails()) {
      dd($validator);
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('absensi-admin')->withErrors($validator)
      ->withInput();;
    }
    $jadwalAbsen = Carbon::createFromTime(8, 0, 0);
    $waktuAbsen = Carbon::parse($request->in);
    $selisihWaktu = $waktuAbsen->diffInMinutes($jadwalAbsen);
    if($selisihWaktu>0){
      $status = 'late';
    }else{
      $status='ontime';
    }
    $nn = explode('&&',$request->id_users);
    $user = Absensis::updateOrCreate([
        'id' => $request->id
    ], [
        'id_users' => $nn[0],
        'id_karyawan' => $nn[1],
        'nama' =>$nn[2],
        'jabatan' =>$request->jabatan,
        'tanggal' => $request->tanggal,
        'in' => $request->in,
        'out' => $request->out,
        'status' => $request->ket,
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Diubah.');
        //redirect
    }
    return redirect()->route('absensi-admin');
  }
  public function absensi_data()
  {
    $user=Absensis::select('absenses.*','jabatans.jabatan as jabatan_jabatan')->join('jabatans','jabatans.id','=','absenses.jabatan')->get();
    return ['data' => $user];
  }
  public function absensi_data_single(Request $request)
  {
    $user=Absensis::where('id','=',$request->id)->first();
    return ['data' => $user];
  }
  public function absensi_delete(Request $request){
    $user = Absensis::where('id','=',$request->id)->delete();
    if($user){
        session()->flash('success', 'Data Berhasil dihapus.');
        //redirect
    }
    return redirect()->route('absensi-admin');
  }

  public function gaji()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Gaji"]];
    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/gaji', ['val'=>$val,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function gaji_data(Request $request)
  {
    if($request->bulan!=="kosong"){
      $bulan = $request->bulan;
      $tahun = $request->tahun;
      $id_users = $request->id_users;
      $slip = Absensis::whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->get();
      $user=Lamarans::select('lamarans.*','jabatans.jabatan as j_jabatan','jabatans.bagian as j_bagian')->where('lamarans.id_users','=',$id_users)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
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
        $gaji_bersih = $gaji_pokok+$ttetap+$tjabatan+$tinsentif+$ttransport+$gaji_lembur;
        $sekarang=Carbon::now()->format('d-m-Y');
        $masuk = Absensis::whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $izin = Cutis::where('ket','=','Izin')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $sakit = Cutis::where('ket','=','Sakit')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
        $arr= array(
          "nama"=>$user->nama,
          "id_users"=>$user->id_users,
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
          "sekarang"=>$sekarang,
          "gaji_bersih"=>$gaji_bersih,
          "masuk"=>$masuk,
          "izin"=>$izin,
          "sakit"=>$sakit,
          "periode"=> $bulan.'-'.$tahun
        );
    }else{
      $months = Absensis::get()->groupBy(function($d) {return Carbon::parse($d->created_at)->format('m');});
      $arr = array();
      $no=0;
      foreach($months as $month){
        if($request->bulan!=="kosong"){

        }else{
          $bulan = Carbon::parse($month[$no]->tanggal)->format('m');
          $tahun = Carbon::parse($month[$no]->tanggal)->format('Y');
          $id_users = $month[$no]->id_users;
        }
        $slip = Absensis::whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->get();
        $user=Lamarans::select('lamarans.*','jabatans.jabatan as j_jabatan','jabatans.bagian as j_bagian')->where('lamarans.id_users','=',$id_users)->join('jabatans','jabatans.id','=','lamarans.jabatan')->first();
        //$user = Lamarans::where('id_users','=',$id_users)->first();
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
        $gaji_bersih = $gaji_pokok+$ttetap+$tjabatan+$tinsentif+$ttransport+$gaji_lembur;
        $sekarang=Carbon::now()->format('d-m-Y');
        $masuk = Absensis::whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $izin = Cutis::where('ket','=','Izin')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
    $sakit = Cutis::where('ket','=','Sakit')->whereMonth('tanggal','=',$bulan)->whereYear('tanggal','=',$tahun)->count();
        $are= array(
          "nama"=>$user->nama,
          "id_users"=>$user->id_users,
          "j_bagian"=>$user->j_bagian,
          "j_jabatan"=>$user->j_jabatan,
          "id_karyawan"=>$user->id_karyawan,
          "masuk"=>$masuk,
        "izin"=>$izin,
        "sakit"=>$sakit,
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
          "sekarang"=>$sekarang,
          "gaji_bersih"=>$gaji_bersih,
          "periode"=> $bulan.'-'.$tahun
        );
        $no++;
        array_push($arr,$are);
      }
    }
    
    if($request->download=="download"){
      $pdf = Pdf::loadView('layouts/users/karyawan/slip', ['data'=>$arr])->setPaper('a4', 'landscape');;
      return $pdf->download('Gaji-Karyawan.pdf');
    }else if($request->download=="view"){
      return view('layouts/users/karyawan/slip',['data'=>$arr]);
    }
    return ['data' => $arr];
  }
  public function cuti()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Cuti"]];

    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/cuti', ['val'=>$val,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function cuti_add(Request $request){
    $user = Cutis::updateOrCreate([
        'id' => $request->id
    ], [
        'status' => $request->status,
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Disimpan.');
        //redirect
    }
    return redirect()->route('cuti-admin');
  }
  public function cuti_data()
  {
    $user=Cutis::get();
    return ['data' => $user];
  }
  public function mundur()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Pengunduran Diri"]];

    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/mundur', ['val'=>$val,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function mundur_add(Request $request){
    $user = Mundurs::updateOrCreate([
        'id' => $request->id
    ], [
        'status' => $request->status,
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Disimpan.');
        //redirect
    }
    return redirect()->route('mundur-admin');
  }
  public function mundur_data()
  {
    $user=Mundurs::get();
    return ['data' => $user];
  }
  public function pelanggaran()
  {
    $pageConfigs = ['showMenu' => true,'mainLayoutType'=>'vertical'];
    $breadcrumbs = [ ['link' => "javascript:void(0)", 'name' => auth()->user()->role], ['name' => "Pelanggaran"]];

    $kar = User::join('lamarans','lamarans.id_users','=','users.id')->where('users.role','=','karyawan')->orderBy('name')->get();


    $val = array('primary','secondary','warning','danger','info');
    return view('layouts/admin/pelanggaran', ['val'=>$val,'kars'=>$kar,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  public function pelanggaran_add(Request $request){
    $validator = Validator::make($request->all(), [
      'id_users' => 'required',
      'tanggal' => 'required',
      'jenis' => 'required',
      'keterangan' => 'required'
    ]);
    if ($validator->fails()) {
      session()->flash('error', 'Periksa ulang kembali.');
      return redirect()->route('pelanggaran-admin')->withErrors($validator)
      ->withInput();;
    }
    $nn = explode('&&',$request->id_users);
    $user = Pelanggarans::updateOrCreate([
        'id' => $request->id
    ], [
        'id_users' => $nn[0],
        'nip' => $nn[1],
        'nama' =>$nn[2],
        'tanggal' => $request->tanggal,
        'jenis' => $request->jenis,
        'keterangan' => $request->keterangan
    ]);
    if($user){
        session()->flash('success', 'Data Berhasil Ditambah.');
        //redirect
    }
    return redirect()->route('pelanggaran-admin');
  }
  public function pelanggaran_data()
  {
    $user=Pelanggarans::get();
    return ['data' => $user];
  }
  public function pelanggaran_data_single(Request $request)
  {
    $user=Pelanggarans::where('id','=',$request->id)->first();
    return ['data' => $user];
  }
  public function pelanggaran_delete(Request $request){
    $user = Pelanggarans::where('id','=',$request->id)->delete();
    if($user){
        session()->flash('success', 'Data Berhasil dihapus.');
        //redirect
    }
    return redirect()->route('pelanggaran-admin');
  }
}
