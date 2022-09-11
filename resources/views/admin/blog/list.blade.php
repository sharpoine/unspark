@extends('admin.layouts.app')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">İçerikler</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İçerik Listesi</h6>
        </div>
        <div class="card-body">
            <x-filtre-satiri baslik="{{ $filtre['baslik'] }}" icerik="{{ $filtre['icerik'] }}"
                kullanici="{{ $filtre['kullanici'] }}" baslangicTarihi="{{ $filtre['baslangicTarihi'] }}"></x-filtre-satiri>
            <br>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-5" id="card-{{$post->post_id}}">
                        <article class="card">
                            <div class="card-header">
                                <a href="{{route('admin.blog.duzenle',$post->post_id)}}" id="edit"
                                    class="btn btn-warning btn-circle btn-md">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button id="delete" data-id="{{ $post->post_id }}"
                                    class="btn btn-danger btn-circle btn-md">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="float-right">
                                    <input class="toggle aktif" name="aktif" type="checkbox"
                                        {{ $post->aktif ? 'checked' : '' }} data-id="{{ $post->post_id }}"
                                        data-toggle="toggle" data-on="Aktif." data-off="Pasif." data-onstyle="success"
                                        data-offstyle="secondary" data-size="sm">
                                </div>

                            </div>
                            <div class="post-slider slider-sm slick-initialized slick-slider">
                                <div class="slick-list draggable">
                                    <div class="slick-track">
                                        <img src="{{ url('postPreviewImage/' . $post->onizleme) }}"
                                            class="card-img-top slick-slide slick-current slick-active" alt="post-thumb"
                                            data-slick-index="0" aria-hidden="false" tabindex="0">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">
                                        {{ $post->baslik }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="card-meta-author">
                                            <span>{{ $post->admin_name }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ $post->created_at }}
                                    </li>

                                </ul>
                                <p>{{ strip_tags(html_entity_decode($post->icerik)) }}</p>
                                <a href="post-details.html" class="btn btn-outline-primary">Görüntüle</a>
                            </div>
                        </article>

                    </div>
                @endforeach
            </div>
            <div class="d-flex align-items-center justify-content-center">
                {{ $posts->withQueryString()->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.js">
    </script>

    <script>
        $('body').on('click', '#delete', function() {
            var row_id = $(this).data("id");
            var result = confirm("İçeriği silmek istediğinizden emin misiniz?");
            var url = "{{ route('admin.blog.silPost', ':id') }}";
            url = url.replace(':id', row_id);
            if (result) {
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function(data) {
                        if (data.error) {
                            flasher.error(data.error);
                        } else {
                            $('#card-'+row_id).fadeOut(300, function(){ $(this).remove();});
                            flasher.success(data.success);
                        }

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                return false;
            }
        });
        $('body').on('click', '#edit', function() {
            var row_id = $(this).data('id');
            var url = "{{ route('admin.kullanicilar.duzenle', ':id') }}";
            url = url.replace(':id', row_id);
            window.location = url;

        });
        $('.aktif').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('admin.blog.aktifPost') }}",
                data: {
                    id: user_id,
                    aktif: status,

                },
                success: function(data) {
                    if (data.error) {
                        flasher.error(data.error);
                    } else {
                        flasher.success(data.success);
                    }
                    console.log(data)
                },


            });
        })
    </script>
    @stack('scripts')
@endsection
