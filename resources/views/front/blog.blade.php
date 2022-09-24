@extends('front.layouts.app')
@section('content')
    <!-- page-title -->
    <section class="page-title bg-cover" data-background="{{ asset('frontDist/images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-1 text-white font-weight-bold font-primary">Our Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- /page-title -->

    <!-- blog -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <article class="card">
                            <img src="{{ asset('postPreviewImage/' . $post->onizleme) }}" alt="post-thumb"
                                class="card-img-top mb-2">
                            <div class="card-body p-0">
                                <time>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y H:i') }}</time>
                                <a href="blog-single.html"
                                    class="h4 card-title d-block my-3 text-dark hover-text-underline">{{ $post->baslik }}</a>
                                <a href="blog-single.html" class="btn btn-transparent">Daha fazlası</a>
                            </div>
                        </article>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            {{ $posts->withQueryString()->links('pagination::bootstrap-4') }}
        </div>
    </section>
@endsection
