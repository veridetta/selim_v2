<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function redirect()
  {
    $role = Auth::user()->role;
        switch ($role) {
            case 'admin':
                return redirect()->intended('admin');
            case 'karyawan':
                return redirect()->intended('user');
            case 'pelamar':
              return redirect()->intended('user');
            case 'pimpinan':
              return redirect()->intended('admin');
            default:
                return redirect('/');
        }
  }

  public function home(){
    return view('auth.login');
  }
}
