<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use File;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::user() && Auth::user()->aktif == 1) {
            return redirect('admin/');
        }

        return view('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        flash('Çıkış Yapıldı!', 'info')->setTitle('Uyarı');
        return redirect('admin/');
    }
    public function loginPost(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->aktif == 0) {
                Auth::logout();
                flash('Kullanıcı aktif değil!', 'error')->setTitle('Hata!');
            }
            return redirect('admin/');
        }
        flash('Hatalı Giriş!', 'error')->setTitle('Hata!');
        return redirect('admin/login');
    }
    public function kullanicilar(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::select('*')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('islemler', function ($row) {
                    $btnSil = '';
                    $btnDuzenle = '';
                    if ($row->id != Auth::user()->id) {
                        $btnSil = '<button id="delete" data-id="' . $row->id . '" class="btn btn-danger btn-circle btn-md">
                        <i class="fas fa-trash"></i>
                    </button>';
                        $btnDuzenle = '<button id="edit" data-id="' . $row->id . '" class="btn btn-warning btn-circle btn-md">
                    <i class="fas fa-edit"></i>
                </button>';
                    }
                    return $btnSil . ' ' . $btnDuzenle;
                })
                ->addColumn('action', function ($row) {
                    $checked = '';
                    $state = $row->id == Auth::user()->id ? 'disabled' : '';
                    if ($row->aktif == 1) {
                        $checked = 'checked';
                    }


                    $btn = '<input ' . $state . ' class="toggle" id="aktif" name="aktif" type="checkbox" ' . $checked . ' data-id="' . $row->id . '" data-toggle="toggle"
                            data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="secondary" data-size="sm">';

                    return $btn;
                })
                ->rawColumns(['islemler', 'action'])
                ->make(true);
        }
        return view('admin.kullanicilar.list');
    }
    public function aktifPost(Request $req)
    {
        $durum = $req->input('aktif');
        $id = $req->input('id');
        Admin::where('id', $id)->update(['aktif' => $durum]);
        return response()->json(['success' => 'Durum değiştirildi.']);
    }
    public function kullaniciEkle()
    {

        return view('admin.kullanicilar.add');
    }
    public function kullaniciEklePost(Request $req)
    {

        $req->validate([

            'name'              =>      'required|string|max:48',
            'email'             =>      'required|email|unique:admins,email',
            'kullanici_turu'    =>      'required|in:admin,editor',
            'password'          =>      'required|alpha_num|min:6',
            'password-repeat'  =>      'required|same:password',
        ], [], [
            'name' => 'İsim',
            'email' => 'Email',
            'kullanici_turu' => 'Kullanıcı Türü',
            'password' => 'Şifre',
            'password-repeat' => 'Şifre Tekrar'
        ]);
        $admin = new Admin();
        $admin->name = $req->input('name');
        $admin->email = $req->input('email');
        $admin->kullanici_turu = $req->input('kullanici_turu');
        $admin->password = bcrypt($req->input('password'));

        if ($req->file('image')) {
            $file = $req->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/profileImage'), $filename);
            $admin->profil_resmi = $filename;
        }
        $admin->save();
        flash('Kullanıcı Eklendi', 'success')->setTitle('Başarılı');
        return redirect('admin/kullanicilar');
    }
    public function kullaniciSilPost($id)
    {
        Admin::where('id', $id)->delete();
    }
    public function kullaniciDuzenle($id)
    {
        $admin = Admin::where('id', $id)->first();
        return view('admin.kullanicilar.edit', ['kullanici' => $admin]);
    }
    public function kullaniciDuzenlePost(Request $req, $id)
    {
        $rules = [
            'name'              =>      'required|string|max:48',
            'email'             =>      'required|email|unique:admins,email,' . $id,
            'kullanici_turu'    =>      'required|in:admin,editor',
        ];
        if ($req->input('password') && $req->input('password-repeat')) {
            $rules = [
                'name'              =>      'required|string|max:48',
                'email'             =>      'required|email|unique:admins,email,' . $id,
                'kullanici_turu'    =>      'required|in:admin,editor',
                'password'          =>      'required|alpha_num|min:6',
                'password-repeat'  =>      'required|same:password',
            ];
        }

        $req->validate($rules, [], [
            'name' => 'İsim',
            'email' => 'Email',
            'kullanici_turu' => 'Kullanıcı Türü',
            'password' => 'Şifre',
            'password-repeat' => 'Şifre Tekrar'
        ]);
        $admin = Admin::where('id', $id)->first();
        $admin->name = $req->input('name');
        $admin->email = $req->input('email');
        $admin->kullanici_turu = $req->input('kullanici_turu');
        if (array_key_exists('password', $rules)) {
            $admin->password = bcrypt($req->input('password'));
        }

        if ($req->file('image')) {
            if (file_exists(public_path('profileImage/') . $admin->profil_resmi && $admin->profil_resmi)) {
                unlink(public_path('profileImage/') . $admin->profil_resmi);
            }

            $file = $req->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('profileImage'), $filename);
            $admin->profil_resmi = $filename;
        }
        $admin->save();
        flash('Kullanıcı Güncellendi', 'success')->setTitle('Başarılı');
        return redirect('admin/kullanicilar');
    }
    public function home()
    {

        return view('admin.main.anasayfa');
    }
}
