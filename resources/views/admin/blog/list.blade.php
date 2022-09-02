@extends('admin.layouts.app')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Kullanıcılar</h1>
    <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Editors Pick</h2>
        <article class="card">
          <div class="post-slider slider-sm slick-initialized slick-slider">
            <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 510px; transform: translate3d(0px, 0px, 0px);"><img src="images/post/post-1.jpg" class="card-img-top slick-slide slick-current slick-active" alt="post-thumb" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 510px;"></div></div>
          </div>

          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Use apples to give your bakes caramel and a moist texture</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="images/john-doe.jpg">
                  <span>Charls Xaviar</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">Color</a></li>
                  <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                  <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.js">
    </script>
    <script>

            $('body').on('click', '#delete', function() {
                    var row_id = $(this).data("id");
                    var result = confirm("Kullanıcıyı silmek istediğinizden emin misiniz?");
                    var url = "{{ route('admin.kullanicilar.silPost', ':id') }}";
                    url = url.replace(':id', row_id);
                    if (result) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            success: function(data) {
                                if (data.error) {
                                    flasher.error(data.error);
                                } else {
                                    table.draw();
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
        });
    </script>
@endsection
