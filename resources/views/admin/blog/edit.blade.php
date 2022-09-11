@extends('admin.layouts.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Blog</h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">İçerik Önizleme</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile mb-2" style="height: 150px;width:200px" id="previewImg">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG yada PNG (5mb dan küçük))</div>
                                        <!-- Profile picture upload button-->
                                        <input form="duzenleForm" type="file" accept="image/*" name="onizleme" id="onizleme"
                                            hidden>
                                        <label class="btn btn-primary" for="onizleme">Ekle</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">İçerik Düzenle</div>
                                    <div class="card-body">
                                        <form id="duzenleForm" action="{{route('admin.blog.duzenlePost',$post->id)}}" method="POST" enctype="multipart/form-data">
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
                                                <label class="small mb-1" for="baslik">Başlık</label>
                                                <input name='baslik' value='{{$post->baslik}}' class="form-control" id="baslik"
                                                    type="text" placeholder="Başlık girin...">
                                            </div>

                                            <div class="mb-3">
                                                <label class="small mb-1" for="summernote">İçerik</label>
                                                <textarea id="summernote" aria-multiline="true"  name="icerik">{{html_entity_decode($post->icerik)}}</textarea>
                                            </div>

                                            <!-- Save changes button-->
                                            <button class="btn btn-primary btn-lg" type="submit">Kaydet</button>
                                            <a class="btn btn-danger btn-lg">İptal</a>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#summernote').summernote({
            height:300,

        });


        $(function() {
            previewImg.src="{{ url('postPreviewImage/' . $post->onizleme) }}"
            onizleme.onchange = evt => {
                const [file] = onizleme.files
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
                }
            }

        })
    </script>
@endsection
