@extends('admin.layouts.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Kullanıcı Ekle</h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profil Resmi</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" style="height: 150px;width:150px" id="previewImg">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG yada PNG (5mb dan küçük))</div>
                                        <!-- Profile picture upload button-->
                                        <input form="ekleForm" type="file" accept="image/*" name="image" id="image"
                                            hidden>
                                        <label class="btn btn-primary" for="image">Ekle</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Hesap Bilgileri</div>
                                    <div class="card-body">
                                        <form id="ekleForm" action="{{ route('admin.kullanicilar.eklePost') }}"
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
                                                <input name='name' value='{{ old('name') }}' class="form-control"
                                                    id="inputUsername" type="text" placeholder="Enter your username">
                                            </div>


                                            <div class="mb-3">
                                                <label class="small mb-1" for="email">Mail Adresi</label>
                                                <input class="form-control" name="email" type="email"
                                                    placeholder="Mail adresinizi girin" value="{{ old('email') }}">
                                            </div>
                                            <div class="col-md-4 row gx-3 mb-3">
                                                <label class="small mb-1" for="kullanici_turu">Kullanıcı Türü</label>
                                               <select class="form-control" name="kullanici_turu" id="kullanici_turu">
                                                    <option value="admin">Admin</option>
                                                    <option value="editor">Editor</option>
                                               </select>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password">Şifre</label>
                                                    <input class="form-control" name="password" type="password"
                                                        placeholder="Şifre girin">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="password-repeat">Şifre Doğrula</label>
                                                    <input class="form-control" name="password-repeat" type="password"
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
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }

        })
    </script>
@endsection
