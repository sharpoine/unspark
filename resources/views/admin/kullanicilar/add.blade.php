@extends('admin.layouts.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Kullanıcı Oluştur</h1>
                        </div>
                        <form action="{{ route('admin.kullanicilar.eklePost') }}" method="POST" class="user">
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

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="name" type="text" class="form-control form-control-user"
                                        id="exampleFirstName" placeholder="İsim">
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Şifre">
                                </div>
                                <div class="col-sm-6">
                                    <input name="password-repeat" type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Tekrar Şifre">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Oluştur
                            </button>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
