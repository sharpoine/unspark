<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class UserController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            return redirect('admin/');
        }
        return view('admin.login');
    }
    public function loginPost(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin/');
        }
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
            'name' => 'required|max:64',
            'email' => 'email|required',
            'password' => 'required|min:8|max:64',
            'password-repeat' => 'required|same:password'
        ], [], [
            'name' => 'İsim',
            'email' => 'Email',
            'password' => 'Şifre',
            'password-repeat' => 'Şifre Tekrar'
        ]);
        $admin = new Admin();
        $admin->name = $req->input('name');
        $admin->email = $req->input('email');
        $admin->password = bcrypt($req->input('password'));
        $admin->save();
        flash('Kullanıcı Eklendi', 'success')->setTitle('Başarılı');
        return view('admin.kullanicilar.add');
    }
    public function kullaniciSilPost($id)
    {
        Admin::where('id', $id)->delete();
    }
    public function kullaniciDuzenle($id)
    {
    }
    public function kullaniciDuzenlePost(Request $req, $id)
    {

    }
    public function home()
    {

        return view('admin.main.anasayfa');
    }
}
