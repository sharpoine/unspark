<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function icerikEkle()
    {
        return view('admin.blog.add');
    }
    public function icerikEklePost(Request $req)
    {

        $req->validate([

            'baslik'              =>      'required|string|max:256|unique:posts,baslik',
            'icerik'             =>      'required'

        ], [], [
            'baslik' => 'Başlık',
            'icerik' => 'İçerik',

        ]);
        $content = $req->icerik;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/postImage/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();
        $post = new Post();
        $post->baslik = $req->input('baslik');
        $post->icerik = htmlentities($content);
        $post->kullanici_id = Auth::user()->id;
        if ($req->file('onizleme')) {
            $file = $req->file('onizleme');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('/postPreviewImage'), $filename);
            $post->onizleme = $filename;
        }
        $post->save();
        return redirect('admin/blog/ekle');
    }
    public function icerikler(Request $request)
    {
        $posts = PostView::when($request->baslik, function ($query, $baslik) {
            return $query->where('baslik', 'like', '%' . $baslik . '%');
        })->when($request->icerik, function ($query, $icerik) {
            return $query->where('icerik', 'like' . '%' . $icerik . '%');
        })->when($request->kullanici, function ($query, $kullanici) {
            return $query->where('admin_name', 'like', '%' . $kullanici . '%');
        })->when($request->baslangicTarihi, function ($query, $tarih) {
            $baslangicTarihi = explode('|', $tarih)[0];
            $bitisTarihi = explode('|', $tarih)[1];
            return $query->where('baslangic_tarihi',  '>=', $baslangicTarihi)->where('bitis_tarihi', '<=', $bitisTarihi);
        }, function ($query) {
            return $query->orderByDesc('post_id');
        })->paginate(9);




        return view('admin.blog.list', ['posts' => $posts, 'filtre' => $request]);
    }
    public function aktifPost(Request $req)
    {
        $durum = $req->input('aktif');
        $id = $req->input('id');
        Post::where('id', $id)->update(['aktif' => $durum]);
        return response()->json(['success' => 'Durum değiştirildi.']);
    }
}
