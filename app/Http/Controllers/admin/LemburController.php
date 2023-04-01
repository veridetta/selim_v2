<?php

namespace App\Http\Controllers\admin;

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
    return view('layouts/admin/lembur', ['val'=>$val,'data'=>$data,'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
  
  public function lembur_data()
  {
    $user=Lembur::select('lemburs.*','jabatans.jabatan as jabatan_jabatan')->join('jabatans','jabatans.id','=','lemburs.jabatan')->get();
    return ['data' => $user];
  }
  public function lembur_delete(Request $request){
    $user = Lembur::where('id','=',$request->id)->delete();
    if($user){
        session()->flash('success', 'Data Berhasil dihapus.');
        //redirect
    }
    return redirect()->route('lembur-admin');
  }

}
