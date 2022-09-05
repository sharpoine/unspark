@extends('admin.layouts.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Kullanıcı Düzenle</h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profil Resmi</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2"
                                            style="height: 150px;width:150px" id="previewImg">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG yada PNG (5mb dan küçük))</div>
                                        <!-- Profile picture upload button-->
                                        <input form="duzenleForm" type="file" accept="image/*" name="image" id="image"
                                            hidden>
                                        <label class="btn btn-primary" for="image">Ekle</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Hesap Detayları</div>
                                    <div class="card-body">
                                        <form id="duzenleForm" action="{{ route('admin.kullanicilar.duzenlePost', $kullanici->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="name">İsim</label>
                                                <input name='name' value='{{ $kullanici->name }}' class="form-control"
                                                    id="name" type="text" placeholder="İsminizi Girin...">
                                            </div>


                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Mail Adresi</label>
                                                <input class="form-control" name="email" id="email" type="email"
                                                    placeholder="Mail adresinizi girin" value="{{ $kullanici->email }}">
                                            </div>
                                            <div class="col-md-4 row gx-3 mb-3">
                                                <label class="small mb-1" for="kullanici_turu">Kullanıcı Türü</label>
                                                @if ($kullanici->id==Auth::user()->id)
                                                <input type="hidden" name="kullanici_turu" value="{{Auth::user()->kullanici_turu}}">
                                                @endif
                                               <select {{$kullanici->id==Auth::user()->id?'disabled':''}} class="form-control" name="kullanici_turu" id="kullanici_turu">
                                                    <option {{$kullanici->kullanici_turu=='admin'?'selected':''}} value="admin">Admin</option>
                                                    <option {{$kullanici->kullanici_turu=='editor'?'selected':''}} value="editor">Editor</option>
                                               </select>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password">Şifre</label>
                                                    <input class="form-control" id="password" name="password" type="password"
                                                        placeholder="Şifre girin">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password-repeat">Şifre Doğrula</label>
                                                    <input class="form-control" id="password-repeat" name="password-repeat" type="password"
                                                        placeholder="Şifreyi tekrar girin">
                                                </div>
                                            </div>

                                            <!-- Save changes button-->
                                            <button class="btn btn-primary btn-lg" type="submit">Kaydet</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('scripts')
    <script>
        $(function() {
            previewImg.src="{{ url('profileImage/' . $kullanici->profil_resmi) }}"
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }

        })
    </script>
@endsection
