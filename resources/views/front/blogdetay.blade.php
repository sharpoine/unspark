@extends('front.layouts.app')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('frontDist/images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">{{$post->baslik}}</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">

        <img src="{{asset('postPreviewImage/'.$post->onizleme)}}" alt="post-thumb" class="img-fluid w-100 mb-3">
        <p class="float-left mr-4">İçerik Sahibi {{$post->admin_name}}</p>
        <p>{{\Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y H:i')}}</p>
        <div class="content">
           {!!html_entity_decode($post->icerik)!!}
        </div>
      </div>
    </div>
  </div>
</section>


<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Latest News</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <article class="card">
          <img src="images/blog/post-1.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline">How These Different
              Book Covers Reflect the Design</a>
            <a href="#" class="btn btn-transparent">Read more</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <article class="card">
          <img src="images/blog/post-2.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline">How These Different
              Book Covers Reflect the Design</a>
            <a href="#" class="btn btn-transparent">Read more</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <article class="card">
          <img src="images/blog/post-3.jpg" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time>January 15, 2018</time>
            <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline">How These Different
              Book Covers Reflect the Design</a>
            <a href="#" class="btn btn-transparent">Read more</a>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<!-- /blog -->

@endsection
